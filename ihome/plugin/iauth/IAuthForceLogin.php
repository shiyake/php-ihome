<?php

/*	[iBUAA] (C)2012-2111 BUAANIC . authlogin.php
	Create By Ancon
	Last Modfile By Songjinghe
	Last Time : 2013-9-6 13:20:14
	SCRIPT_NAME :login.php
	说明,只能在同一个目录下使用,不然不好使~
*/
//获取当前文件名
//把文件传输过去,跳回来~
//$filenameandpath = $_SERVER['SCRIPT_NAME'];
//$filename = basename($filenameandpath);

/*
echo getcwd();
echo "<br />";
echo "$filenameandpath";
echo "<br />";
echo "$filename";
echo "<br />";
*/
/* $IAUTH_SERVER_ROOT=substr(dirname(__FILE__),0,8); */
/* echo $IAUTH_SERVER_ROOT; */
/* chdir($IAUTH_SERVER_ROOT); */
/* print_r($_SERVER); */
/* chdir(dirname(__FILE__).'../../'); */
/* chdir("../../"); */
/* echo getcwd(); */
//include_once('common.php');
/* exit(); */

//header("location: ../../index.php");
//showmessage('aa');
//使用location函数比较难跳回来,或者是传些参数去用户客户端吧
include_once($_SERVER['DOCUMENT_ROOT'].'/common.php');

/*
//是否关闭站点
checkclose();
*/
//简化supe_uid
$uid=$_SGLOBAL['supe_uid'];

//如果存在,则跳转到之前的那个文件
if (!$uid){
    ssetcookie('_refer', rawurlencode($_SERVER['REQUEST_URI']));
    showmessage('to_login', 'http://'.$_SERVER['SERVER_NAME'].'/do.php?ac='.$_SCONFIG['login_action'], 0);
}
/* chdir(dirname(__FILE__)); */

?>