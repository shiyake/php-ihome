<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}

//idtype������magiccolor�ֶεı�ӳ��
$mapping = array('blogid'=>'blogfield', 'tid'=>'thread');
if(!isset($mapping[$idtype])) {
	showmessage('magicuse_bad_object');
}
magic_check_idtype($id, $idtype);

//��ɫ��
if(submitcheck("usesubmit")) {

	//��ɫ����
	$tablename = $mapping[$idtype];
	$_POST['color'] = intval($_POST['color']);
	updatetable($tablename, array('magiccolor'=>$_POST['color']), array($idtype=>$id, 'uid'=>$_SGLOBAL['supe_uid']));

	//feedҲ������ɫ
	$query = $_SGLOBAL['db']->query('SELECT * FROM '.tname('feed')." WHERE id='$id' AND idtype='$idtype' AND uid='$_SGLOBAL[supe_uid]'");
	$feed = $_SGLOBAL['db']->fetch_array($query);
	if($feed) {
		$feed['body_data'] = unserialize($feed['body_data']);
		$feed['body_data'] = is_array($feed['body_data']) ? $feed['body_data'] : array();
		$feed['body_data']['magic_color'] = $_POST['color'];
		$feed['body_data'] = serialize($feed['body_data']);
		updatetable('feed', array('body_data'=>$feed['body_data']), array('feedid'=>$feed['feedid']));
	}

	magic_use($mid, array('id'=>$id, 'idtype'=>$idtype), true);
	showmessage('magicuse_success', $_POST['refer'], 0);
}

?>