<?php

if (!defined('iBUAA')) {
	exit('Access Denied');
}





if(submitcheck('submit')) {
	if($_POST["sdel"]){
		$setarr['sina_token'] = '';
		updatetable('spacefield', $setarr, array('uid'=>$_SGLOBAL['supe_uid']));
	}
}

if($space['sina_token']){
	@include_once(S_ROOT.'./source/weibo/config.php');
	@include_once(S_ROOT.'./source/weibo/saetv2.ex.class.php' );
	
	$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $space['sina_token'] );
	$uid_get = $c->get_uid();
	$sinauid = $uid_get['uid'];
	$userinfo = $c->show_user_by_id( $sinauid);
	$weiboname = $userinfo['screen_name'];
}


include template("cp_thirdparty");
?>
