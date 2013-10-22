<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}

$idtype = 'picid';
magic_check_idtype($id, $idtype);

//Паїт
if(submitcheck("usesubmit")) {

	$_POST['frame'] = intval($_POST['frame']);
	updatetable('pic', array('magicframe'=>$_POST['frame']), array('picid'=>$id, 'uid'=>$_SGLOBAL['supe_uid']));

	magic_use($mid, array('id'=>$id, 'idtype'=>$idtype), true);
	showmessage('magicuse_success', $_POST['refer'], 0);
}

?>