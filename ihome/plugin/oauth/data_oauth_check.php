<?php
include_once(dirname(__FILE__) . '/config.php');
include_once(dirname(__FILE__) . '/iauth_core.php');

/* define("OAUTH_DB_USER","root"); */
/* define("OAUTH_DB_DOMAIN","localhost"); */
/* define("OAUTH_DB_PASSWD","devihome"); */
/* define("OAUTH_DB_DB","oauth"); */

function oauth_check(){
if ((!empty($_POST['noauth'])) /*&& ($_POST['noauth']!='')*/) return $_POST['noauth'];
/*################ 从Header中提取参数 ################*/
    if (function_exists('apache_request_headers')){
	$headers=getallheaders();
	if (empty($headers['Authorization'])) die('need header Authorization');
	$oauth_params=$headers['Authorization'];
	}
    else{
	if (empty($_SERVER['HTTP_AUTHORIZATION'])) die('need header Authorization');
	$oauth_params=$_SERVER['HTTP_AUTHORIZATION'];
	}
$oauth_arr_tmp=explode(',',$oauth_params);

$sig='';
$oauth_array=array();
foreach ($oauth_arr_tmp as $str_tmp)
  {
    $pos=strpos( $str_tmp, '=' );
    $val_tmp = rawurldecode( substr( $str_tmp, $pos+2, strlen( $str_tmp )-$pos-3 ));
    $key_tmp = rawurldecode( substr( $str_tmp, 0, $pos ));

    if ($key_tmp=='oauth_signature')
      {
	$sig = rawurldecode( $val_tmp );
      }
    else{
      $oauth_array[$key_tmp]=rawurldecode( $val_tmp );
    }

  }
//print_r($oauth_array);

/*################ 检查oauth数组中的参数是否合法 ################*/

if ($sig=='') die('缺少签名');
if (empty($oauth_array['oauth_nonce'])) die('缺少nonce');
if (empty($oauth_array['oauth_timestamp'])) die('缺少时间戳');
if (empty($oauth_array['oauth_signature_method'])) die('缺少签名方法');
if (empty($oauth_array['oauth_consumer_key'])) die('缺少app_key');
if (empty($oauth_array['oauth_version'])) die('缺少认证版本');
if (empty($oauth_array['oauth_token'])) die('缺少access_token');

/*################ 过滤1-时间戳 ################*/

$their_time=$oauth_array['oauth_timestamp'];
$now=time();
/* echo $their_time . '<br>'; */
/* echo $now . '<br>'; */
if (($their_time <= $now-480)||($their_time >= $now+480)) {die("时间与服务器不同步");}

/*################ 检查oauth数组中的参数是否合法 ################*/
if (strlen($sig)<=10) die ('非法的签名');
$tobechecked=$oauth_array['oauth_consumer_key'];
if (! preg_match("/^[a-fA-F0-9]{40}$/",$tobechecked)) die ('非法的consumer_key');
$tobechecked=$oauth_array['oauth_token'];
if (! preg_match("/^[a-fA-F0-9]{40}$/",$tobechecked)) die ('非法的token');
$tobechecked=$oauth_array['oauth_nonce'];
if (! preg_match("/^[a-fA-F0-9]{16}$/",$tobechecked)) die ('非法的nonce');
/* if ($oauth_array['oauth_signature_method']!='HMAC-SHA1') die ('不支持的签名方式'); */
if ($oauth_array['oauth_version']!='1.0') die ('不支持的版本');
if ($oauth_array['oauth_signature_method']!='HMAC-SHA1' &&
    $oauth_array['oauth_signature_method']!='MD5')
    die ('不支持的签名方式');


/*################ 设定参数 ################*/

$method  ="POST";
$url_path='http://' . $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME'];
$app_consumer_key=$oauth_array['oauth_consumer_key'];
$access_token=$oauth_array['oauth_token'];

/* echo $app_consumer_key . '<br />'; */
/* echo $access_token; */

$con=mysql_connect(OAUTH_DB_DOMAIN,OAUTH_DB_USER,OAUTH_DB_PASSWD);
if (!$con) $con=mysql_error();
mysql_select_db(OAUTH_DB_DB);
$sql="SELECT user_id,app_secret,app_info.app_id,token_right,request_token,request_secret,access_secret FROM app_info,token_info WHERE app_key='$app_consumer_key' and access_token='$access_token' and app_info.app_id=token_info.app_id";
$tmp=mysql_query($sql);
echo mysql_error();
$sql_result=mysql_fetch_array($tmp);
if ($sql_result=='') die("应用不存在！");
/* print_r( $sql_result ); */
/* echo '<br />'; */

$app_consumer_secret = $sql_result['app_secret'];
$request_token = $sql_result['request_token'];
$request_secret = $sql_result['request_secret'];  //echo 'app_secret: ' . $app_consumer_secret . '<br />';
$access_secret = $sql_result['access_secret'];
$app_id = $sql_result['app_id'];
$params = array_merge( $oauth_array, $_POST, $_GET );
$right = $sql_result['token_right'];
$user_id = $sql_result['user_id'];
/*################ 生成BASE String ################*/

$base_str = strtoupper($method) . '&' . rawurlencode ( $url_path ) . '&';
ksort ( $params );
$str_tmp='';
foreach ( $params as $key => $val ) 
  {
    $str_tmp .= "$key=$val&";
  }
$base_str.= rawurlencode( substr( $str_tmp, 0, strlen( $str_tmp ) -1 )); /* 删去最后多出来的一个'&' */


//echo $base_str;
/*################ 检查签名 ################*/

$secret=$app_consumer_key.'&'.$app_consumer_secret . '&' . $request_token . '&' . $request_secret . '&' . $access_token . '&' . $access_secret;
/* $sign = hash_hmac ( "sha1", $base_str, $secret, true ); */
/* $sign = base64_encode ( $sign ); */
$sign = signature($oauth_array['oauth_signature_method'], $base_str, $secret);
/* echo $sign ."\n"; */
/* echo $sig  ."\n"; */
/* echo '<br />secret on server = ' . $secret; */
/* echo '<br />'; */
if (strcmp($sig,$sign)!=0) die("签名不匹配！");


/*################ 过滤2：重放攻击 ################*/

$app_token=$oauth_array['oauth_consumer_key'];
$acc_token=$oauth_array['oauth_token'];
$nonce=$oauth_array['oauth_nonce'];
$time=$oauth_array['oauth_timestamp'];
//echo $token . '<br /><br />' . $nonce .'<br /><br />' . $time;
$sql="SELECT app_key FROM token_nonce WHERE app_key='$app_token' and token='$acc_token' and token_type='access' and nonce='$nonce' and create_t='$time'";
$sql_tmp=mysql_query($sql);
$sql_result=mysql_fetch_array($sql_tmp);
if ($sql_result!='') die("重复请求！");

/*-----------------  记录请求以备查询重放攻击  -----------------*/
$t_stamp=date('Y-m-d H:i:s',$time);
$sql="INSERT INTO token_nonce (app_key,token,token_type,nonce,create_t) VALUES('$app_token','$acc_token','access','$nonce','$t_stamp')";
mysql_query($sql);
mysql_close($con);
/*################ 生成数据并返回 ################*/
include_once('api_info.php');
/* $api_nums=array( */
/*     'getallthings'=>1, */
/*     'getnotification'=>2, */
/*     'getmessages'=>3, */
/*     'getpersonmessages'=>4, */
/*     'getfriendslist'=>6, */
/*     'getuserinfo'=>7, */
/*     'getuserthings'=>8, */
/*     'getusertopics'=>9, */
/*     'getmygroups'=>10, */
/*     'gethotgroups'=>11, */
/*     'getrecommendgroups'=>12, */
/*     'gettopics'=>13, */
/*     'topicreply'=>14, */
/*     'gettherecoding'=>16, */
/*     'gettherecodingreply'=>17, */
/*     'getbloglist'=>18, */
/*     'gettheblog'=>19, */
/*     'getblogreplylist'=>20, */
/*     'gettheshare'=>24, */
/*     'getsharereplylist'=>25, */
/*     'getthetopic'=>0, */

/*     'addnews'=>31, */
/*     'addmessage'=>32, */
/*     'addblog'=>33, */
/*     'addtopic'=>34, */
/*     'addshare'=>35, */
/*     'addnewsreply'=>36, */
/*     'addblogreply'=>37, */
/*     'addtopicreply'=>38, */
/*     'addsharereply'=>39, */

/*     'deleteblog'=>40, */
/*     'deletecomment'=>41, */
/*     'deletefriend'=>0, */
/*     'deletenews'=>42, */
/*     'deletetopic'=>0 */
/*     ); */

/* 以下两个函数用于将api权限信息从数据库压缩存储模式转换为可验证的模式。 */

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
function check_right($stored_right,$api_num)
    {
    $tmp_str='';
    $len=strlen($stored_right);
    for($ii=0;$ii<=$len;$ii++)
	{
	$tmp_char=$stored_right{$ii};
	$tmp_str .= myhex2bin($tmp_char);
	}
    if ($tmp_str{$api_num-1}==1) return true;
    else return false;
    }

preg_match("/\/do_.+\.php$/",$_SERVER['SCRIPT_NAME'],$match);
$api_string=substr($match[0],4,strlen($match[0])-8);
$api_id=$api_nums[$api_string];
if($api_id==null) die('不存在的api' . $api_string);
$result=check_right($right,$api_id);
if($result==false) die('用户未授权，您无法使用该api');
return $user_id;
} /* end whole oauth function */

/* echo 'oauth_check= ' . oauth_check(1); */
?>
