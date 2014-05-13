<?php
session_start();
include_once(dirname(__FILE__) . '/config.php');

/* $headers=getallheaders(); */
/* print_r($headers);print_r($_SESSION); */
/* exit(); */

function dieback($str,$call_back='')
    {
    if($call_back==''){		/* 如果不存在回调地址则给用户返回错误 */
	echo $str;
	/* header("HTTP/1.1 404 Not Found"); */
	/* header("status: 404 Not Found"); */
	exit();
	}
    else{
	header("Location: $call_back?error=$str");
	exit();
    }
    }
    function myhex2bin($mychar)
	{
	switch($mychar)
	    {
	    case '0': return '0000';
	    case '1': return '0001';
	    case '2': return '0010';
	    case '3': return '0011';
	    case '4': return '0100';
	    case '5': return '0101';
	    case '6': return '0110';
	    case '7': return '0111';
	    case '8': return '1000';
	    case '9': return '1001';
	    case 'a': return '1010';
	    case 'b': return '1011';
	    case 'c': return '1100';
	    case 'd': return '1101';
	    case 'e': return '1110';
	    case 'f': return '1111';
	    }
	}
    function convv($stored_right)
	{
	$tmp_str='';
	/* echo $stored_right; */
	$len=strlen($stored_right);
	for($ii=0;$ii<$len;$ii++)
	    {
	    $tmp_char=$stored_right{$ii};
	    /* echo $tmp_char . '<br />'; */
	    $tmp_str .= myhex2bin($tmp_char);
	    }
	$len=strlen($tmp_str);
	$tmp_strr='';
	/* echo $tmp_str; */
	for($ii=0;$ii<$len;$ii++)
	    {
	    $tmp_char = $tmp_str{$ii};
	    if($tmp_char=='1') $tmp_strr .= $ii+1 . ":";
	    }
	$tmp_strr=substr( $tmp_strr, 0, strlen( $tmp_strr ) -1 );
	return $tmp_strr;
	}


/* ####################### 以下是主要处理过程，以上是函数定义 ####################### */

if (empty($_SESSION['oauth']))
    {
    if (empty($_GET['oauth_token'])) { dieback("缺少参数！");}
    $request_token=$_GET['oauth_token'];
    //echo $request_token;
    if (! preg_match("/^[a-fA-F0-9]{40}$/",$request_token)) dieback('非法的token');

    $con=mysql_connect(OAUTH_DB_DOMAIN,OAUTH_DB_USER,OAUTH_DB_PASSWD);
    if (!$con) die(mysql_error());
    mysql_select_db(OAUTH_DB_DB);
    $sql="SELECT auto_auth,app_name,call_back,app_logo,app_login_url,authed,faile_t,token_right FROM app_info,token_info WHERE request_token='$request_token' and app_info.app_id=token_info.app_id";
    $tmp=mysql_query($sql);
    /*    echo mysql_error(); */
    /* if($tmp==false) die($sql); */
    $sql_result=mysql_fetch_array($tmp);
    if ($sql_result=='') dieback('不存在的token！');
    $now=date("Y-m-d H:i:s");

    /* echo $sql_result['token_right'] . '<br />' . $sql_result['faile_t'] . '<br />' . $now; */

    if ( $sql_result['authed']==1) dieback('重复请求！',$sql['call_back']);
    if ( $sql_result['faile_t'] <= $now ) dieback('请求已过期',$sql['call_back']);


    /* echo convv( $sql_result['token_right'] ); */
    unset($_SESSION['oauth']);//如果授权一半就去授权另一个，那么前一个授权会失效
    $_SESSION['oauth']=array(
	'app_name' => $sql_result['app_name'],
	'req_token' => $request_token,
	'right' => convv( $sql_result['token_right'] ),
	'app_logo' => $sql_result['app_logo'] ,
	'app_url' => $sql_result['app_login_url']
	);
    if ( $sql_result['auto_auth']==true) {
	$_SESSION['oauth']['mode']='auto';
	}

    // 此处将用户浏览器重定向至另一个页面，该页面从SESSION[oauth]里解析出app_name,token_right,
    // 把token_right字符串解析成请求参数显示给用户，生成两个按钮，返回用户选择(名为choice的POST
    // 表单,1表示用户确认授权)到本文件。并把user_id的值写入

    header('Location: ../../plugin.php?pluginid=oauth');
    exit();
    }

else{  /*  ((! empty($_SESSION['oauth'])&&(! empty($_POST['uid']))&&(! empty($_POST['token'])) )) */
/* { */    //设置token的认证状态为已被认证，并且关联用户（群组）的id到该token组

    if(empty($_GET['choice']) || ($_GET['choice']!=1)) {
	unset($_SESSION['oauth']);
	die('授权失败');
	}

    if($_SESSION['oauth']['user_id']==$_GET['uid'])  $user_id=$_SESSION['oauth']['user_id'];
    else {
	echo('请不要同时给两个用户授权' /* . $_SESSION['oauth']['user_id'] . '==' . $_GET['uid'] */);
	unset($_SESSION['oauth']);
	exit();
	}

    if($_SESSION['oauth']['req_token'])  $request_token=$_SESSION['oauth']['req_token'];
    else {
	unset($_SESSION['oauth']);
	die('该应用的授权页面已经失效，请重新授权');
	}

    unset($_SESSION['oauth']);
    /* $choice=$_GET['choice']; */
    $con=mysql_connect(OAUTH_DB_DOMAIN,OAUTH_DB_USER,OAUTH_DB_PASSWD);
    if (!$con) die(mysql_error());
    mysql_select_db(OAUTH_DB_DB);

    $sql="SELECT call_back,verify_code,authed,faile_t FROM app_info,token_info WHERE request_token='$request_token' and app_info.app_id=token_info.app_id";
    $tmp=mysql_query($sql);
    $sql_result=mysql_fetch_array($tmp);
    if ($sql_result=='') dieback('不存在的token！',$sql['call_back']);
    $now=date("Y-m-d H:i:s");
    if ( $sql_result['authed']==1) dieback('重复请求！',$sql['call_back']);
    if ( $sql_result['faile_t'] <= $now ) dieback('请求已过期',$sql['call_back']);

    $call_back=$sql_result['call_back'];
    $verifier=$sql_result['verify_code'];

    $fal_time=date('YmdHis',time()+120);
    $sql="UPDATE token_info SET user_id=$user_id,authed=true,faile_t='$fal_time' WHERE request_token='$request_token'";
    mysql_query($sql);
    /* echo mysql_error(); */
    /* header("Location: $call_back?oauth_token=" . $request_token . "&oauth_verifier=" . $verifier . "&uid=" . $user_id); */
    header("Location: $call_back?oauth_token=" . $request_token . "&oauth_verifier=" . $verifier );
    exit();
    }

    /* else{ */
    /* header("HTTP/1.1 404 Not Found"); */
    /* header("status: 404 Not Found"); */
    /* } */
?>