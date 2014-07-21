<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}

$type = empty($_GET['type'])?'recfrom_i':$_GET['type'];

//检查开始数
ckstart($start, $perpage);

$reclist = array();
$count = 0;

//处理查询
 if ($type == 'autorec') {
 	$actives['autorec'] = " class='active'";
 	$wheresql = "autorec = 1";
 } else {
 	$actives['recfrom_i'] = " class='active'";
 	$wheresql = "recfrom_i = 1";
 }
if ($space[feedfriend]==''){
    $wheresql = "uid IN ($space[uid])";
}
$ordersql = "weight DESC, dateline DESC";
$theurl = "space.php?do=recommendation&type=$type";
$f_index = '';

if(empty($count)) {
	$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('recommendation')." WHERE $wheresql"), 0);
}
if($count) {
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('recommendation')." $f_index
		WHERE $wheresql
		ORDER BY $ordersql");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		realname_set($value['uid'], $value['username']);
		$reclist[] = $value;
	}
}


//实名
realname_get();

$_TPL['css'] = 'recommendation';
include_once template("space_recommendation");

?>
