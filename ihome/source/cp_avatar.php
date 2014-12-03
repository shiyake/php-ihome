<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}

if(submitcheck('avatarsubmit')) {
	showmessage('do_success', 'cp.php?ac=avatar', 0);
}

//头像
include_once S_ROOT.'./uc_client/client.php';
$uc_avatarflash = uc_avatar($_SGLOBAL['supe_uid'], (empty($_SCONFIG['avatarreal'])?'virtual':'real'));

//判断用户是否设置了头像
$setarr = array();
$avatar_exists = ckavatar($space['uid']);
if($avatar_exists) {
	if(!$space['avatar']) {
		//奖励积分
		$reward = getreward('setavatar', 0);
		if($reward['credit']) {
			$setarr['credit'] = "credit=credit+$reward[credit]";
		}
		if($reward['experience']) {
			$setarr['experience'] = "experience=experience+$reward[experience]";
		}
		
		$setarr['avatar'] = 'avatar=1';
		$setarr['updatetime'] = "updatetime=$_SGLOBAL[timestamp]";
	}
} else {
	if($space['avatar']) {
		$setarr['avatar'] = 'avatar=0';
	}
}

if($setarr) {
	$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET ".implode(',', $setarr)." WHERE uid='$space[uid]'");
	//变更记录
	if($_SCONFIG['my_status']) {
		inserttable('userlog', array('uid'=>$_SGLOBAL['supe_uid'], 'action'=>'update', 'dateline'=>$_SGLOBAL['timestamp']), 0, true);
	}
}

include template("cp_avatar");

?>