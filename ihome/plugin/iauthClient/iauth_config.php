<?php
/* ############### WSC ( web site client ) CONFIG 目前没有用 ############## */
/* define("IAUTH_APP_ID","e015fd71eeb744ca"); */
/* define("IAUTH_APP_SECRET","c4b3d180c148ccde2dd94a8c488cbac175c259e8518642c4"); */
/* define("IAUTH_TIME_OFFSET",0); */

/* define("IAUTH_ACCESS_URL","http://localhost/plugin/iauth/access.php"); */
/* define("IAUTH_GETUID_URL","http://localhost/plugin/iauth/getuid.php"); */


/* ############### RP ( resource provider ) CONFIG ############## */
define("IAUTH_RP_ID","ihomenormal744ca");
define("IAUTH_RP_SECRET","7fc5be76c90d5ded6fcc4319920415f3af562451");
define("IAUTH_VERIFY_URL","http://i.buaa.edu.cn/plugin/iauth/verify.php");

/* ############### debug ############## */
ini_set('display_errors',1);
error_reporting(E_ALL);

/* ############# stop automaticly adding \ to \ ' "  ############# */
if (get_magic_quotes_gpc()) {
    function stripslashes_gpc(&$value)
    {
        $value = stripslashes($value);
    }
    array_walk_recursive($_GET, 'stripslashes_gpc');
    array_walk_recursive($_POST, 'stripslashes_gpc');
    array_walk_recursive($_COOKIE, 'stripslashes_gpc');
    array_walk_recursive($_REQUEST, 'stripslashes_gpc');
}
?>
