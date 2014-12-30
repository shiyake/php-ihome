<?php
if(!defined('iBUAA')) {
	exit('Access Denied');
}
include_once(S_ROOT.'./source/function_common.php');
include_once(S_ROOT.'./source/function_cp.php');
if(!ckseccode($_POST['seccode'])) {
    $_SGLOBAL['input_seccode'] = 1;
    include_once template('space_check_bot');
    exit;
}
if($_SGLOBAL['supe_uid']) {
    updatetable('space', array('flag'=>0), array('uid'=>$_SGLOBAL['supe_uid']));
}

showmessage('do_success', 'space.php', 1);
?>
