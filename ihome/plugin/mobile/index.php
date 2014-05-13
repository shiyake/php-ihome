<?php
/*	[iBUAA] (C)2012-2111 BUAANIC . 
	Create By Ancon
	Last Modfile By Ancon
	Last Time : 2012年12月25日14:26:50
*/
$ac = $_GET['ac'];
if(!@include_once($ac.'.php')) {
	exit("error!");
}
?>
