<?php

if(!defined('iBUAA') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
if(!checkperm('managepublic')) {
	cpmessage('no_authority_management_operation');
}

/********************************************
创建:lv
修改:xuxing
时间:2012-10-21
*************************************************/

include_once(S_ROOT.'./uc_client/client.php');
include_once(S_ROOT.'./data/data_usergroup.php');
@include_once(S_ROOT.'./data/data_profilefield.php');
$op = $_GET['op'] ? trim($_GET['op']) : '';
$appid = $_GET['appid'] ? trim($_GET['appid']) : '';
if($op==''){
	$applist = array();
	$i=0;
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('publicapply')." WHERE ruthed=0 ORDER BY apptime DESC");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$applist[]=$value;
		$i++;
	}

	$deallog = array();
	$j=0;
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('publicapply')." WHERE ruthed!=0 ORDER BY apptime DESC");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$deallog[]=$value;
		$j++;
		
	}
	//include template('admin/tpl/publicapply');

}
elseif($op=='details'){
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('publicapply')." WHERE appid=$appid");	
	$value = $_SGLOBAL['db']->fetch_array($query);
	echo '登录名:'.$value['username'].'<br>';
	echo '主页名:'.$value['name'].'<br>';
	echo '理由:'.$value['reason'].'<br>';
	echo '邮箱:'.$value['email'].'<br>';
	echo '申请时间:'.$value['apptime'].'<br>';
	echo '联系人:'.$value['contact'].'<br>';
	echo '联系方式:'.$value['phone'].'<br>';
	echo '联系人学号/教工号:'.$value['contactid'].'<br>';
	echo '公共主页类型:'.$value['type'].'<br>';
	echo '初始密码:'.$value['pw'].'<br>';
	echo '处理者id:'.$value['adminuid'].'<br>';
}
elseif($op=='approval'){
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('publicapply')." WHERE appid=$appid");	
	$value = $_SGLOBAL['db']->fetch_array($query);
	$username=$value['username'];
	$name=$value['name'];
	$publictype=$value['type'];
	$email = isemail($value['email'])?$value['email']:'';
	$appuid=$value['appuid'];
	$pw=random_pw(8);

	if(empty($username)) {
		$setarr=array('ruthed'=>-2,'adminuid'=>$_SGLOBAL['supe_uid']);//表明拒绝接受
		updatetable('publicapply',$setarr,array('appid'=>$appid));
		showmessage('user_name_is_not_legitimate');
	}
	@include_once (S_ROOT.'./uc_client/client.php');
	$ucresult = uc_user_checkname($username);

	if($ucresult == -1) {
		$setarr=array('ruthed'=>-2,'adminuid'=>$_SGLOBAL['supe_uid']);//表明拒绝接受
		updatetable('publicapply',$setarr,array('appid'=>$appid));
		showmessage('user_name_is_not_legitimate');
	} elseif($ucresult == -2) {
		$setarr=array('ruthed'=>-2,'adminuid'=>$_SGLOBAL['supe_uid']);//表明拒绝接受
		updatetable('publicapply',$setarr,array('appid'=>$appid));
		showmessage('include_not_registered_words');
	} elseif($ucresult == -3) {
		$setarr=array('ruthed'=>-2,'adminuid'=>$_SGLOBAL['supe_uid']);//表明拒绝接受
		updatetable('publicapply',$setarr,array('appid'=>$appid));
		showmessage('user_name_already_exists');
	} 

		$newuid = uc_user_register($username, $pw, $email);
		if($newuid <= 0) {
			$subject = '公共主页申请受理';
			$message = '您申请的公共主页 '.$name.' 登录名或邮箱存在问题，请重新填写申请。如有疑问，请EMAIL至ihome@buaa.edu.cn，或私信给ihome公共主页。';
				
			/*$cid = inserttable('mailcron', array('email'=>$email), 1);
			$setarr = array(
				'cid' => $cid,
				'subject' => '公共主页申请受理',
				'message' => '您申请的公共主页'.$name.'登录名或邮箱存在问题，请重新填写申请。如有疑问，请EMAIL至ihome@buaa.edu.cn，感谢您对本网站的支持!',
				'dateline' => $_GLOBAL['timestamp']
				);
				//放入邮件队列
			inserttable('mailqueue', $setarr);*/
			uc_pm_send(0, $appuid, $subject, $message, 1, 0, 0);
			
				if($newuid == -1) {
					$setarr=array('ruthed'=>-2,'adminuid'=>$_SGLOBAL['supe_uid']);//表明拒绝接受
					updatetable('publicapply',$setarr,array('appid'=>$appid));
					showmessage('user_name_is_not_legitimate');
				} elseif($newuid == -2) {
					$setarr=array('ruthed'=>-2,'adminuid'=>$_SGLOBAL['supe_uid']);//表明拒绝接受
					updatetable('publicapply',$setarr,array('appid'=>$appid));
					showmessage('include_not_registered_words');
				} elseif($newuid == -3) {
					$setarr=array('ruthed'=>-2,'adminuid'=>$_SGLOBAL['supe_uid']);//表明拒绝接受
					updatetable('publicapply',$setarr,array('appid'=>$appid));
					showmessage('user_name_already_exists');
				} elseif($newuid == -4) {
					$setarr=array('ruthed'=>-3,'adminuid'=>$_SGLOBAL['supe_uid']);//表明拒绝接受
					updatetable('publicapply',$setarr,array('appid'=>$appid));
					showmessage('email_format_is_wrong');
				} elseif($newuid == -5) {
					$setarr=array('ruthed'=>-3,'adminuid'=>$_SGLOBAL['supe_uid']);//表明拒绝接受
					updatetable('publicapply',$setarr,array('appid'=>$appid));
					showmessage('email_not_registered');
				} elseif($newuid == -6) {
					$setarr=array('ruthed'=>-3,'adminuid'=>$_SGLOBAL['supe_uid']);//表明拒绝接受
					updatetable('publicapply',$setarr,array('appid'=>$appid));
					showmessage('email_has_been_registered');
				} else {
					$setarr=array('ruthed'=>-4,'adminuid'=>$_SGLOBAL['supe_uid']);//表明拒绝接受
					updatetable('publicapply',$setarr,array('appid'=>$appid));
					showmessage('register_error');
				}
		} else{//注册成功
			$setarr = array(
				'uid' => $newuid,
				'username' => $username,
				'password' => md5($pw)
			);
			inserttable('member', $setarr, 0, true);
			include_once(S_ROOT.'./source/function_space.php');
			$space = space_open($newuid, $username, 3, $email);
		}
		$s=array('groupid'=>3,'pptype'=>$publictype,'name'=>$name, 'namestatus'=>1);
		updatetable('space',$s,array('uid'=>$newuid));
		$setarr=array('ruthed'=>1,'adminuid'=>$_SGLOBAL['supe_uid'],'pw'=>$pw,'uid'=>$newuid);//表明接受
		updatetable('publicapply',$setarr,array('appid'=>$appid));

		/*$cid = inserttable('mailcron', array('email'=>$email), 1);
		$setarr = array(
				'cid' => $cid,
				'subject' => '公共主页申请受理',
				'message' => '您申请的公共主页'.$name.'已成功开通，请使用'.$username.'登录，初始密码位'.$pw.'登录后请尽快修改您的密码，感谢您对本网站的支持!',
				'dateline' => $_GLOBAL['timestamp']
				);
				//放入邮件队列
		inserttable('mailqueue', $setarr);
			*/
		$subject = '公共主页申请受理';
		$message = '您申请的公共主页 '.$name.' 已成功开通，请使用'.$username.'登录，初始密码位'.$pw.'登录后请尽快修改您的密码。如有疑问，请EMAIL至ihome@buaa.edu.cn，或私信给ihome公共主页。';
		$return = uc_pm_send(0, $appuid, $subject, $message, 1, 0, 0);
		echo "<script>location.href='".$_SERVER["HTTP_REFERER"]."';</script>";



}
elseif($op=='negate'){
	$appuid = $_GET['appuid'] ? trim($_GET['appuid']) : '';
	//echo  $_SGLOBAL['supe_uid'];
	$setarr=array('ruthed'=>-1,'adminuid'=>$_SGLOBAL['supe_uid']);//表明拒绝接受
	updatetable('publicapply',$setarr,array('appid'=>$appid));
	/*$cid = inserttable('mailcron', array('email'=>$email), 1);
		$setarr = array(
				'cid' => $cid,
				'subject' => '公共主页申请受理',
				'message' => '非常抱歉的的通知您，您申请的公共主页'.$name.'管理员认为不适合开通，感谢您对本网站的支持!如有疑问，请EMAIL至ihome@buaa.edu.cn，再次感谢您对本网站的支持',
				'dateline' => $_GLOBAL['timestamp']
				);
				//放入邮件队列
		inserttable('mailqueue', $setarr);*/

		$subject = '公共主页申请受理';
		$message = '非常抱歉的的通知您，您申请的公共主页'.$name.'管理员认为不适合开通，如有疑问，请EMAIL至ihome@buaa.edu.cn，或私信给ihome公共主页。';
		uc_pm_send(0, $appuid, $subject, $message, 1, 0, 0);

	echo "<script>location.href='".$_SERVER["HTTP_REFERER"]."';</script>";

}


function random_pw($length){
     $conso=array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','0','1','2','3','4','5','6','7','8','9');
     $password="";
     srand ((double)microtime()*1000000);
     for($i=1; $i<=$length; $i++)
     {
		$password.=$conso[rand(0,35)];
     }
     return $password;
}



?>