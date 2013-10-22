<?php


if(!defined('iBUAA')) {
	exit('Access Denied');
}


$wallid = intval(trim($_GET['wallid']));
$url = "index.php?ac=track&wallid=$wallid";

if($wallid)
	{
		$query = $_SGLOBAL['db']->query("select * from ".tname(wall)." where pass > 0 and id=".$wallid);
		if($value = $_SGLOBAL['db']->fetch_array($query))
			{
				if(empty($value))
					{
						echo('wall_not_exist');
						exit;
					}
				$vall = $value;
				if(time() < ($vall['starttime'] - 30*60))
					{
						echo('wall_not_start');
						exit;
					}
				if(time() > ($vall['endtime'] + 30*60))
					{
						echo('wall_end');
						exit;
					}
				$title = $value['wallname'];

			}
		$mine = $_SGLOBAL['db']->query("select * from ".tname(wallfield)." where wallid = '$wallid' AND (uid = '$uid'  OR display >= 1 ) order by timeline desc limit 4 ");
		while($mines = $_SGLOBAL['db']->fetch_array($mine))
			{
				realname_set($mines['uid'], $mines['username']);
				$tracklist[] = $mines;
			}
		realname_get();
	}

//print_r($title);
//exit('aaaa');


if(submitcheck('track')) {

	$add_tracking = 1;
	if(empty($_POST['spacenote'])) {
		if(!checkperm('allowdoing')) {
			ckspacelog();
			echo('no_privilege');
			exit();
		}
		
		//实名认证
		ckrealname('doing');
		
		//视频认证
		ckvideophoto('doing');
		
		//新用户见习
		cknewuser();
	
		//验证码
		if(checkperm('seccode') && !ckseccode($_POST['seccode'])) {
			echo('incorrect_code');
			exit();
		}


		$query = $_SGLOBAL['db']->query("SELECT timeline FROM ".tname('wallfield')." WHERE uid='$_SGLOBAL[supe_uid]' AND wallid='$wallid' order by timeline desc limit 1 ");
		$lasttime = $_SGLOBAL['db']->result($query);
		$waittime = 15 - ($_SGLOBAL['timestamp'] - $lasttime);
		if($waittime > 0) {
			echo('operating_too_fast');
			exit();
		}

	} else {
		if(!checkperm('allowdoing')) {
			$add_tracking = 0;
		}

		//实名
		if(!ckrealname('doing', 1)) {
			$add_tracking = 0;
		}
		//视频
		if(!ckvideophoto('doing', array(), 1)) {
			$add_tracking = 0;
		}
		//新用户
		if(!cknewuser(1)) {
			$add_tracking = 0;
		}
		$waittime = interval_check('post');
		if($waittime > 0) {
			$add_tracking = 0;
		}
	}

	$message = getstr($_POST['message'], 40, 1, 1, 1);
	//替换表情
	$message = preg_replace("/\{em:(\d+):}/is", "<img src=\"image/face/\\1.gif\" class=\"face\">", $message);
	$message = preg_replace("/\<br.*?\>/is", ' ', $message);
	
	if(strlen($message) < 1) {
		echo('should_write_that');
		exit();
	}
		
	if(strlen($message) < 4) {
		echo('write_more_please');
	}
	

	$Query = $_SGLOBAL['db']->query("SELECT uid,wallname,`check` FROM ".tname('wall')." WHERE id = '$wallid' ");
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
			'uid' => $_SGLOBAL['supe_uid'],
			'username' => $_SGLOBAL['supe_username'],
			'message' => $message,
			'ip' => getonlineip(),
			'pass' => $pass,
			'timeline' => $_SGLOBAL['timestamp'],
			'hot' => $hot,
			'wallid' => $wallid
		);
		//入库
		$newwallid = inserttable('wallfield', $setarr, 1);
		if ($check > 0 || ($uid == $apply or $uid == 1 or $uid == 10000)) {
			$message = "<a href=\"plugin.php?pluginid=wall&wallid=".$wallid."&ac=track\">#".$WallTitle."#</a> ".$message;
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
		showmessage('do_success', $url, 0);
	}
}

include_once template('./mobile/template/default/wall_track');

?>