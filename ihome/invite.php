<?php
include_once('./common.php');
if(empty($_GET['type'])&&!empty($_GET['uid']))
{	

	$query=$_SGLOBAL['db']->query("SELECT * FROM ".tname('mobileinvite')." where uid='".$_GET['uid']."'");
	while($row=$_SGLOBAL['db']->fetch_array($query)) {
		if(!strcmp($row['uid'],$_GET['uid']))	{
			$space = getspace($_GET['uid']);
			if(empty($space)) {
				showmessage('space_does_not_exist');
			}
			include template("invite");
			return ;
		}
	}
}else if(empty($_GET['type'])&&!empty($_GET['u']))
{	
	$query=$_SGLOBAL['db']->query("SELECT * FROM ".tname('emailinvite')." where uid='".$_GET['u']."'");
	while($row=$_SGLOBAL['db']->fetch_array($query)) {
		if(!strcmp($row['uid'],$_GET['u']))	{
			$space = getspace($_GET['u']);
			if(empty($space)) {
				showmessage('space_does_not_exist');
			}
			include template("invite");
			return ;
		}
	}
}

if(!empty($_GET['type'])&&!strcmp($_GET['type'],'mobile'))	{
	$var=$_POST['var'];
	$mobile=$_POST['mobile'];
	$flag=false;
	$query=$_SGLOBAL['db']->query("SELECT * FROM ".tname('mobileinvite')." WHERE uid=".$_GET['uid']." and mobile=".$mobile." and var=".$var);
	while($row=$_SGLOBAL['db']->fetch_array($query)) {
		$flag=true;
		$space['getresult']=$row;
		$space['getrealname']=$row['name'];
		$_SGLOBAL['profile_uid']=$row['profile_id'];
		$usertype=$row['usertype'];
		if($row['already_invite']==1)	{
			showmessage("您已接受邀请，请不要重复接受邀请！");
		}
		$query1=$_SGLOBAL['db']->query("SELECT * FROM ".tname('mobileinvite')." WHERE mobile=".$mobile." and already_invite=1");
		$res=$_SGLOBAL['db']->fetch_array($query);
		if(!empty($res))	{
			showmessage("您的手机号已经接受过邀请，请不要重复使用此号码！");
		}
		$_SGLOBAL['db']->query("UPDATE ".tname('mobileinvite')." SET already_invite=1 where uid=".$_GET['uid']." and mobile=".$mobile." and var=".$var);
		echo "<script>window.location.href='do.php?ac=".$_SCONFIG[register_action]."&".$url_plus."&type=mobile&uid=".$row['uid']."&profile_uid=".$row['profile_id']."&realname={$row['name']}';</script>";	
	}
	if($flag==false)	{
		showmessage("您没有被邀请，或者验证码、手机号错误，请验证后输入！");
	}
	return ;
}
else if(!empty($_GET['type'])&&$_GET['type']=='email')	{
	$sql="SELECT * FROM ".tname('emailinvite')." WHERE uid=$_GET[u] and md5='$_GET[c]'";
	$query=$_SGLOBAL['db']->query("SELECT * FROM ".tname('emailinvite')." WHERE uid=$_GET[u] and md5='$_GET[c]'");
	while($row=$_SGLOBAL['db']->fetch_array($query))	{
		$flag=true;
		$space['getresult']=$row;
		$space['getrealname']=$row['name'];
		$_SGLOBAL['profile_uid']=$row['profile_id'];
		$usertype=$row['usertype'];
		if($row['already_invite']==1)	{
			showmessage("您已接受邀请，请不要重复接受邀请！");
		}
		$_SGLOBAL['db']->query("UPDATE ".tname('emailinvite')." SET already_invite=1 where md5='".$_GET['c']."'");
		echo "<script>window.location.href='do.php?ac=".$_SCONFIG[register_action]."&".$url_plus."&type=email&uid=".$row['uid']."&profile_uid=".$row['profile_id']."&realname={$row['name']}&email={$row['email']}';</script>";	
	}
	return ;
}
?>
