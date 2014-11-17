<?
/*	[iBUAA] (C)2012-2111 BUAANIC . 
	Create By Ancon
	Last Modfile By Ancon
	Last Time : 2013年1月23日10:15:39
*/

if(!defined('iBUAA')) {
	exit('Access Denied');
}
$notice_uid = $_GET[uid];
if ($uid != $notice_uid) {
	exit();
}
$op = $_GET[op];
if ($op == 'fetchnotice') {
	$query = $_SGLOBAL['db']->query("SELECT newpm,notenum FROM ".tname('space')." WHERE uid='$uid' ");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$newpm = $value[newpm];
			$notenum = $value[notenum];
			if ($newpm && $notenum) {
				echo "<div>1</div>";
				exit();
			}
			elseif ($newpm) {
				echo "<div>2</div>";
				exit();
			}
			elseif ($notenum) {
				echo "<div>3</div>";
				exit();
			}
		}
}

?>