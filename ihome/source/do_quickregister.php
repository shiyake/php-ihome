<?php
	/*
	do_quickregister.php用于使用一卡通学号与教工号/密码进行快速激活，系统根据激活用户的信息判断是否有条记录，并将这些记录作为用户的教育或工作信息写入相应的数据表中，同时关联已开通的账号uid。
	modified by xuxing@ihome. 2012-12-17 16:40

	其中，将用户类型作一个规范，分别以数字进行表示： 本科生为1，硕士生为2，博士生为3，博士后为4，教职工为5，校友为6，留学生为7，其他为8。
	*/
if(!defined('iBUAA')) {
	exit('Access Denied');
}

define('COLLEGEID_CHECK_FAILED', -2);
define('COLLEGEID_NOT_LEGITIMATE', -1);
define('COLLEGEID_ACTIVATED', -3);
define('EMAIL_NOT_EXIST',-4);
define('MAIL_NOT_ADEQUENT',-5);

$op = $_GET['op'] ? trim($_GET['op']) : '';

if($_SGLOBAL['supe_uid']) {
	showmessage('do_success', 'space.php?do=home', 0);
}

//没有登录表单
$_SGLOBAL['nologinform'] = 1;

//好友邀请
$uid = empty($_GET['uid'])?0:intval($_GET['uid']);
$code = empty($_GET['code'])?'':$_GET['code'];
$app = empty($_GET['app'])?'':intval($_GET['app']);
$invite = empty($_GET['invite'])?'':$_GET['invite'];
$invitearr = array();

$invitepay = getreward('invitecode', 0);
$pay = $app ? 0 : $invitepay['credit'];

if($uid && $code && !$pay) {
	$m_space = getspace($uid);
	if($code == space_key($m_space, $app)) {
		$invitearr['uid'] = $uid;
		$invitearr['username'] = $m_space['username'];
	}
	$url_plus = "uid=$uid&app=$app&code=$code";
} elseif($uid && $invite) {
	include_once(S_ROOT.'./source/function_cp.php');
	$invitearr = invite_get($uid, $invite);
	$url_plus = "uid=$uid&invite=$invite";
}


if(empty($op))
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

		if(submitcheck('quickregistersubmit'))	{

		//先是验证是否已经激活
			$collegeid = trim($_POST['quickcollegeid']);
			$collegepw = $_POST['quickpassword'];
			$verifyname = verifycollegeid($collegeid, $collegepw);
			if($verifyname == -1){
				showmessage('collegeid_is_null');
			}elseif($verifyname == -2){
				showmessage('collegepassword_is_null');
			}
			if(empty($verifyname->out->string)){
				showmessage('verify_fail');
			}
			$username = $collegeid;
			$password = $collegepw;
			$query = $_SGLOBAL['db']->query("SELECT identifier,identifier_not_use, realname,birthday, sex, defaultemail, isactive, emaildateline FROM ".tname('baseprofile')." WHERE collegeid='$collegeid'  and (usertype like binary '教师' or (usertype between 1 and 5) or usertype like binary '学生') limit 1");
			$one = $_SGLOBAL['db']->fetch_array($query);
			$id = $one['identifier_not_use'];
			$realname = $one['realname'];
			$birthday_exist = $one['birthday'];		
			if(strlen($id)==18){
				$birthday_id = substr($id,6,8);
			}elseif(strlen($id)==16){
				$birthday_id = '19'.substr($id,6,6);
			}
			if($one){
				$wheresql="0";
				if($id){
					$wheresql .= " or identifier_not_use='".$id."'";
				}
				if(strlen($birthday_exist)==8){
					$wheresql .= " or (realname='".$realname."' and birthday='".$birthday_exist."')";
				}
				if($birthday_id){
					$wheresql .= " or (realname='".$realname."' and birthday='".$birthday_id."')";
				}

				$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('baseprofile')." WHERE $wheresql");
				$flagnotactive = 0;
				$flagactive = 0;
				$userlines = $recordids = array();
				$c_uid = 0;
				
				while($row = $_SGLOBAL['db']->fetch_array($query)){
					$userlines[] = $row;
					if($row['isactive'] == '1'){
						$flagactive = 1;
					}else{
						$flagnotactive = 1;
						$recordids[] = $row['userid'];
					}
					
					if($row['uid']){
						if(!$c_uid){
							$c_uid = $row['uid'];
						}elseif($c_uid != $row['uid']){
							$act_err = 1;
						}
					}
				}
				
				//如果一个人激活了多个ihome账号时，系统将向ihome邮箱发送检查邮件
				if($act_err){
					$title = cplang('active_different_uids_title');
					$content = $collegeid." ".$realname." ".cplang('active_different_uids_content');
					$cid = inserttable('mailcron', array('email'=>'ihome@buaa.edu.cn'), 1);
					$setarr = array(
					'cid' => $cid,
					'subject' => addslashes(stripslashes($title)),
					'message' => addslashes(stripslashes($content)),
					'dateline' => $_GLOBAL['timestamp']
					);
					inserttable('mailqueue', $setarr);
				}
				
				//如果既有激活的 也有没激活的 更新没激活的信息
				if($flagactive == 1 && $flagnotactive == 1){
					$useridlist = implode(',',$recordids);
					$_SGLOBAL['db']->query("UPDATE ".tname('baseprofile')." SET isactive=1, uid=$c_uid WHERE userid in ($useridlist)");					
					foreach($userlines as $value){
						if($value['isactive'] != '1'){
							if($value['academy']){
								if($value['usertype'] == '教师'||$value['usertype']==5||$value['usertype']==4){
									$workinfo = array('uid'=>$c_uid, 'type'=>'work', 'title'=>'北京航空航天大学', 'subtitle'=>$value['academy'], 'startyear'=>$value['startyear'], 'city'=>'北京');
									inserttable('spaceinfo', $workinfo, 1);
								}
								if(strlen($value['collegeid']) != 5 && strlen($value['collegeid']) != 6){
									if(!in_array($value['collegeid'],$collegeids)){
										$collegeids[]=$value['collegeid'];
										$eduinfo = array('uid'=>$c_uid, 'type'=>'edu', 'title'=>'北京航空航天大学', 'subtitle'=>$value['academy'], 'startyear'=>$value['startyear']);
										inserttable('spaceinfo', $eduinfo, 1);
									}
								}
							}

						}						
					}
					showmessage('identifier_is_active', '', 3);
				}elseif($flagactive == 1){
					showmessage('identifier_is_active', '', 3);
				}
			}else{
				showmessage('请用正确的激活方式进行激活注册~');
			}
			if($_SCONFIG['seccode_register'])
				{
					include_once(S_ROOT.'./source/function_cp.php');
					if(!ckseccode($_POST['quickseccode']))
						{
							showmessage('incorrect_code');
						}
				}
			if(!@include_once S_ROOT.'./uc_client/client.php')
				{
					showmessage('system_error');
				}			
			$email = isemail(trim($_POST['quickemail']))?trim($_POST['quickemail']):'';
			if(empty($email))
				{
					showmessage('email_format_is_wrong');
				}
			if($count = getcount('space', array('username'=>$username)))
				{
					showmessage('user_name_already_exists');
				}
				if($count = getcount('spacefield', array('email'=>$email)))
					{
						showmessage('email_has_been_registered');
					}
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

		//验证完成

		//创建新用户.开始
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
						'password' => md5($password)
					);
					inserttable('member', $setarr, 0, true);
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

				//自动为用户添加好友
				if($userlines){
					autobefriends($userlines,$newuid,$_POST['username']);
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
				
					//标记为已激活，并反写uid
					if($recordids){
						$useridlist = implode(',',$recordids);
						$_SGLOBAL['db']->query("UPDATE ".tname('baseprofile')." SET isactive=1, uid=$newuid WHERE userid in ($useridlist)");
					}
				
					$insertinfo = array('identifier' => $one['identifier'], 'realname' => $realname, 'defaultemail' => $one['defaultemail']);
					
					//获得用户生日数据
					//$decid = M_decode($value['identifier'], aeskeyA);
					$UserBirthday = '';
					if($birthday_id){
						$UserBirthday = $birthday_id;
					}elseif($birthday_exist){
						$UserBirthday = $birthday_exist;
					}
					
					if($UserBirthday){
						$insertinfo['birthyear'] = intval(substr($UserBirthday, 0, 4));
						$insertinfo['birthmonth'] = intval(substr($UserBirthday, 4, 2));
						$insertinfo['birthday'] = intval(substr($UserBirthday, 6, 2));
					}
					
					if( $one['sex'] == '男') {
						$sexc = 1;
					}else if($one['sex'] == '女') {
						$sexc = 2;
					}else{
						$sexc = 0;
					}
					$insertinfo['sex'] = $sexc;
					//print_r($insertinfo);exit();
					//更新spacefield
					updatetable('spacefield', $insertinfo, array('uid' => $newuid));
					if($insertinfo['birthyear'] && $insertinfo['birthmonth'] && $insertinfo['birthday']){
						$_SGLOBAL['db']->query("INSERT INTO ".tname('spaceinfo')." (type,subtype,uid,friend) VALUES ('base','birth',".$newuid.",3)");
					}
					
					//更新space
					$space = array('uid'=>$newuid, 'name'=>$realname, 'namestatus'=>1);
					//print_r($space);
					//exit();
					updatetable('space', $space, array('uid'=>$newuid));
					foreach($userlines as $value){
						if($value['isactive'] != '1'){
							
							if($value['academy']){
								if($value['usertype'] == '教师'||$value['usertype']==5||$value['usertype']==4){
									$workinfo = array('uid'=>$newuid, 'type'=>'work', 'title'=>'北京航空航天大学', 'subtitle'=>$value['academy'], 'startyear'=>$value['startyear'], 'city'=>'北京');
									inserttable('spaceinfo', $workinfo, 1);
								}
								if(strlen($value['collegeid']) != 5 && strlen($value['collegeid']) != 6){
									if(!empty($value['class']) && !empty($value['startyear'])){
									$eduinfo = array('uid' => $newuid, 'type'=>'edu', 'title' => '北京航空航天大学', 'subtitle'=>$value['academy'].$value['startyear'].'级'.$value['class'].'班', 'startyear'=>$value['startyear']);
									$tagname = $value['startyear'].'年'.$value['class'].'班';				
									auto_join($newuid, $tagname, $_SGLOBAL['db']);
									inserttable('spaceinfo', $eduinfo, 1);
									}
								}
							}
						}	
					}
				
				//毕业校友的就业信息
				$query1 = $_SGLOBAL['db']->query("SELECT * FROM ".tname('stuemp')." WHERE collegeid='$value[collegeid]'");
				if($value1 = $_SGLOBAL['db']->fetch_array($query1)) {	
					 $setarr1 = array( 'uid' => $newuid , 'type'=>'work' , 'title'=>$value['unit'] , 'province'=>$value['province'] ,'city' => $value['city']);
					 inserttable('spaceinfo',$setarr1,1); 
				}

				//变更记录
				if($_SCONFIG['my_status']) inserttable('userlog', array('uid'=>$newuid, 'action'=>'add', 'dateline'=>$_SGLOBAL['timestamp']), 0, true);
		//创建新用户结束
				showmessage('registered', 'space.php?do=home',3);
			}

		}
	
		$register_rule = data_get('registerrule');

		include template('do_quickregister');


}elseif($op == 'checkquickcollegeid'){

	$collegeid = trim($_GET['quickcollegeid']);

	if(empty($collegeid)){
		showmessage('collegeid_is_null');
	}
	$result = check_collegeid($collegeid,1);

	if($result == -1){
		showmessage('collegeid_is_invalid');
	}elseif($result == -2){
		showmessage('collegeid_is_not_legitimate');
	}elseif($result == -3){
		showmessage('collegeid_is_active');
	}elseif($result == -4){
		showmessage('email_not_exist');
	}elseif($result == -5){
		showmessage('mail_not_adequent');
	}else{
		showmessage('succeed');
	}

}

elseif($op == "checkquickseccode") {
	
	include_once(S_ROOT.'./source/function_cp.php');
	if(ckseccode(trim($_GET['quickseccode']))) {
		showmessage('succeed');
	} else {
		showmessage('incorrect_code');
	}
}
?>