<?

/*	[iBUAA] (C)2012-2111 BUAANIC . 
	Create By Ancon
	Last Modfile By Ancon
	Last Time : 2013-6-20 16:06:31
*/

if(!defined('iBUAA')) {
	exit('Access Denied');
}

$wallid = intval(trim($_GET['wallid']));

$ac = $_GET['ac'];
$ac_array = array('tracking','list','track','screen','apply');

if(in_array($ac, $ac_array)) {
	include_once(S_ROOT.'./plugin/wall/source/'.$ac.'.php');
}

else {
	$ac = 'track';
	include_once(S_ROOT.'./plugin/wall/source/'.$ac.'.php');
}

?>