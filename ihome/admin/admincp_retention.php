<?php

if(!defined('iBUAA') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
$start_date=date("Y-m-d", time()-24*3600*15);
$end_date=date("Y-m-d", time()-24*3600);

$query = $_SGLOBAL['db']->query("select xaxis_tag, value from ".tname("columntable")." where chart_tag='retention_analyse' and xaxis_tag >= '$start_date' and xaxis_tag <= '$end_date' order by xaxis_tag");
$items = array();
while ($item = $_SGLOBAL['db']->fetch_array($query)) {
    $items[substr($item['xaxis_tag'], 5)] = json_decode($item['value'], true);
}
?>


