<?php

include_once('./common.php');

checkclose();

$uid=$_SGLOBAL['supe_uid'];

if($uid) {
	$space = getspace($uid);
	
	if($space['flag'] == -1) {
		showmessage('space_has_been_locked');
	}
	
	//½ûÖ¹·ÃÎÊ
	if(checkperm('banvisit')) {
		ckspacelog();
		showmessage('you_do_not_have_permission_to_visit');
	}
}

if(empty($_SCONFIG['networkpublic'])) {
	mobilelogin();
}
?>
