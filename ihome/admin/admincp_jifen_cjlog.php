<?php

if(!defined('iBUAA') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

//权限
if(!checkperm('managejifen_cjlog')) {
	cpmessage('no_authority_management_operation');
}

if (submitcheck('listsubmit')) {  //批量删除操作
	if(empty($_POST['del'])){
		cpmessage('未选择任务操作');
	}
	if(! $_POST['ids']){
		cpmessage("请至少正确选择一个要删除的抽奖记录", "admincp.php?ac=jifen_cjlog", 2); //请至少正确选择一个要删除的抽奖记录
	}

	$ids = implode(",", $_POST['ids']);
	$_SGLOBAL['db']->query("DELETE FROM " . tname("jifen_cjlog") . " WHERE id in ($ids)");
	
	$query = $_SGLOBAL['db']->query("SELECT COUNT(*) as counts,sum(score) as scores,lpid FROM ".tname('jifen_cjlog')." group by lpid");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		updatetable('jifen_lp', array('modders'=>$value[counts],'score'=>round($value[scores]/$value[counts])), array('id'=>$value[lpid]));// 更新缓存
	}
	cpmessage("do_success", "admincp.php?ac=jifen_cjlog", 2);
}

if("delete" == $_GET['op']) {// 删除抽奖记录

	if(! $_GET['id']){
		cpmessage("请至少正确选择一个要删除的抽奖记录", "admincp.php?ac=jifen_cjlog", 2); //请至少正确选择一个要删除的抽奖记录
	}

	$_GET['id '] = intval($_GET['id']);
	$_SGLOBAL['db']->query("DELETE FROM " . tname("jifen_cjlog") . " WHERE id = '$_GET[id]'");
	
	cpmessage("do_success", "admincp.php?ac=jifen_cjlog", 2);

}else {
	$mpurl = 'admincp.php?ac='.$ac;

	$orderby = array($_GET['orderby']=>' selected');
	$ordersc = array($_GET['ordersc']=>' selected');
	$wheresql = ' id > 0';
	if($_GET['username']){
		$wheresql .= " and username like '%".$_GET['username']."%'";
	}
	if($_GET['lpid']){
		$wheresql .= " and lpid ='".$_GET['lpid']."'";
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
	
	$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('jifen_cjlog')." s WHERE $wheresql"), 0);
	if($count) {
		$query = $_SGLOBAL['db']->query("SELECT s.* FROM ".tname('jifen_cjlog')." s WHERE $wheresql $ordersql LIMIT $start,$perpage");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$list[] = $value;
		}
		$multi = multi($count, $perpage, $page, $mpurl);
	}
}

?>