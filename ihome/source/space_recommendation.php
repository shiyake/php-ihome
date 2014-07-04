<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}

//分页
$perpage = 20;
$perpage = mob_perpage($perpage);

$page = empty($_GET['page'])?0:intval($_GET['page']);
if($page<1) $page=1;
$start = ($page-1)*$perpage;

//检查开始数
ckstart($start, $perpage);

$reclist = array();
$count = 0;

//处理查询
// 小i推荐
 $wheresql = "recfrom_i = 1";
if ($space[feedfriend]==''){
    $wheresql = "uid IN ($space[uid])";
}
$ordersql = "dateline DESC";
$theurl = "space.php?uid=$space[uid]&do=$do";
$f_index = '';

if(empty($count)) {
	$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('recommendation')." WHERE $wheresql"), 0);
}
if($count) {
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('recommendation')." $f_index
		WHERE $wheresql
		ORDER BY dateline DESC
		LIMIT $start,$perpage");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$reclist[] = $value;
	}
}

//分页

$ajaxdiv = 'tab_content_'.$_GET['do'];
$multi = multi($count, $perpage, $page, $theurl, $ajaxdiv);

//实名
realname_get();

$_TPL['css'] = 'recommendation';
include_once template("space_recommendation");

?>
