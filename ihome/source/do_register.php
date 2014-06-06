<?php
if(!defined('iBUAA')) {
	exit('Access Denied');
}
$op = $_GET['op'] ? trim($_GET['op']) : '';
if($_SGLOBAL['supe_uid']) {
	showmessage('do_success', 'space.php', 0);
}
$_SGLOBAL['nologinform'] = 1;
$uid = empty($_GET['uid'])?0:intval($_GET['uid']);
$code = empty($_GET['code'])?'':$_GET['code'];
$app = empty($_GET['app'])?'':intval($_GET['app']);
$invite = empty($_GET['uid'])?'':$_GET['uid'];
$invitearr = array();
$invitepay = getreward('invitecode', 0);
if($uid && $code ) {
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

$jumpurl = $app?"userapp.php?id=$app&my_extra=invitedby_bi_{$uid}_{$code}&my_suffix=Lw%3D%3D":'space.php';
$space = getspace($_GET['uid']);
$arr_classfriend=array();
$usertype='';
$sub='';
if(empty($op)) {
	if($_SCONFIG['closeregister']) {
		if($_SCONFIG['closeinvite']) {
			showmessage('not_open_registration');
		} elseif(empty($invitearr)) {
			showmessage('not_open_registration_invite');
		}
	}

	checkclose();
	if(submitcheck("registersubmit")) { 
		//ÒÑ¾­×¢²áÓÃ»§
		if($_SGLOBAL['supe_uid']) {
			showmessage('registered', 'space.php');
		}
		if($_SCONFIG['seccode_register']) {
			include_once(S_ROOT.'./source/function_cp.php');
			if(!ckseccode($_POST['seccode'])) {
				showmessage('incorrect_code');
			}
		}

		if(!@include_once S_ROOT.'./uc_client/client.php') {
			showmessage('system_error');
		}

		if($_POST['password'] != $_POST['password2']) {
			showmessage('password_inconsistency');
		}

		if(!$_POST['password'] || $_POST['password'] != addslashes($_POST['password'])) {
			showmessage('profile_passwd_illegal');
		}

		$username = trim($_POST['username']);
		$password = $_POST['password'];
		//	showmessage($username);	
		$email = isemail($_POST['email'])?$_POST['email']:'';
		if(empty($email)) {
			showmessage('email_format_is_wrong');
		}
		if($_SCONFIG['checkemail']) {
			if($count = getcount('spacefield', array('email'=>$email))) {
				showmessage('email_has_been_registered');
			}
		}
		$onlineip = getonlineip();
		if($_SCONFIG['regipdate']) {
			$query = $_SGLOBAL['db']->query("SELECT dateline FROM ".tname('space')." WHERE regip='$onlineip' ORDER BY dateline DESC LIMIT 1");
			if($value = $_SGLOBAL['db']->fetch_array($query)) {
				if($_SGLOBAL['timestamp'] - $value['dateline'] < $_SCONFIG['regipdate']*3600) {
					showmessage('regip_has_been_registered', '', 1, array($_SCONFIG['regipdate']));
				}
			}
		}
		$newuid = uc_user_register($username, $password, $email);
		if($newuid <= 0) {
			if($newuid == -1) {
				showmessage('user_name_is_not_legitimate');
			} elseif($newuid == -2) {
				showmessage('include_not_registered_words');
			} elseif($newuid == -3) {
				showmessage('user_name_already_exists');
			} elseif($newuid == -4) {
				showmessage('email_format_is_wrong');
			} elseif($newuid == -5) {
				showmessage('email_not_registered');
			} elseif($newuid == -6) {
				showmessage('email_has_been_registered');
			} else {
				showmessage('register_error');
			}
		} else {
			//检查uid是否在ucenter里面，如果不在，就采取野蛮方式插入新纪录
			$q = $_SGLOBAL['db']->query("SELECT uid FROM ihomeuser_members WHERE uid='$newuid'");
			$members_match = $_SGLOBAL['db']->fetch_array($q);
			$members_match = $members_match['uid'];
			$q = $_SGLOBAL['db']->query("SELECT uid FROM ihomeuser_memberfields WHERE uid='$newuid'");
			$memberfields_match = $_SGLOBAL['db']->fetch_array($q);
			$memberfields_match = $memberfields_match['uid'];
			if(!$members_match && !$memberfields_match)
            {
                    $salt = substr(uniqid(rand()), -6);
                    $hhpassword = md5(md5($password).$salt);
                    $sqladd = "uid='".intval($newuid)."',";
                    $sqladd .= " secques='',";
                    $_SGLOBAL['db']->query("INSERT INTO ihomeuser_members SET $sqladd username='$username', password='$hhpassword', email='$email', regip='".$_SERVER["HTTP_X_FORWARDED_FOR"]."', regdate='".time()."', salt='$salt'");
                    $_SGLOBAL['db']->query("INSERT INTO ihomeuser_memberfields SET uid='$newuid'");
            }
			$setarr = array(
				'uid' => $newuid,
				'username' => $username,
				'password' => md5("$newuid|$_SGLOBAL[timestamp]")//±¾µØÃÜÂëËæ»úÉú³É
			);
			inserttable('member', $setarr, 0, true);
			//add action log
			inserttable('actionlog', array('uid'=>"$newuid", 'dateline'=>"$_SGLOBAL[timestamp]", 'action'=>'register', 'value'=>'invite'));
			$setarrfri = array(
				'uid' => $newuid,
				'fuid' => $space['uid'],
				'fusername' => addslashes($space['username']),
				'gid' => 0,
				'note' => '',
				'dateline' => $_SGLOBAL['timestamp']
			);
			inserttable('friend', $setarrfri);
			friend_update($space['uid'], $space['username'], $newuid, $username, 'add', 0);
			notification_add($newuid, 'friend', cplang('note_friend_add'));
			$profile_uid=$_POST['profile_uid'];	
			$_SGLOBAL['db']->query("UPDATE ".tname('baseprofile')." SET isactive=1,uid={$newuid} WHERE userid=".$profile_uid);
			$query=$_SGLOBAL['db']->query("SELECT * FROM ".tname('baseprofile')." WHERE userid=".$profile_uid);
			$row=$_SGLOBAL['db']->fetch_array($query);
			if(!strcmp($row['usertype'],"学生"))
			{
				$sub=$row['collegeid'];
				$sub=substr($sub,0,strlen($sub)-2);
				$query1=$_SGLOBAL['db']->query("SELECT ".tname('baseprofile').".uid as uid,".tname('space').".username as username FROM ".tname('baseprofile').",".tname('space')." WHERE ".tname('baseprofile').".uid=".tname('space').".uid AND ".tname('baseprofile').".collegeid LIKE '".$sub."%'");
				while($row1=$_SGLOBAL['db']->fetch_array($query1)){
					$setarrfri = array(
						'uid' => $newuid,
						'fuid' => $row1['uid'],
						'fusername' => addslashes($row1['username']),
						'gid' => 0,
						'note' => '',
						'dateline' => $_SGLOBAL['timestamp']
					);
					inserttable('friend', $setarrfri);
					friend_update($row1['uid'], $row1['username'], $newuid, $username, 'add', 0);
					notification_add($row1['uid'], 'friend', cplang('note_friend_add'));
				}
			}
			
			include_once(S_ROOT.'./source/function_space.php');
			$space = space_open($newuid, $username, 0, $email);

			$flog = $inserts = $fuids = $pokes = array();
			if(!empty($_SCONFIG['defaultfusername'])) {
				$query = $_SGLOBAL['db']->query("SELECT uid,username FROM ".tname('space')." WHERE username IN (".simplode(explode(',', $_SCONFIG['defaultfusername'])).")");
				while ($value = $_SGLOBAL['db']->fetch_array($query)) {
					$value = saddslashes($value);
					$fuids[] = $value['uid'];
					$inserts[] = "('$newuid','$value[uid]','$value[username]','1','$_SGLOBAL[timestamp]')";
					$inserts[] = "('$value[uid]','$newuid','$','1','$_SGLOBAL[timestamp]')";
					$pokes[] = "('$newuid','$value[uid]','$value[username]','".addslashes($_SCONFIG['defaultpoke'])."','$_SGLOBAL[timestamp]')";
					//Ìí¼ÓºÃÓÑ±ä¸ü¼ÇÂ¼
					$flog[] = "('$value[uid]','$newuid','add','$_SGLOBAL[timestamp]')";
				}
				if($inserts) 
					$_SGLOBAL['db']->query("REPLACE INTO ".tname('friend')." (uid,fuid,fusername,status,dateline) VALUES ".implode(',', $inserts));
				$_SGLOBAL['db']->query("REPLACE INTO ".tname('poke')." (uid,fromuid,fromusername,note,dateline) VALUES ".implode(',', $pokes));
				$_SGLOBAL['db']->query("REPLACE INTO ".tname('friendlog')." (uid,fuid,action,dateline) VALUES ".implode(',', $flog));

				$friendstr = empty($fuids)?'':implode(',', $fuids);

				include_once(S_ROOT.'./source/function_cp.php');
				foreach ($fuids as $fuid) {
					friend_cache($fuid);
				}
			}
		}

		insertsession($setarr);
		ssetcookie('auth', authcode("$setarr[password]\t$setarr[uid]", 'ENCODE'), 2592000);
		ssetcookie('loginuser', $username, 31536000);
		ssetcookie('_refer', '');
		if($invitearr) {
			include_once(S_ROOT.'./source/function_cp.php');
			invite_update($invitearr['id'], $setarr['uid'], $setarr['username'], $invitearr['uid'], $invitearr['username'], $app);
			//Èç¹ûÌá½»µÄÓÊÏäµØÖ·ÓëÑûÇëÏà·ûµÄÔòÖ±½ÓÍ¨¹ýÓÊÏäÑéÖ¤
			if($invitearr['email'] == $email) {
				updatetable('spacefield', array('emailcheck'=>1), array('uid'=>$newuid));
			}
			include_once(S_ROOT.'./source/function_cp.php');
			if($app) {
				updatestat('appinvite');
			} else {
				updatestat('invite');
			}
		}	
		//设置隐私
		$_SGLOBAL['db']->query("INSERT INTO ".tname('spaceinfo')." (type,subtype,uid,friend) VALUES ('contact','mobile',".$newuid.",1)");
		//更新用户手机绑定字段
		updatetable('spacefield', array('mobile'=>$mobile,'mobiletask'=>1), array('uid'=>$newuid));
		//变更记录--用户登录时间
		if($_SCONFIG['my_status']) inserttable('userlog', array('uid'=>$newuid, 'action'=>'add', 'dateline'=>$_SGLOBAL['timestamp']), 0, true);
		//add action log
		inserttable('actionlog', array('uid'=>"$newuid", 'dateline'=>"$_SGLOBAL[timestamp]", 'action'=>'register', 'value'=>'mobile'));
		if($_SCONFIG['my_status']) inserttable('userlog', array('uid'=>$newuid, 'action'=>'add', 'dateline'=>$_SGLOBAL['timestamp']), 0, true);
		$query=$_SGLOBAL['db']->query("SELECT * FROM ".tname('baseprofile')." WHERE uid=".$newuid);
		if($row=$_SGLOBAL['db']->fetch_array($query)){
			if(!strcmp($row['usertype'],"校友"))	{
				update_usertype($_SGLOBAL['db'],$newuid);
			}	
		}
		$q = $_SGLOBAL['db']->query("UPDATE ".tname('space')." SET namestatus='1' WHERE uid='$newuid'");
		$_SGLOBAL['db']->fetch_array($q);
		showmessage('registered', $jumpurl);

	}


	$register_rule = data_get('registerrule');
	include template('do_register');

} elseif($op == "checkusername") {

	$username = trim($_POST['username']);
	if(empty($username)) {
		showmessage('user_name_is_not_legitimate');
	}
	@include_once (S_ROOT.'./uc_client/client.php');
	$ucresult = uc_user_checkname($username);

	if($ucresult == -1) {
		showmessage('user_name_is_not_legitimate');
	} elseif($ucresult == -2) {
		showmessage('include_not_registered_words');
	} elseif($ucresult == -3) {
		showmessage('user_name_already_exists');
	} else {
		showmessage('succeed');
	}
}
elseif($op == "checkseccode") {

	include_once(S_ROOT.'./source/function_cp.php');
	if(ckseccode(trim($_GET['seccode']))) {
		showmessage('succeed');
	} else {
		showmessage('incorrect_code');
	}
}
?>
