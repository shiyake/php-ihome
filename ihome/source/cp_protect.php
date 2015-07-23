<?php

if (!defined('iBUAA')) {
	exit('Access Denied');
}

if (!in_array($_GET['op'], array('mobile', 'question', 'email'))) {
	$_GET['op'] = 'mobile';
}
if (!in_array($_GET['m'], array('first', 'confirm', 'result'))) {
    $_GET['m'] = 'first';
}

$theurl = "cp.php?ac=protect&op=$_GET[op]";

$query = $_SGLOBAL['db']->query("select * from ".tname('protect_info')." where uid = $_SGLOBAL[supe_uid]");
$protect_info = $_SGLOBAL['db']->fetch_array($query);
$query = $_SGLOBAL['db']->query("select * from ".tname("spacefield")." where uid = $_SGLOBAL[supe_uid]");
$space_field = $_SGLOBAL['db']->fetch_array($query);
$first_time = empty($protect_info);
if ($first_time) {
    $protect_info['uid'] = $_SGLOBAL['supe_uid'];
    inserttable('protect_info', $protect_info);
}
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

if (strlen($protect_info['question1']) > 0) {
    $selected['question1'][$protect_info['question1']] = ' selected';
    $selected['question2'][$protect_info['question2']] = ' selected';
    $selected['question3'][$protect_info['question3']] = ' selected';
} else {
    $selected = array();
}
$cat_actives = array($_GET['op'] => ' class="active"');
if ($_GET['op'] == 'question') {
    if (submitcheck('checkagain')) {
        //验证密码
        if(!$passport = getpassport($_SGLOBAL['supe_username'], $_POST['password'])) {
            showmessage('密码错误！', 'cp.php?ac=protect&op=question');
        }
        if (empty($protect_info)) {
            $protect_info['uid'] = $_SGLOBAL['supe_uid'];
        }
        if (empty($_POST['answer1']) or empty($_POST['answer2']) or empty($_POST['answer3'])) {
            showmessage('3个密保问题均为必填！');
            
        }
        if ($_POST['question1'] == $_POST['question2'] or $_POST['question2'] == $_POST['question3'] or $_POST['question1'] == $_POST['question3']) {
            showmessage('密保问题不能相同！');
        }

        $protect_info['question1_1'] = $_POST['question1'];
        $protect_info['question2_1'] = $_POST['question2'];
        $protect_info['question3_1'] = $_POST['question3'];
        $protect_info['answer1_1'] = $_POST['answer1'];
        $protect_info['answer2_1'] = $_POST['answer2'];
        $protect_info['answer3_1'] = $_POST['answer3'];
        if ($first_time) {
            $protect_info['uid'] = $_SGLOBAL['supe_uid'];
            inserttable('protect_info', $protect_info);
        } else {
            updatetable('protect_info', $protect_info, array('uid'=>$_SGLOBAL['supe_uid']));
        }
    } elseif (submitcheck('submit_question')) {
        if ($_POST['answer1'] == $protect_info['answer1_1'] and $_POST['answer2'] == $protect_info['answer2_1'] and $_POST['answer3'] == $protect_info['answer3_1']) {
            $protect_info['question1'] = $protect_info['question1_1'];
            $protect_info['question2'] = $protect_info['question2_1'];
            $protect_info['question3'] = $protect_info['question3_1'];
            $protect_info['answer1'] = $protect_info['answer1_1'];
            $protect_info['answer2'] = $protect_info['answer2_1'];
            $protect_info['answer3'] = $protect_info['answer3_1'];
            updatetable('protect_info', $protect_info, array('uid'=>$_SGLOBAL['supe_uid']));
            showmessage('成功设置密保问题！', 'cp.php?ac=protect&op=question');
        }
        else {
            showmessage('密保答案错误！', 'cp.php?ac=protect&op=question');
        }
    }
} elseif ($_GET['op'] == 'mobile') {
    $send_interval = 60*2;
    if (!empty($_GET['get_code'])) {
        if ($protect_info['mobile_send_time'] + $send_interval > $_SGLOBAL['timestamp']) {
            showmessage("发送太快！", 'cp.php?ac=protect&op=mobile');
	}else{
            if (!ismobile($_GET['mobile'])) {
	        showmessage('手机号码不正确！', 'cp.php?ac=protect&op=mobile');
	    }else{
                $protect_info['mobile_send_time'] = $_SGLOBAL['timestamp'];
                $verifycode = rand(100000,999999);
                $protect_info['mobile_code'] = $verifycode;
                $protect_info['mobile_1'] = $_GET['mobile'];
                $content = "您在i北航（i.buaa.edu.cn）的手机密保验证码为".$verifycode."请及时输入验证码完成手机密保设置！";
		if(sendsms($_GET['mobile'], '验证码', $content)) {
                    if ($first_time) {
                        $protect_info['uid'] = $_SGLOBAL['supe_uid'];
                        inserttable('protect_info', $protect_info);
                    } else {
                        updatetable('protect_info', $protect_info, array('uid'=>$_SGLOBAL['supe_uid']));
                    }

                    showmessage("成功发送！", "cp.php?ac=protect&op=mobile");
                }
                
	        showmesage('发送失败！', "cp.php?ac=protect&op=mobile");
        }
    }
    } elseif (submitcheck('submit_mobile')) {
        //验证密码
        if(!$passport = getpassport($_SGLOBAL['supe_username'], $_POST['password'])) {
            showmessage('密码错误！', 'cp.php?ac=protect&op=mobile');
        }
        //验证密保问题
        if($_POST['question_mobile'] == NULL or $_POST['answer_mobile'] == NULL){
            showmessage('密保问题或答案未填写！', 'cp.php?ac=protect&op=mobile');
        }
        if($protect_info["answer{$_POST['question_mobile']}"] != $_POST['answer_mobile'])
            showmessage('密保答案错误', 'cp.php?ac=protect&op=mobile');

        if ($protect_info['mobile_1'] != $_POST['mobile_num']) {
            showmessage("输入的手机号码不能与已绑定的手机号码相同！", "cp.php?ac=protect&op=mobile");
        }
        if ($_POST['mobile_code'] != $protect_info['mobile_code'] or $protect_info['mobile_code'] < 100000) {
            showmessage("验证码错误！", "cp.php?ac=protect&op=mobile");
        }
        $protect_info['mobile_code'] = 0;
        $protect_info['mobile'] = $protect_info['mobile_1'];
            
        updatetable('protect_info', $protect_info, array('uid'=>$_SGLOBAL['supe_uid']));
        showmessage('成功设置手机绑定！', 'cp.php?ac=protect&op=mobile');
    } elseif (!empty($protect_info) and $protect_info['mobile_send_time'] + $send_interval > $_SGLOBAL['timestamp']) {
        $left_seconds = $protect_info['mobile_send_time']+$send_interval-$_SGLOBAL['timestamp'];
    } else {
        $left_seconds = 0;
    }
} elseif ($_GET['op'] == 'email') {
    if (submitcheck("submit_email")) {
        //验证密码
        if(!$passport = getpassport($_SGLOBAL['supe_username'], $_POST['password'])) {
            showmessage('密码错误！', 'cp.php?ac=protect&op=email');
        }
        //验证密保问题
        if($_POST['question_email'] == NULL or $_POST['answer_email'] == NULL){
            showmessage('密保问题或答案未填写！', 'cp.php?ac=protect&op=email');
        }
        if($protect_info["answer{$_POST['question_email']}"] != $_POST['answer_email'])
            showmessage('密保答案错误', 'cp.php?ac=protect&op=email');

        if ($_POST['email'] != $_POST['email_1']) {
            showmessage('验证邮箱有误！', 'cp.php?ac=protect&op=email');
        }
        if (!isemail($_POST['email'])) {
            showmessage('邮箱错误！', 'cp.php?ac=protect&op=email');
        }
        //检查邮箱唯一性
        if($_SCONFIG['uniqueemail']) {
            if(getcount('spacefield', array('email'=>$_POST['email'], 'emailcheck'=>1))) {
                showmessage('uniqueemail_check');
            }
        }
        $setarr = array();
        if ($space_field['emailcheck']) {
            $setarr['newemail'] = $_POST['email'];
        } else {
            $setarr['email'] = $_POST['email'];
        }
        updatetable('spacefield', $setarr, array('uid'=>$_SGLOBAL['supe_uid']));
        $url = emailcheck_send($_SGLOBAL['supe_uid'], $_POST['email']);

        showmessage('protect_email_send', 'cp.php?ac=protect&op=email', 10, array($_POST['email']));
    } 
}

include template("cp_protect");
?>
