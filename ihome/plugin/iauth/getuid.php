<?php
require_once(dirname(__FILE__)."/IAuthConfig.php");
require_once(dirname(__FILE__)."/IAuthCommon.php");

try{
    $pTmp = GetHeaderParams();
    IAuthException::$Info=$pTmp;
    GetLoginToken( $pTmp );
    }
catch(IAuthException $e){
    showError($e);
    }
exit('test');




function GetLoginToken( $pTmp ){
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

    $appSecret = GetAppInfo( $params['appid'], 'app_secret' );
    VerifySignature( $params, $appSecret, $sig ); /* 确保对参数的签名是有效的 */
    $uid = CheckReplayAttack( $params, 'login' ); /* 检查重放攻击并记录 */
    $accessToken = GetAccessToken( $params['appid'], $uid );
    echo 'uid='.$uid.'&access_token='.$accessToken;
    exit();
    }




function GetAccessToken( $appid, $uid ){
    $sql = mysql_fetch_assoc( SQL("SELECT access_token FROM auth_token WHERE app_id='$appid' AND user_id=$uid") );
    if ($sql==false){
	throw new IAuthException('access token not exist, maybe user delete ');
	}
    return $sql['access_token'];
    }


?>
