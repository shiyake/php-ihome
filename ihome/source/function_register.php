<?php

/*	[iBUAA] (C)2012-2111 BUAANIC . 
	Create By Ancon
	Last Modfile By Ancon 
	Last Time : 2012Äê12ÔÂ3ÈÕ10:02:09
*/
if(!defined('iBUAA')) {
	exit('Access Denied');
}
function marryTable() {
	$_SGLOBAL['db']->query("UPDATE  ".tname(baseprofile)." bp ,".tname(spacefield)." sf SET bp.uid=sf.uid WHERE
	bp.identifier=sf.identifier");
}


?>
