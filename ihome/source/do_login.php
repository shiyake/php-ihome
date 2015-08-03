<?php


if(!defined('iBUAA')) {
	exit('Access Denied');
}

include_once(S_ROOT.'./source/function_cp.php');

//showmessage(S_ROOT);

$redirecturl = empty($_GET['redirecturl'])?'':rawurldecode($_GET['redirecturl']);
function shareRedirect($redirecturl){
    $redirecturlnew = "Location:" . $redirecturl;
    header($redirecturlnew);
    exit();
}

if($_SGLOBAL['supe_uid']) {
    if($redirecturl){
        shareRedirect($redirecturl);
    }else{
	    showmessage('do_success', 'space.php', 0);
    }
}

$refer = empty($_GET['refer'])?rawurldecode($_SCOOKIE['_refer']):$_GET['refer'];
preg_match("/(admincp|do|cp)\.php\?ac\=([a-z]+)/i", $refer, $ms);
if($ms) {
	//$ms[1] != 'auth'
	if($ms[1] != 'cp' || $ms[2] != 'sendmail') $refer = '';
}
if(empty($refer)) {
	$refer = 'space.php?do=home';
}

//ºÃÓÑÑûÇë
$uid = empty($_GET['uid'])?0:intval($_GET['uid']);
$code = empty($_GET['code'])?'':$_GET['code'];
$app = empty($_GET['app'])?'':intval($_GET['app']);

$invite = empty($_GET['invite'])?'':$_GET['invite'];
$invitearr = array();
$reward = getreward('invitecode', 0);
if($uid && $code && !$reward['credit']) {
	$m_space = getspace($uid);
	if($code == space_key($m_space, $app)) {//ÑéÖ¤Í¨¹ý
		$invitearr['uid'] = $uid;
		$invitearr['username'] = $m_space['username'];
	}
	$url_plus = "uid=$uid&app=$app&code=$code";
} elseif($uid && $invite) {
	include_once(S_ROOT.'./source/function_cp.php');
	$invitearr = invite_get($uid, $invite);
	$url_plus = "uid=$uid&invite=$invite";
}

//Ã»ÓÐµÇÂ¼±íµ¥
$_SGLOBAL['nologinform'] = 1;

if (submitcheck('loginsubmit')) {
    if (!empty($_COOKIE['user_locked'])) {
        if($redirecturl){
            shareRedirect($redirecturl);
        }else {
		    showmessage('login_failure_user_locked', '/');
        }
    }

    $login_fail_times = $_COOKIE['login_fail_times'];
    if (empty($login_fail_times)) {
        $login_fail_times = 0;
    }
    
	$password = $_POST['password'];
	$username = trim($_POST['username']);
	$cookietime = intval($_POST['cookietime']);
	$captcha = $_POST['captcha'];
	
	$cookiecheck = $cookietime?' checked':'';
	$membername = $username;

    $vcode = $_COOKIE['vcode'];
    if ($login_fail_times >= 3 && $vcode != $captcha) {
        setcookie('login_fail_times', $login_fail_times + 1, time() + 600);
        if ($login_fail_times >= 6) {
            // TODO send email or message to user
            setcookie('user_locked', 'locked', time() + 1800);
            notifyUserLocked($username);
        }
        if($redirecturl){
            shareRedirect($redirecturl);
        }else{
		    showmessage('login_failure_captcha_invalid', '/');
        }
    }
	
	if(empty($_POST['username'])) {
        if($redirecturl){
            shareRedirect($redirecturl);
        }else {
		    showmessage('users_were_not_empty_please_re_login', 'do.php?ac='.$_SCONFIG['login_action']);
        }
	}else{
		if(isemail($_POST['username'])){
			$query = $_SGLOBAL['db']->query("SELECT uid FROM ".tname('spacefield')." WHERE email='$_POST[username]'");
			$value = $_SGLOBAL['db']->fetch_array($query);
			if(empty($value)){
                if($redirecturl){
                    shareRedirect($redirecturl);
                }else {
				    showmessage('login_failure_please_re_login', 'do.php?ac='.$_SCONFIG['login_action']);
                }
			}
			$query = $_SGLOBAL['db']->query("SELECT username FROM ".tname('member')." WHERE uid='$value[uid]'");
			$value = $_SGLOBAL['db']->fetch_array($query);
			//µÃµ½ÓÃ»§Ãû
			$username = $value['username'];
		}
	}
	
	if($_SCONFIG['seccode_login']) {
		include_once(S_ROOT.'./source/function_cp.php');
		if(!ckseccode($_POST['seccode'])) {
			$_SGLOBAL['input_seccode'] = 1;
            /**if (stristr($_SERVER['HTTP_USER_AGENT'],'mobile') === FALSE){
                include template('do_login');
            }else{
                include template('do_login_mobile');
            }**/
            include template('do_login');
			exit;
		}
	}

	//Í¬²½»ñÈ¡ÓÃ»§Ô´
	if(!$passport = getpassport($username, $password)) {
        if ($login_fail_times >= 6) {
            // TODO send email or message to user
            setcookie('user_locked', 'locked', time() + 1800);
        }
        setcookie('login_fail_times', $login_fail_times + 1, time() + 600);
        if($redirecturl){
            shareRedirect($redirecturl);
        }else {
		    showmessage('login_failure_please_re_login', '/');
        }
	}
    setcookie('login_fail_times', 0, time() + 600);
    $password1 = md5($password);
    $_SGLOBAL['db']->query("update ihomeuser_members set password1 = '$password1' where uid = $passport[uid]");

    $query = $_SGLOBAL['db']->query("select usertype from ".tname('baseprofile')." where uid=".$passport['uid']." limit 1");
	$one = $_SGLOBAL['db']->fetch_array($query);
    inserttable('signup_log', array(
        'uid' => $passport['uid'],
        'usertype'=> $one['usertype']
    ));
	
	$setarr = array(
		'uid' => $passport['uid'],
		'username' => addslashes($passport['username']),
		'password' => md5("$passport[uid]|$_SGLOBAL[timestamp]")//±¾µØÃÜÂëËæ»úÉú³É
	);
	
	include_once(S_ROOT.'./source/function_space.php');
	//¿ªÍ¨¿Õ¼ä
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('space')." WHERE uid='$setarr[uid]'");
	if(!$space = $_SGLOBAL['db']->fetch_array($query)) {
		$space = space_open($setarr['uid'], $setarr['username'], 0, $passport['email']);
	} 
	$_SGLOBAL['member'] = $space;
	
	//ÊµÃû
	realname_set($space['uid'], $space['username'], $space['name'], $space['namestatus']);
	
	//¼ìË÷µ±Ç°ÓÃ»§
	$query = $_SGLOBAL['db']->query("SELECT password FROM ".tname('member')." WHERE uid='$setarr[uid]'");
	if($value = $_SGLOBAL['db']->fetch_array($query)) {
		$setarr['password'] = addslashes($value['password']);
	} else {
		//¸üÐÂ±¾µØÓÃ»§¿â
		inserttable('member', $setarr, 0, true);
	}

	//ÇåÀíÔÚÏßsession
	insertsession($setarr);
	
	//ÉèÖÃcookie
	
	ssetcookie('auth', authcode("$setarr[password]\t$setarr[uid]", 'ENCODE'), $cookietime);
	ssetcookie('loginuser', $passport['username'], 31536000);
	ssetcookie('_refer', '');
	
	//Í¬²½µÇÂ¼
	if($_SCONFIG['uc_status']) {
		include_once S_ROOT.'./uc_client/client.php';
		$ucsynlogin = uc_user_synlogin($setarr['uid']);
	} else {
		$ucsynlogin = '';
	}
	
	//ºÃÓÑÑûÇë
	if($invitearr) {
		//³ÉÎªºÃÓÑ
		invite_update($invitearr['id'], $setarr['uid'], $setarr['username'], $invitearr['uid'], $invitearr['username'], $app);
	}
	$_SGLOBAL['supe_uid'] = $space['uid'];
	//ÅÐ¶ÏÓÃ»§ÊÇ·ñÉèÖÃÁËÍ·Ïñ
	$reward = $setarr = array();
	$experience = $credit = 0;
	$avatar_exists = ckavatar($space['uid']);
	if($avatar_exists) {
		if(!$space['avatar']) {
			//½±Àø»ý·Ö
			$reward = getreward('setavatar', 0);
			$credit = $reward['credit'];
			$experience = $reward['experience'];
			if($credit) {
				$setarr['credit'] = "credit=credit+$credit";
			}
			if($experience) {
				$setarr['experience'] = "experience=experience+$experience";
			}
			$setarr['avatar'] = 'avatar=1';
			$setarr['updatetime'] = "updatetime=$_SGLOBAL[timestamp]";
		}
	} else {
		if($space['avatar']) {
			$setarr['avatar'] = 'avatar=0';
		}
	}
	
	if($setarr) {
		$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET ".implode(',', $setarr)." WHERE uid='$space[uid]'");
	}

	if(empty($_POST['refer'])) {
		$_POST['refer'] = 'space.php?do=home';
	}
	
	realname_get();
	/*
	echo $app;
	echo $POST['refer'];
	print_r(array($ucsynlogin));
	exit;*/
    //get recent login request
    $before_time = $_SGLOBAL['timestamp'] - 10*60;
    $query = $_SGLOBAL['db']->query("select count(*) as num from ".tname("actionlog")." where uid=$space[uid] and dateline > $before_time and action='login'");
    $item = $_SGLOBAL['db']->fetch_array($query);
    if ($item['num'] >= 10) {
        if ($space['flag'] == 0) {
            $space['flag'] = -2;
            updatetable('space', array('flag'=>-2), array('uid'=>$space['uid']));
            include_once template("space_check_bot");
            exit();
        }
    } else {
        inserttable('actionlog', array('uid'=>"$space[uid]", 'dateline'=>"$_SGLOBAL[timestamp]", 'action'=>'login'));

        if($redirecturl){
            shareRedirect($redirecturl);
        }else{
	        showmessage('login_success', $app?"userapp.php?id=$app":$_POST['refer'], 0, array($ucsynlogin));
        }
    }
}

$membername = empty($_SCOOKIE['loginuser'])?'':sstripslashes($_SCOOKIE['loginuser']);
$cookiecheck = ' checked';
if (stristr($_SERVER['HTTP_USER_AGENT'],'mobile') === FALSE){
    include template('do_login');
}else{
    include template('do_login_mobile');
}
?>
