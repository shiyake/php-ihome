<?php

if(!defined('iBUAA') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

if(!checkperm('managejifen_dhlog')) {
	cpmessage('no_authority_management_operation');
}

if (submitcheck('listsubmit'))
{
	if(empty($_POST['del'])){
		cpmessage('未选择任务操作');
	}
	if(! $_POST['ids']){
		cpmessage("请至少正确选择一个要删除的兑换记录", "admincp.php?ac=jifen_dhlog", 2); 
	}

	$ids = implode(",", $_POST['ids']);
	$_SGLOBAL['db']->query("DELETE FROM " . tname("jifen_dhlog") . " WHERE id in ($ids)");
	cpmessage("do_success", "admincp.php?ac=jifen_dhlog", 2);
}
if("get" == $_GET['op'])
	{
		if(! $_GET['id'])
			{
				cpmessage("请至少正确选择一个要删除的兑换记录", "admincp.php?ac=jifen_dhlog", 2); 
			}
		$_GET['id '] = intval($_GET['id']);
		$_SGLOBAL['db']->query("UPDATE  " . tname("jifen_dhlog") . "  SET get=get+1 WHERE id = '$_GET[id]'");
		cpmessage("do_success", "admincp.php?ac=jifen_dhlog", 2);
	}

if("delete" == $_GET['op'])
	{
		if(! $_GET['id'])
			{
				cpmessage("请至少正确选择一个要删除的兑换记录", "admincp.php?ac=jifen_dhlog", 2); 
			}

		$_GET['id '] = intval($_GET['id']);
		$_SGLOBAL['db']->query("DELETE FROM " . tname("jifen_dhlog") . " WHERE id = '$_GET[id]'");
		cpmessage("do_success", "admincp.php?ac=jifen_dhlog", 2);

	}

else
	{
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
	ckstart($start, $perpage);
	$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('jifen_dhlog')." s WHERE $wheresql"), 0);
	if($count) {
		$query = $_SGLOBAL['db']->query("SELECT s.* FROM ".tname('jifen_dhlog')." s WHERE $wheresql $ordersql LIMIT $start,$perpage");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$list[] = $value;
		}
		$multi = multi($count, $perpage, $page, $mpurl);
	}
}

?>