<?php
/*	[iBUAA] (C)2012-2111 BUAANIC . 
	Create By Ancon
	Last Modfile By Ancon
	Last Time : 2013年6月27日9:53:18
*/

if(!defined('iBUAA')) {
	exit('Access Denied');
}


$ac = $_GET['ac'];
$ac_array = array('list');
if (!in_array($ac, $ac_array)) {
	$ac = 'list';
}


if($ac) {
	@require_once(''.$ac.'.php');
}

?>
