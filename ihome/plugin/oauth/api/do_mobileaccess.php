<?php
/*
	mobileaccess.php文件用于手机客户端登录时的用户账号认证。
	Add by xuxing@ihome. 2012-08-28  0:33
*/
	include_once('../../common.php');
	session_start();
	$username = $_POST["username"];
	$password = $_POST["password"];

	//通过多重md5加密在ihomeuser_members表中查询用户
	$query = $_SGLOBAL['db']->query("select uid from ".UC_DBTABLEPRE."members where username='".$username."' and password=md5(concat('".$password."',salt))");
	if($value = $_SGLOBAL['db']->fetch_array($query)){
		$uid = $value['uid'];
		$sessionid = session_id();
		$_SESSION['username'] = $username;
		$arr = array(
			'flag'=>'success',
			'uid'=>$uid,
			'username'=>$username,
			'sessionid'=>$sessionid
		);
		$setarr=array(
			'uid'=>$uid,
			'username'=>$username,
			'password'=>$password
		);
		insertsession($setarr);
		}else{
			$arr = array(
				'flag'=>'failed',
				'uid'=>0,
				'username'=>0,
				'sessionid'=>0
			);
		}
	
		echo json_encode($arr);
	
?>