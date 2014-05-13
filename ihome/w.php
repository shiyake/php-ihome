<?php

include_once('./common.php');

checkclose();



$wallid = empty($_GET['wallid'])?'':$_GET['wallid'];

showmessage($wallid);

$uid=$_SGLOBAL['supe_uid'];

//如果存在uid,应该直接跳转去发布页面
if($uid) {
	$space = getspace($uid);
	
	if($space['flag'] == -1) {
		showmessage('space_has_been_locked');
	}
	
	//禁止访问
	if(checkperm('banvisit')) {
		ckspacelog();
		showmessage('you_do_not_have_permission_to_visit');
	}

	setcookie('username',$_SGLOBAL[username],time()+7200);
	setcookie('uid',$_SGLOBAL[supe_uid],time()+7200);
	setcookie('wallid',$wallid,time()+7200);
	showmessage('login_success', './plugin/wallwap/source/towall.php', 0);

}

if(empty($_SCONFIG['networkpublic'])) {
	mobilelogin();
}

?>
