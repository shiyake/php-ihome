<?php 

if(!defined('iBUAA')) {
	exit('Access Denied');
}

$feedid = $_GET['feedid'] ? $_GET['feedid'] : 0;
$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('feed')." WHERE feedid=$feedid and uid=".$_SGLOBAL['supe_uid']." LIMIT 1");

$list = array();
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
	$value['num'] = get_commentnum($value['idtype'],$value['id']);
	$value = mkfeed($value);
	$list[] = $value;
}

include_once template('space_feeddetail');
exit();

?>