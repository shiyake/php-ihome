<?php
//init Student （if user is an undergraduate）
function initStudent(){
	global $_SGLOBAL;
	$_SGLOBAL['supe_uid'] = $_SGLOBAL['supe_uid']? $_SGLOBAL['supe_uid']:0;
	$sql = "SELECT * FROM ".tname("baseprofile")." WHERE uid= ".$_SGLOBAL['supe_uid']." AND usertype = '学生' and isactive = 1"; //use utf8_decode
	$query = $_SGLOBAL['db'] -> query($sql);
	$rows = $_SGLOBAL['db'] -> fetch_array($query);
	if(!$rows){
		//result set is null
		$_SGLOBAL['supe_isStudent'] = 0;
	}else{
		$_SGLOBAL['supe_collegeid'] = $rows['collegeid'];
		$_SGLOBAL['supe_academy'] = $rows['academy'];
		if(preg_match('/^[0-9]/', $_SGLOBAL['supe_collegeid'])){
			$_SGLOBAL['supe_isStudent'] = 1;
		}else{
			$_SGLOBAL['supe_isStudent'] = 2;
		}
	}
}

function initParentFlag(){
	global $_SGLOBAL;
	$_SGLOBAL['supe_uid'] = $_SGLOBAL['supe_uid']? $_SGLOBAL['supe_uid']:0;
	$sql = "SELECT * FROM ".tname("parent")." WHERE uid= ".$_SGLOBAL['supe_uid']." and isactive = 1"; //use utf8_decode
	$query = $_SGLOBAL['db'] -> query($sql);
	$rows = $_SGLOBAL['db'] -> fetch_array($query);
	if(!$rows){
		//result set is null
		$_SGLOBAL['supe_isParent'] = 0;
	}else{
		$_SGLOBAL['supe_isParent'] = 1;
	}
}

//initParent
function initParent(){
	global $_SGLOBAL;
	global $_PARENT;
	$query = $_SGLOBAL['db']->query("select * from ".tname('parent')." where suid = ".$_SGLOBAL['supe_uid']." and isactive = 1");
	$rows = $_SGLOBAL['db']->fetch_array($query);
	if($rows){
		$_PARENT['uid'] = $rows['uid'];
		$_PARENT['username'] = $rows['username'];
		$_PARENT['realname'] = $rows['realname'];
		$_PARENT['email'] = $rows['email'];
		$_PARENT['password'] = '******';
	}
}

function addUserManually($username, $password, $email = 'default@ihome.com'){
		@include_once('./common.php');
		@include_once(S_ROOT.'uc_client/client.php');
		global $_SGLOBAL;
		global $_SC;
		$newuid = @uc_user_register($username, $password, $email);
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
		}else{
			//register succeed 
			$q_actionlog = $_SGLOBAL['db']->query("insert into " . $_SC['tablepre'] . "actionlog SET uid ='$newuid', action='register', dateline='".$_SGLOBAL['timestamp']."'");
			return $newuid;
		}
	}
	//establish friendship between uidA and uidB manually
	function mutualFriendManually($uidA, $usernameA, $uidB, $usernameB){
		@include_once(S_ROOT.'common.php');
		@include_once(S_ROOT.'source/function_cp.php');
		@friend_update($uidA, $usernameA, $uidB, $usernameB, 'invite', 0);
		@notification_add($uidA, 'friend', cplang('note_friend_add'));
		@notification_add($uidB, 'friend', cplang('note_friend_add'));
		return 1;
	}
	//Follow Someone
	function followManually($uidA, $uidB){
		//A follow B
		friend_update($uidA, $usernameA, $uidB, $usernameB,'add',3);
		notification_add($uidA, "friend", cplang('note_friend_add'));
		return 1;
	}
	
	//new parent
	function newParent($uid, $suid, $username, $realname, $email, $isactive=1, $job="", $address="",$password){
		global $_SGLOBAL;
		global $_SC;
		$query = $_SGLOBAL['db']->query("select uid from ".$_SC['tablepre']."parent where uid = '$username'");
		$result = $_SGLOBAL['db']->fetch_array($query);
		if($result){
			showmessage("user_name_already_exists");
		}else{
			$query = $_SGLOBAL['db']->query("insert into ".$_SC['tablepre']."parent values('$uid','$suid','$isactive','$username','$realname','$job','$email','$address')");
		}
	}
?>