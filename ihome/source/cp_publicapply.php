<?php
//**************************		//
//公共主页申请，写入数据库		    //
//            coding by Lv 	 		//
//			  Modified by Xuxing	//
//lastedit @ 2012-10-16      		//
//**************************		//

if(!defined('iBUAA')) {
	exit('Access Denied');
}
if($_SGLOBAL['member']['groupid'] == 3){
	showmessage('apply_not_by_publicpage','space.php?do=public', 2);
}
//没有登录表单
//$_SGLOBAL['nologinform'] = 1;

$op = $_GET['op'] ? trim($_GET['op']) : '';


if(submitcheck("applysubmit")){
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$username = trim($_POST['username']);
		$name = trim($_POST['fullname']);
		$email = $_POST['email'];
		$reason = $_POST['reason'];
		$contact = $_POST['contact'];
		$phone = $_POST['phone'];
		$contactid = $_POST['contactid'];
		$type = $_POST['publictype'];
		$appuid = $_POST['appuid'];
		$time = date('Y-m-d H:i:s');

		if(!($username && $name && $email && $reason && $phone && $contactid && ($type >= 0) && $appuid && $contact)){
			showmessage('apply_illegal');
		}else{
			//处理登录名
			$strlen = strlen($username);
			if($strlen < 3 || $strlen > 15){
				$strlen < 3 ? showmessage('username_less') : showmessage('username_more');
			}
			@include_once (S_ROOT.'./uc_client/client.php');
			$ucresult = uc_user_checkname($username);

			if($ucresult == -1) {
				showmessage('user_name_is_not_legitimate');
			} elseif($ucresult == -2) {
				showmessage('include_not_registered_words');
			} elseif($ucresult == -3) {
				showmessage('user_name_already_exists');
			}
			
			//处理公共主页全名
			//统计UTF下的字符数
			$count=0;
			 for($i = 0; $i < strlen($name); $i++){ 
				 $value = ord($name[$i]); 
				 if($value > 127) { 
				 $count++;
					 if($value >= 192 && $value <= 223) $i++; 
					 elseif($value >= 224 && $value <= 239) $i = $i + 2; 
					 elseif($value >= 240 && $value <= 247) $i = $i + 3; 
				 } 
			 } 
			 if($count < 2 || $count > 20){
				$count < 2 ? showmessage('fullname_less') : showmessage('fullname_more');
			 }
			$query=$_SGLOBAL['db']->query("select uid from ".tname('space')." where name='".$name."' and groupid=3 limit 1");
			if($_SGLOBAL['db']->fetch_array($query)){
				showmessage('fullname_exist');
			}
			
			//处理邮箱格式, 输入邮箱地址，标识是否需要检查邮箱的唯一性，返回-1为格式不正确，-2为已存在该邮箱，0为格式正确
			$emailback = getCheckEmail($email);
			if($emailback == -1){
				showmessage('email_format_is_wrong');
			}elseif($emailback == -2){
				showmessage('email_has_been_registered');
			}
			
		}

		$setarr = array(
			'uid' => -1,
			'username' => $username,
			'name' => $name,
			'reason' => $reason,
			'email' => $email,
			'adminuid' => -1,
			'ruthed' => 0,
			'apptime' => $time,
			'contact' => $contact,
			'phone' => $phone,
			'contactid' =>$contactid,
			'type' => $type,
			'appuid' => $appuid
			);	
			inserttable('publicapply', $setarr, 0);
		
		//将手机号存储至个人信息中; 
		if(substr($phone,0,1)=="1" && strlen($phone)==11){
			if(empty($_SGLOBAL['member']['mobile'])){
				updatetable('spacefield',array('mobile'=>$phone),array('uid'=>$appuid));
				if(getcount('spaceinfo', array('uid'=>$appuid,'subtype'=>'mobile'))){
					updatetable('spaceinfo',array('friend'=>3),array('uid'=>$appuid,'subtype'=>'mobile'));
				}else{
					inserttable('spaceinfo',array('friend'=>3,'uid'=>$appuid,'subtype'=>'mobile','type'=>'contact'), 0);
				}
			}
		}

		$note = cplang('note_public_apply', array("admincp.php?ac=publicapply"));
		
		//向管理员发送消息
		$query = $_SGLOBAL['db']->query("SELECT uid FROM ".tname('space')." where groupid=1");
		while ($value = $_SGLOBAL['db']->fetch_array($query)){	
			notification_add($value['uid'], 'systemnote', $note);
		}
		showmessage('do_success','space.php?do=public', 2);

	}
}

if($op == "checkusername") {

	$username = trim($_GET['username']);
	if(empty($username)) {
		showmessage('user_name_is_not_legitimate');
	}
	@include_once (S_ROOT.'./uc_client/client.php');
	$ucresult = uc_user_checkname($username);

	$query = $_SGLOBAL['db']->query("SELECT appid FROM ".tname('publicapply')." WHERE ruthed=0 and username='".$username."' limit 1");
	$appid = $_SGLOBAL['db']->fetch_array($query);


	if($ucresult == -1) {
		showmessage('user_name_is_not_legitimate');
	} elseif($ucresult == -2) {
		showmessage('include_not_registered_words');
	} elseif($ucresult == -3) {
		showmessage('user_name_already_exists');
	} elseif($appid){
		showmessage('apply_public_username_already_existed');
	} else {
		showmessage('succeed');
	}
}elseif($op == "checkname") {

	$name = trim($_GET['fullname']);
	if(empty($name)) {
		showmessage('fullname_illegal');
	}else{
		$query=$_SGLOBAL['db']->query("select uid from ".tname('space')." where name='".$name."' and groupid=3 limit 1");
		if($_SGLOBAL['db']->fetch_array($query)){
			showmessage('fullname_exist');
		}else{
			$query = $_SGLOBAL['db']->query("SELECT appid FROM ".tname('publicapply')." WHERE ruthed=0 and name='".$name."' limit 1");
			if($_SGLOBAL['db']->fetch_array($query)){
				showmessage('apply_public_name_already_existed');
			}else{
				showmessage('succeed');				
			}

		}
	}
	
}elseif($op == "checkemail") {
	$email = trim($_GET['email']);
	if($count = getcount('spacefield', array('email'=>$email))){
		showmessage('email_has_been_registered');
	}else{
		$query = $_SGLOBAL['db']->query("SELECT appid FROM ".tname('publicapply')." WHERE ruthed=0 and email='".$email."' limit 1");
		if($_SGLOBAL['db']->fetch_array($query)){
			showmessage('apply_public_email_already_existed');
		}else{
				showmessage('succeed');				
		}	
	}
}



include template('cp_publicapply');

?>