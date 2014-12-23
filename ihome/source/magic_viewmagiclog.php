<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}

//АЫидОЕ
if(submitcheck("usesubmit")) {
	
	$idtype = 'uid';
	magic_use($mid, array('id'=>$id, 'idtype'=>$idtype), true);
	
	$op = 'show';
	$list = array();
	$query = $_SGLOBAL['db']->query('SELECT * FROM '.tname('magicuselog')." WHERE uid='$id' ORDER BY dateline DESC LIMIT 10");
	while($value = $_SGLOBAL['db']->fetch_array($query)) {
		$list[] = $value;
	}
}

?>