<?php

if(!defined('iBUAA') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

//权限
if(!checkperm('managejifen_lp')) {
	cpmessage('no_authority_management_operation');
}

$allowhtml = 1;  //允许编辑源码

$list_lb = array();
$query = $_SGLOBAL['db']->query("SELECT id,name FROM ".tname('jifen_lb')." order by id asc");
while($list = $_SGLOBAL['db']->fetch_array($query)){
	$list_lbss[$list[id]] = $list[name];   //类别数组
}
//取得单个数据
$thevalue = array();
$_GET['id'] = empty($_GET['id'])?0:intval($_GET['id']);
if($_GET['id']) {
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('jifen_lp')." WHERE id='$_GET[id]'");
	$thevalue = $_SGLOBAL['db']->fetch_array($query);
	if($thevalue['pic']){
		$thevalue['pic'] = "jifen/uploads/image/".$thevalue['id'].".jpg";
	} else {
		$thevalue['pic'] = "jifen/images/default.jpg";
	}
}
if(!empty($_GET['op']) && $_GET['op'] != 'add' && empty($thevalue)) {
	cpmessage('there_is_no_designated_users_columns');
}


if (submitcheck('listsubmit')) {  //批量删除操作
	if(empty($_POST['del'])){
		cpmessage('未选择任务操作');
	}
	if(! $_POST['ids']){
		cpmessage("请至少正确选择一个要删除的礼品", "admincp.php?ac=jifen_lp", 2); //请至少正确选择一个要删除的礼品
	}

	$ids = implode(",", $_POST['ids']);
	$_SGLOBAL['db']->query("DELETE FROM " . tname("jifen_lp") . " WHERE id in ($ids)");
	
	$query = $_SGLOBAL['db']->query("SELECT COUNT(*) as counts,lbid FROM ".tname('jifen_lp')." group by lbid");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		updatetable('jifen_lb', array('nums'=>$value[counts]), array('id'=>$value[lbid]));// 更新缓存
	}
	include_once(S_ROOT . "source/function_cache.php");
	jifen_lb_cache();
	cpmessage("do_success", "admincp.php?ac=jifen_lp", 2);
}
if(submitcheck("jifen_lpsubmit")){// 创建/编辑礼品
	if(empty($_POST['name'])){
		cpmessage("礼品名称不能为空"); // 礼品名称不能重复
	}
	$sdate = $_POST['sdate']?strtotime($_POST['sdate']):0;
	$edate = $_POST['edate']?strtotime($_POST['edate']):0;
	if($sdate > $edate & $sdate & $edate){
		cpmessage("结束时间必须大于开始时间"); // 礼品名称不能重复
	}
	if(strtotime(date('Y-m-d')) > $edate & $edate){
		cpmessage("结束时间必须大于当前时间"); // 礼品名称不能重复
	}
	
	if(empty($_POST['total']) || intval($_POST['total'])<1){
		cpmessage("礼品总数有误"); 
	}
	
	if(empty($_POST['price']) || intval($_POST['price'])<1){
		cpmessage("兑换积分有误"); 
	}
	
	if($_SGLOBAL['mobile']) {
		$_POST['des'] = getstr($_POST['des'], 0, 1, 0, 1, 1);
	} else {
		//$_POST['des'] = checkhtml($_POST['des']);
		$_POST['des'] = getstr($_POST['des'], 0, 1, 0, 1, 0, 1);
		$_POST['des'] = preg_replace(array(
				"/\<div\>\<\/div\>/i",
				"/\<a\s+href\=\"([^\>]+?)\"\>/i"
			), array(
				'',
				'<a href="\\1" target="_blank">'
			), $_POST['des']);
	}
	$des = $_POST['des'];
	
	$arr = array(
		"name" => getstr($_POST['name'], 50, 1, 1, 1),
		"des" => $des,
		"lbid" => intval($_POST['lbid']),
		"total" => intval($_POST['total']),
		"price" => intval($_POST['price']),
		"mprice" => intval($_POST['mprice']),
		"sdate" => $sdate,
		"edate" => $edate,
		"flag" => intval($_POST['flag']),
		"time" => time()
	);

	$query = $_SGLOBAL['db']->query('SELECT * FROM ' . tname('jifen_lp'). " WHERE name = '$arr[name]'");
	$value = $_SGLOBAL['db']->fetch_array($query);
	if($value && $_POST['id'] != $value['id']){
		cpmessage("礼品名称不能重复"); // 礼品名称不能重复
	}
	
	if($_POST['id']){// 修改
		//是否删除海报
		$_POST['delposter'] = intval($_POST['delposter']);
		if($_POST['delposter']) {
			$arr['pic'] = 0;
			$value['pic'] = 0;
		}
		$id = intval($_POST['id']);
		updatetable('jifen_lp', $arr, array('id'=>$id));
	} else {
		$arr['pic'] = 0;
		$id = inserttable('jifen_lp', $arr, 1);
		$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('jifen_lp')." where lbid=".intval($_POST['lbid'])." group by lbid"), 0);
		updatetable('jifen_lb', array('nums'=>$count), array('id'=>intval($_POST['lbid'])));// 更新缓存
		include_once(S_ROOT . "source/function_cache.php");
		jifen_lb_cache();
	}
	// 上传海报	
	if (!empty($_FILES['pic']['tmp_name'])) {
		include_once(S_ROOT.'./source/function_image.php');
		$tmp_name = S_ROOT.'./data/temp/eventpic.tmp';
		move_uploaded_file($_FILES['pic']['tmp_name'], $tmp_name);
		// 临时改变缩略图设置
		include_once(S_ROOT.'./data/data_setting.php');
		$tmpsetting = $_SGLOBAL['setting'];
		$_SGLOBAL['setting'] = array('thumbwidth' => 200,'thumbheight' => 200,'maxthumbwidth' => 200,'maxthumbheight' => 200);
		$thumbpath = makethumb($tmp_name);
		$_SGLOBAL['setting'] = $tmpsetting;		
		if(empty($thumbpath)){//未生成缩略图
			if(fileext($_FILES['pic']['name']) != 'jpg') {
				cpmessage('poster_only_jpg_allowed');
			}
			$thumbpath = $tmp_name;
		} else {//成功生成缩略图
			@unlink($tmp_name);
		}
		if(!is_dir(S_ROOT.'./jifen/uploads/image')){
			@mkdir(S_ROOT.'./jifen/uploads/image');
		}
		if(is_file(S_ROOT.'./jifen/uploads/image/'.$id.'.jpg')){
			@unlink(S_ROOT.'./jifen/uploads/image/'.$id.'.jpg');
		}
		rename($thumbpath, S_ROOT."./jifen/uploads/image/$id.jpg");
		if(!$value['pic'] && is_file(S_ROOT."./jifen/uploads/image/$id.jpg")){
			updatetable('jifen_lp', array('pic'=>1), array('id'=>$id));
		}
	}
	// 更新缓存
	cpmessage("do_success", "admincp.php?ac=jifen_lp", 2);

}
if("delete" == $_GET['op']) {// 删除礼品

	if(! $_GET['id']){
		cpmessage("请至少正确选择一个要删除的礼品", "admincp.php?ac=jifen_lp", 2); //请至少正确选择一个要删除的礼品
	}

	$_GET['id '] = intval($_GET['id']);
	$_SGLOBAL['db']->query("DELETE FROM " . tname("jifen_lp") . " WHERE id = '$_GET[id]'");
	
	$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('jifen_lp')." where lbid=".intval($_GET['lbid'])." group by lbid"), 0);
	updatetable('jifen_lb', array('nums'=>$count), array('id'=>intval($_GET['lbid'])));// 更新缓存
	include_once(S_ROOT . "source/function_cache.php");
	jifen_lb_cache();
	
	cpmessage("do_success", "admincp.php?ac=jifen_lp", 2);

} elseif("add" == $_GET['op']) {
	//$thevalue['poster'] = "image/event/default.jpg";

} else {
	$mpurl = 'admincp.php?ac='.$ac;

	$orderby = array($_GET['orderby']=>' selected');
	$ordersc = array($_GET['ordersc']=>' selected');
	$wheresql = ' id > 0';
	if($_GET['name']){
		$wheresql .= " and name like '%".$_GET['name']."%'";
	}
	if($_GET['des']){
		$wheresql .= " and des like '%".$_GET['des']."%'";
	}
	$ordersql = '';
	if($_GET['orderby']){
		$ordersql = ' order by '.$_GET['orderby'].' '.$_GET['ordersc'];
	}else{
		$ordersql = ' order by id desc';
	}
	//显示分页
	$perpage = empty($_GET['perpage'])?0:intval($_GET['perpage']);
	if(!in_array($perpage, array(10,20,50))) $perpage = 10;
	$mpurl .= '&perpage='.$perpage;
	$perpages = array($perpage => ' selected');
	
	$page = empty($_GET['page'])?1:intval($_GET['page']);
	if($page<1) $page = 1;
	$start = ($page-1)*$perpage;
	//检查开始数
	ckstart($start, $perpage);

	
	$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('jifen_lp')." s WHERE $wheresql"), 0);
	if($count) {
		$query = $_SGLOBAL['db']->query("SELECT s.* FROM ".tname('jifen_lp')." s WHERE $wheresql $ordersql LIMIT $start,$perpage");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			if($value['pic']) {
				$value['pic'] = "jifen/uploads/image/".$value['id'].".jpg";
			} else {
				$value['pic'] = "jifen/images/default.jpg";
			}
			$value['des'] = getstr(strip_tags(html_entity_decode($value['des'])), '25', 1, 1, 1).'...';
			$list[] = $value;
		}
		$multi = multi($count, $perpage, $page, $mpurl);
	}
	
	$actives = array('view' => ' class="active"');
}

?>