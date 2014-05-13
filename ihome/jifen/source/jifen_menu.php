<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}

//是否公开
if(empty($_SCONFIG['networkpublic'])) {
	checklogin();//需要登录
}


//礼品类别列表
$lblist = array();
$allnumber = 0;
$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('jifen_lb')." ORDER BY displayorder,id asc");
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
	if(!$value['pic']) {
		$value['pic'] = "jifen/images/default.gif";
	}
	$allnumber += $value['nums'];
	$lblist[$value['id']] = $value;
}

//礼品抽奖
$cjcount = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('jifen_cj')." s WHERE total>0 and total!=getnums"), 0);
?>