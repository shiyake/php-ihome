<?php if(!defined('iBUAA')) exit('Access Denied');

if($ac != 'list') {
	showmessage('对不起，没有这个功能！','plugin.php?pluginid=apps');
}

//echo 'OK';exit;

$listsql = "applypass >0 AND ishidden=0";
if($type = $_GET['type'])
	$listsql .= " AND type=$type";

if($category = $_GET['category'])
	$listsql .= " AND category=$category";
else
	$category = 0;
if($orderby = $_GET['orderby'])
	$order = "ORDER BY $orderby DESC";
else
	$order = '';
	

if($_POST['appssearch']) {
	$keyword = $_POST['keyword'];
	$listsql .= " AND (name LIKE '%$keyword%')";
}	
//echo $listsql;exit;
$perpage = 21;
$page = empty($_GET['page'])?0:intval($_GET['page']);
if($page<1) {
	$page=1;
}
$start = ($page-1)*$perpage;
ckstart($start, $perpage);
$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('apps')." WHERE $listsql "));
$url = "plugin.php?pluginid=apps&ac=list&type=$type&orderby=$orderby";
$multi = multi($count, $perpage, $page, $url);

$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('apps')." WHERE $listsql $order LIMIT ".$start.",".$perpage);
while($value = $_SGLOBAL['db']->fetch_array($query)) {
	$value['logo'] = $value['logo'] ? $_SC['attachurl'].$value['logo'] : 'plugin/apps/images/app.gif';
	$list[] = $value;
}
include_once template("/plugin/apps/list");


?>
