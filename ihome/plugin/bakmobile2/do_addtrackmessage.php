<?

/*	[iBUAA] (C)2012-2111 BUAANIC . 
	Create By Ancon
	Last Modfile By Ancon
	Last Time : 2013-4-8 16:00:13
*/
//以下摘取addnews部分代码,私下觉得@功能不完整!
	$Message = preg_replace("/\[em:(\d+):]/is", "<img src=\"image/face/\\1.gif\" class=\"face\">", $Message);
	$Message = preg_replace("/\<br.*?\>/is", ' ', $Message);

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
	
	$arr = array(
		"username" => getstr($username, 30, 1, 1, 1),
		"message" => getstr($Message, 480, 1, 1, 1),
		"uid" => intval($userid),
		"replynum"=>0,
		"mood"=>0,
		'dateline' => $_SGLOBAL['timestamp'],
		'ip' => getonlineip(),
		'fromdevice' => $FromDevice
	);
	$newdoid = inserttable('doing', $arr,1);

	$feedarr = array(
		'appid' => UC_APPID,
		'icon' => 'doing',
		'uid' => $userid,
		'username' =>$username,
		'dateline' => $_SGLOBAL['timestamp'],
		'title_template' => cplang('feed_doing_title'),
		'title_data' => saddslashes(serialize(sstripslashes(array('message'=>$Message)))),
		'body_template' => '',
		'body_data' => '',
		'id' => $newdoid,
		'idtype' => 'doid',
		'fromdevice' => $FromDevice
	);
	$feedarr['hash_template'] = md5($feedarr['title_template']."\t".$feedarr['body_template']);
	$feedarr['hash_data'] = md5($feedarr['title_template']."\t".$feedarr['title_data']."\t".$feedarr['body_template']."\t".$feedarr['body_data']);
	inserttable('feed', $feedarr,1);
	updatestat('doing');
	
	$setarr = array('note'=>$Message);		
	if(!empty($_POST['spacenote'])) {
				 $reward = getreward('updatemood', 0);
				 $setarr['spacenote'] = $Message;
	} else {
	$reward = getreward('doing', 0);
	}
	updatetable('spacefield', $setarr, array('uid'=>$userid));
	
	$Result = array(
		'flag' => 'success'
	);

?>