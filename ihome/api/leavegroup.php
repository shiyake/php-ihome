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
  return !($sql_str) || eregi('select|insert|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile', $sql_str);
}

function returnResponse($code, $desc)
{
	echo json_encode(array("errorcode"=>$code,"errmsg" => $desc));
	exit();
}

if($_SERVER['REQUEST_METHOD'] != "POST")
{
	returnResponse(40003, "method is not correct");
}
else
{
	try
	{
		$content = file_get_contents('php://input');
		$json = json_decode($content);

		$uid = $json->uid;
		$gid = $json->gid;

		if(inject_check($uid) || inject_check($gid))
		{
			returnResponse(40002, "system is busy");
		}
		else
		{
			//
			// 做一些离开群组的动作
			//
			$q = $_SGLOBAL['db']->query("SELECT name FROM ".tname('space')." WHERE uid='$uid'");
			$name = $_SGLOBAL['db']->fetch_array($q);
			$name = $name['name'];
			$q = $_SGLOBAL['db']->query("SELECT tagid FROM ".tname('mtag')." WHERE tagid='$gid'");
			$tid = $_SGLOBAL['db']->fetch_array($q);
			$tid = $tid['tagid'];
			$q = $_SGLOBAL['db']->query("SELECT grade FROM ".tname('tagspace')." WHERE tagid='$gid' AND uid='$uid'");
			$grade = $_SGLOBAL['db']->fetch_array($q);
			$grade = $grade['grade'];

			if(!$name || !$tid || $grade == "9")
			{
				returnResponse(40002, "system is busy");
			}
			else
			{
				$_SGLOBAL['db']->query("UPDATE ".tname('mtag')." SET membernum=membernum-1 WHERE tagid='$gid'");
				$_SGLOBAL['db']->fetch_array($q);
				$q = $_SGLOBAL['db']->query("DELETE FROM ".tname('tagspace')." WHERE tagid='$gid' AND uid='$uid'");
				$_SGLOBAL['db']->fetch_array($q);
				returnResponse(0, "ok");
			}

		}
	}
	catch(Exception $e)
	{
		returnResponse(40002, "system is busy");
	}
}
?>