<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}
ignore_user_abort(true);

if(submitcheck('mobileregajaxsubmit'))
	{
		$alumtype = trim($_POST['alumtype']);
		$realname = trim($_POST['realname']);
		$birthday = trim($_POST['birthday']);
		if($alumtype == 'overseas') {
			if(empty($realname)) {
				showmessage('对不起，请输入姓名！','',2);
			}
			if(empty($birthday)) {
				showmessage('对不起，请输入生日！','',2);
			}
			$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('baseprofile')." WHERE realname='$realname' and birthday='$birthday' limit 1");
			$bp = $_SGLOBAL['db']->fetch_array($query);		
			if(empty($bp)) {
				showmessage('对不起，姓名与生日不匹配！','',2);
			}

		}
		else {
			$verifycode = $birthday;
			$password = $verifycode;
			if(empty($realname)) {
				showmessage('对不起，请输入姓名！','',2);
			}
			if(empty($verifycode)) {
				showmessage('对不起，请输入邀请码！','',2);
			}
			$query = $_SGLOBAL['db']->query("SELECT mobile FROM ".tname('mobilereg')." WHERE realname='$realname'	and verifycode='$verifycode' ORDER BY dateline DESC limit 1");
			$mobile = $_SGLOBAL['db']->result($query);		
			if(empty($mobile)) {
				showmessage('对不起，姓名与邀请码不匹配！','',2);
			}
			$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('baseprofile')." WHERE realname='$realname' and mobile='$mobile' ORDER BY userid DESC limit 1");
			$bp = $_SGLOBAL['db']->fetch_array($query);
			if (empty($bp)) {
				showmessage('对不起，您的邀请码已经过期!');
			}

		}

		if($bp['isactive'] == 1) {
			showmessage('users_have_actived','index.php',2);
		}
		
		if(!@include_once S_ROOT.'./uc_client/client.php') {
			showmessage('system_error');
		}

		//邮箱
		$email = isemail(trim($_POST['email']))?trim($_POST['email']):'';
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
		$username = substr($email, 0, $num);

		//创建新用户
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
						showmessage('user_name_already_exists');
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
		else
			{
				$setarr = array(
				'uid' => $newuid,
				'username' => $username,
				'password' => md5($password)//本地密码随机生成
				);
				//更新本地用户库
				inserttable('member', $setarr, 0, true);
                //add action log
                inserttable('actionlog', array('uid'=>"$newuid", 'dateline'=>"$_SGLOBAL[timestamp]", 'action'=>'register', 'value'=>'mobile'));

				//开通空间
				include_once(S_ROOT.'./source/function_space.php');
				$space = space_open($newuid, $username, 0, $email);

				//默认好友
				$flog = $inserts = $fuids = $pokes = array();
				if(!empty($bp['inviter']))
					{
						$query = $_SGLOBAL['db']->query("SELECT username FROM ".tname('member')." WHERE uid='$bp[inviter]' limit 1");
						$inviterusername = $_SGLOBAL['db']->result($query);
						$invitee[] = "('$newuid','$bp[inviter]','$inviterusername','1','$_SGLOBAL[timestamp]')";
						$inviter[] = "('$bp[inviter]','$newuid','$username','1','$_SGLOBAL[timestamp]')";
						$_SGLOBAL['db']->query("REPLACE INTO ".tname('friend')." (uid,fuid,fusername,status,dateline) VALUES ".implode(',', $invitee));
						$_SGLOBAL['db']->query("REPLACE INTO ".tname('friend')." (uid,fuid,fusername,status,dateline) VALUES ".implode(',', $inviter));
						$flog[] = "('$bp[inviter]','$newuid','add','$_SGLOBAL[timestamp]')";
						$_SGLOBAL['db']->query("REPLACE INTO ".tname('friendlog')." (uid,fuid,action,dateline) VALUES ".implode(',', $flog));
					}
				if(!empty($_SCONFIG['defaultfusername']))
					{
						$query = $_SGLOBAL['db']->query("SELECT uid,username FROM ".tname('space')." WHERE	username IN (".simplode(explode(',', $_SCONFIG['defaultfusername'])).")");
						while ($value = $_SGLOBAL['db']->fetch_array($query))
							{
								$value = saddslashes($value);
								$fuids[] = $value['uid'];
								$inserts[] = "('$newuid','$value[uid]','$value[username]','1','$_SGLOBAL[timestamp]')";
								$inserts[] = "('$value[uid]','$newuid','$username','1','$_SGLOBAL[timestamp]')";
								$pokes[] = "('$newuid','$value[uid]','$value[username]','".addslashes($_SCONFIG['defaultpoke'])."','$_SGLOBAL[timestamp]')";
								//添加好友变更记录
								$flog[] = "('$value[uid]','$newuid','add','$_SGLOBAL[timestamp]')";
							}
						if($inserts)
							{
								$_SGLOBAL['db']->query("REPLACE INTO ".tname('friend')." (uid,fuid,fusername,status,dateline) VALUES ".implode(',', $inserts));
								$_SGLOBAL['db']->query("REPLACE INTO ".tname('poke')." (uid,fromuid,fromusername,note,dateline) VALUES ".implode(',', $pokes));
								$_SGLOBAL['db']->query("REPLACE INTO ".tname('friendlog')." (uid,fuid,action,dateline) VALUES ".implode(',', $flog));

								//添加到附加表
								$friendstr = empty($fuids)?'':implode(',', $fuids);
								updatetable('space', array('friendnum'=>count($fuids), 'pokenum'=>count($pokes)), array('uid'=>$newuid));
								updatetable('spacefield', array('friend'=>$friendstr, 'feedfriend'=>$friendstr), array('uid'=>$newuid));

								//更新默认用户好友缓存
								include_once(S_ROOT.'./source/function_cp.php');
								foreach ($fuids as $fuid)
									{
										friend_cache($fuid);
									}
							}
					}
			}

			//在线session
			insertsession($setarr);

			//设置cookie
			ssetcookie('auth', authcode("$setarr[password]\t$setarr[uid]", 'ENCODE'), 2592000);
			ssetcookie('loginuser', $username, 31536000);
			ssetcookie('_refer', '');

			//好友邀请
			if($invitearr) {
				include_once(S_ROOT.'./source/function_cp.php');
				invite_update($invitearr['id'], $setarr['uid'], $setarr['username'], $invitearr['uid'], $invitearr['username'], $app);
				//如果提交的邮箱地址与邀请相符的则直接通过邮箱验证
				if($invitearr['email'] == $email) {
					updatetable('spacefield', array('emailcheck'=>1), array('uid'=>$newuid));
				}
				
				//统计更新
				include_once(S_ROOT.'./source/function_cp.php');
				if($app) {
					updatestat('appinvite');
				} else {
					updatestat('invite');
				}
			}
			//加入新用户
			inserttable('spacefield', array('uid'=>$newuid), 0, true);


			$activate = array('isactive' => 1);
			updatetable('baseprofile', $activate, array('userid' => $bp[userid]));
			if( $bp['sex'] == '男')
				{
				   	$sexc = 1;
			   	}
			elseif($bp['sex'] == '女')
				{
					$sexc = 2;
				}
			else
				{
					$sexc = 0;
				}
			$insertinfo = array('realname' => $bp['realname'],'sex' => $sexc, 'email' => $email);
			updatetable('spacefield', $insertinfo, array('uid' => $newuid));
			$space = array('uid'=>$newuid, 'name'=>$bp['realname'], 'namestatus'=>1);
			updatetable('space', $space, array('uid'=>$newuid));
			if($bp['birthday'])
				{
					$birth_year = intval(substr($bp['birthday'], 0, 4));
					$birth_month = intval(substr($bp['birthday'], 4, 2));
					$birth_day = intval(substr($bp['birthday'], 6, 2));
					$birthday_info = array('birthyear'=>$birth_year, 'birthmonth'=>$birth_month, 'birthday'=>$birth_day);
					updatetable('spacefield', $birthday_info, array('uid' => $newuid));
					$_SGLOBAL['db']->query("INSERT INTO ".tname('spaceinfo')." (type,subtype,uid,friend) VALUES ('base','birth',".$newuid.",1)");
				}
			if($bp['unit'])
				{
					$workinfo = array('uid'=>$newuid, 'type'=>'work', 'title'=>$bp['unit']);
					inserttable('spaceinfo', $workinfo, 1);
				}
			if($bp['academy'] && $bp['class'] && $bp['startyear'])
				{
					$eduinfo = array('uid' => $newuid, 'type'=>'edu', 'title' => '北京航空航天大学', 'subtitle'=>$bp['academy'].$bp['startyear'].'级'.$bp['class'].'班', 'startyear'=>$bp['startyear']);
					$tagname = $bp['startyear'].'年'.$bp['class'].'班';				
					auto_join($newuid, $tagname, $_SGLOBAL['db']);
					inserttable('spaceinfo', $eduinfo, 1);
				}

			//更新手机验证表记录
			$_SGLOBAL['db']->query("UPDATE ".tname('mobilereg')." SET status=1 WHERE mobile = '$mobile' and verifycode = '$verifycode'");


			//设置隐私
			$_SGLOBAL['db']->query("INSERT INTO ".tname('spaceinfo')." (type,subtype,uid,friend) VALUES ('contact','mobile',".$newuid.",1)");

			//更新用户手机绑定字段
			updatetable('spacefield', array('mobile'=>$mobile,'mobiletask'=>1), array('uid'=>$newuid));

			//变更记录--用户登录时间
			if($_SCONFIG['my_status']) inserttable('userlog', array('uid'=>$newuid, 'action'=>'add', 'dateline'=>$_SGLOBAL['timestamp']), 0, true);

			
			showmessage('registered', 'space.php?do=home', 1);

	}
?>
