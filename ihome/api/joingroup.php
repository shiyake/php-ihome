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
	returnResponse(40003, "方法不正确");
}
else
{
	try
	{
		//$content = file_get_contents('php://input');
		//$json = json_decode($content);

		//$uid = $json->uid;
		//$gid = $json->gid;
		$uid = trim($_POST["uid"]);
		$gid = trim($_POST["gid"]);

		if(inject_check($uid) || inject_check($gid))
		{
			returnResponse(40002, "格式不正确");
		}
		else
		{
			//
			// 做一些加入群组的动作
			//
			$q = $_SGLOBAL['db']->query("SELECT name FROM ".tname('space')." WHERE uid='$uid'");
			$name = $_SGLOBAL['db']->fetch_array($q);
			$name = $name['name'];
			$q = $_SGLOBAL['db']->query("SELECT tagid FROM ".tname('mtag')." WHERE tagid='$gid'");
			$tid = $_SGLOBAL['db']->fetch_array($q);
			$tid = $tid['tagid'];
			$q = $_SGLOBAL['db']->query("SELECT 1 AS result FROM ".tname('tagspace')." WHERE tagid='$gid' AND uid='$uid'");
			$is_in_group = $_SGLOBAL['db']->fetch_array($q);
			$is_in_group = $is_in_group['result'];
			if(!$name || !$tid || $is_in_group)
			{
				returnResponse(40002, "格式不正确");
			}
			else
			{
				jointag($uid, $gid, $_SGLOBAL['db']);
				returnResponse(0, $gid);
			}
		}
	}
	catch(Exception $e)
	{
		returnResponse(40002, "格式不正确");
	}
}
?>