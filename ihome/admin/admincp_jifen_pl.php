<?php

if(!defined('iBUAA') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

//权限
if(!checkperm('managejifen_pl')) {
	cpmessage('no_authority_management_operation');
}

$allowhtml = 1;  //允许编辑源码

//取得单个数据
$thevalue = array();
$_GET['id'] = empty($_GET['id'])?0:intval($_GET['id']);
if($_GET['id']) {
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('jifen_pl')." WHERE id='$_GET[id]'");
	$thevalue = $_SGLOBAL['db']->fetch_array($query);
}
if(!empty($_GET['op']) && $_GET['op'] != 'add' && empty($thevalue)) {
	cpmessage('there_is_no_designated_users_columns');
}


if (submitcheck('listsubmit')) {  //批量删除操作
	if(empty($_POST['del'])){
		cpmessage('未选择任务操作');
	}
	if(! $_POST['ids']){
		cpmessage("请至少正确选择一个要删除的评论", "admincp.php?ac=jifen_pl", 2); //请至少正确选择一个要删除的评论
	}

	$ids = implode(",", $_POST['ids']);
	$_SGLOBAL['db']->query("DELETE FROM " . tname("jifen_pl") . " WHERE id in ($ids)");
	
	$query = $_SGLOBAL['db']->query("SELECT COUNT(*) as counts,sum(s.score) as scores,s.lpid FROM ".tname('jifen_pl')." s group by s.lpid");
	$i = 0;
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$tmpscore = floor($value[scores]/$value[counts]);
		updatetable('jifen_lp', array('modders'=>$value[counts],'score'=>round($value[scores]/$value[counts])), array('id'=>$value[lpid]));// 更新缓存
		$i++;
	}
	if($i==0){
		$_SGLOBAL['db']->query("UPDATE " . tname("jifen_lp") . " SET modders=0,score=0");
	}
	cpmessage("do_success", "admincp.php?ac=jifen_pl", 2);
}
if(submitcheck("jifen_plsubmit")){// 创建/编辑评论
	if(empty($_POST['content'])){
		cpmessage("评论内容不能为空"); // 评论内容不能为空
	}
	$arr = array(
		"score" => intval($_POST['score']),
		"content" => getstr($_POST['content'], '', 1, 1, 1)
	);
	
	if($_POST['id']){// 修改
		//是否删除海报
		$id = intval($_POST['id']);
		updatetable('jifen_pl', $arr, array('id'=>$id));
	} 
	$lpid = intval($_POST['lpid']);
	$query = $_SGLOBAL['db']->query("SELECT COUNT(*) as allnums,sum(score) as scores FROM ".tname('jifen_pl')." s where lpid=".$lpid);
	$tmplist = $_SGLOBAL['db']->fetch_array($query);
	$tmpscore = floor($tmplist[scores]/$tmplist[allnums]);
	$_SGLOBAL['db']->query('UPDATE '.tname('jifen_lp').' SET modders='.$tmplist[allnums].',score='.$tmpscore.' WHERE id='.$lpid);  //更新评分数
	cpmessage("do_success", "admincp.php?ac=jifen_pl", 2);

}
if("delete" == $_GET['op']) {// 删除评论

	if(! $_GET['id']){
		cpmessage("请至少正确选择一个要删除的评论", "admincp.php?ac=jifen_pl", 2); //请至少正确选择一个要删除的评论
	}

	$_GET['id '] = intval($_GET['id']);
	$_SGLOBAL['db']->query("DELETE FROM " . tname("jifen_pl") . " WHERE id = '$_GET[id]'");
	
	
	$lpid = intval($_GET['lpid']);
	$query = $_SGLOBAL['db']->query("SELECT COUNT(*) as allnums,sum(score) as scores FROM ".tname('jifen_pl')." s where lpid=".$lpid);
	$tmplist = $_SGLOBAL['db']->fetch_array($query);
	$tmpscore = floor($tmplist[scores]/$tmplist[allnums]);
	$_SGLOBAL['db']->query('UPDATE '.tname('jifen_lp').' SET modders='.$tmplist[allnums].',score='.$tmpscore.' WHERE id='.$lpid);  //更新评分数
	
	cpmessage("do_success", "admincp.php?ac=jifen_pl", 2);

} elseif("add" == $_GET['op']) {
	//$thevalue['poster'] = "image/event/default.jpg";

} else {
	$mpurl = 'admincp.php?ac='.$ac;

	$orderby = array($_GET['orderby']=>' selected');
	$ordersc = array($_GET['ordersc']=>' selected');
	$wheresql = ' s.lpid = p.id';
	if($_GET['username']){
		$wheresql .= " and s.username like '%".$_GET['username']."%'";
	}
	if($_GET['content']){
		$wheresql .= " and s.content like '%".$_GET['content']."%'";
	}
	if($_GET['lpid']){
		$wheresql .= " and s.lpid ='".$_GET['lpid']."'";
	}
	$ordersql = '';
	if($_GET['orderby']){
		$ordersql = ' order by s.'.$_GET['orderby'].' '.$_GET['ordersc'];
	}else{
		$ordersql = ' order by s.id desc';
	}
	//显示分页
	$perpage = empty($_GET['perpage'])?0:intval($_GET['perpage']);
	if(!in_array($perpage, array(20,50,100))) $perpage = 20;
	$mpurl .= '&perpage='.$perpage;
	$perpages = array($perpage => ' selected');
	
	$page = empty($_GET['page'])?1:intval($_GET['page']);
	if($page<1) $page = 1;
	$start = ($page-1)*$perpage;
	//检查开始数
	ckstart($start, $perpage);
	
	$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('jifen_pl')." s,".tname('jifen_lp')." p WHERE $wheresql"), 0);
	if($count) {
		$query = $_SGLOBAL['db']->query("SELECT s.*,p.name as pname FROM ".tname('jifen_pl')." s,".tname('jifen_lp')." p WHERE $wheresql $ordersql LIMIT $start,$perpage");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$value[content] = getstr($value[content], 150, 1, 1, 0, 0, -1);
			$list[] = $value;
		}
		$multi = multi($count, $perpage, $page, $mpurl);
	}
	
	$actives = array('view' => ' class="active"');
}

?>