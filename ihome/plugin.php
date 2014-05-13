<?php

/*	[iBUAA] (C)2012-2111 BUAANIC . 
	Create By Ancon
	Last Modfile By Ancon 
	Last Time : 2012-12-6 11:09:24
*/
//echo getcwd();
//echo "<br />";
//chdir("../../");
//echo getcwd();

include_once('./common.php');

//是否关闭站点
checkclose();

//简化supe_uid
$uid=$_SGLOBAL['supe_uid'];


//showmessage(getcwd());

//空间被锁定
if($uid) {
	$space = getspace($uid);
	
	if($space['flag'] == -1) {
		showmessage('space_has_been_locked');
	}
	
	//禁止访问
	if(checkperm('banvisit')) {
		ckspacelog();
		showmessage('you_do_not_have_permission_to_visit');
	}
}

//需要登录，需要做得更细化些！

if(empty($_SCONFIG['networkpublic'])) {
	checklogin();
}
 
//应该不用做任何处理,有则加载,没有则提示没有,不必注册动作!
/*
$pluginid_array = array('buaabt','creditsexchange','likeornot','wall','sms','wap','software','video','live');
$pluginid = $_GET['pluginid']?$_GET['pluginid']:index;
if(!in_array($pluginid, $pluginid_array)){
	showmessage('对不起，没有这个应用！','space.php?do=home');
}
*/

$pluginid = $_GET['pluginid'];
if(!@include_once(S_ROOT.'./plugin/'.$pluginid.'/index.php')) {
	exit("error!");
}

include_once(S_ROOT.'./plugin/'.$pluginid.'/index.php');

?>
