<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}

//�������ظ�ʹ��
$idtype = 'cid';
$query = $_SGLOBAL['db']->query('SELECT * FROM '.tname('comment')." WHERE cid = '$id' AND authorid = '$_SGLOBAL[supe_uid]'");
$value = $_SGLOBAL['db']->fetch_array($query);
if(empty($value)) {
	showmessage('magicuse_bad_object');
} elseif($value['magicflicker']) {
	showmessage('magicuse_object_once_limit');
}

//�ʺ���
if(submitcheck("usesubmit")) {

	updatetable('comment', array('magicflicker'=>1), array('cid'=>$id, 'authorid'=>$_SGLOBAL['supe_uid']));
	magic_use($mid, array('id'=>$id, 'idtype'=>$idtype), true);
	showmessage('magicuse_success', $_POST['refer']);
}

?>