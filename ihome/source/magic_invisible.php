<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}

//ÒþÉí¿¨
if(submitcheck("usesubmit")) {

	$expire = $_SGLOBAL['timestamp'] + ($magic['custom']['effectivetime'] ? $magic['custom']['effectivetime'] : 86400);
	$_SGLOBAL['db']->query("UPDATE ".tname("session")." SET magichidden = 1 WHERE uid='$_SGLOBAL[supe_uid]'");

	magic_use($mid, array('expire'=>$expire), true);
	showmessage('magicuse_success', $_POST['refer'], 0);
}

?>