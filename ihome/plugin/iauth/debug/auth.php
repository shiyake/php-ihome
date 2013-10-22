<?php
require_once(dirname(__FILE__)."/../IAuthForceLogin.php");
require_once(dirname(__FILE__)."/../IAuthManage.php");
header('Context-Type: text/plain');

if (! empty($_GET['appid'])) $appid = $_GET['appid'];

if (! empty($_GET['uid'])) $uid  =  $_GET['uid'];

if (!empty($_GET['state'])) $state = $_GET['state'];

if (empty($_GET['rights'])) $rights = '1:10:8:3:2:4';

if (! empty($_GET['op']) && ($_GET['op']=='rm')) {
    IAUTH_remove_auth( $uid, $appid );
    echo 'remove auth success';
    exit();
    }

if (! empty($_GET['op']) && ($_GET['op']=='wsc')) {
    header('Location: '.IAUTH_auth($appid, $uid, $rights, $state, date('Y-m-d H:i:s',time()+43200)));
    exit();
    }

if (! empty($_GET['op']) && ($_GET['op']=='uac')) {
    echo 'your verifier for app is :<br />';
    echo IAUTH_auth($appid, $uid, $rights, '', date('Y-m-d H:i:s',time()+43200));
    echo '<br />valid in 2 minutes.';
    exit();
    }

if (! empty($_POST['url'])){
    IAUTH_new_API( $_POST['rpid'], $_POST['name'], $_POST['url'] );
    header('Location: '.$_SERVER['HTTP_REFERER']);
    echo 'success';
    }
//print_r($_SERVER);
/* if (! empty($_GET['op']) && ($_GET['op']=='man')) { */
/*     echo 'access info:'; */
/*     print_r(IAUTH_manage_auth( $appid, $uid, $rights, date('Y-m-d H:i:s',time()+248600) )); */
/*     exit(); */
/*     } */
?>
