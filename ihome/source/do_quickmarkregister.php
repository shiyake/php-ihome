<?php
/*
QR方式注册用户的Api

确保ihome_space表存在invite_remain字段
下面的脚本用于创建该字段并默认设置20：

ALTER TABLE `ihome`.`ihome_space` 
ADD COLUMN `invite_remain` INT NOT NULL DEFAULT 20;

为了让群组能被识别出来是那个学院哪一级的大群，需要加入两个新字段，分别标识届数和学院编号
ALTER TABLE `ihome`.`ihome_mtag` 
ADD COLUMN `startyear` INT NULL AFTER `moderator`,
ADD COLUMN `academy` INT NULL AFTER `startyear`;

创建这两个字段组合索引
ALTER TABLE `ihome`.`ihome_mtag` 
ADD INDEX `structSearch` (`academy` ASC, `startyear` ASC);

重做扩展字段
删除原来的索引
ALTER TABLE `ihome`.`ihome_mtag` 
DROP INDEX `structSearch` ;
删除原来的字段
ALTER TABLE `ihome`.`ihome_mtag` 
DROP COLUMN `academy`,
DROP COLUMN `startyear`;

ALTER TABLE `ihome`.`ihome_mtag` 
ADD COLUMN `startyear` VARCHAR(8) NULL,
ADD COLUMN `academy` VARCHAR(64) NULL AFTER `startyear`;
ALTER TABLE `ihome`.`ihome_mtag` 
ADD INDEX `structSearch` (`startyear` ASC, `academy` ASC);


这部分的代码有个开关
是 $_SGLOBAL["no_inviteactive"],如果为true，那么不需要uid,按照非校友二维码邀请来处理校友激活
如果是按照邀请模式来激活校友的：
会给邀请者发消息让他来确认
不是这种模式的话
找到校友的年级群群主，消息发给他。没有群主就发给许兴uid=3

另外还有个开关
$inviteactive_showmsg, 如果为true，那么，信息按照showmessage返回，
否则按照json返回
*/
//if(!$_SGLOBAL)
//	include_once('../common.php');

function inject_check($sql_str) {
	if($sql_str)
	{
		return eregi('+select|insert|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile+', $sql_str);
	}
	else
	{
		return false;
	}
}

function returnResponse($code, $desc)
{
	global $inviteactive_showmsg;
	if($inviteactive_showmsg)
	{
		showmessage($desc);
	}else
	{
		echo json_encode(array("errorcode"=>$code,"errmsg" => $desc));
	}
	exit();
}

if($_SERVER['REQUEST_METHOD'] != "POST")
{
	returnResponse(40003,"方法不正确");
}
else
{
	try
	{
		global $_SGLOBAL,$inviteactive_showmsg;
		//$content = file_get_contents('php://input');
		//$json = json_decode($content);
		$uid = trim($_POST["uid"]);//trim($json->uid);
		runlog("qr","uid:".$uid);
		$name = trim($_POST["realname"]);//trim($json->realname);
		runlog("qr","name:".$name);
		$startyear = trim($_POST["startyear"]);//trim($json->startyear);
		runlog("qr","startyear:".$startyear);
		$academy = trim($_POST["academy"]);//trim($json->academy);
		runlog("qr","academy:".$academy);
		$birthday = trim($_POST["birthday"]);//trim($json->birthday);
		runlog("qr","birthday:".$birthday);
		$username = trim($_POST["username"]);//trim($json->username);
		runlog("qr","username:".$username);
		$password = trim($_POST["password"]);//trim($json->password);
		runlog("qr","password:".$password);
		runlog("qr","email:".$_POST["email"]);
		//$_SGLOBAL["no_inviteactive"];

		if($name=="" || $startyear=="" || $birthday=="" || strlen($password) < 6 || (!$_SGLOBAL["no_inviteactive"] && $uid ==""))
		{
			returnResponse(40002,"格式不正确");
		}
		if((!$_SGLOBAL["no_inviteactive"] && inject_check($uid)) || inject_check($name) || inject_check($startyear) || 
			inject_check($academy) || inject_check($birthday) || inject_check($username) || inject_check($password))
		{
			returnResponse(40002,"格式不正确");
		}
		else
		{
			if(!$_SGLOBAL["no_inviteactive"])
			{
				$count = 0;
				$q = $_SGLOBAL['db']->query("SELECT invite_remain FROM ".tname('space')." WHERE uid='$uid'");
				$count = $_SGLOBAL['db']->fetch_array($q);
				$count = $count['invite_remain'];
				if($count < 1)
				{
					returnResponse(40001,"用户没有邀请次数");
				}
			}
			//
			// 做一些注册用户的动作
			//
			$q = $_SGLOBAL['db']->query("SELECT userid FROM ".tname('baseprofile')." WHERE realname='$name' AND birthday='$birthday'");
			$realname_match = $_SGLOBAL['db']->fetch_array($q);
			$realname_match = $realname_match['userid'];

			$q = $_SGLOBAL['db']->query("SELECT tagid FROM ".tname('mtag')." WHERE startyear='$startyear' AND academy='$academy'");
			$collage_match = $_SGLOBAL['db']->fetch_array($q);
			$collage_match = $collage_match['tagid'];

			if($realname_match)
			{
				//从profile读取学院和入学年份
				$q = $_SGLOBAL['db']->query("SELECT academy,startyear FROM ".tname('baseprofile')." WHERE realname='$name' AND birthday='$birthday'");
				$academy = $_SGLOBAL['db']->fetch_array($q);
				$startyear = $academy['startyear'];
				$academy = $academy['academy'];
			}   
			else
			{
				//创建profile
				if($startyear<2000)
				{
					$q = $_SGLOBAL['db']->query("INSERT INTO ".tname('baseprofile')."(realname,startyear,birthday,academy) VALUES('$name','$startyear','$birthday','$academy')");
					$_SGLOBAL['db']->fetch_array($q);
					sleep(3);
				}
				else if($startyear<1951)
				{
					returnResponse(40015,"入学年份不正确");
				}
			}
			//走改造过的激活流程
			if(!$_POST['email'])
			{
				$_POST['email'] = $username;
				$email_pattern = '/(\w{4,16})@\w{1,}\.\w{2,3}/i';
				$matches = array();
				preg_match($email_pattern, $username, $matches[]);
				if($matches[0][1])
				{
					$username = $matches[0][1];
				}
				else
				{
					if($startyear<2000)
					{
						$q = $_SGLOBAL['db']->query("DELETE FROM ".tname('baseprofile')." WHERE realname='$realname' and birthday='$birthday'");
						$_SGLOBAL['db']->fetch_array($q);
					}
					returnResponse(40016,"用户名冲突，请换一个电子邮件地址");
				}
			}
			$realname = $name;
			$password = $password;

			$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('baseprofile')." WHERE realname='$realname' and birthday='$birthday' limit 1");
			$bp = $_SGLOBAL['db']->fetch_array($query);
			
			if(empty($bp))
				{
					if($startyear<2000)
					{
						$q = $_SGLOBAL['db']->query("DELETE FROM ".tname('baseprofile')." WHERE realname='$realname' and birthday='$birthday'");
						$_SGLOBAL['db']->fetch_array($q);
					}
					returnResponse(40017,"真实名称和生日不能匹配");
				}
			if($bp['isactive'] == 1)
				{
					if($startyear<2000)
					{
						$q = $_SGLOBAL['db']->query("DELETE FROM ".tname('baseprofile')." WHERE realname='$realname' and birthday='$birthday'");
						$_SGLOBAL['db']->fetch_array($q);
					}
					returnResponse(40004,"用户已经激活");
				}
			
			if(!@include_once S_ROOT.'./uc_client/client.php')
				{
					if($startyear<2000)
					{
						$q = $_SGLOBAL['db']->query("DELETE FROM ".tname('baseprofile')." WHERE realname='$realname' and birthday='$birthday'");
						$_SGLOBAL['db']->fetch_array($q);
					}
					returnResponse(40005,"系统错误");
				}

			//邮箱
			$email = isemail(trim($_POST['email']))?trim($_POST['email']):'';
			if(empty($email))
				{
					if($startyear<2000)
					{
						$q = $_SGLOBAL['db']->query("DELETE FROM ".tname('baseprofile')." WHERE realname='$realname' and birthday='$birthday'");
						$_SGLOBAL['db']->fetch_array($q);
					}
					returnResponse(40006,"电子邮件不能为空");
				}
			if($_SCONFIG['checkemail'])
				{
					if($count = getcount('spacefield', array('email'=>$email)))
						{
							if($startyear<2000)
							{
								$q = $_SGLOBAL['db']->query("DELETE FROM ".tname('baseprofile')." WHERE realname='$realname' and birthday='$birthday'");
								$_SGLOBAL['db']->fetch_array($q);
							}
							returnResponse(40007,"电子邮件被注册");
						}
				}

			//创建新用户
			$newuid = uc_user_register($username, $password, $email);
			if($newuid <= 0)
			{
				if($startyear<2000)
				{
					$q = $_SGLOBAL['db']->query("DELETE FROM ".tname('baseprofile')." WHERE realname='$realname' and birthday='$birthday'");
					$_SGLOBAL['db']->fetch_array($q);
				}
				if($newuid == -1)
					{
						returnResponse(40008,'用户名不合法');
					}
				elseif($newuid == -2)
					{
						returnResponse(40009,'信息包含不合法字符');
					}
				elseif($newuid == -3)
					{
						returnResponse(40010,'用户已经存在');
					}
				elseif($newuid == -4)
					{
						returnResponse(40011,'电子邮件格式不正确');
					}
				elseif($newuid == -5)
					{
						returnResponse(40012,'电子邮件没有被注册');
					}
				elseif($newuid == -6)
					{
						returnResponse(40013,'电子邮件被注册');
					}
				else
					{
						returnResponse(40014,'注册错误');
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

			//变更记录
			if($_SCONFIG['my_status']) inserttable('userlog', array('uid'=>$newuid, 'action'=>'add', 'dateline'=>$_SGLOBAL['timestamp']), 0, true);
			
			$q = $_SGLOBAL['db']->query("UPDATE ".tname('space')." SET groupid='6' WHERE uid='$newuid'");
			$_SGLOBAL['db']->fetch_array($q);
			if(!$realname_match)
			{
				$q = $_SGLOBAL['db']->query("UPDATE ".tname('space')." SET namestatus='0' WHERE uid='$newuid'");
				$_SGLOBAL['db']->fetch_array($q);
			}

			//一次md5密码存储到ihomeuser_members
			$hash = md5($password);
			$q = $_SGLOBAL['db']->query("UPDATE ihomeuser_members SET password1='$hash' WHERE uid='$newuid'");
			$_SGLOBAL['db']->fetch_array($q);

			//在线session
			insertsession($setarr);

			//设置cookie
			ssetcookie('auth', authcode("$setarr[password]\t$setarr[uid]", 'ENCODE'), 2592000);
			ssetcookie('loginuser', $username, 31536000);
			ssetcookie('_refer', '');
			///////////////////////
			///////////////////////
			///////////////////////
			if($academy)
			{
				if($_SGLOBAL["no_inviteactive"])
				{
					if($realname_match)
					{
						$gid = tagGrade3($startyear, $academy, $_SGLOBAL['db']);
						jointag($newuid, $gid, $_SGLOBAL['db']);
					}
					else
					{
						//需要找到群主，没有就找xuxing
						$q = $_SGLOBAL['db']->query("SELECT tagid FROM ".tname('mtag')." WHERE startyear='$startyear' AND academy='$academy'");
						$tagid = $_SGLOBAL['db']->fetch_array($q);
						$tagid = $tagid['tagid'];
						runlog("qr","tagid:".$tagid);
						if($tagid)
						{
							$q = $_SGLOBAL['db']->query("SELECT uid FROM ".tname('tagspace')." WHERE tagid='$tagid' AND grade='9'");
							$recver = $_SGLOBAL['db']->fetch_array($q);
							$recver = $recver['uid'];
						}
						if(!$recver)
						{
							$recver = 3;
						}
						runlog("qr","recver:".$recver);
						$setarr = array(
							'uid' => $recver,
							'type' => "friend",
							'new' => 1,
							'authorid' => $newuid,
							'author' => $name,
							'note' => "($birthday,$academy,".$startyear."级)".'向您发起了认证请求<br/><a href="space.php?do=friend&view=confirm&uid=%27'.$newuid.'%27">通过请求</a>',
							'dateline' => $_SGLOBAL['timestamp']
						);
						$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET notenum=notenum+1 WHERE uid='$recver'");
						inserttable('notification', $setarr);
					}
				}
				else
				{
					if($realname_match)
					{
						$gid = tagGrade3($startyear, $academy, $_SGLOBAL['db']);
						jointag($newuid, $gid, $_SGLOBAL['db']);
					}
					else
					{
						//另外还要发给邀请人一个验证通知。。。
						$setarr = array(
							'uid' => $uid,
							'type' => "friend",
							'new' => 1,
							'authorid' => $newuid,
							'author' => $name,
							'note' => "$name($birthday,$academy,$startyear级)".'向您发起了认证请求<br/><a href="space.php?do=friend&view=confirm&uid=%27'.$newuid.'%27">通过</a>',
							'dateline' => $_SGLOBAL['timestamp']
						);

						$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET notenum=notenum+1 WHERE uid='$uid'");
						
						inserttable('notification', $setarr);
					}
				}
			}
			$q = $_SGLOBAL['db']->query("UPDATE ".tname('baseprofile')." SET uid = '$newuid' WHERE userid='$bp[userid]'");
			$_SGLOBAL['db']->fetch_array($q);
			if(!$_SGLOBAL["no_inviteactive"])
			{
				$q = $_SGLOBAL['db']->query("UPDATE ".tname('space')." SET invite_remain = invite_remain - 1 WHERE uid='$uid'");
				$_SGLOBAL['db']->fetch_array($q);
			}
			if(!$inviteactive_showmsg)
				returnResponse(0,"ok");
		}
	}
	catch(Exception $e)
	{
		returnResponse(40002,"格式不正确");
	}
}
?>
