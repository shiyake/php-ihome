<?php
if (empty($_GET['appid']))exit();

require_once(dirname(__FILE__)."/IAuthForceLogin.php");
require_once(dirname(__FILE__)."/IAuthConfig.php");
require_once(dirname(__FILE__)."/IAuthCommon.php");


$appid = $_GET['appid'];
if (!empty($_GET['state'])){$state = $_GET['state'];}
else $state='';

try{
    $callBack = SSOlogin( $appid, $state, $uid );
    }
catch(IAuthException $e){
    showError($e);
    }

header('Location:'.$callBack);
exit();





function SSOlogin( $appid, $state, $uid ){
    Check( $appid,'appid' );
    if (!empty($state)){
	Check( $state,'state' );
	Check( $uid, 'uid' );
	$authed = CheckUserAuthed( $appid, $uid );
	if ($authed==false){
	    header('Location:'.IAUTH_APP_INFO_PAGE.'&appsid='.$appid.'&state='.$state.'#confirm');
	    exit();
	    }
	$appType = GetAppInfo( $appid, 'app_type' );

	if ( $appType =='WSC' ){
	    $loginCallBack = GetAppInfo( $appid, 'login_url' );
	    $verifier = newVerifier('login', $appid, $uid, 'FROM_CLIENT','','','', $state );
	    return $loginCallBack .'?verifier='. $verifier.'&state='.$state;
	    }
	}
    header('Location:'.IAUTH_APP_INFO_PAGE.'&appsid='.$appid);
    exit();
    }



?>
