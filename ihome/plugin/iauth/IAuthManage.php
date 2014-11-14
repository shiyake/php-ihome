<?php
require_once(dirname(__FILE__)."/IAuthConfig.php");
require_once(dirname(__FILE__)."/IAuthCommon.php");

/* ------ some demo ------ */
/* IAUTH_auth('e015fd71eeb744ca',107, '1:10:8:3:2:4',date('Y-m-d H:i:s',time()+600)); */
/* IAUTH_edit_app('1df914e648ffe63b', 'NameChanged','','','disable' ); */
/* IAUTH_remove_app('1919d19d9fe891c0'); */
/* IAUTH_new_API('sjh1014mejh744ca', 'http://211.71.14.65/plugin/iauthClient/api/do_getallthings.php', 'disable'); */
/* IAUTH_edit_API( 1, 'http://211.71.14.65/plugin/iauthClient/api/do_getallthings.php', 'disable'); */
/* IAUTH_remove_API(1); */
/* IAUTH_remove_auth( 107,'e015fd71eeb744ca'); */


function IAUTH_auth( $appid, $uid, $rightStr, $state='', $faile_t='2036-12-31 23:59:59' ){
    Check( $appid,'appid' );
    Check( $uid, 'uid' );
    if(intval($uid)<=0) showError('use manage function instead');
    Check( $faile_t, 'faile_t');
    $rights = Check( $rightStr, 'rights' );

    $appType = GetAppInfo( $appid, 'app_type' );
    IAUTH_remove_auth( $uid, $appid );

    if ( $appType =='WSC' ){
	Check( $state, 'state' );
	$callback = GetAppInfo( $appid, 'call_back' );
	$verifier = newVerifier('auth', $appid, $uid, $rights, $faile_t,'','',$state);
	accessLog('AUTH '.$appid.' '.$uid.' '.$rightStr.' '.$faile_t.' '.$state);
	return $callback .'?verifier='. $verifier .'&state='. $state;
	}
    if ( $appType =='UAC' ){
	$verifier = newVerifier('auth', $appid, $uid, $rights, $faile_t);
	accessLog('AUTH '.$appid.' '.$uid.' '.$rightStr.' '.$faile_t);
	return $verifier;
	}
    throw new IAuthException('db error');
    }

function IAUTH_if_authed( $appid, $uid){
    Check( $uid, 'uid' );
    Check( $appid, 'appid');
    $sql = mysql_fetch_assoc(SQL("SELECT faile_t FROM auth_token WHERE user_id='$uid' AND app_id='$appid'"));
    if ($sql == false){ return 'not authed';}
    else return 'authed';
    }

function IAUTH_remove_auth( $uid, $appid ){
    Check( $uid, 'uid' );
    Check( $appid, 'appid');
    $time = date('Y-m-d H:i:s', time()-10*IAUTH_UAC_AUTH_DELAY_TIME );
    SQL("UPDATE request_nonce SET status='failed' WHERE client_id='$appid' AND rtype!='verify' AND target_id='$uid' AND status='available' AND create_t>'$time'");
    $sql = mysql_fetch_assoc(SQL("SELECT faile_t FROM auth_token WHERE user_id='$uid' AND app_id='$appid'"));
    if ($sql == false){ return ;}
    SQL("DELETE FROM auth_token WHERE user_id='$uid' AND app_id='$appid'");
    accessLog('AUTH(remove) '.$appid.' '.$uid);
    }

function IAUTH_new_WSC( $name, $callBack, $loginCallBack, $status='disable' ){
    if (($status!='normal')&&($status!='disable')&&($status!='debug')) throw new IAuthException('wrong status');
    Check( $callBack, 'url' );
    Check( $loginCallBack, 'url' );
    $appid = substr( md5(time().$name.$callBack.rand()), 0, 16 );
    $appSecret = md5(time().$name.$loginCallBack.$status.rand());
    SQL("INSERT INTO app_info
                 (app_id,app_secret,app_type,status,app_name,call_back,login_url)
           value('$appid','$appSecret','WSC','$status','$name','$callBack','$loginCallBack')");
    accessLog('APP(new) WSC '.$name.' '.$callBack.' '.$loginCallBack.' '.$status);
    return array('id'=>$appid,'secret'=>$appSecret);
    }

function IAUTH_new_UAC( $name, $status='disable' ){
    if (($status!='normal')&&($status!='disable')&&($status!='debug')) throw new IAuthException('wrong status');
    $appid = substr( md5(time().$name.rand()), 0, 16 );
    $appSecret = md5(time().$name.$status.rand());
    SQL("INSERT INTO app_info (app_id,app_secret,app_type,status,ip_check,app_name) value('$appid','$appSecret','UAC','$status','disable','$name')");
    accessLog('APP(new) UAC '.$name.' '.$appid.' '.$status);
    return array('id'=>$appid,'secret'=>$appSecret);
    }

function IAUTH_new_RP( $name, $status='disable' ){
    if (($status!='normal')&&($status!='disable')&&($status!='debug')) throw new IAuthException('wrong status');
    $appid = substr( md5(time().$name.rand()), 0, 16 );
    $appSecret = md5(time().$name.$status.rand());
    SQL("INSERT INTO app_info (app_id,app_secret,app_type,status,app_name) value('$appid','$appSecret','RP','$status','$name')");
    accessLog('APP(new) RP '.$name.' '.$appid.' '.$status);
    return array('id'=>$appid,'secret'=>$appSecret);
    }

function IAUTH_edit_app( $id, $name='', $callBack='', $loginCallBack='', $status='' ){
    Check($id,'appid');
    $sql = mysql_fetch_assoc(SQL("SELECT * FROM app_info WHERE app_id='$id'"));
    if (!$sql){
	throw new IAuthException('app not find');
	}
    $op = new UpdateTable('app_info', "app_id= '$id'");
    if ( $status!=''){
	if (($status!='normal')&&($status!='disable')&&($status!='debug')) throw new IAuthException('wrong status');
	$op->Update( 'status', $status );
	}
    if ( $name != ''){
	Check($name,'name');
	$op->Update( 'app_name',$name );
	}
    if ( $callBack != ''){
	Check($callBack,'url');
	$op->Update('call_back', $callBack);
	}
    if ( $loginCallBack != ''){
	Check($loginCallBack,'url');
	$op->Update('login_url',$loginCallBack);
	}
    $res = $op->Go();
    if ($res=='nothing to do') throw new IAuthException('update nothing!');
    accessLog('APP(edit) '.$id.' '.$name.' '.$callBack.' '.$loginCallBack.' '.$status);
    }

function IAUTH_remove_app( $id ){
    Check($id,'appid');
    accessLog('APP(remove) '.$id);
    SQL("DELETE FROM app_info WHERE app_id='$id'");
    }

function IAUTH_new_API( $rpid, $name, $url ){
    Check($rpid,'appid');
    Check($url,'url');
    Check($name,'name');
    if (GetAppInfo($rpid,'app_type')!='RP') throw new IAuthException('only RP can add API!');
    $hash = sha1($url);
    $sql = mysql_fetch_assoc(SQL("SELECT api_url,api_id FROM api_info WHERE owner_id='$rpid' AND hash='$hash'"));
    if ( ! $sql ){
	$status='disable';
	SQL("INSERT INTO api_info (hash,api_url,owner_id,status,api_name)
                     values ('$hash','$url','$rpid','disable','$name')");
	accessLog('API(new) '.$rpid.' '.$url.' '.$status);
	return mysql_insert_id();
	}
    else{
	if ($sql['api_url']==$url) throw new IAuthException('already has a same API as '.$sql['api_name']);
	if ($sql['api_name']==$name) throw new IAuthException('api name conflict');
	else throw new IAuthException('FATAL! hash conflict!!!');
	}
    }

function IAUTH_edit_API( $api_id, $name='', $url='', $status='' ){
    Check($api_id,'api_id');
    $op = new UpdateTable('api_info',"api_id= '$api_id' ");
    if ($url!=''){
	Check($url,'url');
	$hash = sha1($url);
	$op->Update('url',$url);
	$op->Update('hash',$hash);
	}
    if ($status!=''){
	if (($status!='normal')&&($status!='disable')&&($status!='debug')) throw new IAuthException('wrong status editing API');
	$op->Update('status',$status);
	}
    if ($name!=''){
	Check($name,'name');
	$op->Update('name',$name);
	}
    $res = $op->Go();
    accessLog('API(edit) '.$api_id.' '.$url.' '.$status);
    }

function IAUTH_remove_API( $api_id ){
    Check($api_id,'uid');
    SQL("DELETE FROM api_info WHERE api_id=$api_id");
    accessLog('API(remove) '.$api_id);
    return true;
    }

?>
