<?php
/*Project PHP-ihome
This script is responsible for inviting parents.
@author : shaoxinhao
*/

@include_once('cp_parent_func.php');

if(!defined('iBUAA')) {
	exit('Access Denied');
}

if($_GET['op'] == 'invite'){
	$username = empty($_POST['username'])? null :trim($_POST['username']);
	$_PARENT['username'] = $username;
	if(!empty($username) && !empty($_POST['realname']) && !empty($_POST['password1']) && !empty($_POST['password2'])){
		if(strlen($_POST['password1']) >=6){
			if($_POST['password1'] == $_POST['password2']){
				//add user
				$_PARENT['email'] = $username."_default@ihome.com";
				$_PARENT['realname'] = $_POST['realname'];
				$_PARENT['uid'] = addUserManually($username, $_POST['password1'], $_PARENT['email']);
				//add user-parent relation
				newParent($_PARENT['uid'],$_SGLOBAL['supe_uid'],$username,$_PARENT['realname'],$_PARENT['email']);
				//followAcademy
				$q = $_SGLOBAL['db']->query("select uid,username from ".tname('space')." where name = '".$_SGLOBAL['supe_academy']."'");
				$r = $_SGLOBAL['db']->fetch_array();
				if($r){
					$acid = $r['uid'];
					$acname = $r['username'];
					followManually($_PARENT['uid'],$username,$acid,$acname);
				}
				//mutualFriendManually
				mutualFriendManually($_SGLOBAL['supe_uid'],$_SGLOBAL['supe_username'],$_PARENT['uid'],$_PARENT['username']);
				
			}else{
				showmessage("password_inconsistency");
			}
		}else{
			showmessage("设置密码至少六位");
		}
	}
}else if($_GET['op'] == 'reset'){
	if(!empty($_POST['password1']) && !empty($_POST['password2'])){
		if($_POST['password1'] == $_POST['password2']){
			if(strlen($_POST['password1']) >=6){
				@include_once(S_ROOT.'uc_client/client.php');
				uc_user_edit($_PARENT['username'],'',$_POST['password1'],$_PARENT['email'],1);
			}else{
				showmessage("设置密码至少六位");
			}
		}else{
			showmessage("password_inconsistency");
		}
	}
	showmessage('密码修改成功');
}else{

}
//include template('cp_parent');

?>