<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}

//������
magic_check_idtype($id, $idtype);

//����Ȧ
if(submitcheck("usesubmit")) {

	//�޸���Ϣʱ��
	$tablename = gettablebyidtype($idtype);
	$_SGLOBAL['db']->query("UPDATE ".tname($tablename)." SET dateline = '$_SGLOBAL[timestamp]' WHERE $idtype = '$id' AND uid = '$_SGLOBAL[supe_uid]'");

	//ͬʱ�޸�feed��ʱ��
	$_SGLOBAL['db']->query("UPDATE ".tname('feed')." SET dateline = '$_SGLOBAL[timestamp]' WHERE id = '$id' AND idtype = '$idtype' AND uid = '$_SGLOBAL[supe_uid]'");

	magic_use($mid, array('id'=>$id, 'idtype'=>$idtype), true);
	showmessage('magicuse_success', $_POST['refer'], 0);
}

?>