<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}

$magic['custom']['maxview'] = $magic['custom']['maxview'] ? intval($magic['custom']['maxview']) : 10;

//м╦йс╬╣
if(submitcheck("usesubmit")) {
	
	$idtype = 'uid';
	magic_use($mid, array('id'=>$id, 'idtype'=>$idtype), true);
	
	$op = "show";
	$list = array();
	$query = $_SGLOBAL['db']->query('SELECT * FROM '.tname('usermagic')." WHERE uid='$id' AND count > 0 LIMIT {$magic['custom']['maxview']}");
	while($value = $_SGLOBAL['db']->fetch_array($query)) {
		$list[] = $value;
	}
}

?>