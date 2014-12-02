<?php

/*	[iBUAA] (C)2012-2111 BUAANIC . 
	Create By Ancon
	Last Modfile By Ancon
	Last Time : 2013-4-15 10:29:06
*/

if(!defined('iBUAA')) {
	exit('Access Denied');
}

if(empty($_POST['refer'])) $_POST['refer'] = "plugin.php?pluginid=wall&wallid=$WallId&ac=track";

if(submitcheck('addsubmit')) {

	$add_tracking = 1;
	if(empty($_POST['spacenote'])) {
		if(!checkperm('allowdoing')) {
			ckspacelog();
			showmessage('no_privilege');
		}
		
		//实名认证
		ckrealname('doing');
		
		//视频认证
		ckvideophoto('doing');
		
		//新用户见习
		cknewuser();
	
		//验证码
		if(checkperm('seccode') && !ckseccode($_POST['seccode'])) {
			showmessage('incorrect_code');
		}


		$query = $_SGLOBAL['db']->query("SELECT timeline FROM ".tname('wallfield')." WHERE uid='$_SGLOBAL[supe_uid]' AND wallid='$WallId' order by timeline desc limit 1 ");
		$lasttime = $_SGLOBAL['db']->result($query);
		$waittime = 15 - ($_SGLOBAL['timestamp'] - $lasttime);
		if($waittime > 0) {
			showmessage('operating_too_fast', '', 1, array($waittime));
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

	$message = getstr($_POST['message'], 60, 1, 1, 1);
	//替换表情
	$message = preg_replace("/\{em:(\d+):}/is", "<img src=\"image/face/\\1.gif\" class=\"face\">", $message);
	$message = preg_replace("/\<br.*?\>/is", ' ', $message);
	
	if(strlen($message) < 1) {
		showmessage('should_write_that');
	}
		
	if(strlen($message) < 3) {
		showmessage('多写几个文字吧~');
	}
	

	$Query = $_SGLOBAL['db']->query("SELECT uid,wallname,`check` FROM ".tname('wall')." WHERE id = '$WallId' ");
	if ($Value = $_SGLOBAL['db']->fetch_array($Query)) {
		$apply = $Value['uid'];
		$check = $Value['check'];
		$WallTitle = $Value['wallname'];
	}
	$isfounder = ckfounder($_SGLOBAL['supe_uid']);
	if($check || $isfounder){
		$pass = 1;
	}
	if ($uid == $apply) {
		$pass = 1;
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
			'wallid' => $WallId,
			'fromdevice' => 'i-wall'
		);
		//入库
		$newwallid = inserttable('wallfield', $setarr, 1);
		if ($check > 0 || ($uid == $apply or $uid == 1 or $uid == 10000)) {
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
		showmessage('do_success', $_POST['refer'], 0);
	}
	
include template('plugin/wall/template/wall_track');

}

?>