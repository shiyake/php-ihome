<?php
/*
	do_getverifier.php用于客户端应用通过iauth认证
	added by guozhenjiang@ihome 2014-9-2
*/

if (empty($_GET['appid']))exit();

require_once("../../iauth/IAuthForceLogin.php");
require_once("../../iauth/IAuthConfig.php");
require_once("../../iauth/IAuthCommon.php");


$appid = $_GET['appid'];
if (!empty($_GET['state'])){
	$state = $_GET['state'];}
else $state='';

$result = SSOlogin( $appid, $state, $uid );
$result = json_encode($result);
$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
echo $result;

function SSOlogin( $appid, $state, $uid ){
    Check( $appid,'appid' );
    if (!empty($state)){
        Check( $state,'state' );
        Check( $uid, 'uid' );

        $authed = CheckUserAuthed( $appid, $uid );
        $appType = GetAppInfo( $appid, 'app_type' );
	$autoAuth = GetAppInfo( $appid, 'auto_auth' );

	if ($appType=='WSC'){

	    if (($authed==FALSE) && ($autoAuth==FALSE)){ //用户没有授权，且应用不是自动授权，跳转到应用大厅
		if ((!empty($_GET['s'])) && ($_GET['s']=='1')){ /* 加参数跳转到精简版界面 */
		    return IAUTH_SIMPLE_AUTH_CONFIRM_PAGE.'&appsid='.$appid.'&state='.$state ;
		    }
		return IAUTH_APP_INFO_PAGE.'&appsid='.$appid.'&state='.$state.'#confirm';
		}


	    if (($authed==FALSE) && ($autoAuth==TRUE)){ //用户没有授权，但是应用是自动授权，直接跳回应用的auth_call_back
		$authCallBack = GetAppInfo( $appid, 'call_back' );
		$rights = Check( '2:3:7:11', 'rights' ); /* 由于没有应用大厅，权限被写死 */
		$faile_t='2036-12-31 23:59:59';
		$verifier = newVerifier('auth', $appid, $uid, $rights, $faile_t,'','',$state);
		accessLog('AUTH '.$appid.' '.$uid.' 2:3:7:11 '.$faile_t.' '.$state);
		return $authCallBack .'?verifier='. $verifier.'&state='.$state.'&auth='FALSE;
		}

	    if ( $authed==TRUE ){ /* 用户已经授权，直接跳转回login_call_back */
		$loginCallBack = GetAppInfo( $appid, 'login_url' );
		$verifier = newVerifier('login', $appid, $uid, 'FROM_CLIENT','','','', $state );
		return $loginCallBack .'?verifier='. $verifier.'&state='.$state'&auth='TRUE;
		}

	    } /* END WSC */

        }     /* END !EMPTY state */

    /* 其他情况，跳到应用大厅 */
    return 0;
    
    }
    
exit();

?>
