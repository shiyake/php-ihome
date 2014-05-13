<?php if(!defined('iBUAA')) exit('Access Denied');

if($ac != 'mylist') {
	showmessage('对不起，没有这个功能！','plugin.php?pluginid=apps');
}


$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('apps')." WHERE applyuid=$uid");
while($value = $_SGLOBAL['db']->fetch_array($query)) {
	$value['logo'] = $value['logo'] ? $_SC['attachurl'].$value['logo'] : 'plugin/apps/images/app.gif';
	$list[] = $value;
}
include_once template("/plugin/apps/mylist");


?>
