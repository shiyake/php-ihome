<?php

if(!defined('iBUAA') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
$query=$_SGLOBAL['db']->query("select user_type, all_num, register_num from ".tname("register_analyse"));
$items = array();
while ($item = $_SGLOBAL['db']->fetch_array($query)) {
    $items[] = $item;
}
?>
