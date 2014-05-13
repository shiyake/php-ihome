<?

include_once('../../../common.php');

$WallId = 9;
$uid = $_COOKIE['uid'];
$username = $_COOKIE['username'];

//exit($uid);
//print_r($_COOKIE);exit();
//echo 3;
//print_r($_SGLOBAL);
//exit('c');
//exit($_POST[message]);

if(!$uid || !$username) {
	header("location: ../../../w.php");
	exit();
}


	$add_tracking = 1;

	$message = getstr($_POST['message'], 40, 1, 1, 1);
	$message = preg_replace("/\{em:(\d+):}/is", "<img src=\"image/face/\\1.gif\" class=\"face\">", $message);
	$message = preg_replace("/\<br.*?\>/is", ' ', $message);

	if(strlen($message) < 1) {
		exit('信息不能为空！');
	}

	$query = $_SGLOBAL['db']->query("SELECT timeline FROM ".tname('wallfield')." WHERE uid='$uid' AND wallid='$WallId' order by timeline desc limit 1 ");
	$lasttime = $_SGLOBAL['db']->result($query);
	$waittime = 5 - ($_SGLOBAL['timestamp'] - $lasttime);
	if($waittime > 0) {
		exit('发布太快鸟！');
	}

	$Query = $_SGLOBAL['db']->query("SELECT uid,wallname,`check` FROM ".tname('wall')." WHERE id = '$WallId' ");
	if ($Value = $_SGLOBAL['db']->fetch_array($Query)) {
		$apply = $Value['uid'];
		$check = $Value['check'];
		$WallTitle = $Value['wallname'];
	}
	$isfounder = ckfounder($_SGLOBAL['supe_uid']);
	if($isfounder){
		$hot = 1;
	}
	if($check || $isfounder){
		$pass = 1;
	}
	if ($uid == $apply) {
		$pass = 1;
		$hot = 1;
	}
	if($add_tracking) {
		$setarr = array(
			'uid' => $uid,
			'username' => $username,
			'message' => $message,
			'ip' => getonlineip(),
			'pass' => $pass,
			'timeline' => $_SGLOBAL['timestamp'],
			'hot' => $hot,
			'wallid' => $WallId
		);
		//入库
		$newwallid = inserttable('wallfield', $setarr, 1);
		if ($check > 0 || ($uid == $apply or $uid == 1 or $uid == 10000)) {
			$message = "<a href=\"plugin.php?pluginid=wall&wallid=".$WallId."&ac=track\">#".$WallTitle."#</a> ".$message;
			$feedarr = array(
					'appid' => UC_APPID,
					'icon' => 'doing',
					'uid' => $uid,
					'username' => $username,
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

		setcookie('username',$username,time()+7200);
		setcookie('uid',$uid,time()+7200);

		showmessage('do_success', './towall.php', 0);
	}

?>