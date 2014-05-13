<?php
require_once(dirname(__FILE__).'/IAuthConfig.php');
require_once(dirname(__FILE__)."/IAuthCommon.php");


try{
    $pTmp = GetHeaderParams();
    IAuthException::$Info=$pTmp;
    IAuthVerify( $pTmp );
    }
catch(IAuthException $e){
    showError($e);
    }
exit();



function IAuthVerify($pTmp){
    $ip = getAndCheck( $pTmp, 'ip');
    $sig = getAndCheck( $pTmp, 'sig');
    $url = getAndCheck( $pTmp, 'url');

    $client = array(
	'appid'=> getAndCheck( $pTmp, 'appid' ),
	'hash'=>getAndCheck( $pTmp, 'hash'),
	'hashmethod'=>getAndCheck( $pTmp, 'hashmethod'),
	'time'=>getAndCheck( $pTmp, 'time'),
	'nonce'=>getAndCheck( $pTmp, 'nonce'),
	'version'=>getAndCheck( $pTmp, 'version'),
	'sigmethod'=>getAndCheck( $pTmp, 'sigmethod'),
	'token'=> getAndCheck( $pTmp, 'token'),
	);

    $apiInfo = GetAPI($url);
    $rpid = $apiInfo['owner_id'];
    $api_id = $apiInfo['api_id'];
    $rpSecret = GetAppInfo( $rpid, 'app_secret' );

    $accessInfo = GetAccessInfo( $client['appid'], $client['token'] );
    $accessSecret = $accessInfo['access_secret'];
    $faile_t =      $accessInfo['faile_t'];
    $rights =       $accessInfo['rights'];
    $uid =          $accessInfo['user_id'];

    $appSecret = GetAppInfo( $client['appid'], 'app_secret' );
    $secret = $appSecret.'&'.$accessSecret;

    $base_str = 'POST&' . $url . '&' . CoString( $client );
    if ( $sig != signature( $base_str, $secret, $client['sigmethod'] )){
	throw new IAuthException('sig not match',$base_str);
	}

    $client['limit_seconds']=$apiInfo['limit_seconds'];
    $client['limit_counts']=$apiInfo['limit_counts'];
    CheckReplayAttack( $client, 'verify' );

    VerifyAccessRight( $api_id, $rights );

    newVerifier('verify',
	$client['appid'],
	$uid,
	$client['token'],
	date('Y-m-d H:i:s', $client['time']),
	$client['nonce'],
	$ip,
        $api_id );

    $rpRequest=$pTmp;
    $rpRequest['uid']=$uid;
    $rpSig = signature( CoString($rpRequest), $rpid.'&'.$rpSecret, 'MD5' );

    echo 'uid='.$uid.'&sig='.$rpSig;
    /* echo '<br />'; */
    /* echo CoString($rpRequest); */
    }




function GetAccessInfo( $appid, $accessToken ){
    $sqlTmp = mysql_fetch_assoc(SQL(
	    "SELECT user_id,rights,access_secret,faile_t FROM auth_token WHERE app_id='$appid' AND access_token='$accessToken' "));
    if ($sqlTmp=='') throw new IAuthException('access token not exist');
    if ($sqlTmp['faile_t'] < date('Y-m-d H:i:s', time())){
	/* echo $sqlTmp['faile_t'] /\* .'    '. date('Y-m-d H:i:s', time()) *\/; */
	throw new IAuthException('access token failed');
	}
    return $sqlTmp;
    }




function VerifyAccessRight( $api_id, $rights ){
    if (! check_right( $rights, $api_id ))
	throw new IAuthException('not auth'.$rights.$api_id);
//die('test');
    }


exit();
?>
