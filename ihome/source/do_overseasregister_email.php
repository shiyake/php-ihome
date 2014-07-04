<?php
if(!defined('iBUAA')) {
	exit('Access Denied');
}

if($_GET['op']=='create')
{
	$id=$_GET['id'];
	$ver=$_GET['ver'];
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname("forgienCreate")." WHERE id=".$id);
	if($res = $_SGLOBAL['db']->fetch_array($query))	{
		if($ver != $res['ver'])	{
			showmessage("请求的路径有问题，请直接点击邮件中链接，不要做任何更改","index.php",3000);
		}
		$username = $res['username'];
		$realname = $res['realname'];
		$password = $res['password'];
		$birthday = $password;
		$birth_year = $res['birth_year'];
		$birth_month = $res['birth_month'];
		$birth_day = $res['birth_day'];
		$email = $res['email'];
		$_POST['email'] = $email;
		$_POST["realname"] = $realname;
		$_POST["username"] = $username;
		$_POST["password"] = $password;
		$_POST["birthday"] = $birthday;
		$_POST["startyear"] = $res['startyear'];
		$_POST["academy"] = $res['academy'];
		$_POST["country"] = $res['country'];
		$_POST["school"] = $res['school'];
		$_SGLOBAL["inviteactive_showemail"] = true;
		$_SGLOBAL["no_inviteactive"] = true;
		$inviteactive_showmsg = true;
		$country = $_POST['country'];
		$school = $_POST['school'];
		$_SCONFIG['overseas'] = true;
		include_once('do_quickmarkregister.php');
		$lng='';
		$lat='';
		try {
			$res = getIpDetails();
			$lng = $res['longitude'];
			$lat = $res['latitude'];
			$forg = array(
				"uid"=>$newuid,
				"ip"=>getonlineip(),
				"country"=>$country,
				"school"=>$school,
				"lng"=>$lng,
				"lat"=>$lat
			);
			inserttable("spaceforeign",$forg);
			//设置隐私
			$_SGLOBAL['db']->query("INSERT INTO ".tname('spaceinfo')." (type,subtype,uid,friend) VALUES ('contact','mobile',".$newuid.",1)");

			//给外事处发消息进行认证
			$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname("space")." WHERE groupid=10");
			if($res = $_SGLOBAL['db']->fetch_array($query))	{
				$recver = $res['uid']; 
			}
			$setarr = array(
				'uid' => $recver,
				'type' => "friend",
				'new' => 1,
				'authorid' => $newuid,
				'author' => $name,
				'note' => "$birthday,$academy,".$startyear."级,来自$country,$school的同学".'向您发起了认证请求<br/><a href="space.php?do=friend&view=confirm&uid=%27'.$newuid.'%27">通过请求</a>',
				'dateline' => $_SGLOBAL['timestamp']
			);
			$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET notenum=notenum+1 WHERE uid='$recver'");
			inserttable('notification', $setarr);
			//变更记录
			if($_SCONFIG['my_status']) inserttable('userlog', array('uid'=>$newuid, 'action'=>'add', 'dateline'=>$_SGLOBAL['timestamp']), 0, true);
			showmessage('registered', 'space.php?do=recommendpublic', 1);
		}
		catch (exception $e)	{
			showmessage("无法获取您的位置信息，注册失败",'space.php?do=home',1);
		}
			
	}
}else {
	showmessage("没有这个页面","index.php",3000);
}
?>
