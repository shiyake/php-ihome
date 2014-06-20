<?php

if(!defined('iBUAA') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
$value = array();
$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname("no_mtag_register"));
while($result = $_SGLOBAL['db'] -> fetch_array($query))	{
	$value[] = $result ;

}

?>