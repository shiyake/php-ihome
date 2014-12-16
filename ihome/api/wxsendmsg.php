
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
			$Query = $_SGLOBAL['db']->query("SELECT uid,wallname,`check` FROM ".tname('wall')." WHERE id = '$WallId' ");
			if ($Value = $_SGLOBAL['db']->fetch_array($Query)) {
				$apply = $Value['uid'];
				$check = $Value['check'];
				$WallTitle = $Value['wallname'];
			}
			$isfounder = ckfounder($uid);
			if($check || $isfounder || $uid == 144 || $uid == $apply){
				$pass = 1;
			}			
            $setarr = array(
                'uid' => $uid,
                'pass' =>1,
                'username' => $username,
                'message' => $message,
                'wallid' => $wallid,
                'ip' => 'weixin',
                'timeline' => $_SGLOBAL['timestamp'],
                'fromdevice' => 'wechat'
            );
            //入库
            $newwallid = inserttable('wallfield', $setarr, 1);

            if ($check > 0 && $pass > 0) {
			$message = "<a href=\"plugin.php?pluginid=wall&wallid=".$WallId."&ac=track\">#".$WallTitle."#</a> ".$message;
			$feedarr = array(
					'appid' => UC_APPID,
					'icon' => 'doing',
					'uid' => $uid,
					'username' => $_SGLOBAL['supe_username'],
					'dateline' => $_SGLOBAL['timestamp'],
					'title_template' => cplang('feed_doing_title'),
					'title_data' => saddslashes(serialize(sstripslashes(array('message'=>$message)))),
					'body_template' => '',
					'body_data' => '',
					'id' => $newwallid,
					'idtype' => 'wallid'
				);
				$feedarr['hash_template'] = md5($feedarr['title_template']."\t".$feedarr['body_template']);
				$feedarr['hash_data'] = md5($feedarr['title_template']."\t".$feedarr['title_data']."\t".$feedarr['body_template']."\t".$feedarr['body_data']);
				$FeedId = inserttable('feed', $feedarr,1);
				
				if($FeedId)
				{
					updatetable('wallfield', array('feedid'=>$FeedId), array('id'=>$id));
				}
			}			
			returnResponse(0, "ok");
		}
	}
	catch(Exception $e)
	{
		returnResponse(40001, "system is busy 28");
	}
}
?>
