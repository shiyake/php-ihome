<?php

if (!defined('iBUAA')) {
    exit('Access Denied');
}

if ($member['is_developer']) {
    showmessage('not_reapply_developer', 'developer.php?do=service');
}

session_start();

$op = empty($_GET['op']) ? '' : $_GET['op'];

if ($op == 'agreement') {
    include_once template("dev_apply_agreement");
    return;
} elseif ($op == 'verifyemail') {
    $email = $_POST['email'];
    $_SESSION['developer_email'] = $email;

    $verifycode = rand(100000, 999999);
    $_SESSION['developer_email_verifycode'] = $verifycode;

    $cid = inserttable('mailcron', array('email'=>$email), 1);
    $setarr = array(
        'cid' => $cid,
        'subject' => '申请开发者-身份验证',
        'message' => '您的邮箱验证码是: ' . $verifycode,
        'dateline' => $_SGLOBAL['timestamp']
    );
    inserttable('mailqueue', $setarr);
    echo 200;
    return;
} elseif ($op == 'verifymobile') {
    $mobile = $_POST['mobile'];
    $_SESSION['developer_mobile'] = $mobile;

    $verifycode = rand(100000, 999999);
    $_SESSION['developer_mobile_verifycode'] = $verifycode;

    $content = '您的手机验证码是: ' . $verifycode;
    if (sendsms($mobile, '申请开发者-身份验证', $content)) {
        echo 200;
    } else {
        echo 1;
    }
    return;
} elseif (submitcheck('applysubmit')) {
    $email = $_POST['email'];
    $email_verifycode = $_POST['email_verifycode'];
    $mobile = $_POST['mobile'];
    $mobile_verifycode = $_POST['mobile_verifycode'];
    if ($_SESSION['developer_email'] != $email
        || $_SESSION['developer_email_verifycode'] != $email_verifycode
        || $_SESSION['developer_mobile'] != $mobile
        || $_SESSION['developer_mobile_verifycode'] != $mobile_verifycode
    ) {
        showmessage('failed_to_apply_developer', 'developer.php?do=apply', 3);
    } else {
        $setarr = array(
            'uid' => $member['uid'],
            'email' => $email,
            'mobile' => $mobile
        );
        inserttable("developer", $setarr);
        include_once template("dev_apply_success");
    }
    return;
}

include_once template("dev_apply");
