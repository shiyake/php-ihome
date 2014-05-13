<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}

$op = $_GET['op'] ? trim($_GET['op']) : '';

if($_SGLOBAL['supe_uid']) {
	showmessage('do_success', 'space.php?do=home', 0);
}

if($op == "checkrealname")
	{
		$realname = trim($_GET['realname']);
		if(empty($realname))
			{
				showmessage('realname_is_not_legitimate');
			}
		$query = $_SGLOBAL['db']->query("SELECT realname FROM ".tname('baseprofile')." WHERE realname='$realname'");
		$realname = $_SGLOBAL['db']->fetch_array($query);
		if (empty($realname))
			{
				showmessage('realname_is_null');
			}
		else
			{
				showmessage('succeed');
			}
	}

elseif($op == "checkbirthday")
	{
		$birthday = trim($_GET['birthday']);
		if(empty($birthday))
			{
				showmessage('birthday_is_not_legitimate');
			}
		$query = $_SGLOBAL['db']->query("SELECT birthday FROM ".tname('baseprofile')." WHERE birthday='$birthday'");
		$birthday = $_SGLOBAL['db']->fetch_array($query);
		if (empty($birthday))
			{
				showmessage('birthday_is_null');
			}
		else
			{
				showmessage('succeed');
			}
	}
/*
elseif($op == "checkseccode")
	{
		include_once(S_ROOT.'./source/function_cp.php');
		if(ckseccode(trim($_GET['seccode'])))
			{
				showmessage('succeed');
			}
		else
			{
				showmessage('incorrect_code');
			}
	}
*/
elseif($op == "fetchmobile")
	{
		if($_SCONFIG['closeregister'])
			{
				if($_SCONFIG['closeinvite'])
					{
						showmessage('not_open_registration');
					}
				elseif(empty($invitearr))
					{
						showmessage('not_open_registration_invite');
					}
			}


		checkclose();

		$realname = trim($_GET['realname']);
		$birthday = trim($_GET['birthday']);
		$password = $birthday;

		if(empty($realname))
			{
				showmessage('对不起，请输入姓名！','',2);
			}
		if(empty($birthday))
			{
				showmessage('对不起，请输入生日！','',2);
			}
		//已经注册用户
		if($_SGLOBAL['supe_uid'])
			{
				showmessage('registered', 'space.php');
			}
		//检查邮箱
		$email = isemail(trim($_GET['email']))?trim($_GET['email']):'';
		if(empty($email))
			{
				showmessage('email_format_is_wrong');
			}
		if($_SCONFIG['checkemail'])
			{
				if($count = getcount('spacefield', array('email'=>$email)))
					{
						showmessage('email_has_been_registered');
					}
			}

		$num = strpos($email,'@');
		$num = ($num > 15) ? 15 : $num;
		$newusername = substr($email, 0, $num);



		/*******************这里应该判断要不要用户名是否被占********************
		$username = $newusername;
		
		if(!@include_once S_ROOT.'./uc_client/client.php')
			{
				showmessage('system_error');
			}

		$newuid = uc_user_register($username, $password, $email);
		if($newuid <= 0)
			{
				if($newuid == -1)
					{
						showmessage('user_name_is_not_legitimate');
					}
				elseif($newuid == -2)
					{
						showmessage('include_not_registered_words');
					}
				elseif($newuid == -3)
					{
						showmessage('对不起，邮箱有点问题，请换成QQ邮箱试试！');
					}
				elseif($newuid == -4)
					{
						showmessage('email_format_is_wrong');
					}
				elseif($newuid == -5)
					{
						showmessage('email_not_registered');
					}
				elseif($newuid == -6)
					{
						showmessage('email_has_been_registered');
					}
				else
					{
						showmessage('register_error');
					}
			}
		**********************************************************************/

		//检查IP

		$onlineip = getonlineip();
		if($_SCONFIG['regipdate'])
			{
				$query = $_SGLOBAL['db']->query("SELECT dateline FROM ".tname('space')." WHERE regip='$onlineip' ORDER BY dateline DESC LIMIT 1");
				if($value = $_SGLOBAL['db']->fetch_array($query))
					{
						if($_SGLOBAL['timestamp'] - $value['dateline'] < $_SCONFIG['regipdate']*3600)
							{
								showmessage('regip_has_been_registered', '', 1, array($_SCONFIG['regipdate']));
							}
					}
			}

		//查询基本数据
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('baseprofile')." WHERE realname='$realname' and birthday='$birthday' limit 1");
		$bp = $_SGLOBAL['db']->fetch_array($query);
		
		if(empty($bp))
			{
				showmessage('realnameWITHbirthday_is_invalid','',2);
			}
		if($bp['isactive'] == 1)
			{
				showmessage('users_have_actived','index.php',2);
			}
	
		require_once ('do_mobileregajax.php');
	
	}


elseif($op == "checkmobile")
	{
		$mobile = ismobile($_GET['mobile'])?trim($_GET['mobile']):'';
		if($mobile)
			{
				showmessage('succeed');
			}
		else
			{
				showmessage('对不起，输入手机号有误，请重新输入');
			}
	}

elseif($op == "checkgetverifycode")
	{
		
		$verifycode = rand(100000,999999);
		$mobile = $_GET['mobile'];
		$mobile = ismobile($_GET['mobile'])?trim($_GET['mobile']):'';
		if(!$mobile)
			{
				showmessage('对不起，输入手机号有误，请重新输入');
			}

		$content = "您在i北航（i.buaa.edu.cn）的注册验证码为".$verifycode."请及时输入验证码完成注册！[i北航]";

		$yesterday = $_SGLOBAL['timestamp'] - 86400;
		$sql = $_SGLOBAL['db']->query("SELECT mobile FROM ".tname('mobilereg')." WHERE mobile = '".$mobile."' AND dateline > '".$yesterday."' ");
		$count = $_SGLOBAL['db']->num_rows($sql);
		if ($count >= 3)
			{
				showmessage('已经存在手机号：'.$mobile.'发出的'.$count.'条验证码还未完成注册。');
			}

		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('mobilereg')." WHERE mobile = '".$mobile."' and status=0 ORDER BY dateline DESC LIMIT 1");
		if($value = $_SGLOBAL['db']->fetch_array($query) && ($_SGLOBAL['timestamp'] - $value['dateline']) <= 60 )
			{
				showmessage('对不起，您的操作过快，请等待30秒再接收验证码','index.php',2);
			}
		else 
			{
				$mquery = $_SGLOBAL['db']->query("SELECT mobile FROM ".tname('spacefield')." WHERE mobile = '".$mobile."'");
			
				if ($bind = $_SGLOBAL['db']->fetch_array($mquery)) {
					showmessage('此手机号已经绑定，如果忘记密码，请用手机找回。');
				} else {
					if(sendsms($mobile, '验证码', $content)) {
						$setarr = array(
							'mobile' => $mobile,
							'verifycode' => $verifycode,
							'dateline' => $_SGLOBAL['timestamp'],
							'ip' => getonlineip()
						);

						inserttable('mobilereg', $setarr, 1);
						showmessage('successfully');
					} else {
						showmessage('注册验证码发送失败...');
					}
				}
			}
	}
elseif($op == "checkinputverifycode")
	{
	
		$query = $_SGLOBAL['db']->query("SELECT mobile FROM ".tname('mobilereg')." WHERE mobile = '".trim($_GET['mobile'])."' and verifycode = '".trim($_GET['verifycode'])."'");

		if ($value = $_SGLOBAL['db']->fetch_array($query)) 
			{
				showmessage('succeed');
			}
		else
			{
				showmessage('手机验证码输入不正确！');
			}
	}
elseif($op == "checkinvitecode")
	{
	
		$query = $_SGLOBAL['db']->query("SELECT id FROM ".tname('mobilereg')." WHERE verifycode = '".trim($_GET['invitecode'])."'");

		if ($value = $_SGLOBAL['db']->result($query)) 
			{
				showmessage('succeed');
			}
		else
			{
				showmessage('邀请码输入错误！');
			}
	}
elseif($op == "create")
	{
		//引入一个文件
		require_once ('do_mobileregajax.php');//应该要判断有没有这个文件...
	}

elseif($op == "InviteCreate")
	{
		require_once ('do_mobileinvite.php');
	}

include template('do_mobileregister');

?>
