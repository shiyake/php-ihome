<?php

/*
  admincp_wallmanage.php 用于管理足迹墙的添加、管理，将来可由用户申请，通知管理员在后台进行批准。
  add by xuxing@ihome, 2012-8-18 15:56:00
	Last Modfile By Ancon
	Last Time : 2012年10月22日10:55:52
*/

if(!defined('iBUAA') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
if(!checkperm('managewallmanage')) {
	cpmessage('no_authority_management_operation');
}

include_once(S_ROOT.'./uc_client/client.php');
include_once(S_ROOT.'./data/data_usergroup.php');
@include_once(S_ROOT.'./data/data_profilefield.php');

$op = $_GET['op']?trim($_GET['op']):'';
$_GET['id'] = empty($_GET['id'])?0:intval($_GET['id']);

$WallList = array();

if(submitcheck("wallsubmit")){// 创建/编辑足迹墙
	$WallTitle = trim($_POST['title']);
	$WallStartTime = strtotime($_POST['starttime']);
	$WallEndTime = strtotime($_POST['endtime']);
	$WallUid = intval($_POST['uid']);
	$WallDesc = $_POST['desc'];
	$WallLive = $_POST['live'];
	
	if(empty($WallTitle)){
		cpmessage("名称不能为空"); // 足迹墙名称不能为空
	}
	if(empty($WallStartTime) || empty($WallEndTime)){
		cpmessage("开始或结束时间必须按格式填写"); // 时间不正确
	}
	if($WallStartTime > $WallEndTime & $WallStartTime & $WallEndTime){
		cpmessage("结束时间必须大于开始时间"); // 时间不正确
	}
	if(strtotime(date('Y-m-d')) > $WallEndTime & $WallEndTime){
		cpmessage("结束时间必须大于当前时间"); // 时间不正确
	}
	
	if(empty($WallUid)){
		cpmessage("审核人uid不正确"); 
	}
	if(empty($WallLive)){
		$WallLive = 0;
	}
	
	$arr = array(
	"wallname" => getstr($WallTitle, 30, 1, 1, 1),
	"content" => getstr($WallDesc, 400, 1, 1, 1),
	"uid" => intval($WallUid),
	"starttime" => intval($WallStartTime),
	"endtime" => intval($WallEndTime),
	"pass" => '1',
	"timeline" => time(),
	"live" => $WallLive
	);
	
	if($_POST['id']){// 修改
		$id = intval($_POST['id']);
		updatetable('wall', $arr, array('id'=>$id));
	} else {
		$id = inserttable('wall', $arr, 1);
	}

	cpmessage("do_success", "admincp.php?ac=wallmanage", 2);

}

if (submitcheck('listsubmit')) {  //批量删除操作
	if(empty($_POST['del'])){
		cpmessage('未选择任务操作');
	}
	if(! $_POST['ids']){
		cpmessage("请至少正确选择一个要删除的足迹墙", "admincp.php?ac=wallmanage", 2); //请至少正确选择一个要删除的墙
	}

	$ids = implode(",", $_POST['ids']);
	$_SGLOBAL['db']->query("DELETE FROM " . tname("wall") . " WHERE id in ($ids)");
	
	cpmessage("do_success", "admincp.php?ac=wallmanage", 2);
}

if(empty($op)){
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('wall')." ORDER BY starttime DESC");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		realname_set($value['uid']);
		$WallList[] = $value;
	}

/*}elseif($op == 'addwall'){
	$WallTitle = trim($_POST['title']);
	$WallDesc = trim($_POST['desc']);
	$WallUid = trim($_POST['walluid']);
	$WallStartTime = strtotime(trim($_POST['starttime']));
	$WallEndTime = strtotime(trim($_POST['endtime']));
	
	$arr = array(
	"wallname" => getstr($WallTitle, 30, 1, 1, 1),
	"content" => getstr($WallDesc, 400, 1, 1, 1),
	"uid" => intval($WallUid),
	"starttime" => intval($WallStartTime),
	"endtime" => intval($WallEndTime),
	"pass" => '1',
	"timeline" => time()
	);
	
	$id = inserttable('wall', $arr, 1);
	cpmessage("do_success", "admincp.php?ac=wallmanage", 1);*/
}elseif($op == 'modwall'){
	$WallId = intval($_GET['id']);
	$ModWall = array();
	if($WallId>0){
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('wall')." WHERE id = ".$WallId." ORDER BY starttime DESC");
		$ModWall = $_SGLOBAL['db']->fetch_array($query);
	}
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('wall')." ORDER BY starttime DESC");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$WallList[] = $value;
	}

}elseif($op == 'verify'){
	$WallId = intval($_GET['id']);
	$WallPass = intval($_GET['pass']);
	if($WallId>0){
		$Wallpass = $WallPass?0:1;
		updatetable('wall', array('pass'=>$WallPass), array('id'=>$WallId));// 更新审批状态
	}
	cpmessage("do_success", "admincp.php?ac=wallmanage", 2);
}elseif($op == 'delete'){
	$WallId = intval($_GET['id']);
	if($WallId>0){
		$_SGLOBAL['db']->query("DELETE FROM " . tname("wall") . " WHERE id = '$WallId'");
	}
	cpmessage("do_success", "admincp.php?ac=wallmanage", 2);
}

realname_get();//获取实名

include template('admin/tpl/wallmanage');

?>