<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}


$op = $_GET['op'] ? trim($_GET['op']) : '';

if($_SGLOBAL['supe_uid']) {
	showmessage('do_success', 'space.php?do=home', 0);
}
$ThisYear = date('Y');//获取当前年

if($op == "checkfreshmanrealname")
	{
		$realname = trim($_GET['freshmanrealname']);
		if(empty($realname))
			{
				showmessage('realname_is_not_legitimate');
			}
		$query = $_SGLOBAL['db']->query("SELECT realname FROM ".tname('baseprofile')." WHERE realname='$realname' and startyear=$ThisYear");
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

elseif($op == "checkfreshmanbirthday")
	{
		$birthday = trim($_GET['freshmanbirthday']);
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
elseif($op == "checkfreshmanseccode")
	{
		include_once(S_ROOT.'./source/function_cp.php');
		if(ckseccode(trim($_GET['freshmanseccode'])))
			{
				showmessage('succeed');
			}
		else
			{
				showmessage('incorrect_code');
			}
	}

if(submitcheck('freshmanregistersubmit'))
	{
		//接收信息
		$realname = trim($_POST['freshmanrealname']);
		$birthday = trim($_POST['freshmanbirthday']);
		$email = trim($_POST['freshmanemail']);
		include_once(S_ROOT.'./source/function_cp.php');
		if(!ckseccode($_POST['freshmanseccode']))
			{
				showmessage('incorrect_code');
			}

		//验证信息
		$email = isemail($email)?$email:'';
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

		
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('baseprofile')." WHERE realname='$realname' and birthday='$birthday' and startyear=$ThisYear limit 1");
		$bp = $_SGLOBAL['db']->fetch_array($query);
		
		if(empty($bp))
			{
				showmessage('realnameWITHbirthday_is_invalid','',2);
			}
		if($bp['isactive'] == 1)
			{
				showmessage('users_have_actived','index.php',2);
			}
		if($bp['startyear'] < $ThisYear )
			{
				showmessage('对不起，这里是新生的入口！');
			}
		if(!@include_once S_ROOT.'./uc_client/client.php')
			{
				showmessage('system_error');
			}
		$num = strpos($email,'@');
		$num = ($num > 15) ? 15 : $num;
		$username = substr($email, 0, $num);
		$password = $birthday;

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
						showmessage('请换个邮箱，谢谢~');
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

			//加入新用户
			inserttable('spacefield', array('uid'=>$newuid), 0, true);
			
			//baseprofile的事情了!!
			$birth_year = intval(substr($birthday, 0, 4));
			$birth_month = intval(substr($birthday, 4, 2));
			$birth_day = intval(substr($birthday, 6, 2));			
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
			if(empty($bp['identifier']))
				{
				 $insertinfo = array('realname' => $bp['realname'], 'realbirth' => $birthday, 'sex' => $sexc, 'email' => $email, 'birthyear'=>$birth_year, 'birthmonth'=>$birth_month, 'birthday'=>$birth_day);
				 updatetable('spacefield', $insertinfo, array('uid' => $newuid));
				}
			else
				{
				 $insertinfo = array('identifier' =>$bp['identifier'],'realname' => $bp['realname'], 'realbirth' => $birthday, 'sex' => $sexc, 'email' => $email, 'birthyear'=>$birth_year, 'birthmonth'=>$birth_month, 'birthday'=>$birth_day);
				 updatetable('spacefield', $insertinfo, array('uid' => $newuid));
				}
			if($birth_year && $birth_month && $birth_day){
				$_SGLOBAL['db']->query("INSERT INTO ".tname('spaceinfo')." (type,subtype,uid,friend) VALUES ('base','birth',".$newuid.",3)");
			}
			$space = array('uid'=>$newuid, 'name'=>$bp['realname'], 'namestatus'=>1);
			updatetable('space', $space, array('uid'=>$newuid));	
			
			//获取该用户的所有基础信息用于填充其教育经历
			$EduArray = array();
			$userids = '';
			$query = $_SGLOBAL['db']->query("SELECT userid,collegeid,school,academy,startyear,class,sourcearea FROM ".tname('baseprofile')." WHERE realname='$realname' and birthday='$birthday' order by startyear");
			while($EduResult = $_SGLOBAL['db']->fetch_array($query)){
				$userids .= $EduResult['userid'].",";
				if($EduResult['startyear']){
					if($EduArray[$EduResult["startyear"]]){
						if($EduResult['class']){
							$EduArray[$EduResult["startyear"]] = array('collegeid'=>$EduResult['collegeid'],'school'=>$EduResult['school'],'academy'=>$EduResult['academy'],'sourcearea'=>$EduResult['sourcearea'],'class'=>$EduResult['class'],'startyear'=>$EduResult['startyear']);
						}
					}else{
							$EduArray[$EduResult["startyear"]] = array('collegeid'=>$EduResult['collegeid'],'school'=>$EduResult['school'],'academy'=>$EduResult['academy'],'sourcearea'=>$EduResult['sourcearea'],'class'=>$EduResult['class'],'startyear'=>$EduResult['startyear']);
					}
				}
			}

			/*
			print_r($EduArray);
			//Array ( [2013] => Array ( [collegeid] => [school] => [academy] => [class] => [startyear] => 2013 ) )
			exit();
			*/
			foreach($EduArray as $key => $value){
				if(empty($value['collegeid']))
				{
					//教育信息
					if(!empty($value['startyear']))
						{
							$eduinfo = array('uid' => $newuid, 'type'=>'edu', 'title' => '北京航空航天大学', 'subtitle' => $value['academy'],	'startyear'=>$value['startyear']);
							inserttable('spaceinfo', $eduinfo, 1);

							//应该要加一个段记录该学生为本科还是研究生********************（缺）
							//还要考虑没有生日信息但有身份证号存在的情况................（缺）
							
							
							
							//加入群组:1,同年级;2,区域.
							$tagname = $value['startyear'].'级本科生';				
							joinGrade($newuid, $tagname, $_SGLOBAL['db']);
							$tagname = $value['startyear'].'级'.$value['sourcearea'].'本科生';
							joinArea($newuid, $tagname, $_SGLOBAL['db']);

						}
				}
			elseif(!empty($value['collegeid']))
				{
					$thefour = intval(substr($value['collegeid'], 3, 1));
					if($thefour == 2 || $value['class'])
						{
							$newclass = substr($value['collegeid'], 0, 7);
							$class = (!empty($value['class']))?$value['class']:$newclass;
							$eduinfo = array('uid' => $newuid, 'type'=>'edu', 'title' => '北京航空航天大学', 'subtitle'=>$value['academy'].$value['startyear'].'级'.$class.'班', 'startyear'=>$value['startyear']);
							inserttable('spaceinfo', $eduinfo, 1);
							
							$tagname = $value['startyear'].'年'.$class.'班';
							auto_join($newuid, $tagname, $_SGLOBAL['db']);
						}
				}

			}
			//print_r($EduArray);
			
			/*if(empty($bp['collegeid']))
				{
					//教育信息
					if(!empty($bp['startyear']))
						{
							$eduinfo = array('uid' => $newuid, 'type'=>'edu', 'title' => '北京航空航天大学',	'startyear'=>$bp['startyear']);
							inserttable('spaceinfo', $eduinfo, 1);

							//加入群组:1,同年级;2,区域.
							$tagname = $bp['startyear'].'级本科生';				
							joinGrade($newuid, $tagname, $_SGLOBAL['db']);
							$tagname = $bp['startyear'].'级'.$bp['sourcearea'].'本科生';
							joinArea($newuid, $tagname, $_SGLOBAL['db']);

						}
				}
			elseif(!empty($bp['collegeid']))
				{
					$thefour = intval(substr($bp['collegeid'], 3, 1));
					if($thefour == 2 || $bp['class'])
						{
							$newclass = substr($bp['collegeid'], 0, 7);
							$class = (!empty($bp['class']))?$bp['class']:$newclass;
							$eduinfo = array('uid' => $newuid, 'type'=>'edu', 'title' => '北京航空航天大学', 'subtitle'=>$bp['academy'].$bp['startyear'].'级'.$class.'班', 'startyear'=>$bp['startyear']);
							inserttable('spaceinfo', $eduinfo, 1);
							
							$tagname = $bp['startyear'].'年'.$class.'班';
							auto_join($newuid, $tagname, $_SGLOBAL['db']);
						}
				}*/
				
				
			//更新baseprofile
			if(substr($userids,-1,1)==','){
				$userids = substr($userids,0,-1);
			}
			$_SGLOBAL['db']->query("update " . tname("baseprofile") . " set isactive='1',uid=$newuid WHERE userid in ($userids)");
			
			
			/*$activate = array('isactive' => 1, 'uid' =>$newuid);
			updatetable('baseprofile', $activate, array('userid' => $value[userid]));*/



		}
		showmessage('registered', 'space.php?do=home', 1);
	}
else
	{
		include template('do_freshmanregister');
	}

?>
