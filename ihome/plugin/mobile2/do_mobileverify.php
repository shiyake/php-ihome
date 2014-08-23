<?php
/*
	mobileverify.php文件用于手机客户端登录时的用户账号认证。
	Add by xuxing@ihome. 2012-09-06  0:33
*/
	include_once('../../common.php');
 	include_once(S_ROOT.'./source/function_space.php');

	$userid=trim($_POST["sess_userid"]);
	$username=trim($_POST["sess_username"]);
	//获取客户端传递的session标识
	$sessionid=trim($_POST["sess_sessionid"]);

	if(!$userid || !$username || !$sessionid){
		verifyerror();
		exit();
	}
	 
	session_id($sessionid);
	 
	//将会根据session id获得原来的session
	session_start();
		 
	//获取服务器端原来session记录的username,并且根据客户端传过来的username比较进行验证操作
	$sess_username=$_SESSION['username'];
	 
	if($username==$sess_username){
		//verifyright();	 
		$_SGLOBAL['supe_uid'] = $userid;
		$_SGLOBAL['supe_username'] = $username;
		$query = $_SGLOBAL['db']->query("SELECT password FROM ".tname('member')." WHERE uid='$userid'");
	    if($value = $_SGLOBAL['db']->fetch_array($query)){
			$password = addslashes($value['password']);
			$setarr = array(
				'uid'=>$userid,
				'username'=>$username,
				'password' => $password
			);
			insertsession($setarr);
		}else{
			verifyerror();
		}
	} else {
		verifyerror();	 
	}
	function verifyright(){
		$arr = array(
			'flag'=>'success',
			'username'=>$username,
			'sessionid'=>$sessionid
		);
		$result = json_encode($arr);
		$result = preg_replace("#\\\u([0-9a-f]+)#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
		echo $result;
	}
	
	function verifyerror(){
		$arr = array(
			'flag'=>'0',
			'username'=>'error',
			'sessionid'=>$sessionid
		);
		$result = json_encode($arr);
		$result = preg_replace("#\\\u([0-9a-f]+)#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
		echo $result;

		exit();
	}
?>