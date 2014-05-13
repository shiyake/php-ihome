<?php
session_start();

include_once( 'config.php' );
include_once( 'saetv2.ex.class.php' );

$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
if( isset($_REQUEST['text']) ) {
        $ret = $c->update( $_REQUEST['text'] );        //发送微博
        if ( isset($ret['error_code']) && $ret['error_code'] > 0 ) {
                echo "<p>发送失败，错误：{$ret['error_code']}:{$ret['error']}</p>";
        } else {
                echo "<p>发送成功</p>";
        }
}
else{

if (isset($_REQUEST['code'])) {
        $keys = array();
        $keys['code'] = $_REQUEST['code'];
        $keys['redirect_uri'] = WB_CALLBACK_URL;
        try {
                $token = $o->getAccessToken( 'code', $keys ) ;
        } catch (OAuthException $e) {
        }
}

if ($token) {
        $_SESSION['token'] = $token;
        setcookie( 'weibojs_'.$o->client_id, http_build_query($token) );
	$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $_SESSION['token']['access_token'] );
	$ms  = $c->home_timeline(); // done
	$uid_get = $c->get_uid();
	$uid = $uid_get['uid'];
	$user_message = $c->show_user_by_id( $uid);//根据ID获取用户等基本信息
?>
   <h2 align="left">发送新微博</h2>
   <form action="" >
                <input type="text" name="text" style="width:300px" />
                <input type="submit" />
    </form>
<?php	

} else {
?>
授权失败。
<?php
}
}
?>
