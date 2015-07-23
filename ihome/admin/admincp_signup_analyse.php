<?php

if(!defined('iBUAA') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
$query=$_SGLOBAL['db']->query("select usertype, total, amount from ".tname("signup_analyse"));
$items = array();
while ($item = $_SGLOBAL['db']->fetch_array($query)) {
    $items[] = $item;
}
?>
