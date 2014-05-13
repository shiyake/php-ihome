<?php
	// exshow.php 用于向外界输出指定UID的信息，接收输入显示的宽度width，指定UID，无须登录；
	// add by xuxing@ihome 2012-11-4.
	include_once('./common.php');
	
	$width = $_GET["width"]? intval(trim($_GET["width"])):500;
	$text_width = $width-55;
	$width = $width."px";
	$uid = intval(trim($_GET["number"]));
	
	if($uid){
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('feed')." where uid=$uid ORDER BY dateline DESC LIMIT 0,30");
	}else{
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('feed')." ORDER BY dateline DESC LIMIT 0,30");
	}
	while ($value = $_SGLOBAL['db']->fetch_array($query)){
		realname_set($value['uid'], $value['username']);
		$topic[] = $value;
	}
	realname_get();
	
	include_once template("exshow_list");

?>