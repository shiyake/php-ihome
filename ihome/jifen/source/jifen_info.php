<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}

include_once(S_ROOT . "jifen/source/jifen_menu.php");

//是否公开
if(empty($_SCONFIG['networkpublic'])) {
	checklogin();//需要登录
}

if(empty($_SGLOBAL[supe_uid])){
	showmessage("对不起，你还没有登录"); 
}

$_TPL['css'] = 'network';

include_once( template( "jifen/template/jifen_info" ) );
?>