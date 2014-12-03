<?php
session_start();
/*
  oauth_view.php用于处理oauth客户端发来的认证请求，通过输入参数中的权限序列来获取具体的权限内容进行显示，并返回当前登录用户的uid，同时让用户选择是否将这些权限授予该应用。
  added by xuxing@ihome. 2012-12-6 20:50
  modified by sjh1014@dse.buaa.edu.cn 2012-12-15 10:00
  modified by sjh1014@dse.buaa.edu.cn 2012-12-16 22:30
  modified by sjh1014@dse.buaa.edu.cn 2012-12-17 15:30
*/
/* include_once('./config.php'); */
include_once('all_rights.php');
@mysql_close();
/* if (isset($_GET['url']) && isset($_GET['app_key']) && isset($_GET['nonce']) ){ */
if (isset($_GET['app_key'])){
    unset($_SESSION['oauth']);
    $app_key = $_GET['app_key'];
    /* $url     = rawurldecode($_GET['url']); */
    //$nonce   = $_GET['nonce'];
    $uid     = $space['uid'];
    if (! preg_match("/^[a-fA-F0-9]{40}$/",$app_key)) die ('非法的app_key');
    /* if (! preg_match("/^[a-fA-F0-9]{16}$/",$nonce)) die ('非法的nonce' . $nonce); */

    $nonce= substr(md5(uniqid(rand() . time(), true)),0,16);
    /* include_once('config.php'); */
    /* $ss=OAUTH_DB_DOMAIN; */
    /* echo $ss; */
    define("OAUTH_DB_USER","root");
    define("OAUTH_DB_DOMAIN","211.71.14.65");
    define("OAUTH_DB_PASSWD","devihome");
    define("OAUTH_DB_DB","oauth");

    $con=mysql_connect(OAUTH_DB_DOMAIN,OAUTH_DB_USER,OAUTH_DB_PASSWD);
    if (!$con) $con=mysql_error();
    mysql_select_db(OAUTH_DB_DB);

    $sql="SELECT app_login_url FROM app_info WHERE app_key='$app_key'";
    /* echo $sql; */
    $tmp=mysql_query($sql);
    $sql_result=mysql_fetch_array($tmp);
    if ($sql_result=='') die("应用不存在！");
    $url = $sql_result['app_login_url'];
    /* print_r($sql_result); */
    echo mysql_error();
    $t_stamp=date('Y-m-d H:i:s',time());
    $sql="INSERT INTO token_nonce (app_key,token,token_type,nonce,create_t) VALUES('$app_key','$uid','login','$nonce','$t_stamp')";
    mysql_query($sql);
    echo mysql_error();
    header("Location: $url?verifier=$nonce");
    exit();
    }
else{
    if (empty($_SESSION) || empty($_SESSION[oauth])) {
	die('nothing happend,你打开这个页面干什么？');
	}
    else{
	$uid = $space[uid];
	$_SESSION['oauth']['user_id'] = $uid;
	if ( ! empty($_SESSION['oauth']['mode']) && ( $_SESSION['oauth']['mode'] =='auto') ){
	    header("Location: plugin/oauth/authorize.php?uid=$uid&choice=1");
	    exit();
	    }
	$Privi = explode(':',$_SESSION[oauth][right]);
	$SourceAppName = $_SESSION[oauth][app_name] ;
	$SourceAppUrl = $_SESSION[oauth][app_url];
	$SourceAppLogo = $_SESSION[oauth][app_logo];
	$req_token=$_SESSION[oauth][req_token];
    
	include_once template("plugin/oauth/template/oauth_view");
	}
    }
/* echo $space[uid]; */
/* print_r($_SESSION); */

/* 模版中把用户的授权结果post返回./user_auth.php 返回变量：choice=0or1 */
/* header("Location: ./plugin/oauth/authorize.php") */

?>
