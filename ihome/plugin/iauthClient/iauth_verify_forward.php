<?php
require_once(dirname(__FILE__).'/iauth_config.php');
function iauth_verify( $url ='' ){
    if ($url==''){
        switch( $_SERVER['SERVER_PORT'] ){
        case '80':
            $url = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'];break;
        case '443':
            $url = 'https://'.$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'];break;
        default:
            $url = 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].$_SERVER['SCRIPT_NAME'];break;
            }
        }
    /*################ 检查hash ################*/
    $pTmp = array_merge( $_GET, $_POST );
    $hash = md5(CoString($pTmp));

    /*################ 生成header ################*/
    $params = GetHeaderParams();
    if (empty($params['hash']) || ($params['hash']!=$hash))
        die('hash not match: '.print_r(CoString($pTmp)));
    $params['url']= $url;
    $params['ip']= $_SERVER['REMOTE_ADDR'];
    $header = array('Authorization:'.CoString( $params, ',', '"'));
    /* print_r($params); */
    /* print_r($header); */
    /* echo IAUTH_VERIFY_URL; */
    /*################ 使用curl发送header ################*/
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($curl, CURLOPT_URL, IAUTH_VERIFY_URL);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_TIMEOUT, 30 );
    curl_setopt($curl, CURLINFO_HEADER_OUT, true);
    curl_setopt($curl, CURLINFO_HEADER, true);
    curl_setopt($curl, CURLOPT_FAILONERROR, false);
    curl_setopt($curl, CURLOPT_HTTP200ALIASES, array(400,500));
    $html = curl_exec($curl);
    curl_close($curl);
    if ($html===false){
        header('Content-Type: text/plain; charset=utf-8');
        var_dump(curl_error($curl));
        print_r($header);
        print_r(curl_getinfo($curl));
        die('请求失败 ');
        }
    /* echo $html . '<br />'; */
    /* print_r($_SERVER); */
    /* exit(); */
    /*################ 从返回数据中提取参数 ################*/
    $tmp=preg_match('/uid=([0-9]+)&sig=([0-9a-zA-Z]{32})/',$html,$match);
    if($tmp==0) die('请求校验失败 '. $html);
    $uid=$match[1];
    $sig=$match[2];

    $params['uid']=$uid;
    if(md5(CoString($params).'&'.IAUTH_RP_ID.'&'.IAUTH_RP_SECRET)!=$sig) die('请求校验失败  sig not match'.$html);
    return $uid;
    }


function GetHeaderParams(){
    if (function_exists('apache_request_headers')){
        $headers=getallheaders();
        if (empty($headers['Authorization'])) die('need header Authorization');
        $iauthParams=$headers['Authorization'];
        }
    else{
        if (empty($_SERVER['HTTP_AUTHORIZATION'])) die('need header Authorization');
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

function CoString( $params, $split='&', $fp='' ){
    ksort ( $params );
    $strTmp='';
    foreach ( $params as $key => $val ) {
        $strTmp .=  $key.'='.$fp.rawurlencode( $val ).$fp.$split ;
        }
    return substr( $strTmp, 0, strlen( $strTmp ) -1 );
    }

?>
