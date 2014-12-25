<?php


include_once('./common.php');


checkclose();

$uid=$_SGLOBAL['supe_uid'];

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
}


if(empty($_SCONFIG['networkpublic'])) {
	mobile_login();
}
 

$appid = $_GET['appid'];

//showmessage($appid );
if(!@include_once('./mobile/app/'.$appid.'/index.php')) {
	exit("error!");
}

//include_once('./mobile/app/'.$appid.'/index.php')
showmessage('to_login', './mobile/app/'.$appid.'/index.php', 0);
?>
