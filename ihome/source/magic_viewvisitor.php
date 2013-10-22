<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}

$magic['custom']['maxview'] = $magic['custom']['maxview'] ? intval($magic['custom']['maxview']) : 10;

//偷窥镜
if(submitcheck("usesubmit")) {
	
	$idtype = 'uid';
	magic_use($mid, array('id'=>$id, 'idtype'=>$idtype), true);
	
	$op = "show";	
	$list = array();
	//屏蔽使用匿名卡访问的空间
	$query = $_SGLOBAL['db']->query('SELECT m.uid, m.username FROM '.tname('visitor').' v LEFT JOIN '.tname('member')." m ON v.uid = m.uid WHERE v.vuid = '$id' AND v.vusername != '' ORDER BY v.dateline DESC LIMIT {$magic['custom']['maxview']}");
	while($value = $_SGLOBAL['db']->fetch_array($query)) {
		realname_set($value['uid'], $value['username']);
		$list[] = $value;
	}
	realname_get();
}

?>