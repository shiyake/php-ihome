<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}

$doid = empty($_GET['doid'])?0:intval($_GET['doid']);
$id = empty($_GET['id'])?0:intval($_GET['id']);
if(empty($_POST['refer'])) $_POST['refer'] = "space.php?do=doing&view=me";

if(submitcheck('addsubmit')) {

	$add_doing = 1;
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
	
		//判断是否操作太快
		
		$waittime = interval_check('post');
		if($waittime > 0) {
			showmessage('operating_too_fast', '', 1, array($waittime));
		}
	} else {
		if(!checkperm('allowdoing')) {
			$add_doing = 0;
		}

		//实名
		if(!ckrealname('doing', 1)) {
			$add_doing = 0;
		}
		//视频
		if(!ckvideophoto('doing', array(), 1)) {
			$add_doing = 0;
		}
		//新用户
		if(!cknewuser(1)) {
			$add_doing = 0;
		}
		$waittime = interval_check('post');
		if($waittime > 0) {
			$add_doing = 0;
		}
	}
	
	//获取心情
	$mood = 0;
	preg_match("/\[em\:(\d+)\:\]/s", $_POST['message'], $ms);
	$mood = empty($ms[1])?0:intval($ms[1]);

	//$message = $_POST['message'];
	$isComplain = $_POST['complain'] ? TRUE : FALSE;
	//var_dump($isComplain);exit();
	$message = rawurldecode(getstr($_POST['message'], 1000, 1, 1, 1, 2));

	preg_match_all("/[@](.*)[(]([\d]+)[)]\s*/U",$message, $matches, PREG_SET_ORDER);

	foreach($matches as $value){

		$TmpString = $value[0]; 
		$TmpName = $value[1]; 
		$UserId = $value[2];
		$result = $_SGLOBAL['db']->query("select uid,username,name from ".tname('space')." where uid=$UserId");
		
		if($rs = $_SGLOBAL['db']->fetch_array($result)){
			$realname = $rs['name'];
			if(empty($realname)){
				$realname = $rs['username'];
			}

			$ValidValue = getAtName($TmpString, $TmpName, $realname);
			$ValidValue = trim($ValidValue);
			$at_friend= "space.php?uid=".$UserId;
			if($ValidValue != false){
				$message = str_replace($ValidValue, "<a href=$at_friend>@".$realname."</a> ", $message);
				$UserIds[] = $UserId;
				
			}
		}
	}	
	
	//替换表情
	$message = preg_replace("/\[em:(\d+):]/is", "<img src=\"image/face/\\1.gif\" class=\"face\">", $message);
	$message = preg_replace("/\<br.*?\>/is", ' ', $message);
	
	

	//匹配带#号的话题
	preg_match_all("/^[#](.*)[#](.*)$/U",$message, $matches, PREG_SET_ORDER);
	foreach($matches as $item){
		$wallname = trim($item[1]);
		$wallcontent = trim($item[2]);
		$Query = $_SGLOBAL['db']->query("select id,uid from ".tname(wall)." where pass > 0 and starttime-30<".time()." and endtime+30>".time()." and wallname='".$wallname."' limit 1");
		if($getwall = $_SGLOBAL['db']->fetch_array($Query)){
			$pass = 0;
			$hot = 0;
			if($getwall['uid'] == $_SGLOBAL['supe_uid']){
				$pass = 1;
				$hot = 1;

			}
			$wallarr = array(
				'uid' => $_SGLOBAL['supe_uid'],
				'username' => $_SGLOBAL['supe_username'],
				'message' => $wallcontent,
				'ip' => getonlineip(),
				'pass' => $pass,
				'timeline' => $_SGLOBAL['timestamp'],
				'hot' => $hot,
				'wallid' => $getwall['id']
			);
			//入库
			inserttable('wallfield', $wallarr, 0);
			$message = str_replace('#'.$item[1].'#', "<a href=\"plugin.php?pluginid=wall&ac=track&wallid=".$getwall['id']."\">#".$item[1]."#</a> ", $message);
		}
		break;
	}
	$message = substr($message, 0, 480);

	if(strlen($message) < 1) {
		showmessage('should_write_that');
	}

	$picid = empty($_POST['datapicid'])?0:intval($_POST['datapicid']);
	$filepath = empty($_POST['datapicpath'])?0:trim($_POST['datapicpath']);
	if($add_doing) {
		if($filepath) {
			$setarr = array(
				'uid' => $_SGLOBAL['supe_uid'],
				'username' => $_SGLOBAL['supe_username'],
				'dateline' => $_SGLOBAL['timestamp'],
				'message' => $message,
				'mood' => $mood,
				'ip' => getonlineip(),
				'fromdevice' => 'web',
				'image_1'=>pic_get($filepath, 1, 0),
				'image_1_link'=>"space.php?uid=$_SGLOBAL[supe_uid]&do=album&picid=$picid"
			);
		}
		else {
			$setarr = array(
				'uid' => $_SGLOBAL['supe_uid'],
				'username' => $_SGLOBAL['supe_username'],
				'dateline' => $_SGLOBAL['timestamp'],
				'message' => $message,
				'mood' => $mood,
				'ip' => getonlineip(),
				'fromdevice' => 'web'
			);
		}
		//入库
		$newdoid = inserttable('doing', $setarr, 1);

		
	}
	
	//更新空间note
	$setarr = array('note'=>$message);
	$credit = $experience = 0;
	if(!empty($_POST['spacenote'])) {
		$reward = getreward('updatemood', 0);
		$setarr['spacenote'] = $message;
	} else {
		$reward = getreward('doing', 0);
	}
	updatetable('spacefield', $setarr, array('uid'=>$_SGLOBAL['supe_uid']));
	
	if($reward['credit']) {
		$credit = $reward['credit'];
	}
	if($reward['experience']) {
		$experience = $reward['experience'];
	}
	$setarr = array(
		'mood' => "mood='$mood'",
		'updatetime' => "updatetime='$_SGLOBAL[timestamp]'",
		'credit' => "credit=credit+$credit",
		'experience' => "experience=experience+$experience",
		'lastpost' => "lastpost='$_SGLOBAL[timestamp]'"
	);
	if($add_doing) {
		if(empty($space['doingnum'])) {//第一次
			$doingnum = getcount('doing', array('uid'=>$space['uid']));
			$setarr['doingnum'] = "doingnum='$doingnum'";
		} else {
			$setarr['doingnum'] = "doingnum=doingnum+1";
		}
	}
	$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET ".implode(',', $setarr)." WHERE uid='$_SGLOBAL[supe_uid]'");
	
	//事件feed
	if($add_doing && ckprivacy('doing', 1)) {
		if($picid && $filepath) {
		$feedarr = array(
			'appid' => UC_APPID,
			'icon' => 'doing',
			'uid' => $_SGLOBAL['supe_uid'],
			'username' => $_SGLOBAL['supe_username'],
			'dateline' => $_SGLOBAL['timestamp'],
			'title_template' => cplang('feed_doing_title'),
			'title_data' => saddslashes(serialize(sstripslashes(array('message'=>$message)))),
			'body_template' => '',
			'body_data' => '',
			'id' => $newdoid,
			'idtype' => 'doid',
			'fromdevice' => 'web',
			'image_1'=>pic_get($filepath, 1, 0),
			'image_1_link'=>"space.php?uid=$_SGLOBAL[supe_uid]&do=album&picid=$picid"
		);
		}
		else {
		$feedarr = array(
			'appid' => UC_APPID,
			'icon' => 'doing',
			'uid' => $_SGLOBAL['supe_uid'],
			'username' => $_SGLOBAL['supe_username'],
			'dateline' => $_SGLOBAL['timestamp'],
			'title_template' => cplang('feed_doing_title'),
			'title_data' => saddslashes(serialize(sstripslashes(array('message'=>$message)))),
			'body_template' => '',
			'body_data' => '',
			'id' => $newdoid,
			'idtype' => 'doid',
			'fromdevice' => 'web'
		);
		}
		$feedarr['hash_template'] = md5($feedarr['title_template']."\t".$feedarr['body_template']);//喜好hash
		$feedarr['hash_data'] = md5($feedarr['title_template']."\t".$feedarr['title_data']."\t".$feedarr['body_template']."\t".$feedarr['body_data']);//合并hash
		inserttable('feed', $feedarr);
	}

	//统计
	updatestat('doing');
	
	showmessage('do_success', $_POST['refer'], 0);

} elseif (submitcheck('commentsubmit')) {
	
	if(!checkperm('allowdoing')) {
		ckspacelog();
		showmessage('no_privilege');
	}
	
	//实名认证
	ckrealname('doing');
	
	//新用户见习
	cknewuser();
	
	//判断是否操作太快
	$waittime = interval_check('post');
	if($waittime > 0) {
		showmessage('operating_too_fast', '', 1, array($waittime));
	}
	
	$message = getstr($_POST['message'], 480, 1, 1, 1);
	
		//提取AT用户	
	preg_match_all("/[@](.*)[(]([\d]+)[)]\s*/U",$_POST['message'], $matches, PREG_SET_ORDER);

	foreach($matches as $value){
		
		$TmpString = $value[0]; 
		$TmpName = $value[1]; 
		$UserId = $value[2];
		
		$result = $_SGLOBAL['db']->query("select uid,username,name from ".tname('space')." where uid=$UserId");
		
		if($rs = $_SGLOBAL['db']->fetch_array($result)){
			$realname = $rs['name'];
			if(empty($realname)){
				$realname = $rs['username'];
			}

			//调用检查函数将@后的内容进行验证，为UID对应的姓名相同则返回@与姓名，不相同则继续判断下一个@，没有找到匹配的最终将返回false
			$ValidValue = getAtName($TmpString, $TmpName, $realname);
			$ValidValue = trim($ValidValue);

			$at_friend= "space.php?uid=".$UserId;
			if($ValidValue != false){
				$message = str_replace($ValidValue, "<a href=$at_friend>@".$realname."</a> ", $message);
				$UserIds[] = $UserId;

			}
		}
	}	

	//替换表情
	$message = preg_replace("/\[em:(\d+):]/is", "<img src=\"image/face/\\1.gif\" class=\"face\">", $message);
	$message = preg_replace("/\<br.*?\>/is", ' ', $message);
	if(strlen($message) < 1) {
		showmessage('should_write_that');
	}
	
	$updo = array();
	if($id) {
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('docomment')." WHERE id='$id'");
		$updo = $_SGLOBAL['db']->fetch_array($query);
	}
	if(empty($updo) && $doid) {
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('doing')." WHERE doid='$doid'");
		$updo = $_SGLOBAL['db']->fetch_array($query);
	}
	if(empty($updo)) {
		showmessage('docomment_error');
	} else {
		//黑名单
		if(isblacklist($updo['uid'])) {
			showmessage('is_blacklist');
		}
	}
	
	$updo['id'] = intval($updo['id']);
	$updo['grade'] = intval($updo['grade']);
	
	$setarr = array(
		'doid' => $updo['doid'],
		'upid' => $updo['id'],
		'uid' => $_SGLOBAL['supe_uid'],
		'username' => $_SGLOBAL['supe_username'],
		'dateline' => $_SGLOBAL['timestamp'],
		'message' => $message,
		'ip' => getonlineip(),
		'grade' => $updo['grade']+1
	);
	
	//最多层级
	if($updo['grade'] >= 3) {
		$setarr['upid'] = $updo['upid'];//更母一个级别
	}

	$newid = inserttable('docomment', $setarr, 1);
	
	//更新回复数
	$_SGLOBAL['db']->query("UPDATE ".tname('doing')." SET replynum=replynum+1 WHERE doid='$updo[doid]'");
	
	
	
	$isReplyComplain = FALSE;
	
	//通知
	if($updo['uid'] != $_SGLOBAL['supe_uid']) {
		if($isReplyComplain){
			$note = cplang('note_doingcomplain_reply', array("space.php?do=doing&doid=$updo[doid]&highlight=$newid"));
			notification_complain_add($updo['uid'], 'complain', $note, $_SGLOBAL['supe_uid'], $_SGLOBAL['supe_username']);
		}else{
			$note = cplang('note_doing_reply', array("space.php?do=doing&doid=$updo[doid]&highlight=$newid"));
			notification_add($updo['uid'], 'doing', $note);
		}
		//奖励积分
		getreward('comment',1, 0, 'doing'.$updo['doid']);
	}
	foreach($UserIds as $UserId){		
		$note = cplang('note_doingcomment_at', array("space.php?do=doing&doid=$updo[doid]&highlight=$newid"));
		notification_add($UserId, 'atyou', $note);
	}

	//统计
	updatestat('docomment');
		
	showmessage('do_success', $_POST['refer'], 0);

}

//删除
if($_GET['op'] == 'delete') {
	
	if(submitcheck('deletesubmit')) {
		
		if($id) {
			$allowmanage = checkperm('managedoing');
			$query = $_SGLOBAL['db']->query("SELECT dc.*, d.uid as duid FROM ".tname('docomment')." dc, ".tname('doing')." d WHERE dc.id='$id' AND dc.doid=d.doid");
			if($value = $_SGLOBAL['db']->fetch_array($query)) {
				if($allowmanage || $value['uid'] == $_SGLOBAL['supe_uid'] || $value['duid'] == $_SGLOBAL['supe_uid'] ) {
					//更新内容
					updatetable('docomment', array('uid'=>0, 'username'=>'', 'message'=>''), array('id'=>$id));
					if($value['uid'] != $_SGLOBAL['supe_uid'] && $value['duid'] != $_SGLOBAL['supe_uid']) {
						//扣除积分
						getreward('delcomment', 1, $value['uid']);
					}
				}
			}
		} else {
			include_once(S_ROOT.'./source/function_delete.php');
			deletedoings(array($doid));
		}
		
		showmessage('do_success', $_POST['refer'], 0);
	}
} elseif ($_GET['op'] == 'getcomment') {
	
	include_once(S_ROOT.'./source/class_tree.php');
	$tree = new tree();
	
	$list = array();
	$highlight = 0;
	$count = 0;
	
	if(empty($_GET['close'])) {
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('docomment')." WHERE doid='$doid' ORDER BY dateline");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			realname_set($value['uid'], $value['username']);
			$tree->setNode($value['id'], $value['upid'], $value);
			$count++;
			if($value['authorid'] = $space['uid']) $highlight = $value['id'];
		}
	}
	
	if($count) {
		$values = $tree->getChilds();
		foreach ($values as $key => $vid) {
			$one = $tree->getValue($vid);
			$one['layer'] = $tree->getLayer($vid) * 2;
			$one['style'] = "padding-left:{$one['layer']}em;";
			if($one['id'] == $highlight && $one['uid'] == $space['uid']) {
				$one['style'] .= 'color:red;font-weight:bold;';
			}
			$list[] = $one;
		}
	}
	
	realname_get();
	
}


include template('cp_doing');

?>