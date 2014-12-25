<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}


if(submitcheck('mobileregajaxsubmit'))
	{
		$username = trim($_POST['username']);
		$realname = trim($_POST['realname']);
		$password = trim($_POST['password']);
		$mobile = trim($_POST['mobile']);
		$verifycode = trim($_POST['inputverifycode']);

		$birthday = $password;
		$birth_year = intval(substr($birthday, 0, 4));
		$birth_month = intval(substr($birthday, 4, 2));
		$birth_day = intval(substr($birthday, 6, 2));

		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('baseprofile')." WHERE realname='$realname' and birthday='$birthday' limit 1");
		$bp = $_SGLOBAL['db']->fetch_array($query);

		if($bp['isactive'] == 1)
			{
				showmessage('users_have_actived','index.php',2);
			}

		$query = $_SGLOBAL['db']->query("SELECT mobile FROM ".tname('mobilereg')." WHERE verifycode = '".trim($_POST['inputverifycode'])."'");

		if (!$value = $_SGLOBAL['db']->fetch_array($query)) 
			{
				showmessage('手机验证码不正确');
			}	

			$_POST["realname"] = $realname;
			$_POST["username"] = $username;
			$_POST["password"] = $password;
			$_POST["birthday"] = $birthday;
			$_POST["startyear"] = $_POST["startyear"];
			$_POST["academy"] = $_POST["subtitle"];
			$_SGLOBAL["inviteactive_showmsg"] = true;
			$_SGLOBAL["no_inviteactive"] = true;
			$inviteactive_showmsg = true;
			include_once('do_quickmarkregister.php');


			//更新手机验证表记录
			$_SGLOBAL['db']->query("UPDATE ".tname('mobilereg')." SET status=1 WHERE mobile = '".trim($_POST['mobile'])."' and verifycode = '".trim($_POST['inputverifycode'])."'");


			//设置隐私
			$_SGLOBAL['db']->query("INSERT INTO ".tname('spaceinfo')." (type,subtype,uid,friend) VALUES ('contact','mobile',".$newuid.",1)");

			//更新用户手机绑定字段
			updatetable('spacefield', array('mobile'=>trim($_POST['mobile']),'mobiletask'=>1), array('uid'=>$newuid));

			//变更记录
			if($_SCONFIG['my_status']) inserttable('userlog', array('uid'=>$newuid, 'action'=>'add', 'dateline'=>$_SGLOBAL['timestamp']), 0, true);
			showmessage('registered', 'space.php?do=home', 1);
	}

else
	{
		include template('do_mobileregajax');
	}

?>