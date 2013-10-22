<?

/*	[iBUAA] (C)2012-2111 BUAANIC . 
	Create By Ancon
	Last Modfile By Ancon
	Last Time : 2013-4-9 21:19:42
*/
	chdir("../../");
	include_once ('source/function_cp.php');
	$MobileFile = pic_save($File, $_POST['albumid'], $Message, $_POST['topicid']);
	
	/*
		$Feedarray = array(
			'appid' => 'UC_APPID',
			'icon' => 'ablum',
			'id' => $MobileFile[picid],
			'idtype' => 'picid',
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
		echo json_encode($Feedarray);
		exit();
	*/

	if ($MobileFile && is_array($MobileFile)) {
		$Feedarray = array(
			'appid' => 'UC_APPID',
			'icon' => 'ablum',
			'id' => $MobileFile[picid],
			'idtype' => 'picid',
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

		$Result = array(
			'flag' => 'success'
		);
	}
	else {
		$Result = array(
			'flag' => 'fail_file',
		);
	}

?>