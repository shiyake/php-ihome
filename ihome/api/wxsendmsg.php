
<?php
/*

当匹配上墙的条件时，微信公众号调取接口，连带用户的信息将消息发给web端，web端将数据存入数据库中。
uid username message wallid
*/
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
	returnResponse(40002, "method is not correct");
}
else
{
	try
	{
		$content = file_get_contents('php://input');
		$json = json_decode($content);

		$uid = $json->uid;
		$username = $json->username;
		$message = $json->message;
		$wallid = $json->wallid;

		if(inject_check($uid) || inject_check($message) || inject_check($wallid))
		{
			returnResponse(40001, "system is busy 05");
		}
		else
		{
            $setarr = array(
                'uid' => $uid,
                'username' => $username,
                'message' => $message,
                'wallid' => $wallid,
                'ip' => 'weixin',
                'timeline' => $_SGLOBAL['timestamp'],
            );
            //入库
            $newwallid = inserttable('wallfield', $setarr, 1);
			returnResponse(0, "ok");
		}
	}
	catch(Exception $e)
	{
		returnResponse(40001, "system is busy 28");
	}
}
?>
