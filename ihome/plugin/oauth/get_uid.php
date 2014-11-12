<?php
include_once(dirname(__FILE__) . '/config.php');
include_once(dirname(__FILE__) . '/iauth_core.php');

/*################ 从Header和请求中提取参数 ################*/

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


/*                  DEBUG                 */
/*####################################### */
if ($DEBUG_MOD==ON) {echo '<h2>headers</h2><hr /><pre>';var_dump($headers);var_dump($oauth_arr_tmp);}
/*####################################### */
/*                  DEBUG                 */

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


if ($sig=='') die('缺少signature参数');
/* if (empty($_GET['api'])) die('缺少api参数'); */

/*                  DEBUG                 */
/*####################################### */
if ($DEBUG_MOD==ON) {echo '</pre><h2>$_SERVER</h2><hr /><pre>';print_r($_SERVER);print_r($oauth_array);}
/*####################################### */
/*                  DEBUG                 */


/*################ 检查oauth数组中的参数是否合法 ################*/

if (empty($oauth_array['oauth_nonce'])) die('缺少参数2');
if (empty($oauth_array['oauth_timestamp'])) die('缺少参数3');
if (empty($oauth_array['oauth_signature_method'])) die('缺少参数5');
if (empty($oauth_array['oauth_consumer_key'])) die('缺少参数6');
if (empty($oauth_array['oauth_version'])) die('缺少参数7');


/*################ 过滤1-时间戳 ################*/

$their_time=$oauth_array['oauth_timestamp'];
$now=time();

/*                  DEBUG                 */
/*####################################### */
if ($DEBUG_MOD==ON) {echo '</pre><h2>TIME</h2><hr /><pre>';echo $their_time . "\n";echo $now;}
/*####################################### */
/*                  DEBUG                 */

if (($their_time <= $now-480)||($their_time >= $now+480)) {die("时间与服务器不同步");}


/*################ 检查oauth数组中的参数是否合法 ################*/

$tobechecked=$oauth_array['oauth_consumer_key'];
if (! preg_match("/^[a-fA-F0-9]{40}$/",$tobechecked)) die ('非法的token');
$tobechecked=$oauth_array['oauth_nonce'];
if (! preg_match("/^[a-fA-F0-9]{16}$/",$tobechecked)) die ('非法的nonce' . $tobechecked);
/* if ($oauth_array['oauth_signature_method']!='HMAC-SHA1') die ('不支持的签名方式'); */
if ($oauth_array['oauth_version']!='1.0') die ('不支持的版本');
if (strlen($sig)<=10) die ('非法的签名');
if ($oauth_array['oauth_signature_method']!='HMAC-SHA1' &&
    $oauth_array['oauth_signature_method']!='MD5')
    die ('不支持的签名方式');

/*################ 设定参数 ################*/

$method  ="GET";
$url_path = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME'];
$app_consumer_key=$oauth_array['oauth_consumer_key'];

$con=mysql_connect(OAUTH_DB_DOMAIN,OAUTH_DB_USER,OAUTH_DB_PASSWD);
if (!$con) $con=mysql_error();
mysql_select_db(OAUTH_DB_DB);
$sql="SELECT app_secret,app_id FROM app_info WHERE app_key='$app_consumer_key'";
$tmp=mysql_query($sql);
$sql_result=mysql_fetch_array($tmp);
if ($sql_result=='') die("应用不存在！");
/*                  DEBUG                 */
/*####################################### */
if ($DEBUG_MOD==ON) {echo '</pre><h2>get app info from DB</h2><hr /><pre>';if ($sql_result==false)echo 'sql result=false---you might have a synax error';else print_r($sql_result);}
/*####################################### */
/*                  DEBUG                 */

$app_consumer_secret=$sql_result['app_secret'];
$app_id=$sql_result['app_id'];
$params =$oauth_array;

/* 'oauth_signature_method'=>"HMAC-SHA1", */
/* 'oauth_timestamp'=>"1350523071", */
/* 'oauth_nonce'=>"507f58bf8290e", */
/* 'oauth_version'=>'1.0', */
/* 'oauth_consumer_key'=>$app_consumer_key */
/* ); */

/*################ 生成BASE String ################*/

$base_str = strtoupper($method) . '&' . rawurlencode ( $url_path ) . '&';
ksort ( $params );
$str_tmp='';
foreach ( $params as $key => $val ) 
    {
    $str_tmp .= "$key=$val&";
    }
$base_str.= rawurlencode( substr( $str_tmp, 0, strlen( $str_tmp ) -1 )); /* 删去最后多出来的一个'&' */

/*                  DEBUG                 */
/*####################################### */
if ($DEBUG_MOD==ON) {echo '</pre><h2>BASE STRING</h2><hr /><pre>';echo $base_str;}
/*####################################### */
/*                  DEBUG                 */

/*################ 检查签名 ################*/

$secret=$app_consumer_key.'&'.$app_consumer_secret;
/* $sign = hash_hmac ( "sha1", $base_str, $secret, true ); */
/* $sign = base64_encode ( $sign ); */
$sign = signature($oauth_array['oauth_signature_method'], $base_str, $secret);
/*                  DEBUG                 */
/*####################################### */
if ($DEBUG_MOD==ON) {echo '</pre><h2>signatures</h2><hr /><pre>';echo $sign . "\n";echo $sig;}
/*####################################### */
/*                  DEBUG                 */

if (strcmp($sig,$sign)!=0) die("签名不匹配！");

/*################ 检索uid ################*/

$token=$oauth_array['oauth_consumer_key'];
$nonce=$oauth_array['oauth_nonce'];
$sql="SELECT token,create_t FROM token_nonce WHERE app_key='$token' and nonce='$nonce' and token_type='login' ORDER BY create_t DESC LIMIT 1";
$sql_tmp=mysql_query($sql);
$sql_result=mysql_fetch_array($sql_tmp);
if ($sql_result=='') die("不存在的记录！");
$t_stamp=date('Y-m-d H:i:s',$now-60);
if ($sql_result['create_t'] < $t_stamp) die("请求已过期");
if (! strstr($sql_result['token'],'failed') == false) die("重复请求".$sql_result['token']);
$uid = $sql_result['token'];

/*-----------------  使记录失效  -----------------*/

$token=$oauth_array['oauth_consumer_key'];
$nonce=$oauth_array['oauth_nonce'];
$sql="UPDATE token_nonce SET token='failed=$uid' WHERE app_key='$token' and nonce='$nonce' and token_type='login' ORDER BY create_t DESC LIMIT 1";
mysql_query($sql);


/*################ 返回token ################*/
echo 'oauth_uid=' . $uid . '&';

?>
