<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}

///////////lv
include_once('../common.php');
$i = 0;
$publiclist = array();
$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('space')." WHERE groupid=3");
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
	if(!in_array($value['uid'], $nouids)) {
		realname_set($value['uid'], $value['username']);
		$publiclist[] = $value;
		$i++;
		//if($i>=$maxnum) break;
	}
}

include template('cp_public');
?>
