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
if (empty($_GET['api'])) die('缺少api参数');
$request_api=$_GET['api'];
$oauth_array['api']=$request_api; 

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
if (! preg_match("/^[a-fA-F0-9]{16}$/",$tobechecked)) die ('非法的nonce');
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


/*################ 过滤2：重放攻击 ################*/

$token=$oauth_array['oauth_consumer_key'];
$nonce=$oauth_array['oauth_nonce'];
$time=$oauth_array['oauth_timestamp'];
$sql="SELECT token_type FROM token_nonce WHERE app_key='$token' and nonce='$nonce' and create_t='$time'";
$sql_tmp=mysql_query($sql);
$sql_result=mysql_fetch_array($sql_tmp);
if ($sql_result!='') die("重复请求！");

/*################ 生成 Request_token ################*/

$date=dechex(time());
$unique = false;
$key = sha1(uniqid(rand() . $date, true)); //这个生成长一点的token
$request_token=$key;

/*--------- 这次生成 Request token secret --------*/

$date=dechex(time());
$unique = false;
$key = md5(uniqid(rand() . $date, true)); //这个稍微短点。。。
$request_secret=$key;

/*--------- 这次生成 access token  --------*/

$date=dechex(time());
$unique = false;
$key = sha1(uniqid(rand() . $date, true)); //这个生成长一点的token
$access_token=$key;

/*--------- 这次生成 access token secret --------*/

$date=dechex(time());
$unique = false;
$key = md5(uniqid(rand() . $date, true)); //这个稍微短点。。。
$access_secret=$key;

/*--------- 这次生成 verify code --------*/

$key = sha1(uniqid(rand() . microtime(), true));
$key = substr($key,rand(0,23),16);
$verify_code=$key;

/*                  DEBUG                 */
/*####################################### */
if ($DEBUG_MOD==ON) {echo '</pre><h2>other tokens</h2><hr /><pre>';echo 'access_token= '. $access_token;echo 'access_secret='. $access_secret;echo 'verify_code='. $verify_code;}
/*####################################### */
/*                  DEBUG                 */

/*################ 解析请求参数,转换成一个256位的字符串 ################*/
function mybin2hex($num)
    {
    switch($num)
	{
	case '0000': return 0;
	case '0001': return 1;
	case '0010': return 2;
	case '0011': return 3;
	case '0100': return 4;
	case '0101': return 5;
	case '0110': return 6;
	case '0111': return 7;
	case '1000': return 8;
	case '1001': return 9;
	case '1010': return 'a';
	case '1011': return 'b';
	case '1100': return 'c';
	case '1101': return 'd';
	case '1110': return 'e';
	case '1111': return 'f';
	}
    }
function conv($req_api,$type)
    {
    $api_arr=explode(':',$req_api);
    $tmp_arr=array();
    $tmp_strr='';
    $tmp='';
    $ttmp_str='';
    $len=0;
    foreach( $api_arr as $val )
	{
	if (($val>=0)&&($val<1024))
	    $tmp_arr[$val]=1;
	if ($val>$len) $len=$val;
	}
    $len += 4-($len % 4);
    for($ii=1;$ii<=$len;$ii++)
	{
        if (!empty($tmp_arr[$ii])) { $tmp_strr.='1'; $tmp.='1'; /* echo 1;  */}
	else { $tmp_strr.='0'; $tmp.='0'; /* echo 0;  */}
	if (strlen($tmp_strr) % 4 ==0)
	    {
	    $ttmp_str.=mybin2hex($tmp_strr);
	    $tmp_strr='';
	    }
	}
    /* echo "\n" .  $len . "\n"; */
    return $ttmp_str;
    }
$api_con=conv($request_api,'view');

/*                  DEBUG                 */
/*####################################### */
if ($DEBUG_MOD==ON) {echo '</pre><h2>api section</h2><hr />';echo "request_api=". $request_api . "<br />api con =". $api_con . "<br />";}
/*####################################### */
/*                  DEBUG                 */
/* exit(' request exit here '); */
/*################ 存储req_token ################*/

$right=$api_con;
$fail_time=date("Y-m-d H:i:s",time()+120);
$sql="INSERT INTO token_info (app_id,request_token,request_secret,verify_code,token_right,access_token,access_secret,faile_t) VALUES('$app_id','$request_token','$request_secret','$verify_code','$right','$access_token','$access_secret','$fail_time')";
mysql_query($sql);
echo mysql_error();

/*-----------------  记录请求以备查询重放攻击  -----------------*/

$token=$oauth_array['oauth_consumer_key'];
$nonce=$oauth_array['oauth_nonce'];
$time=$oauth_array['oauth_timestamp'];
$t_stamp=date('Y-m-d H:i:s',$time);
$sql="INSERT INTO token_nonce (app_key,token,token_type,nonce,create_t) VALUES('$token','$request_token','request','$nonce','$t_stamp')";
mysql_query($sql);


/*################ 返回token ################*/

echo 'oauth_token='. $request_token .'&';
echo 'oauth_token_secret='. $request_secret;

?>
