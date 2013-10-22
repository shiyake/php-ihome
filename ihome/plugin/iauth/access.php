<?php
  /* 该文件给 Web Site Client 类应用返回access token */
require_once("./IAuthConfig.php");
require_once("./IAuthCommon.php");

try{
    $pTmp = GetHeaderParams();
    IAuthException::$Info=$pTmp;
    NewAuthToken( $pTmp );
    }
catch(IAuthException $e){
    showError($e);
    }
exit();



function NewAuthToken( $pTmp ){

    $sig = getAndCheck( $pTmp, 'sig' );

    $params = array(
	'state' => getAndCheck( $pTmp, 'state' ),
	'appid' => getAndCheck( $pTmp, 'appid' ),
	'time' =>   getAndCheck( $pTmp, 'time' ),
	'sigmethod' =>getAndCheck( $pTmp, 'sigmethod' ),
	'version' =>  getAndCheck( $pTmp, 'version' ),
	'verifier' => getAndCheck( $pTmp, 'verifier' ),
	);
    if (GetAppInfo( $params['appid'], 'ip_check' )=='enable'){
	$params['ip'] = getAndCheck( $pTmp, 'ip');
	}
    /* print_r($params); */
    /* echo $params['appid'];exit(); */
    $appSecret = GetAppInfo( $params['appid'], 'app_secret' );

    VerifySignature( $params, $appSecret, $sig ); /* 确保对参数的签名是有效的 */

    $authInfo = CheckReplayAttack( $params, 'auth' ); /* 检查重放攻击并记录 */
    /* print_r($pTmp); */
    $uid = $authInfo['uid'];
    $rights = $authInfo['rights'];
    $faile_t = $authInfo['faile_t'];

    $accessInfo = newAccessToken( $uid, $params['appid'], $rights, $faile_t );
    echo 'uid='.$uid.'&access_token='.$accessInfo['accessToken'].'&'.'access_secret='.$accessInfo['accessSecret'];
    exit();
    }

?>
