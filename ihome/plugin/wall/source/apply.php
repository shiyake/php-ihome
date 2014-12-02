<?php

/*
  wall_apply.php 用于公共主页申请足迹墙，并通知管理员在后台进行批准。
  add by xuxing@ihome, 2012-9-21 23:26:00
  mod ancon 2013年3月27日11:13:53
*/

if(!defined('iBUAA')) {
	exit('Access Denied');
}

include_once(S_ROOT.'./uc_client/client.php');

$theurl = 'plugin.php?pluginid=wall&ac=apply';

/***********先注释掉,测试!**********
$query=$_SGLOBAL['db']->query("select uid from ".tname('space')." where uid='".$_SGLOBAL['supe_uid']."' and groupid>3  limit 1");
if($_SGLOBAL['db']->fetch_array($query)){
	showmessage('wall_not_privillege');
}
*************************************/		

if(submitcheck("applysubmit")){
	$WallTitle = trim($_POST['a_name']);
	$startTimeDate = trim($_POST['a_s_time']);
	$startTimeHour = trim($_POST['a_s_hour']);
	$startTimeMin = trim($_POST['a_s_minute']);
	$startTime = $startTimeDate.' '.$startTimeHour.':'.$startTimeMin;
	$WallStartTime = strtotime($startTime);
	$endTimeDate = trim($_POST['a_e_time']);
	$endTimeHour = trim($_POST['a_e_hour']);
	$endTimeMin = trim($_POST['a_e_minute']);
	$endTime = $endTimeDate.' '.$endTimeHour.':'.$endTimeMin;
	$WallEndTime = strtotime($endTime);
	$WallUid = $uid;
	$WallDesc = $_POST['a_intro'];
	$WallLive = $_POST['live'];

	$WallTitle = getstr($WallTitle, 30, 1, 1, 1);
	if(strlen($WallTitle) < 4) {
		showmessage('至少2个汉字！');
	}
	$WallDesc = getstr($WallDesc, 400, 1, 1, 1);
	if(strlen($WallDesc) < 20) {
		showmessage('至少10个汉字！');
	}
	if(empty($WallStartTime) || empty($WallEndTime)){
		showmessage('wall_time_illegal');
	}
	if($WallStartTime > $WallEndTime & $WallStartTime & $WallEndTime){
		showmessage('wall_time_reverse');
	}
	if(strtotime(date('Y-m-d')) > $WallEndTime & $WallEndTime){
		showmessage('wall_endtime_early');
	}	
	if(empty($WallUid)){
		showmessage('wall_uid_illegal'); 
	}
	$arr = array(
	"wallname" => $WallTitle,
	"content" => $WallDesc,
	"uid" => intval($WallUid),
	"starttime" => intval($WallStartTime),
	"endtime" => intval($WallEndTime),
	"pass" => '0',
	"timeline" => time(),
	"live" => $WallLive
	);
	
	$pic = array();
	if($_FILES['poster']['tmp_name']){
		$pic = pic_save($_FILES['poster'], -1, $arr['wallname']);
		if(is_array($pic) && $pic['filepath']){
			$arr['picture'] = $pic['filepath'];
		}
	}

	$wallid = inserttable('wall', $arr,1);
	
	if($wallid){
		showmessage('申请成功，谢谢您的申请使用！', "$theurl", 2);
	}else{
		showmessage('do_failed');
	}
}

include template('plugin/wall/template/wall_apply');

?>