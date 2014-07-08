<?php 
if(!defined('iBUAA') || !defined('IN_ADMINCP')) 	{
	exit('Access Denied');
}
$pos = array();

$query = $_SGLOBAL['db']->query("SELECT distinct lng,lat FROM ".tname("spaceforeign"));
while($res = $_SGLOBAL['db']->fetch_array($query))	{
	
	
	$pos[] = $res;
}

include_once template("admin/tpl/map");

?>
