<?php
/*
QR方式注册用户的Api

确保ihome_space表存在invite_remain字段
下面的脚本用于创建该字段并默认设置20：

ALTER TABLE `ihome`.`ihome_space` 
ADD COLUMN `invite_remain` INT NOT NULL DEFAULT 20 AFTER `user_type`;
*/
//姓名+入学年份+学院+生日+用户名+密码
include_once('../common.php');
function inject_check($sql_str) {  
  return eregi('select|insert|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile', $sql_str);
}

if($_SERVER['REQUEST_METHOD'] != "POST")
{
	echo '{"state":"error","desc":"fields invaild"}';
}
else
{
	try
	{
		$content = file_get_contents('php://input');
		$json = json_decode($content);

		$uid = $json->uid;
		$name = $json->name;
		$startyear = $json->startyear;
		$collage = $json->collage;
		$brithday = $json->birthday;
		$username = $json->username;
		$password = $json->password;
		if(inject_check($uid) || inject_check($name) || inject_check($startyear) || inject_check($collage) || inject_check($birthday) ||
			inject_check($username) || inject_check($password))
		{
			echo '{"state":"error","desc":"fields invaild"}';
		}
		else
		{
			$count = 0;
			//dbconnect();
			$q = $_SGLOBAL['db']->query("SELECT invite_remain FROM ".tname('space')." WHERE uid='$uid'");
			$count = $_SGLOBAL['db']->fetch_array($q);
			$count = $count['invite_remain'];
			if($count > 0)
			{
				//
				// 做一些注册用户的动作
				//
				$q = $_SGLOBAL['db']->query("UPDATE ".tname('space')." SET invite_remain = invite_remain - 1 WHERE uid='$uid'");
				$_SGLOBAL['db']->fetch_array($q);
				echo '{"state":"ok"}';
			}
			else
			{
				echo '{"state":"error","desc":"fields invaild"}';
			}
		}
	}
	catch(Exception $e)
	{
		echo '{"state":"error","desc":"fields invaild"}';
	}
}
?>