<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}



//把post来的数据项存入数据库
if(submitcheck('overseasregajaxsubmit'))
{
	$username = trim($_POST['username']);
	$realname = trim($_POST['realname']);
	$password = trim($_POST['password']);
	$email = trim($_POST['email']);
	$birthday = $password;
	$birth_year = intval(substr($birthday, 0, 4));
	$birth_month = intval(substr($birthday, 4, 2));
	$birth_day = intval(substr($birthday, 6, 2));
	$country = $_POST['country'];
	$school = trim($_POST['school']);
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('baseprofile')." WHERE realname='$realname' and birthday='$birthday' limit 1");
	$bp = $_SGLOBAL['db']->fetch_array($query);
	
	if($bp['isactive'] == 1)
	{
		showmessage('users_have_actived','index.php',2);
	}
	$ver = rand(100000,999999);
	$_POST["email"] = $email;
	$_POST["realname"] = $realname;
	$_POST["username"] = $username;
	$_POST["password"] = $password;
	$_POST["birthday"] = $birthday;
	$_POST["startyear"] = $_POST["startyear"];
	$_POST["academy"] = $_POST["subtitle"];
	$_POST['email'] = $email;
	$_SGLOBAL["inviteactive_showemail"] = true;
	$_SGLOBAL["no_inviteactive"] = true;
	$inviteactive_showmsg = true;

	$leave_message = array(
		"username"=>$username,
		"realname"=>$realname,
		"password"=>$password,
		"birthday"=>$password,
		"birth_year"=>$birth_year,
		"birth_month"=>$birth_month,
		"birth_day"=>$birth_day,
		"startyear"=>$_POST['startyear'],
		"academy"=>$_POST["subtitle"],
		"ver"=>$ver,
		"email"=>$email,
		"country"=>$country,
		"school"=>$school
	);
	inserttable("forgienCreate",$leave_message);
	$query=$_SGLOBAL['db']->query("SELECT * FROM ".tname('forgienCreate')."	WHERE ver=$ver and username=$username");
	$id=0;
	if($res=$_SGLOBAL['db']->fetch_array($query))	{
		$id=$res['id'];
	}
	$message = "亲爱的北航校友您好，请点击以下链接完成注册http://i.buaa.edu.cn/do.php?ac={$_SCONFIG['overseasregister_email']}&op=create&id={$id}&ver={$ver}";
	//showmessage($message);
	include_once(S_ROOT.'./source/function_cp.php');
    smail(0, $email, $message, '');
    showmessage("邮件已经发送，请注意查收","index.php",3);
}

else
{
	include template('do_overseasregajax');
}

?>
