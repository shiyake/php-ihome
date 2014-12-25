<?php
/*
	mobileaccess.php文件用于手机客户端登录时的用户账号认证。
	Add by xuxing@ihome. 2012-08-28  0:33
*/
	include_once('../../common.php');
	include_once(S_ROOT.'./source/function_space.php');
	session_start();
	$username = $_POST["username"];
	$password = $_POST["password"];
    if(preg_match("/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/",$username)){
	$query = $_SGLOBAL['db']->query("select uid,username from ".UC_DBTABLEPRE."members where email='".$username."' and password=md5(concat('".$password."',salt))");
	}else{
	$query = $_SGLOBAL['db']->query("select uid from ".UC_DBTABLEPRE."members where username='".$username."' and password=md5(concat('".$password."',salt))");
	}
	/*$username = '11151006';
	$password = '8646fb99bc5d535e02ec8396c53074ef';*/
	//通过多重md5加密在ihomeuser_members表中查询用户
	
	if($value = $_SGLOBAL['db']->fetch_array($query)){
		$uid = $value['uid'];
		$sessionid = session_id();
		//echo $sessionid."aaaaa";exit();
		$_SESSION['username'] = $username;
		/*
		//即时通讯的密码start
		$query3 = $_SGLOBAL['db']->query("SELECT pass_msg FROM ".tname('space')." WHERE uid=$uid");
		print_r("SELECT pass_msg FROM ".tname('space')." WHERE uid=$uid");
		$value2 = $_SGLOBAL['db']->fetch_array($query3);
		$pass = $value2[pass_msg];
		print_r($pass);
		$time = time();
		if(empty($pass)){
			$pass_msg = md5 ( $uid . '|' . $username . '|' . $time );
			$query4 = $_SGLOBAL['db']->query("update  ".tname('space')." set pass_msg=".$pass_msg." WHERE uid=$uid");
			print_r("update  ".tname('space')." set pass_msg=".$pass_msg." WHERE uid=$uid");
			$query6 = $_SGLOBAL['db']->query("SELECT pass_msg FROM ".tname('space')." WHERE uid=$uid");
			print_r("SELECT pass_msg FROM ".tname('space')." WHERE uid=$uid");
			$value7 = $_SGLOBAL['db']->fetch_array($query6);
			$pass_msg = $value7[pass_msg];
		}else{
		    $query5 = $_SGLOBAL['db']->query("SELECT pass_msg FROM ".tname('space')." WHERE uid=$uid");
			$value3 = $_SGLOBAL['db']->fetch_array($query5);
			$pass_msg = $value3[pass_msg];
		}
		//即时通讯的密码end
*/
		$arr = array(
			'flag'=>'success',
			'uid'=>$uid,
			'username'=>$username,
			'sessionid'=>$sessionid
		);

		//Check the user who have logined the ihome since the user had been created.
		$query1 = $_SGLOBAL['db']->query("SELECT password FROM ".tname('member')." WHERE uid='$uid'");
		if($value = $_SGLOBAL['db']->fetch_array($query1)) {
			$password1 = addslashes($value['password']);
			$setarr = array(
				'uid'=>$uid,
				'username'=>$username,
				'password' => $password1
			);
			insertsession($setarr);
		} else {
			returnerror();
		}
	}else{
		returnerror();
	}
	echo json_encode($arr);

function returnerror(){
	$arr = array(
			'flag'=>'failed',
			'uid'=>0,
			'username'=>0,
			'sessionid'=>0
		);
}
	
?>