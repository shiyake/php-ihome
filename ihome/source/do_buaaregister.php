<?php
/*
	do_buaaregister.php用于完善邮箱激活用户的账号信息，并进行账号开通，同时将相应的信息写入ihome的相应的数据表中。
	其中，将用户类型作一个规范，分别以数字进行表示： 本科生为1，硕士生为2，博士生为3，博士后为4，教职工为5，校友为6，留学生为7，其他为8
*/


if(!defined('iBUAA')) {
	exit('Access Denied');
}
ignore_user_abort(true);

include_once(S_ROOT.'./source/function_cp.php');
//include_once(S_ROOT.'./source/join.php');
include_once(S_ROOT.'./uc_client/client.php');
include_once(S_ROOT.'./buaasso.php');

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
	if($code == space_key($m_space, $app)) {//验证通过
		$invitearr['uid'] = $uid;
		$invitearr['username'] = $m_space['username'];
	}
	$url_plus = "uid=$uid&app=$app&code=$code";
} elseif($uid && $invite) {
	include_once(S_ROOT.'./source/function_cp.php');
	$invitearr = invite_get($uid, $invite);
	$url_plus = "uid=$uid&invite=$invite";
}

$jumpurl = $app?"userapp.php?id=$app&my_extra=invitedby_bi_{$uid}_{$code}&my_suffix=Lw%3D%3D":'space.php?do=home';

if(empty($op)) {

	if($_SCONFIG['closeregister']) {
		if($_SCONFIG['closeinvite']) {
			showmessage('not_open_registration');
		} elseif(empty($invitearr)) {
			showmessage('not_open_registration_invite');
		}
	}

	//是否关闭站点
	checkclose();
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
		//已经注册用户
		$username = $_POST['username'];
		$collegeid = $_POST['collegeid'];
		
		if($_SGLOBAL['supe_uid']) {
			showmessage('registered', 'space.php');
		}
		
		//检查待开通的用户是否有条信息。 start
		$query = $_SGLOBAL['db']->query("SELECT identifier,identifier_not_use, realname,birthday, sex, defaultemail, isactive, emaildateline FROM ".tname('baseprofile')." WHERE collegeid='$collegeid'  and (usertype like binary '教师' or (usertype between 1 and 5) or usertype like binary '学生') limit 1");
		$one = $_SGLOBAL['db']->fetch_array($query);
		
		$id = $one['identifier_not_use'];
		$realname = $one['realname'];
		$birthday_exist = $one['birthday'];
		
		if(strlen($id)==18){
			$birthday_id = substr($id,6,8);
		}elseif(strlen($id) == 15){
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
				//存储学号信息
				//$_SGLOBAL['collegeid'] = $collegeid;
				$setarr = array(
				'cid' => $cid,
				'subject' => addslashes(stripslashes($title)),
				'message' => addslashes(stripslashes($content)),
				'dateline' => $_GLOBAL['timestamp']
				);
				//放入邮件队列
				inserttable('mailqueue', $setarr);
			}
			
			//如果既有激活的 也有没激活的 更新没激活的信息
			if($flagactive == 1 && $flagnotactive == 1){
				//$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('baseprofile')." WHERE identifier='$id'");
				//$row = $_SGLOBAL['db']->fetch_array($query);
				
				$useridlist = implode(',',$recordids);
				$_SGLOBAL['db']->query("UPDATE ".tname('baseprofile')." SET isactive=1, uid=$c_uid WHERE userid in ($useridlist)");
				
				foreach($userlines as $value){
					if($value['isactive'] != '1'){
						
						//如果是老师，添加工作经历的信息,有校友后添加校友信息
						/*$idhash = M_encode($id, aeskeyA);
						$queryuid = $_SGLOBAL['db']->query("SELECT uid FROM ".tname('spacefield')." WHERE identifier='$idhash'");
						$valueuid = $_SGLOBAL['db']->fetch_array($queryuid);*/
						//var_dump($valueuid);
						//exit();
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
						//将baseprofile激活字段置1
						//$activate = array('isactive' => 1);
						//updatetable('baseprofile', $activate, array('collegeid' => $row['collegeid']));
					}
					//$row = $_SGLOBAL['db']->fetch_array($query);$_SGLOBAL['db']->fetch_array($query)
					
				}
				//提示用户已经激活过了
				showmessage('identifier_is_active', '', 3);
				exit();
			}elseif($flagactive == 1){
				showmessage('identifier_is_active', '', 3);
				exit();
			}
		}else{
			showmessage('请用正确的激活方式进行激活注册~');
			exit();
		}
		//检查待开通的用户是否有多条信息。 end 
		
		//检查该用户是否已激活开通
		/*if($one['isactive'] == 1){
			showmessage('identifier_is_active');
			exit();
		}*/
		
		//检查校验码是否正确
		if(!ckseccode($_POST['seccode'])) {
			showmessage('incorrect_code');
		}
		//检查两次密码是否一致
		if($_POST['password'] != $_POST['password2']) {
			showmessage('password_inconsistency');
		}
		if(!$_POST['password'] || $_POST['password'] != addslashes($_POST['password'])) {
			showmessage('profile_passwd_illegal');
		}
		
		$username = trim($_POST['username']);
		$password = $_POST['password'];
		$email = isemail($_POST['email'])?$_POST['email']:'';
		
		if(empty($_POST['email'])) {
			showmessage('email_format_is_wrong');
		}
		
		if($count = getcount('spacefield', array('email'=>$_POST['email']))) {
			showmessage('email_has_been_registered');
		}
		
		//检查IP
		$onlineip = getonlineip();
		if($_SCONFIG['regipdate']) {
			$query = $_SGLOBAL['db']->query("SELECT dateline FROM ".tname('space')." WHERE regip='$onlineip' ORDER BY dateline DESC LIMIT 1");
			if($value = $_SGLOBAL['db']->fetch_array($query)) {
				if($_SGLOBAL['timestamp'] - $value['dateline'] < $_SCONFIG['regipdate']*3600) {
					showmessage('regip_has_been_registered', '', 1, array($_SCONFIG['regipdate']));
				}
			}
		}

		//创建新用户
		$newuid = uc_user_register($_POST['username'], $_POST['password'], $_POST['email']);
		if($newuid <= 0) {
				if($newuid == -1) {
					showmessage('user_name_is_not_legitimate');
				} elseif($newuid == -2) {
					showmessage('include_not_registered_words');
				} elseif($newuid == -3) {
					showmessage('user_name_already_exists');
				} elseif($newuid == -4) {
					showmessage('email_format_is_wrong');
				} elseif($newuid == -5) {
					showmessage('email_not_registered');
				} elseif($newuid == -6) {
					showmessage('email_has_been_registered');
				} else {
					showmessage('register_error');
				}
		} else{//注册成功
			$setarr = array(
				'uid' => $newuid,
				'username' => $_POST['username'],
				'password' => md5($_POST['password'])
			);
			//var_dump($setarr);
			//exit;
			//更新本地用户库
			inserttable('member', $setarr, 0, true);
            //add action log
            inserttable('actionlog', array('uid'=>"$newuid", 'dateline'=>"$_SGLOBAL[timestamp]", 'action'=>'register', 'value'=>'email'));
			//开通空间
			include_once(S_ROOT.'./source/function_space.php');
			$space = space_open($newuid, $username, 0, $email);
			
			//加入新用户
			//inserttable('spacefield', array('uid'=>$newuid), 0, true);
			
			//默认好友
			$flog = $inserts = $fuids = $pokes = array();
			if(!empty($_SCONFIG['defaultfusername'])) {
				$query = $_SGLOBAL['db']->query("SELECT uid,username FROM ".tname('space')." WHERE username IN (".simplode(explode(',', $_SCONFIG['defaultfusername'])).")");
				while ($value = $_SGLOBAL['db']->fetch_array($query)) {
					$value = saddslashes($value);
					$fuids[] = $value['uid'];
					$inserts[] = "('$newuid','$value[uid]','$value[username]','1','$_SGLOBAL[timestamp]')";
					$inserts[] = "('$value[uid]','$newuid','$username','1','$_SGLOBAL[timestamp]')";
					$pokes[] = "('$newuid','$value[uid]','$value[username]','".addslashes($_SCONFIG['defaultpoke'])."','$_SGLOBAL[timestamp]')";
					//添加好友变更记录
					$flog[] = "('$value[uid]','$newuid','add','$_SGLOBAL[timestamp]')";
				}
				if($inserts) {
					$_SGLOBAL['db']->query("REPLACE INTO ".tname('friend')." (uid,fuid,fusername,status,dateline) VALUES ".implode(',', $inserts));
					$_SGLOBAL['db']->query("REPLACE INTO ".tname('poke')." (uid,fromuid,fromusername,note,dateline) VALUES ".implode(',', $pokes));
					$_SGLOBAL['db']->query("REPLACE INTO ".tname('friendlog')." (uid,fuid,action,dateline) VALUES ".implode(',', $flog));
					//添加到附加表
					$friendstr = empty($fuids)?'':implode(',', $fuids);
					updatetable('space', array('friendnum'=>count($fuids), 'pokenum'=>count($pokes)), array('uid'=>$newuid));
					updatetable('spacefield', array('friend'=>$friendstr, 'feedfriend'=>$friendstr), array('uid'=>$newuid));
					//更新默认用户好友缓存
					include_once(S_ROOT.'./source/function_cp.php');
					foreach ($fuids as $fuid) {
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
				
				$insertinfo = array('identifier' => $one['identifier'], 'realname' => $realname, 'email' => $_POST['email'], 'defaultemail' => $one['defaultemail'],'emailcheck' => '1');
				
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
			showmessage('registered', $jumpurl);
		}
	}else{//刚点击进入时
		$collegeid = '';
		$defaultemail = '';	
		$_GET['hash'] = empty($_GET['hash']) ? '' : trim($_GET['hash']);
		if($_GET['hash']) {
			list($collegeid, $defaultemail) = explode("\t", authcode($_GET['hash'], 'DECODE'));
		}
		if(!empty($collegeid) && isemail($defaultemail)){
			//检查学号与邮箱是否一致
			if(getcount('baseprofile', array('collegeid'=>$collegeid, 'defaultemail'=>$defaultemail)) != 1) {
				showmessage('uniqueemail_recheck');
			}
			//根据邮箱取得学生/教工号的别名邮箱
			list($number, $domain) = explode("@", $defaultemail);
			$alias = file_get_contents("http://mail.buaa.edu.cn/getalias.php?uid=".$number."&domain=".$domain);
			$alias = trim($alias);
			if(!empty($alias)){
				//list($alias,$other_a) = explode(" ", $alias,2);
				$a_array = array();
				$a_array =  split("[ \t\r\n]+",$alias);
				$alias = $a_array[0];
				$alias = trim($alias);
				$domain = trim($domain);
				$defaultemail = $alias."@".$domain;
				updatetable('baseprofile', array('aliasemail'=>$defaultemail), array('collegeid'=>$collegeid));
			}

			//检查是否取得数据
			//if(empty($_SGLOBAL['userinfo'])) {
			//	showmessage('system_error');
			//}
			//检查用户id与全局变量里的是否一致
			//if($_SGLOBAL['collegeid'] != $collegeid){
			//	showmessage('collegeid_invalid');
			//}
			//else{
			$tmptime = explode(' ', microtime());
			$curtime = $tmptime[1];
			//当前时间
			$curtime = $curtime + $tmptime[0];
			$curtime = intval($curtime);
			$query = $_SGLOBAL['db']->query("SELECT emaildateline FROM ".tname('baseprofile')." WHERE collegeid='$collegeid'");
			$value = $_SGLOBAL['db']->fetch_array($query);
			//激活邮件已经过期
			if(($curtime - intval($value['emaildateline'])) >= 86400){
				showmessage('email_timeout', '', 3);
			}
			else{
				//此时通过鉴定,加载注册页面
				//include template('do_buaaregister');
				//$identifierhash = authcode($value['identifier'], 'ENCODE');
			}
			//}
		}
		else{
			//没有用户信息，无效
			showmessage('non_userinfo');
		}
	}
	
	$register_rule = data_get('registerrule');
	include template('do_buaaregister');
} elseif($op == "checkusername") {

	$username = trim($_GET['username']);
	if(empty($username)) {
		showmessage('user_name_is_not_legitimate');
	}
	@include_once (S_ROOT.'./uc_client/client.php');
	$ucresult = uc_user_checkname($username);

	if($ucresult == -1) {
		showmessage('user_name_is_not_legitimate');
	} elseif($ucresult == -2) {
		showmessage('include_not_registered_words');
	} elseif($ucresult == -3) {
		showmessage('user_name_already_exists');
	} else {
		showmessage('succeed');
	}
} elseif($op == "checkseccode") {
	
	include_once(S_ROOT.'./source/function_cp.php');
	if(ckseccode(trim($_GET['seccode']))) {
		showmessage('succeed');
	} else {
		showmessage('incorrect_code');
	}
}

?>
