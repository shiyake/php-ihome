<?php
define("IAUTH_DB_USER","root");
define("IAUTH_DB_HOST","211.71.14.65");
define("IAUTH_DB_PASSWD","devihome");
define("IAUTH_DB_DB","iauthServer2");

define("IAUTH_VERSION",2.0);

define("IAUTH_TIME_OFFSET",120);
define("IAUTH_UAC_AUTH_DELAY_TIME",120);
define("IAUTH_WSC_AUTH_DELAY_TIME",60);
define("IAUTH_WSC_LOGIN_DELAY_TIME",60);

define("IAUTH_ERROR_LOG_FILE",dirname(__FILE__)."/debug/IAuthErrorLog");
define("IAUTH_ACCESS_LOG_FILE",dirname(__FILE__)."/debug/IAuthAccessLog");

//define("IAUTH_APP_INFO_PAGE",'http://211.71.14.65/plugin/iauth/debug/appcenter.php?ac=auth');
define("IAUTH_APP_INFO_PAGE",'http://i.buaa.edu.cn/plugin.php?pluginid=apps&ac=detail');
/* ################## debug mode ################## */
define("ON",1);
define("OFF",0);
define("DEBUG_MOD",ON);


/* ################## error report ################## */
ini_set('display_errors',1);
error_reporting(E_ALL);
/* error_reporting(E_ALL & !E_NOTICE); */
/* error_reporting(E_ERROR); */

/* ################## storage ################## */



?>
