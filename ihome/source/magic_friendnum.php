<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}

//╨цсятЖхщ©╗
if(submitcheck("usesubmit")) {

	$addnum = $magic['custom']['addnum'] ? intval($magic['custom']['addnum']) : 10;
	$_SGLOBAL['db']->query('UPDATE '.tname('space')." SET addfriend = addfriend + $addnum WHERE uid = '$_SGLOBAL[supe_uid]'");

	magic_use($mid, array(), true);
	showmessage('magicuse_success', $_POST['refer'], 0);

}

?>