<?

/*	[iBUAA] (C)2012-2111 BUAANIC . 
	Create By Ancon
	Last Modfile By Ancon
	Last Time : 2013-4-9 21:19:42
*/
	//以下摘取addnews部分代码,私下觉得@功能不完整!
	preg_match_all("/[@](.*)[(]([\d]+)[)]\s/U",$Message, $Matches, PREG_SET_ORDER);
	foreach($Matches as $value){
		$TmpString = $value[0]; 
		$TmpName = $value[1]; 
		$UserId = $value[2];
		$result = $_SGLOBAL['db']->query("select uid,username,name from ".tname('space')." where uid=$UserId");
		$rs = $_SGLOBAL['db']->fetch_array($result);
		$realname = $rs['name'];   
		$ValidValue = getAtName($TmpString, $TmpName, $realname);
		$ValidValue = trim($ValidValue);
		$at_friend= "space.php?uid=".$UserId;
		$Message = str_replace($ValidValue, "<a href=$at_friend>@".$realname."</a> ", $Message);
	}
	$Message = preg_replace("/\[em:(\d+):]/is", "<img src=\"image/face/\\1.gif\" class=\"face\">", $Message);
	$Message = preg_replace("/\<br.*?\>/is", ' ', $Message);



	chdir("../../");
	include_once ('source/function_cp.php');
	$MobileFile = pic_save($File, $_POST['albumid'], $Message, $_POST['topicid']);
	if ($MobileFile && is_array($MobileFile)) {

		$arr = array(
			"username" => getstr($username, 30, 1, 1, 1),
			"message" => $Message,
			"uid" => intval($userid),
			"replynum"=>0,
			"mood"=>0,
			'dateline' => $_SGLOBAL['timestamp'],
			'ip' => getonlineip(),
			'fromdevice' => $FromDevice,
			'image_1'=>pic_get($MobileFile['filepath'], $MobileFile['thumb'], $MobileFile['remote']),
			'image_1_link'=>"space.php?uid=$MobileFile[uid]&do=album&picid=$MobileFile[picid]"
		);
		$newdoid = inserttable('doing', $arr,1);

		$Feedarray = array(
			'appid' => 'UC_APPID',
			'icon' => 'doing',
			'id' => $newdoid,
			'idtype' => 'doid',
			'uid' => $MobileFile['uid'],
			'username' => $MobileFile['username'],
			'dateline' => $MobileFile['dateline'],
			'fromdevice' => $FromDevice,
			'title_template' => cplang('feed_doing_title'),
			'title_data' => saddslashes(serialize(sstripslashes(array('message'=>$Message)))),
			'body_template' => '',
			'body_data' => '',
			'image_1'=>pic_get($MobileFile['filepath'], $MobileFile['thumb'], $MobileFile['remote']),
			'image_1_link'=>"space.php?uid=$MobileFile[uid]&do=album&picid=$MobileFile[picid]"
		);
		$Feedarray['hash_template'] = md5($Feedarray['title_template']."\t".$Feedarray['body_template']);
		$Feedarray['hash_data'] = md5($Feedarray['title_template']."\t".$Feedarray['title_data']."\t".$Feedarray['body_template']."\t".$Feedarray['body_data']);

		$Feedid =inserttable('feed', $Feedarray, 1);

		updatestat('doing');
		$Result = array(
			'flag' => 'success',
		);
	}
	else {
		$Result = array(
			'flag' => 'fail_file&msg'
		);
	}

?>