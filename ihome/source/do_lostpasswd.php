<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}
$send_interval = 60;
$op = empty($_GET['op'])?'':$_GET['op'];

if ($op == 'get_code') {
    $uid = $_GET['uid'];
    $query = $_SGLOBAL['db']->query("select * from ".tname('protect_info')." where uid=$uid");
    $protect_info = $_SGLOBAL['db']->fetch_array($query);
    if ($protect_info['mobile_send_time'] + $send_interval > $_SGLOBAL['timestamp']) {
        showmessage("send_too_quick", 'cp.php?ac=protect&op=mobile');
    }
    if ($protect_info['mobile_send_time'] + 3600*24 < $_SGLOBAL['timestamp']) {
        $protect_info['mobile_send_num'] = 0;
    }
    if ($protect_info['mobile_send_num'] >= 5) {
        showmessage("send_too_quick", 'cp.php?ac=protect&op=mobile');
    }
    $protect_info['mobile_send_time'] = $_SGLOBAL['timestamp'];
    $verifycode = rand(100000,999999);
    $protect_info['mobile_code'] = $verifycode;
    $content = "您在i北航（i.buaa.edu.cn）的找回密码手机验证码为".$verifycode."请及时输入验证码完成修改密码！[i北航]";
    if(sendsms($protect_info['mobile'], '验证码', $content)) {
        $protect_info['mobile_send_num'] += 1;
        updatetable('protect_info', $protect_info, array('uid'=>$uid));
        showmessage("send_ok");
    }
    showmessage('send_fail');
}

if (submitcheck("submit_username")) {
    if(!empty($_POST['username'])) {
        $query = $_SGLOBAL['db']->query("select * from ".tname("member")." where username='$_POST[username]'");
        if (!$member = $_SGLOBAL['db']->fetch_array($query)) {
            showmessage('no_such_username','do.php?ac=lostpasswd');
        }
        $uid = $member['uid'];
        $query = $_SGLOBAL['db']->query("select * from ".tname('spacefield')." where uid=$uid");
        $space_field = $_SGLOBAL['db']->fetch_array($query);
        $query = $_SGLOBAL['db']->query("select * from ".tname('protect_info')." where uid=$uid");
        $protect_info = $_SGLOBAL['db']->fetch_array($query);
    }
    else {
        $query = $_SGLOBAL['db']->query("select uid from ".tname("baseprofile")." where collegeid='$_POST[num]' and isactive=1");

        if (!$member = $_SGLOBAL['db']->fetch_array($query)) {
            showmessage('no_such_collegeid','do.php?ac=lostpasswd');
        }
        $uid = $member['uid'];
        $query = $_SGLOBAL['db']->query("select * from ".tname('spacefield')." where uid=$uid");
        $space_field = $_SGLOBAL['db']->fetch_array($query);
        $query = $_SGLOBAL['db']->query("select * from ".tname('protect_info')." where uid=$uid");
        $protect_info = $_SGLOBAL['db']->fetch_array($query);
    }
} elseif(submitcheck('submit_type')) {
    $uid = $_GET['uid'];
    $query = $_SGLOBAL['db']->query("select * from ".tname('spacefield')." where uid=$uid");
    $space_field = $_SGLOBAL['db']->fetch_array($query);
    $query = $_SGLOBAL['db']->query("select * from ".tname('protect_info')." where uid=$uid");
    $protect_info = $_SGLOBAL['db']->fetch_array($query);
    if ($_POST['type'] == 1) {
        if (!empty($protect_info) and $protect_info['mobile_send_time'] + $send_interval > $_SGLOBAL['timestamp']) {
            $left_seconds = $protect_info['mobile_send_time']+$send_interval-$_SGLOBAL['timestamp'];
        } else {
            $left_seconds = 0;
        }
    } elseif ($_POST['type'] == 2) {
        $questions = array(
            '母亲的姓名',
            '父亲的姓名',
            '母亲的生日',
            '父亲的生日',
            '您的出生地是哪里',
            '您的身份证后后6位数字',
            '您就职的第一家公司的名称',
            '你的车牌号是',
            '外婆的名字',
            '配偶的姓名',
            '配偶的生日',
            '初中英语老师的名字',
            '高中班主任的姓名');


        $ques1 = $questions[$protect_info['question1']];
        $ques2 = $questions[$protect_info['question2']];
        $ques3 = $questions[$protect_info['question3']];
    } elseif ($_POST['type'] == 3) {
        $spaceinfo = array();
        $query = $_SGLOBAL['db']->query('SELECT s.uid, s.groupid, s.username, s.flag, sf.email, sf.emailcheck FROM '.tname('space').' s LEFT JOIN '.tname('spacefield')." sf ON sf.uid=s.uid WHERE s.uid=$uid");
        $spaceinfo = $_SGLOBAL['db']->fetch_array($query);
        if(empty($spaceinfo)) {
            showmessage('该邮箱账号没有在本站注册！');
        }

        //创始人、管理员不允许找回密码
        $founderarr = explode(',', $_SC['founder']);
        if($spaceinfo['flag'] || in_array($spaceinfo['uid'], $founderarr) || checkperm('admin')) {
            showmessage('getpasswd_account_invalid');
        }

    }
} elseif (submitcheck("submit_question")) {
    $uid = $_POST['uid'];
    $query = $_SGLOBAL['db']->query("select * from ".tname('protect_info')." where uid=$uid");
    $protect_info = $_SGLOBAL['db']->fetch_array($query);
    $answer1 = $protect_info['answer1'];
    $answer2 = $protect_info['answer2'];
    $answer3 = $protect_info['answer3'];
    if ($answer1 != $_POST['answer1'] or $answer2 != $_POST['answer2'] or $answer3 != $_POST['answer3']) {
        showmessage('密保问题回答错误');
    }
    $check_success = 1;
    $idstring = random(6);
    updatetable('spacefield', array('authstr'=>$_SGLOBAL['timestamp']."\t1\t".$idstring), array('uid'=>$uid));
    $query = $_SGLOBAL['db']->query('SELECT s.uid, s.groupid, s.username, s.flag, sf.email, sf.emailcheck FROM '.tname('space').' s LEFT JOIN '.tname('spacefield')." sf ON sf.uid=s.uid WHERE s.uid=$uid");
    $spaceinfo = $_SGLOBAL['db']->fetch_array($query);

} elseif(submitcheck("submit_mobile")) {
    $uid = $_GET['uid'];
    $query = $_SGLOBAL['db']->query("select * from ".tname('spacefield')." where uid=$uid");
    $space_field = $_SGLOBAL['db']->fetch_array($query);
    $query = $_SGLOBAL['db']->query("select * from ".tname('protect_info')." where uid=$uid");
    $protect_info = $_SGLOBAL['db']->fetch_array($query);
    if ($protect_info['mobile_code'] != $_POST['verify_code']) {
        showmessage("验证码不对");
    }
    $check_success = 1;
    $idstring = random(6);
    updatetable('spacefield', array('authstr'=>$_SGLOBAL['timestamp']."\t1\t".$idstring), array('uid'=>$uid));
    $query = $_SGLOBAL['db']->query('SELECT s.uid, s.groupid, s.username, s.flag, sf.email, sf.emailcheck FROM '.tname('space').' s LEFT JOIN '.tname('spacefield')." sf ON sf.uid=s.uid WHERE s.uid=$uid");
    $spaceinfo = $_SGLOBAL['db']->fetch_array($query);

} elseif(submitcheck('emailsubmit')) {
    if(empty($_POST['email'])){
        showmessage('邮箱不能为空');
    }

    $spaceinfo = array();
    $query = $_SGLOBAL['db']->query('SELECT s.uid, s.groupid, s.username, s.flag, sf.email, sf.emailcheck FROM '.tname('space').' s LEFT JOIN '.tname('spacefield')." sf ON sf.uid=s.uid WHERE sf.email='$_POST[email]'");
    $spaceinfo = $_SGLOBAL['db']->fetch_array($query);
    if(empty($spaceinfo)) {
        showmessage('该邮箱账号没有在本站注册！');
    }

    //创始人、管理员不允许找回密码
    $founderarr = explode(',', $_SC['founder']);
    if($spaceinfo['flag'] || in_array($spaceinfo['uid'], $founderarr) || checkperm('admin')) {
        showmessage('getpasswd_account_invalid');
    }

    $idstring = random(6);
    $reseturl = getsiteurl().'do.php?ac=lostpasswd&amp;op=reset&amp;uid='.$spaceinfo['uid'].'&amp;id='.$idstring;
    updatetable('spacefield', array('authstr'=>$_SGLOBAL['timestamp']."\t1\t".$idstring), array('uid'=>$spaceinfo['uid']));
    $mail_subject = cplang('get_passwd_subject');
    $mail_message = cplang('get_passwd_message', array($reseturl));

    include_once(S_ROOT.'./source/function_cp.php');
    smail(0, $spaceinfo['email'], $mail_subject, $mail_message);

    showmessage('getpasswd_send_succeed', 'do.php?ac='.$_SCONFIG['login_action'], 3);
    //showmessage($reseturl, 'do.php?ac='.$_SCONFIG['login_action'], 3);

} elseif(submitcheck('resetsubmit')) {

    $uid = empty($_POST['uid'])?0:intval($_POST['uid']);
    $id = empty($_POST['id'])?0:trim($_POST['id']);
    if($_POST['newpasswd1'] != $_POST['newpasswd2']) {
        showmessage('password_inconsistency');
    }
    if($_POST['newpasswd1'] != addslashes($_POST['newpasswd1'])) {
        showmessage('profile_passwd_illegal');
    }

    $query = $_SGLOBAL['db']->query('SELECT s.uid, s.username, s.groupid, s.flag, sf.email, sf.authstr FROM '.tname('space').' s, '.tname('spacefield')." sf WHERE s.uid='$uid' AND sf.uid=s.uid");
    $space = $_SGLOBAL['db']->fetch_array($query);
    checkuser($id, $space);

    //验证是否受保护、创始人、有站点设置权限的人禁止找回密码方式修改密码
    $founderarr = explode(',', $_SC['founder']);
    if($space['flag'] || in_array($space['uid'], $founderarr) || checkperm('admin')) {
        showmessage('reset_passwd_account_invalid');
    }

    if(!@include_once S_ROOT.'./uc_client/client.php') {
        showmessage('system_error');
    }
    if(uc_user_edit(addslashes($space['username']), $_POST['newpasswd1'], $_POST['newpasswd1'], $space['email'], 1)>0) {
        updatetable('spacefield', array('authstr'=>''), array('uid'=>$uid));
    }
    showmessage('修改密码成功，请用新密码登录，谢谢！','space.php?do=home',2);
}

if($op == 'reset') {
    $query = $_SGLOBAL['db']->query('SELECT s.username, sf.email, sf.authstr FROM '.tname('space').' s, '.tname('spacefield')." sf WHERE s.uid='$_GET[uid]' AND sf.uid=s.uid");
    $space = $_SGLOBAL['db']->fetch_array($query);
    checkuser($_GET['id'], $space);
}

include template('do_lostpasswd');

//验证地址地否有效
function checkuser($id, $space) {
    global $_SGLOBAL;
    if(empty($space)) {
        showmessage('user_does_not_exist');
    }
    list($dateline, $operation, $idstring) = explode("\t", $space['authstr']);
    if($dateline < $_SGLOBAL['timestamp'] - 86400 * 3 || $operation != 1 || $idstring != $id) {
        showmessage('getpasswd_illegal');
    }
}

?>
