<?php

if(!defined('iBUAA') || !defined('IN_ADMINCP'))
    exit('Access Denied');
$listCheck = array();
$query = $_SGLOBAL['db']->query("SELECT a.*, b.name, '1' AS allow FROM ihome_arrangement a, ihome_space b WHERE a.uid=b.uid
                                 UNION ALL
                                 SELECT c.*, d.name, '0' AS allow FROM ihome_unCheckArrangement c, ihome_space d WHERE c.uid=d.uid
                                 ORDER BY starttime DESC");

while($value = $_SGLOBAL['db']->fetch_array($query)){
    $value['starttime'] = date("Y-m-d H:i",intval($value['starttime']));
    $value['message'] = strip_tags($value['message']);
    if($value['message'] == '0')
        $value['message'] = null;
    $listCheck[] = $value;
}
?>
