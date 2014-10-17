<?php

class IAuthException extends Exception{
    public function __construct(){
	$num = func_num_args();
	if ($num<1){
	    $toShow = 'unknow server error';
	    }
	else{
	    $toShow = func_get_arg(0);
	    $toLog  = '';
	    for( $i=1; $i < $num; $i++ ){
		$toLog .= func_get_arg($i) . ' ';
		}
	    }
	$this->detail=$toLog;
	parent::__construct($toShow);
	}
    private $detail;
    public function getDetail(){
	return $this->detail;
	}
    static $Info;
    }

function getExceptionTraceAsString($exception) {
    $rtn = "";
    $count = 0;
    foreach ($exception->getTrace() as $frame) {
	$args = "";
	if (isset($frame['args'])) {
	    $args = array();
	    foreach ($frame['args'] as $arg) {
		if (is_string($arg)) {
		    $args[] = "'" . $arg . "'";
		    } elseif (is_array($arg)) {
		    $args[] = "Array";
		    } elseif (is_null($arg)) {
		    $args[] = 'NULL';
		    } elseif (is_bool($arg)) {
		    $args[] = ($arg) ? "true" : "false";
		    } elseif (is_object($arg)) {
		    $args[] = get_class($arg);
		    } elseif (is_resource($arg)) {
		    $args[] = get_resource_type($arg);
		    } else {
		    $args[] = $arg;
		    }
		}
	    $args = join(", ", $args);
	    }
	$rtn .= sprintf( "#%s %s(%s): %s(%s)\n",
	    $count,
	    $frame['file'],
	    $frame['line'],
	    $frame['function'],
	    $args );
	$count++;
	}
    return $rtn;
    }

function errorLog( $exception ){
    $appid=GetAppInfo('WSC',0);
    if (($appid=='================')&&(!empty(IAuthException::$Info['appid'])))$appid=IAuthException::$Info['appid'];
    if (!empty(IAuthException::$Info['ip']))$ip=IAuthException::$Info['ip'];
    else    $ip = empty($_SERVER['HTTP_X_FORWARDED_FOR'])?($_SERVER['REMOTE_ADDR']):($_SERVER['HTTP_X_FORWARDED_FOR']);
    $time = date('Y-m-d H:i:s',time());
    $msg = $exception->getMessage();
    $detail = $exception->getDetail();
    if (DEBUG_MOD==ON){
	$stack = getExceptionTraceAsString($exception);
	$filename = substr( $_SERVER['SCRIPT_NAME'], strrpos( $_SERVER['SCRIPT_NAME'], '/' ));
	$lineToWrite = "\n====================".
		date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']).
		"====================\n".
		print_r($_SERVER,true).
		"\n========== content =========\n".
		file_get_contents('php://input').
		"\n$detail\n".$stack;
	$file = fopen(IAUTH_ERROR_LOG_FILE,'a');
	if ($file){
	    fwrite( $file,  $lineToWrite );
	    fclose( $file );
	    }
	}
    if ($msg=='server db error'){
	$stack = getExceptionTraceAsString($exception);
	$filename = substr( $_SERVER['SCRIPT_NAME'], strrpos( $_SERVER['SCRIPT_NAME'], '/' ));
	$lineToWrite = "$time $ip  /$appid/ $detail\n".$stack;
	$file = fopen(IAUTH_ERROR_LOG_FILE,'a');
	if ($file){
	    fwrite( $file,  $lineToWrite );
	    fclose( $file );
	    }
	}
    else{
	$stack = base64_encode( getExceptionTraceAsString($exception) );
	SQL("INSERT error_log (error_time, error_ip, error_appid, error_message, error_detail, error_stack ) VALUES ('$time', '$ip', '$appid', '$msg', '$detail', '$stack' )");
	}
    return $msg;//.print_r($_SERVER,true);
    }



function showError( $exception ){
    $msg = errorLog( $exception );
    header($_SERVER['SERVER_PROTOCOL'].' 400 Bad Request', true, 400);
    header('Content-Type: text/plain; charset=utf-8');
    die( $msg /* . print_r($_SERVER,true) */ );
    }


function accessLog( $str ){
    $ip = empty($_SERVER['HTTP_X_FORWARDED_FOR'])?($_SERVER['REMOTE_ADDR']):($_SERVER['HTTP_X_FORWARDED_FOR']);
    $time = date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']);
    $filename = substr( $_SERVER['SCRIPT_NAME'], strrpos( $_SERVER['SCRIPT_NAME'], '/' ));

    $lineToWrite = $time.' '.$ip.' '.$str.' '.$filename."\n";

    $file = @fopen(IAUTH_ACCESS_LOG_FILE,'a');
    if ($file){
	fwrite( $file,  $lineToWrite );
	fclose( $file );
	}
    }



function SQL( $sql , $type='' ){
    static $con='';
    /* accessLog($sql); */
    if ($sql=="CLOSE") mysql_close($con);
    if ($con==''){
	$con=mysql_connect(IAUTH_DB_HOST,IAUTH_DB_USER,IAUTH_DB_PASSWD);
	if (!$con) throw new IAuthException('server db error', 'ERROR=', mysql_error() );
	mysql_select_db(IAUTH_DB_DB);
	}
    $sqlTmp = mysql_query( $sql, $con );
    if ($sqlTmp==false){
	throw new IAuthException('server db error', 'ERROR=', mysql_error(), 'SQL=', $sql );
	}
    return $sqlTmp;
    }


function makeBaseString($method,$params){
    Check($method,'httpmethod');
    if ($_SERVER['SERVER_PORT'] == 80){
	$url_path = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME'];
	}
    else{
	$url_path = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['SERVER_PORT'] . $_SERVER['SCRIPT_NAME'];
	}
    $base_str = strtoupper($method) . '&' . $url_path . '&';
    $base_str .= CoString( $params );
    return $base_str;
    }

function CoString( $params, $split='&' ){
    ksort ( $params );
    $str_tmp='';
    foreach ( $params as $key => $val ) {
	$str_tmp .= "$key=" . rawurlencode( $val ) . $split ;
	}
    return substr( $str_tmp, 0, strlen( $str_tmp ) -1 );
    }

function signature($base_str,$secret,$type='MD5'){
    $sign='';
    switch($type){
    case 'HMAC-SHA1':
	$sign = hash_hmac ( "sha1", $base_str, $secret, true );
	$sign = base64_encode ( $sign );
	break;
    case 'MD5':
	$sign = md5( $base_str . '&'. $secret );
	break;
	}
    return $sign;
    }

function getAndCheck( $params, $key ){
    if (empty($params[ $key ])) throw new IAuthException('missing '.$key);
    $pTmp = $params[ $key ];
    /* echo $pTmp ;/\* exit(); *\/ */
    return Check( $pTmp, $key );
    }

function Check( $pTmp, $key ){
    switch ($key){
    case 'appid':
	if (preg_match('/^[0-9a-zA-Z]{16}$/',$pTmp,$match) == 0){
	    throw new IAuthException('invalid appid',$pTmp);
	    IAuthException::$Info['appid']=$pTmp;
	    }
	break;

    case 'nonce':
	if (preg_match('/^[0-9a-zA-Z]{16}$/',$pTmp,$match) == 0) {
	    throw new IAuthException('invalid nonce',$pTmp);
	    }
	break;

    case 'state':
	if (preg_match('/^[0-9a-zA-Z]{16}$/',$pTmp,$match) == 0) {
	    throw new IAuthException('invalid state',$pTmp);
	    }
	break;

    case 'token':
	if (preg_match('/^[0-9a-zA-Z]{40}$/',$pTmp,$match) == 0) {
	    throw new IAuthException('invalid token',$pTmp);
	    }
	break;

    case 'time':
	if (preg_match('/^[0-9]{10}$/',$pTmp,$match) == 0) {
	    throw new IAuthException('invalid time', $pTmp);
	    }
	$time = $_SERVER['REQUEST_TIME'];
	if (($pTmp <= $time-IAUTH_TIME_OFFSET) ||
	    ($pTmp >= $time+IAUTH_TIME_OFFSET))
	    throw new IAuthException('server time='.$time.' your time='.$pTmp);
	break;

    case 'version':
	if ( $pTmp!='2.0'){
	    throw new IAuthException('invalid version', $pTmp);
	}
	break;

    case 'sig':break;

    case 'sigmethod':
	if (($pTmp !='HMAC-SHA1') && ($pTmp!='MD5')) throw new IAuthException('unsuported signature method',$pTmp);
	break;

    case 'verifier':
	if (preg_match('/^[0-9a-zA-Z]{16}$/',$pTmp,$match) == 0) throw new IAuthException('invalid verifier');
	break;

    case 'api_id':
	if (preg_match('/^[0-9]+$/', $pTmp, $match) == 0){
	    throw new IAuthException('invalid api id');
	    }
	break;

    case 'uid':
	if (preg_match('/^[0-9]+$/', $pTmp, $match) == 0){
	    throw new IAuthException('invalid uid, need login');
	    }
	break;

    case 'rights':
	if (preg_match('/^(\d)+[:(\d)+]*$/', $pTmp, $match) == 0){
	    throw new IAuthException('invalid rights format');
	    }
	return conv( $pTmp );

    case 'url':
	if (preg_match('/^(http)|(https):\/\/[\w\/\.]+$/',$pTmp,$match)==0){
	    throw new IAuthException('invalid url');
	    }
	break;

    case 'httpmethod':
	if (($pTmp!='GET')&&($pTmp!='POST')){
	    throw new IAuthException('unsupport HTTP method');
	    }
	break;

    case 'faile_t':
	if (preg_match('/^(\d\d\d\d)-(\d\d)-(\d\d) (\d\d):(\d\d):(\d\d)$/', $pTmp, $match) == 0){
	    throw new IAuthException('invalid faile time format',$pTmp);
	    }
	$time=mktime($match[4],$match[5],$match[6],$match[2],$match[3],$match[1]);
	if ($time < $_SERVER['REQUEST_TIME']){
	    throw new IAuthException('faile time earlier than now', $pTmp);
	    }
	break;
    default:break;
	}
    return $pTmp;
    }

function GetRandomString( $len, $content='' ){
    $pTmp = base64_encode(sha1(uniqid(rand() . time() . $content, true),true));
    $pTmp = str_replace('+','a', $pTmp);
    $pTmp = str_replace('=','e', $pTmp);
    $pTmp = str_replace('/','I', $pTmp);
    return substr( $pTmp, 0, $len);
    }

function newVerifier( $type='', $clientId, $targetId, $content='', $faile_t='',$verifier='', $ip='', $state='' ){
    switch ($type){
    case 'auth':
    case 'login':
	$ip = empty($_SERVER['HTTP_X_FORWARDED_FOR'])?($_SERVER['REMOTE_ADDR']):($_SERVER['HTTP_X_FORWARDED_FOR']);
	$verifier = GetRandomString(16);
    case 'verify':
	SQL("INSERT INTO request_nonce (client_id,target_id,rtype,nonce,ip,content,faile_t,state) VALUES
               ('$clientId',$targetId,'$type','$verifier','$ip','$content','$faile_t','$state')");
	return $verifier;
	break;
    default: throw new IAuthException('unsuported verifier type');
	}
    }

function CheckReplayAttack( $params, $type='verify' ){
    switch ($type){
    case 'verify':			/* 这个是正常数据访问校验使用 */
	$time = $params['time'];
	$appid = $params['appid'];
	$verifier = $params['nonce'];
	$accessToken = $params['token'];
	if(($params['limit_counts']>0) && ($params['limit_seconds']>0)){
	    $limit_counts = $params['limit_counts'];
	    $last_access_time = date('Y-m-d H:i:s', $params['time']-$params['limit_seconds'] );
	    $sqlResult = mysql_fetch_assoc( SQL("SELECT count(target_id) FROM request_nonce WHERE client_id='$appid' AND rtype='verify' AND faile_t>'$last_access_time' AND content='$accessToken'"));
	    if ( !empty($sqlResult) && ( $sqlResult['count(target_id)'] >= $limit_counts) ){
		throw new IAuthException('too frequently, please wait '.$params['limit_seconds'].' seconds', $appid, $accessToken);
		}
	    }
	$sqlTmp = SQL("SELECT target_id FROM request_nonce WHERE client_id='$appid' AND rtype='verify' AND nonce='$verifier'AND faile_t='$time' AND content='$accessToken'");
	$sqlResult = mysql_fetch_assoc( $sqlTmp );
	if ($sqlResult==''){
	    return true;
	    }
	else{
	    throw new IAuthException('replay request', $appid, $accessToken, $verifier, $time);
	    }
	break;

    case 'auth':		/* 这个是授权时使用的 */
	$appid = $params['appid'];
	if (GetAppInfo( $appid, 'app_type' )=='WSC'){
	    $time = date('Y-m-d H:i:s', $params['time']-IAUTH_WSC_AUTH_DELAY_TIME );
	    }
	else{
	    $time = date('Y-m-d H:i:s', $params['time']-IAUTH_UAC_AUTH_DELAY_TIME );
	    }
	$verifier = $params['verifier'];
	$sqlTmp = SQL("SELECT id,content,status,create_t,target_id,faile_t,ip FROM request_nonce WHERE client_id='$appid' AND rtype='auth' AND nonce='$verifier' LIMIT 1");
	$sqlResult = mysql_fetch_assoc( $sqlTmp );
	if ($sqlResult==''){
	    throw new IAuthException('verifier not exist', $verifier);
	    }
	if (($sqlResult['create_t']< $time) || strstr($sqlResult['content'],'forbidden')){
	    throw new IAuthException('verifier expired', $verifier, 'create_t=', $sqlResult['create_t']);
	    }
	if (GetAppInfo( $appid, 'ip_check' )=='enable'){
	    if ($sqlResult['ip'] != $params['ip']){
		throw new IAuthException('ip not match', $sqlResult['ip'], $params['ip'] );
		}
	    }
	if ($sqlResult['status']=='exchanged'){
	    throw new IAuthException('replay request', $appid, $verifier, $time);
	    }
	if ($sqlResult['status']=='failed'){
	    throw new IAuthException('verifier failed', $appid, $verifier, $rqTime);
	    }
	else{
	    $uid = $sqlResult['target_id'];
	    $rights = $sqlResult['content'];
	    $time = date('Y-m-d H:i:s', $params['time'] );
	    SQL("UPDATE request_nonce SET status='exchanged',faile_t='$time' WHERE id=".$sqlResult['id']);
	    /* $content = substr('exchanged='.$rights,0,255); */
	    /* SQL("UPDATE request_nonce SET content='$content' WHERE client_id='$appid' AND rtype='auth' AND nonce='$verifier'"); */
	    return array('uid'=>$uid,'rights'=>$rights,'faile_t'=>$sqlResult['faile_t']);
	    }
	break;

    case 'login':		/* 这个是登录时使用的 */
	$appid = $params['appid'];
	$verifier = $params['verifier'];
	$sqlTmp = SQL("SELECT id,status,create_t,ip,target_id FROM request_nonce WHERE client_id='$appid' AND rtype='login' AND nonce='$verifier' LIMIT 1");
	$sqlResult = mysql_fetch_assoc( $sqlTmp );
	if ($sqlResult==''){
	    throw new IAuthException('verifier not exist ',$verifier);
	    }
	$rqTime = $params['time'];
	$faileTime = date('Y-m-d H:i:s', $rqTime-IAUTH_WSC_LOGIN_DELAY_TIME );
	if ($sqlResult['create_t']< $faileTime){
	    throw new IAuthException('verifier expired', $verifier, 'create_t=', $sqlResult['create_t'] );
	    }
	if (GetAppInfo( $appid, 'ip_check' )=='enable'){
	    if ($sqlResult['ip'] != $params['ip']){
		throw new IAuthException('ip not match', $sqlResult['ip'], $params['ip']);
		}
	    }
	if ($sqlResult['status']=='exchanged'){
	    throw new IAuthException('replay request', $appid, $verifier, $rqTime);
	    }
	if ($sqlResult['status']=='failed'){
	    throw new IAuthException('verifier failed', $appid, $verifier, $rqTime);
	    }
	else{
	    $uid = $sqlResult['target_id'];
	    $time = date('Y-m-d H:i:s', $rqTime );
	    /* SQL("UPDATE request_nonce SET content='$content',faile_t='$time' WHERE client_id='$appid' AND rtype='login' AND nonce='$verifier'"); */
	    SQL("UPDATE request_nonce SET status='exchanged',faile_t='$time' WHERE id=".$sqlResult['id']);
	    return $uid;
	    }
	break;

    default: throw new IAuthException('invalid type');
	}
    }

function GetAppInfo( $appid, $pTmp ){
    static $appInfo=array();
    if ($appid=='WSC'){
	foreach ( $appInfo as $id => $info ) {
	    if ($info['app_type']=='WSC') return $id;
	    }
	return '================';
	}
    Check( $appid, 'appid' );
    if (empty($appInfo[$appid])){
	$sql = mysql_fetch_assoc( SQL("SELECT * FROM app_info WHERE app_id='$appid'") );
	if (!$sql){
	    throw new IAuthException('app not exist', $appid);
	    }
	$appInfo[$appid] = $sql;
	}
    if ($appInfo[$appid]['status']=='disable'){
	throw new IAuthException('app is disabled', $appid);
	}
    if (array_key_exists($pTmp,$appInfo[$appid])){
	return $appInfo[$appid][$pTmp];
	}
    else throw new IAuthException('FATAL!! key not exist');
    }

function VerifySignature( $params, $appSecret, $sig, $sigmethod='',$httpmethod='GET' ){
    /*################ 检查签名 ################*/
    $baseString = makeBaseString( $httpmethod, $params );
    if ($sigmethod=='') $sigmethod = $params['sigmethod'];
    $sigTmp = signature( $baseString, $appSecret, $sigmethod );
    if ( $sigTmp != $sig ){
	throw new IAuthException('signature not match '.$baseString);
	}
    }

function GetHeaderParams(){
    if (function_exists('apache_request_headers')){
	$headers=getallheaders();
	if (empty($headers['Authorization'])) throw new IAuthException('no header Authorization');
	$iauthParams=$headers['Authorization'];
	}
    else{
	if (empty($_SERVER['HTTP_AUTHORIZATION'])) throw new IAuthException('no header Authorization');
	$iauthParams=$_SERVER['HTTP_AUTHORIZATION'];
	}
    $pTmp=explode(',',$iauthParams);
    $iauthArray=array();
    foreach ($pTmp as $strTmp){
	$tmp=preg_match('/(.+)="([^"]+)"/',$strTmp,$match);
	$key = $match[1];
	$val = $match[2];
	$iauthArray[$key]=rawurldecode( $val );
	}
    return $iauthArray;
    }

function GetAPI( $url ){
    $urlHash = sha1( $url );
    $sqlResult = mysql_fetch_assoc(SQL("SELECT owner_id,api_id,api_url,status,limit_seconds,limit_counts FROM api_info WHERE hash='$urlHash'"));
    if ($sqlResult==''){
	throw new IAuthException('api not find', $url);
	}
    $rpid = $sqlResult['owner_id'];
    $api_id = $sqlResult['api_id'];
    if ($sqlResult['status']=='disable'){
	throw new IAuthException('API disabled','id=', $rpid, $url);
	}
    if ( $sqlResult['api_url'] == $url)
	return $sqlResult;
    else{
	throw new IAuthException('server url error', $sqlResult['api_url'], $url, 'hash match but url not match in api_info, sha1 conflict!!');
	}
    }

function myhex2bin($mychar) {
    switch($mychar){
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

function check_right($stored_right,$api_num){
    $api_num=intval($api_num);
    if (strlen($stored_right)*4<$api_num)return false;
    $a = $api_num % 4;
    $b = intval($api_num / 4);
    if ($a==0) {$b--; $a=4;}
    $tmp=myhex2bin($stored_right{$b});
    if ($tmp{$a-1}==1) return true;
    else return false;
    }

function mybin2hex($num){
    switch($num){
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

function conv($req_api){
    $api_arr=explode(':',$req_api);
    $tmp_arr=array();
    $tmp_strr='';
    $tmp='';
    $ttmp_str='';
    $len=0;
    foreach( $api_arr as $val ){
	if (($val>=0)&&($val<1024))
	    $tmp_arr[$val]=1;
	if ($val>$len) $len=$val;
	}
    $len += 4-($len % 4);
    for($ii=1;$ii<=$len;$ii++){
        if (!empty($tmp_arr[$ii])) { $tmp_strr.='1'; $tmp.='1'; /* echo 1;  */}
	else { $tmp_strr.='0'; $tmp.='0'; /* echo 0;  */}
	if (strlen($tmp_strr) % 4 ==0){
	    $ttmp_str.=mybin2hex($tmp_strr);
	    $tmp_strr='';
	    }
	}
    return $ttmp_str;
    }

function CheckUserAuthed( $appid, $uid ){
    $sql = "SELECT faile_t FROM auth_token WHERE app_id='$appid' AND user_id=$uid ";
    $sqlResult = mysql_fetch_assoc( SQL($sql) );
    if ($sqlResult == ''){	/* 数据库里无记录 */
	/* throw new IAuthException('not auth yet'); */
	return false;
	}
    if ($sqlResult['faile_t'] < date('Y-m-d H:i:s', time())){
	throw new IAuthException('access token failed', $appid, $uid );
	}
    return true;
    }

function newAccessToken( $uid, $appid, $rights, $faile_t='2036-12-31 23:59:59' ){
    $sql="SELECT access_token,access_secret FROM auth_token WHERE app_id='$appid' AND user_id=$uid";
    $sqlResult = mysql_fetch_assoc(SQL($sql));
    $accessSecret = md5( uniqid( rand().$appid.$uid.microtime()));
    if ($sqlResult==''){
	$accessToken =  sha1( uniqid( rand().$uid.$appid.time()));
	SQL("INSERT INTO auth_token (user_id,app_id,access_token,access_secret,rights,faile_t) VALUES($uid,'$appid','$accessToken','$accessSecret','$rights','$faile_t')");
	}
    else{ /* access token 已经存在，通常是UAC换一个客户端登录的这种情况，只更新下secret即可 */
	$accessToken = $sqlResult['access_token'];
	SQL("UPDATE auth_token (access_secret,faile_t) VALUES('$accessSecret','$faile_t')");
	}
    return array(
	'accessToken'=>$accessToken,
	'accessSecret'=>$accessSecret,
	);
    }

class UpdateTable{
    private $sql;
    private $table;
    private $params;
    private $where;
    private $update;
    public function __construct( $table, $where='' ){
	$this->table=$table;
	$this->sql='';
	$this->params=array();
	$this->where=$where;
	$this->update=FALSE;
	}
    public function Update($key,$val){
	$this->params[$key] = $val;
	$this->update=TRUE;
	}
    public function Go(){
	if ( $this->update == FALSE ) return 'nothing to do';
	$pTmp = $this->CoStr( $this->params, ',', "'" );
	$this->sql = 'UPDATE '.$this->table.' SET '.$pTmp.' WHERE '.$this->where;
	//echo( $this->sql );
        SQL( $this->sql );
	}
    private function CoStr( $params, $split='&', $fp='' ){
	$strTmp='';
	foreach ( $params as $key => $val ) {
	    $strTmp .=  $key.'='.$fp.$val.$fp.$split ;
	    }
	return substr( $strTmp, 0, strlen( $strTmp ) -strlen($split) );
	}
    public function Where( $str ){
	$this->where=$str;
	}
    }

?>
