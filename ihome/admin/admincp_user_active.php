<?php


if(!defined('iBUAA') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

$query = $_SGLOBAL['db']->query("select item_tag, num from ".tname("pietable")." where chart_tag='user_active_".date("Y_m_d", time())."'");
    
$items = array();
while ($item = $_SGLOBAL['db']->fetch_array($query)) {
    $items[] = $item;
   
}
?>





