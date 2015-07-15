<?php


if(!defined('iBUAA')) {
	exit('Access Denied');
}

include_once(S_ROOT.'./source/function_cp.php');



$utype = $_GET['utype'];
$touid = $_GET['touid'];
$uid = $_SGLOBAL['supe_uid'];
$username = null;

if($utype==1){
	$query = $_SGLOBAL['db']->query("SELECT uid,username,email FROM ".tname('publicapply')." WHERE ruthed=1 and appuid=$uid AND uid=$touid");
	if($value = $_SGLOBAL['db']->fetch_array($query)){
		$username = $value['username'];
		$uid = $value['uid'];
		$passport = $value;
	}
} else {
    include_once(S_ROOT.'./uc_client/client.php');
    $ucsynlogout = uc_user_synlogout();
    showmessage('change_login_user', 'cp.php?ac=common&op=logout&uhash='.$_SGLOBAL['uhash'], 1, array($ucsynlogout));
	$query = $_SGLOBAL['db']->query("SELECT m.uid as uid,m.username as username,m.email as email FROM ihome_publicapply p JOIN ihomeuser_members m ON  p.ruthed=1 and p.appuid=$touid AND p.uid=$uid AND p.appuid=m.uid");
	if($value = $_SGLOBAL['db']->fetch_array($query)){
		$username = $value['username'];
		$uid = $value['uid'];
		$passport = $value;
	}
}


if($_GET['uhash'] == $_SGLOBAL['uhash'] && $username) {
	//ɾ��session
	//�˳���ǰ�ʺ�
	if($_SGLOBAL['supe_uid']) {
		$_SGLOBAL['db']->query("DELETE FROM ".tname('session')." WHERE uid='$_SGLOBAL[supe_uid]'");
		$_SGLOBAL['db']->query("DELETE FROM ".tname('adminsession')." WHERE uid='$_SGLOBAL[supe_uid]'");//����ƽ̨
	}
	if($_SCONFIG['uc_status']) {
		include_once S_ROOT.'./uc_client/client.php';
		$ucsynlogout = uc_user_synlogout();
	} else {
		$ucsynlogout = '';
	}

	clearcookie();
	ssetcookie('_refer', '');
	
//=====================================================	
	//���¿�ʼ��¼�����ʺ�
	$membername = $username;
	$cookiecheck = '';
	
	$setarr = array(
		'uid' => $passport['uid'],
		'username' => addslashes($passport['username']),
		'password' => md5("$passport[uid]|$_SGLOBAL[timestamp]")//���������������
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
	    showmessage('login_success', $app?"userapp.php?id=$app":$_POST['refer'], 0, array($ucsynlogin));
    }
}

$membername = empty($_SCOOKIE['loginuser'])?'':sstripslashes($_SCOOKIE['loginuser']);
$cookiecheck = ' checked';

include template('do_login');

?>
