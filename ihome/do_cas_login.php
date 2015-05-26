<?php
	include_once('./source/CAS.php');
	include_once('./common.php');

	include_once('./source/function_cp.php');
	
	include_once('./source/function_judge.php');
	
	//////////////
	$client_ip=$_SERVER["REMOTE_ADDR"];
	if(!judge_ip($client_ip))
	{
		showmessage("外网无法访问校园统一认证平台","./index.php");
		
	}
	
	phpCAS::setDebug();
	$_cas_server_version=CAS_VERSION_2_0;
	$_hostname='sso.buaa.edu.cn';
	$_hostport=443;
	$_uri='';
	//initialize phpCAS
	phpCAS::client($_cas_server_version,$_hostname,$_hostport,$_uri);
	//no SSL validation for the CAS server
	phpCAS::setNoCasServerValidation();
	//force CAS authentication
	phpCAS::forceAuthentication();
	
	//showmessage("cas halt");
	if(isset($_REQUEST['logout']))
	{
		phpCAS::logout();
	}
	
	//获取学号或者教职工的教工号
	///////////////
	//////////////////////
	$auth1 = phpCAS::checkAuthentication();
									
	if($auth1){
		$cas=phpCAS::getUser();
		$username=phpCAS::getAttribute("employeeNumber");
	}
	
	//showmessage($username);
	//showmessage('rfddffd');
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('baseprofile')." WHERE collegeid='$username'");
	
	$userid='';
	while($value=$_SGLOBAL['db']->fetch_array($query))
	{
		$userid=$value['uid'];
		break;
	}
	
	//如果从member表里查不到从CAS得到的用户数据，则提醒用户去激活
	if($userid==NULL||$userid=='')
	{
		showmessage("您还没有在ihome上激活该账号，请激活",'do.php?ac='.$_CONFIG['activate_action']);
	}
	//$password="000000";
	
	//$userid=$value['uid'];
	
	//echo $userid;
	
	
	$refer = empty($_GET['refer'])?rawurldecode($_SCOOKIE['_refer']):$_GET['refer'];
	preg_match("/(admincp|do|cp)\.php\?ac\=([a-z]+)/i", $refer, $ms);
	if($ms) {
		if($ms[1] != 'cp' || $ms[2] != 'sendmail') $refer = '';
	}
	if(empty($refer)) {
		$refer = 'space.php?do=home';
	}

//好友邀请
$uid = empty($_GET['uid'])?0:intval($_GET['uid']);
$code = empty($_GET['code'])?'':$_GET['code'];
$app = empty($_GET['app'])?'':intval($_GET['app']);

$invite = empty($_GET['invite'])?'':$_GET['invite'];
$invitearr = array();
$reward = getreward('invitecode', 0);
if($uid && $code && !$reward['credit']) {
	$m_space = getspace($uid);
	if($code == space_key($m_space, $app)) {//验证通过
		$invitearr['uid'] = $uid;
		$invitearr['username'] = $m_space['username'];
	}
	$url_plus = "uid=$uid&app=$app&code=$code";
} elseif($uid && $invite) {
	include_once(S_ROOT.'./source/function_cp.php');
	$invitearr = invite_get($uid, $invite);
	$url_plus = "uid=$uid&invite=$invite";
}

//没有登录表单
$_SGLOBAL['nologinform'] = 1;

if(true) {

	//$password = $_POST['password'];
	//$username = trim($_POST['username']);
	//$cookietime = intval($_POST['cookietime']);
	
	$cookiecheck = ' checked';
	$membername = $username;
	
	if(empty($username)) {
		showmessage('users_were_not_empty_please_re_login', 'do.php?ac='.$_SCONFIG['login_action']);
	}
	
	if($_SCONFIG['seccode_login']) {
		include_once(S_ROOT.'./source/function_cp.php');
		if(!ckseccode($_POST['seccode'])) {
			$_SGLOBAL['input_seccode'] = 1;
			include template('do_login');
			exit;
		}
	}
	
	$setarr = array(
		'uid' => $userid,
		'username' => addslashes($username),
		'password' => md5("$userid|$_SGLOBAL[timestamp]")//本地密码随机生成
	);
	
	include_once(S_ROOT.'./source/function_space.php');
	//开通空间
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('space')." WHERE uid='$setarr[uid]'");
	if(!$space = $_SGLOBAL['db']->fetch_array($query)) {
		//$space = space_open($setarr['uid'], $setarr['username'], 0, $passport['email']);
		$space = space_open($setarr['uid'], $setarr['username'], 0);
	}
	
	$_SGLOBAL['member'] = $space;
	
	//实名
	realname_set($space['uid'], $space['username'], $space['name'], $space['namestatus']);
	
	//检索当前用户
	$query = $_SGLOBAL['db']->query("SELECT password FROM ".tname('member')." WHERE uid='$setarr[uid]'");
	if($value = $_SGLOBAL['db']->fetch_array($query)) {
		$setarr['password'] = addslashes($value['password']);
	} else {
		//更新本地用户库
		inserttable('member', $setarr, 0, true);
	}

	//清理在线session
	//insertsession($setarr);
	
	//设置cookie
	
	ssetcookie('auth', authcode("$setarr[password]\t$setarr[uid]", 'ENCODE'), $cookietime);
	ssetcookie('loginuser', $username, 31536000);
	ssetcookie('_refer', '');
	setcookie('PHPSESSID',"",time()-3600);
	
	//同步登录
	if($_SCONFIG['uc_status']) {
		include_once S_ROOT.'./uc_client/client.php';
		$ucsynlogin = uc_user_synlogin($setarr['uid']);
	} else {
		$ucsynlogin = '';
	}
	
	//好友邀请
	if($invitearr) {
		//成为好友
		invite_update($invitearr['id'], $setarr['uid'], $setarr['username'], $invitearr['uid'], $invitearr['username'], $app);
	}
	/////////////////////////////////////
	print_r($space);
	$_SGLOBAL['supe_uid'] = $space['uid'];
	//判断用户是否设置了头像
	$reward = $setarr = array();
	$experience = $credit = 0;
	$avatar_exists = ckavatar($space['uid']);
	if($avatar_exists) {
		if(!$space['avatar']) {
			//奖励积分
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
	///////////////////////////////////////
	echo $_SGLOBAL['supe_uid'];
	//exit;
	
	showmessage('login_success', $app?"userapp.php?id=$app":$_POST['refer'], 0, array($ucsynlogin));
}

//$membername = empty($_SCOOKIE['loginuser'])?'':sstripslashes($_SCOOKIE['loginuser']);
$membername=$username;
$cookiecheck = ' checked';

include template('do_login');
?>
