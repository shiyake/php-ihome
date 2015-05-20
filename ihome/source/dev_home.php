<?php
if(!defined('iBUAA')) {
    exit('Access Denied');
}

$ads = array();
$count = array();
$query = $_SGLOBAL['db']->query("SELECT * FROM " . tname('ad4dev') . " WHERE display=1 ORDER BY seq DESC");
while($value = $_SGLOBAL['db']->fetch_array($query))	{
    $value['image'] = $value['image'] ? $_SC['attachurl'] . $value['image'] : 'plugin/apps/images/app.gif';
    $ads[] = $value;
    $count[] = 1;
}

include_once template("dev_home");
