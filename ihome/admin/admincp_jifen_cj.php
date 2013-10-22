<?php

if(!defined('iBUAA') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

//权限
if(!checkperm('managejifen_cj')) {
	cpmessage('no_authority_management_operation');
}


//取得单个数据
$thevalue = array();
$_GET['id'] = empty($_GET['id'])?0:intval($_GET['id']);
if($_GET['id']) {
	$query = $_SGLOBAL['db']->query("SELECT s.*,p.name,p.total as lp_total FROM ".tname('jifen_cj')." s,".tname('jifen_lp')." p WHERE s.id='$_GET[id]'");
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
		cpmessage("请至少正确选择一个要删除的抽奖礼品", "admincp.php?ac=jifen_cj", 2); //请至少正确选择一个要删除的抽奖礼品
	}

	$ids = implode(",", $_POST['ids']);
	$_SGLOBAL['db']->query("DELETE FROM " . tname("jifen_cj") . " WHERE id in ($ids)");
	cpmessage("do_success", "admincp.php?ac=jifen_cj", 2);
}
if(submitcheck("jifen_cjsubmit")){// 创建/编辑抽奖礼品
	if(empty($_POST['total'])){
		cpmessage("抽奖礼品数量不能为空"); // 抽奖礼品名称不能重复
	}
	$sdate = $_POST['sdate']?strtotime($_POST['sdate']):0;
	$edate = $_POST['edate']?strtotime($_POST['edate']):0;
	if($sdate > $edate & $sdate & $edate){
		cpmessage("结束时间必须大于开始时间"); // 抽奖礼品名称不能重复
	}
	if(strtotime(date('Y-m-d')) > $edate & $edate){
		cpmessage("结束时间必须大于当前时间"); // 抽奖礼品名称不能重复
	}
	$total = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT total FROM ".tname('jifen_lp')."  WHERE id=".$_POST['lpid']), 0);
	if($_POST['total'] > $total){
		cpmessage("抽奖数量不能大于礼品总数"); 
	}
	$arr = array(
		"lpid" => intval($_POST['lpid']),
		"total" => intval($_POST['total']),
		"math" => $_POST['math'],
		"sdate" => $sdate,
		"edate" => $edate
	);

	$query = $_SGLOBAL['db']->query('SELECT * FROM ' . tname('jifen_cj'). " WHERE lpid = '$arr[lpid]'");
	$value = $_SGLOBAL['db']->fetch_array($query);
	if($value && !$_POST['id']){
		cpmessage("抽奖礼品名称不能重复"); // 抽奖礼品名称不能重复
	}
	
	if($_POST['id']){// 修改
		//是否删除海报
		$id = intval($_POST['id']);
		updatetable('jifen_cj', $arr, array('id'=>$id));
	} else {
		$id = inserttable('jifen_cj', $arr, 1);
	}
	// 更新缓存
	cpmessage("do_success", "admincp.php?ac=jifen_cj", 2);

}
if("delete" == $_GET['op']) {// 删除抽奖礼品

	if(! $_GET['id']){
		cpmessage("请至少正确选择一个要删除的抽奖礼品", "admincp.php?ac=jifen_cj", 2); //请至少正确选择一个要删除的抽奖礼品
	}

	$_GET['id '] = intval($_GET['id']);
	$_SGLOBAL['db']->query("DELETE FROM " . tname("jifen_cj") . " WHERE id = '$_GET[id]'");
	
	cpmessage("do_success", "admincp.php?ac=jifen_cj", 2);

} elseif("add" == $_GET['op']) {
	//$thevalue['poster'] = "image/event/default.jpg";

} else {
	$mpurl = 'admincp.php?ac='.$ac;

	$orderby = array($_GET['orderby']=>' selected');
	$ordersc = array($_GET['ordersc']=>' selected');
	$wheresql = ' s.lpid=p.id';
	if($_GET['name']){
		$wheresql .= " and name like '%".$_GET['name']."%'";
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
	
	$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('jifen_cj')." s,".tname('jifen_lp')." p  WHERE $wheresql"), 0);
	if($count) {
		$query = $_SGLOBAL['db']->query("SELECT s.*,p.name,p.pic FROM ".tname('jifen_cj')." s,".tname('jifen_lp')." p WHERE $wheresql $ordersql LIMIT $start,$perpage");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			if($value['pic']) {
				$value['pic'] = "jifen/uploads/image/".$value['id'].".jpg";
			} else {
				$value['pic'] = "jifen/images/default.jpg";
			}
			if($value['math'] == 1) {
				$value['math'] = "随机";
			}elseif($value['math'] == 2){
				$value['math'] = "增加随机难度";
			}
			$list[] = $value;
		}
		$multi = multi($count, $perpage, $page, $mpurl);
	}
	
	$actives = array('view' => ' class="active"');
}

?>