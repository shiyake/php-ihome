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
	
	$_SGLOBAL['db']->query("select  from ".tname('space')." SET flag='$flag' WHERE uid='$uid'");
	
	if($value = $_SGLOBAL['db']->fetch_array($query)){
		$uid = $value['uid'];
		$query1 = $_SGLOBAL['db']->query("select flag from ".tname('space')."  WHERE uid='$uid'");
		$value1 = $_SGLOBAL['db']->fetch_array($query1);
		$lock = $value1[flag];
		if($lock = -1){
			returnerror();
		}else{
			$sessionid = session_id();
			//echo $sessionid."aaaaa";exit();
			$_SESSION['username'] = $username;
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