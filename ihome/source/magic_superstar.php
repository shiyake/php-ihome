<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}

//³¬¼¶Ã÷ÐÇ
if(submitcheck("usesubmit")) {

	$_POST['star'] = intval($_POST['star']);
	$expire = $_SGLOBAL['timestamp'] + ($magic['custom']['effectivetime'] ? $magic['custom']['effectivetime'] : 604800);
	updatetable("spacefield", array('magicstar'=>$_POST['star'], 'magicexpire'=>$expire), array('uid'=>$_SGLOBAL['supe_uid']));

	magic_use($mid, array('expire'=>$expire), true);
	showmessage('magicuse_success', $_POST['refer'], 0);
}

?>