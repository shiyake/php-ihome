<?php if(!defined('iBUAA')) exit('Access Denied');

if($ac != 'mine') {
	showmessage('对不起，没有这个功能！','plugin.php?pluginid=apps');
}

$uid = $_SGLOBAL['supe_uid'];

$perpage = 21;
$page = empty($_GET['page'])?0:intval($_GET['page']);
if($page<1) {
	$page=1;
}
$start = ($page-1)*$perpage;
ckstart($start, $perpage);
$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('apps_users')." JOIN ".tname('apps')." WHERE ".tname('apps_users').".uid=$uid AND ".tname('apps').".id=".tname('apps_users').".appsid"));                                          
$url = "plugin.php?pluginid=apps&ac=mine";
$multi = multi($count, $perpage, $page, $url);

$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('apps_users')." JOIN ".tname('apps')." WHERE ".tname('apps_users').".uid=$uid AND ".tname('apps').".id=".tname('apps_users').".appsid LIMIT ".$start.",".$perpage);
while($value = $_SGLOBAL['db']->fetch_array($query)) {
	$value['logo'] = $value['logo'] ? $_SC['attachurl'].$value['logo'] : 'plugin/apps/images/app.gif';
	switch($value['type']){
		case 1:
			$value['type'] = '教学类';
			break;
		case 2:
			$value['type'] = '科研类';
			break;
		case 3:
			$value['type'] = '财务类';
			break;
		case 4:
			$value['type'] = '人力资源类';
			break;
		case 5:
			$value['type'] = '资产类';
			break;
		case 6:
			$value['type'] = '生活服务类';
			break;
		case 7:
			$value['type'] = '其他';
			break;
		default:
			break;
	}
	$list[] = $value;
}


include_once template("/plugin/apps/mine");
?>