<?php


include_once('./../../../common.php');
include_once(S_ROOT.'./source/function_cp.php');


if($_SGLOBAL['supe_uid']) {
	showmessage('do_success', "../../app/wall/index.php", 0);
}

$refer = empty($_GET['refer'])?rawurldecode($_SCOOKIE['_refer']):$_GET['refer'];

if(empty($refer)) {
	$refer = 'mobile.php?appid=wall&ac=track';
}

$time = time()+7200;


if(submitcheck('lostpassword')) {


	$birthday = $_POST['birthday'];
	$realname = trim($_POST['realname']);
	$cookietime = intval($_POST['cookietime']);
	$email = $_POST['email'];

	
	$cookiecheck = $cookietime?' checked':'';
	$membername = $username;
	
	if(empty($realname) || empty($birthday) || empty($email)) {
		showmessage('users_were_not_empty_please_re_login_1', './login.php', 0);
	}else{
		$query = $_SGLOBAL['db']->query("SELECT uid FROM ".tname('spacefield')." WHERE email='$email' AND realname='$realname' AND realbirth='$birthday' ");
		$value = $_SGLOBAL['db']->fetch_array($query);
		if(empty($value)){
			showmessage('users_were_not_empty_please_re_login_2', './login.php', 0);
		}
		$uid  = $value[uid];
		$query = $_SGLOBAL['db']->query("SELECT username FROM ".tname('member')." WHERE uid='$uid' ");
		$value = $_SGLOBAL['db']->fetch_array($query);
		$username  = $value[username];

	}

	
	$setarr = array(
		'uid' => $uid,
		'username' => addslashes($username),
		'password' => md5("$uid|$_SGLOBAL[timestamp]")//���������������
	);
	
	include_once(S_ROOT.'./source/function_space.php');
	//��ͨ�ռ�
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('space')." WHERE uid='$setarr[uid]'");
	if(!$space = $_SGLOBAL['db']->fetch_array($query)) {
		$space = space_open($setarr['uid'], $setarr['username'], 0, $passport['email']);
	}
	
	$_SGLOBAL['member'] = $space;
	
	//ʵ��
	realname_set($space['uid'], $space['username'], $space['name'], $space['namestatus']);
	
	//������ǰ�û�
	$query = $_SGLOBAL['db']->query("SELECT password FROM ".tname('member')." WHERE uid='$setarr[uid]'");
	if($value = $_SGLOBAL['db']->fetch_array($query)) {
		$setarr['password'] = addslashes($value['password']);
	} else {
		//���±����û���
		inserttable('member', $setarr, 0, true);
	}

	//��������session
	insertsession($setarr);
	
	//����cookie
	
	ssetcookie('auth', authcode("$setarr[password]\t$setarr[uid]", 'ENCODE'), $cookietime);
	ssetcookie('loginuser', $passport['username'], 31536000);
	ssetcookie('_refer', '');
	
	//ͬ����¼
	if($_SCONFIG['uc_status']) {
		include_once S_ROOT.'./uc_client/client.php';
		$ucsynlogin = uc_user_synlogin($setarr['uid']);
	} else {
		$ucsynlogin = '';
	}
	
	//��������
	if($invitearr) {
		//��Ϊ����
		invite_update($invitearr['id'], $setarr['uid'], $setarr['username'], $invitearr['uid'], $invitearr['username'], $app);
	}
	$_SGLOBAL['supe_uid'] = $space['uid'];
	//�ж��û��Ƿ�������ͷ��
	$reward = $setarr = array();
	$experience = $credit = 0;
	$avatar_exists = ckavatar($space['uid']);
	if($avatar_exists) {
		if(!$space['avatar']) {
			//��������
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
	showmessage('login_success', $app?"userapp.php?id=$app":$_POST['refer'], 0, array($ucsynlogin));
}

$membername = empty($_SCOOKIE['loginuser'])?'':sstripslashes($_SCOOKIE['loginuser']);
$cookiecheck = 'checked';

include_once template('./mobile/template/default/lostpassword');

?>
