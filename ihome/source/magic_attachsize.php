<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}

//╨цсятЖхщ©╗
if(submitcheck("usesubmit")) {
	
	$rate = $magic['custom']['addsize'] ? intval($magic['custom']['addsize']) : 10;
	$addsize = 1048576 * $rate;
	$_SGLOBAL['db']->query('UPDATE '.tname('space')." SET addsize = addsize + $addsize WHERE uid='$_SGLOBAL[supe_uid]'");

	magic_use($mid, array(), true);
	showmessage('magicuse_success', $_POST['refer'], 0);

}

?>