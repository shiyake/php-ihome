<?


include_once('./common.php');
include_once(S_ROOT.'./source/function_cp.php');


$password = $_POST['password'];
$username = trim($_POST['username']);
$membername = $username;


/*
echo $password;
echo "<br />";
echo $username;
exit;
*/


if(empty($_POST['username'])) {
	showmessage('users_were_not_empty_please_re_login', 'do.php?ac='.$_SCONFIG['login_action']);
}else{
	if(isemail($_POST['username'])){
		$query = $_SGLOBAL['db']->query("SELECT uid FROM ".tname('spacefield')." WHERE email='$_POST[username]'");
		$value = $_SGLOBAL['db']->fetch_array($query);
		if(empty($value)){
			showmessage('login_failure_please_re_login', 'do.php?ac='.$_SCONFIG['login_action']);
		}
		$query = $_SGLOBAL['db']->query("SELECT username FROM ".tname('member')." WHERE uid='$value[uid]'");
		$value = $_SGLOBAL['db']->fetch_array($query);
		//�õ��û���
		$username = $value['username'];
	}
}

//ͬ����ȡ�û�Դ
if(!$passport = getpassport($username, $password)) {
	showmessage('login_failure_please_re_login', 'do.php?ac='.$_SCONFIG['login_action']);
}

$setarr = array(
	'uid' => $passport['uid'],
	'username' => addslashes($passport['username']),
	'password' => md5("$passport[uid]|$_SGLOBAL[timestamp]")//���������������
);

///echo $passport['uid'];
//exit('ee');
include_once(S_ROOT.'./source/function_space.php');
//��ͨ�ռ�
$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('space')." WHERE uid='$setarr[uid]'");
if(!$space = $_SGLOBAL['db']->fetch_array($query)) {
	$space = space_open($setarr['uid'], $setarr['username'], 0, $passport['email']);
}

$_SGLOBAL['member'] = $space;

//print_r($space);
//exit();
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
	
//ͬ����¼
if($_SCONFIG['uc_status']) {
	include_once S_ROOT.'./uc_client/client.php';
	$ucsynlogin = uc_user_synlogin($setarr['uid']);
} else {
	$ucsynlogin = '';
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

realname_get();

setcookie('username',$username,time()+7200);
setcookie('uid',$_SGLOBAL[supe_uid],time()+7200);
showmessage('login_success', './plugin/wallwap/source/towall.php', 0);


?>