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
		
		if(empty($bp))
			{
				showmessage('realnameWITHbirthday_is_invalid','',2);
			}
		if($bp['isactive'] == 1)
			{
				showmessage('users_have_actived','index.php',2);
			}

		$query = $_SGLOBAL['db']->query("SELECT mobile FROM ".tname('mobilereg')." WHERE verifycode = '".trim($_POST['inputverifycode'])."'");

		if (!$value = $_SGLOBAL['db']->fetch_array($query)) 
			{
				showmessage('手机验证码不正确');
			}	
		
		if(!@include_once S_ROOT.'./uc_client/client.php')
			{
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

				//开通空间
				include_once(S_ROOT.'./source/function_space.php');
				$space = space_open($newuid, $username, 0, $email);

				//默认好友
				$flog = $inserts = $fuids = $pokes = array();
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
						
			if(empty($bp['identifier']))
				{
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
				 $insertinfo = array('realname' => $bp['realname'],'sex' => $sexc, 'email' => $email, 'birthyear'=>$birth_year, 'birthmonth'=>$birth_month, 'birthday'=>$birth_day);
				 updatetable('spacefield', $insertinfo, array('uid' => $newuid));				

				$_SGLOBAL['db']->query("INSERT INTO ".tname('spaceinfo')." (type,subtype,uid,friend) VALUES ('base','birth',".$newuid.",1)");

				 $space = array('uid'=>$newuid, 'name'=>$bp['realname'], 'namestatus'=>1);
				 updatetable('space', $space, array('uid'=>$newuid));
				 //将生日信息默认设置为隐私
				if($birth_year && $birth_month && $birth_day){
					$_SGLOBAL['db']->query("INSERT INTO ".tname('spaceinfo')." (type,subtype,uid,friend) VALUES ('base','birth',".$newuid.",3)");
				}
				 if($bp['usertype'] == '教师')
					 {
						$workinfo = array('uid'=>$newuid, 'type'=>'work', 'title'=>'北京航空航天大学',	'subtitle'=>$bp['academy'], 'startyear'=>$bp['startyear'], 'city'=>'北京市');
						inserttable('spaceinfo', $workinfo, 1);
					 }
				elseif($bp['usertype'] == '学生')
					{
						if(!empty($bp['class']) && !empty($bp['startyear'])){
						$eduinfo = array('uid' => $newuid, 'type'=>'edu', 'title' => '北京航空航天大学', 'subtitle'=>$bp['academy'].$bp['startyear'].'级'.$bp['class'].'班', 'startyear'=>$bp['startyear']);
						$tagname = $bp['startyear'].'年'.$bp['class'].'班';				
						auto_join($newuid, $tagname, $_SGLOBAL['db']);
						inserttable('spaceinfo', $eduinfo, 1);
					}
				}
			}
			else	//有身份证---就是多插一个字段进去~
				{
					$activate = array('isactive' => 1);
					updatetable('baseprofile', $activate, array('userid' => $bp[userid]));

				if( $bp['sex'] == '男') {
					$sexc = 1;
				}else if($bp['sex'] == '女') {
					$sexc = 2;
				}else{
					$sexc = 0;
				}
			
				$insertinfo = array('identifier' => $bp['identifier'], 'realname' => $bp['realname'],'sex' => $sexc, 'email' => $email, 'birthyear'=>$birth_year, 'birthmonth'=>$birth_month, 'birthday'=>$birth_day);
				updatetable('spacefield', $insertinfo, array('uid' => $newuid));

				$_SGLOBAL['db']->query("INSERT INTO ".tname('spaceinfo')." (type,subtype,uid,friend) VALUES ('base','birth',".$newuid.",1)");

			
				$space = array('uid'=>$newuid, 'name'=>$bp['realname'], 'namestatus'=>1);
				updatetable('space', $space, array('uid'=>$newuid));

				if($bp['usertype'] == '教师' || $bp['usertype'] == 4 || $bp['usertype'] == 5)
					{
						$workinfo = array('uid'=>$newuid, 'type'=>'work', 'title'=>'北京航空航天大学', 'subtitle'=>$bp['academy'], 'startyear'=>$bp['startyear'], 'city'=>'北京市');
						inserttable('spaceinfo', $workinfo, 1);
					}
				elseif(strlen($bp['collegeid']) != 5 && strlen($bp['collegeid']) != 6)
					{
						if(!empty($bp['class']) && !empty($bp['startyear']))
						{
						$eduinfo = array('uid' => $newuid, 'type'=>'edu', 'title' => '北京航空航天大学', 'subtitle'=>$bp['academy'].$bp['startyear'].'级'.$bp['class'].'班', 'startyear'=>$bp['startyear']);
						$tagname = $bp['startyear'].'年'.$bp['class'].'班';
						auto_join($newuid, $tagname, $_SGLOBAL['db']);
						inserttable('spaceinfo', $eduinfo, 1);
						}
					}
				}
			}	
			//毕业校友的就业信息
			$sql = $_SGLOBAL['db']->query("SELECT * FROM ".tname('stuemp')." WHERE collegeid='$bp[collegeid]'");
			if($stuemp = $_SGLOBAL['db']->fetch_array($sql)) {	
				 $setarr1 = array( 'uid' => $newuid , 'type'=>'work' , 'title'=>$stuemp[unit] , 'province'=>$stuemp[province] ,'city' => $stuemp[city]);
				 inserttable('spaceinfo',$setarr1,1); 
			}

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