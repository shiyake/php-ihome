<?php

include_once('./common.php');

if(empty($_GET['url'])) {
	showmessage('do_success', $refer, 0);
} else {
	$url = $_GET['url'];
	if(!$_SCONFIG['linkguide']) {
		showmessage('do_success', $url, 0);//直接跳转
	}
}

$space = array();
if($_SGLOBAL['supe_uid']) {
	$space = getspace($_SGLOBAL['supe_uid']);
}
if(empty($space)) {
	//游客直接跳转
	showmessage('do_success', $url, 0);
}

$url = shtmlspecialchars($url);
if(!preg_match("/^http\:\/\//i", $url)) $url = "http://".$url;

//模板调用
include_once template("iframe");

?>