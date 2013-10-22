<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

require_once(dirname(__FILE__)."/../IAuthForceLogin.php");
require_once(dirname(__FILE__)."/../IAuthManage.php");

if (empty($_GET['appid'])) die('missing appid');
$appid=$_GET['appid'];
Check($appid,'appid');
$appType=GetAppInfo($appid,'app_type');

echo '<h1>ihome App Center Authorization DEMO</h1>This is an app information page of ihome app center. ';

$uid = $_SGLOBAL['supe_uid'];
$uname=$_SGLOBAL['supe_username'];

echo "your ihome uid is $uid<br />(appid: $appid  type: $appType )<hr />";

if (CheckUserAuthed($appid,$uid)==true){
    $url="./auth.php?appid=$appid&uid=$uid&op=rm";
    echo 'you have already authed this app<br />';
    echo '<a href="'.$url.'">click here to cancel your authorization</a><br />';
    if ($appType=='WSC'){
	$url=GetAppInfo($appid,'session_init');
	echo '<a href="'.$url.'" title="the SESSION_INIT_URL of this app">click here to login</a>';
	}
    exit();
    }

switch ($appType){
case 'WSC':
    if (empty($_GET['state'])){	/* 准备授权 */
	$url=GetAppInfo($appid,'session_init');
	echo '<a href="'.$url.'" title="the SESSION_INIT_URL of this app">click here to authorize</a>';
	}
    else{			/* 确认授权 */
	$state=$_GET['state'];
	Check($state,'state');
	$params="appid=$appid&uid=$uid&state=$state&op=wsc";
	echo 'This App will access your data ABCDEFG... through ihome API<br />';
	echo 'Are you SURE you REALLY want to authorize this app?<br />';
	echo '<a href="./auth.php?'.$params.'">click here to complete authrization</a>';
	}
    break;

case 'UAC': /* UAC类应用直接授权，无须跳转，但是最好能显示一个确认的界面 */
    $params="appid=$appid&uid=$uid&op=uac";
    echo 'This App will access your data ABCDEFG... through ihome API<br />';
    echo 'Are you SURE you REALLY want to authorize this app?<br />';
    echo '<a href="./auth.php?'.$params.'">click here to authorize</a>';
    break;
    }
