<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}

if(empty($_SCONFIG['networkpublic'])) {
	checklogin();//需要登录
}

$sid = $_GET['sid'] = empty($_GET['sid'])?0:intval($_GET['sid']);


$arr = array(
	'sid' => $sid,
	'uid' => $_SGLOBAL[supe_uid],
	'username' => $_SGLOBAL[supe_username],
	'ip' => getonlineip(),
	'stamptime' => $_SGLOBAL[timestamp]
);

$id = inserttable('software_download', $arr, 1);

if ($id) {
	//updatetable('software', array('nums' =>nums+1), array('id' =>$sid));
	$_SGLOBAL['db']->query(" UPDATE ".tname('software')." SET nums= nums +1 WHERE id=$sid");
	header("location: plugin/software/uploads/file/activate_$sid.exe");
	}	
else showmessage('失败鸟!', 2);

?>