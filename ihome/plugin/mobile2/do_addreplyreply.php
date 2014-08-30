<?php
/*
     addreplyreply.php回复回复
     Add by am@ihome.2012-10-17  10:34

*/
    //include_once('../../common.php'); 
	//include_once(S_ROOT.'./uc_client/client.php');
	//include_once(S_ROOT.'./data/data_profield.php');
    include_once('do_mobileverify.php');
	include_once(S_ROOT.'./source/function_bbcode.php');

	$message =getstr($_POST['message']);
	/*
	$userid = '1';
	$username = 'zhongyu';
	$message="abcdefghijklmnopqrstuvwxyz";
	*/
	$idtype=getstr($_POST['idtype']);
	$arrs = array();
	$id =intval($_POST['id']);
	$cid = empty($_POST['cid'])?0:intval($_POST['cid']);
	$comment = array();
	$post = array();
	realname_set($userid, $username);
	$message = $message.' ';
	getmember();
	if(trim($message)==null){
		$arrs = array('flag'=>'null');
		returnflag($arrs);
	}
	if(strlen($message) < 2 ){
		$arrs = array('flag'=>'content_is_too_short');
		returnflag($arrs);
	}else{
		preg_match_all("/[@](.*)[(]([\d]+)[)]\s/U",$message, $matches, PREG_SET_ORDER);
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
	//Add by xuxing 2012-10-1 end
	
	//引用评论
	if($cid) {
		if($idtype != 'doid'){
			if($idtype == 'threadid'){
				$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('post')." WHERE pid='$cid' AND tid='$id' AND isthread='0'");
				$post = $_SGLOBAL['db']->fetch_array($query);
				if($post) {
					//黑名单
					if(isblacklist($post['uid'])) {
						$arrs = array('flag'=>'no_privilege');
						returnflag($arrs);
					}
					
					//实名
					realname_set($post['uid'], $post['username']);
					realname_get();
					
					//print_r($_SN);exit();
					
					$post['message'] = preg_replace("/\<div class=\"quote\"\>\<span class=\"q\"\>.*?\<\/span\>\<\/div\>/is", '', $post['message']);
					//移除编辑记录
					$post['message'] = preg_replace("/<ins class=\"modify\".+?<\/ins>/is", '',$post['message']);
					//$post['message'] = html2bbcode($post['message']);//显示用
					$message = addslashes("<div class=\"quote\"><span class=\"q\"><b>".$_SN[$post['uid']]."</b>: ".getstr($post['message'], 150, 0, 0, 0, 2, 1).'</span></div>').$message;
				}
			}else{
				$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('comment')." WHERE cid='$cid' AND id='$id' AND idtype='$idtype'");
				$comment = $_SGLOBAL['db']->fetch_array($query);
				if($comment && $comment['authorid'] != $userid) {

					//实名
					if($comment['author'] == '') {
						$_SN[$comment['authorid']] = lang('hidden_username');
					} else {
						realname_set($comment['authorid'], $comment['author']);
						realname_get();
					}
					$comment['message'] = preg_replace("/\<div class=\"quote\"\>\<span class=\"q\"\>.*?\<\/span\>\<\/div\>/is", '', $comment['message']);
					//bbcode转换
					
					//$comment['message'] = html2bbcode($comment['message']);
	/*$sql = "SELECT * FROM ".tname('comment')." WHERE cid='$cid' AND id='$id' AND idtype='$idtype'";
	$arrs = array('uid'=>$userid,'username'=>$username,'message'=>$message,'idtype'=>$idtype,'id'=>$id,'cid'=>$cid,'flag'=>'success','sql'=>$sql);
	returnflag($arrs);	*/
					$message = addslashes("<div class=\"quote\"><span class=\"q\"><b>".$_SN[$comment['authorid']]."</b>: ".getstr($comment['message'], 150, 0, 0, 0, 2, 1).'</span></div>').$message;
					if($comment['idtype']=='uid') {
						$id = $comment['authorid'];
					}
				} else {
					$arrs = array('flag'=>$idtype.'_not_exist');
					returnflag($arrs);
				}
			}
		}
	}

	//检查权限
	switch ($idtype) {
		case 'doid':
			if($cid){
				$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('docomment')." WHERE id='$cid'");
				$updo = $_SGLOBAL['db']->fetch_array($query);
			}
			if(empty($updo) && $id) {
				$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('doing')." WHERE doid='$id'");
				$updo = $_SGLOBAL['db']->fetch_array($query);
			}

			if(empty($updo)) {
					$arrs = array('flag'=>$idtype.'_not_exist');
					returnflag($arrs);
			}
			$stattype = 'docomment';
			break;
		case 'threadid':
			if(!checkperm('allowpost')) {
				//ckspacelog();
				$arrs = array('flag'=>'no_privilege');
				returnflag($arrs);
			}
			//判断是否操作太快
			$waittime = interval_check('post');
			if($waittime > 0) {
				$arrs = array('flag'=>'too_fast');
				returnflag($arrs);
			}

			//获得话题
			$thread = array();
			if($id) {
				$query = $_SGLOBAL['db']->query("SELECT t.*, p.*
					FROM ".tname('thread')." t
					LEFT JOIN ".tname('post')." p ON p.tid=t.tid AND p.isthread=1
					WHERE t.tid='$id'");
				$thread = $_SGLOBAL['db']->fetch_array($query);
			}
			if(empty($thread)){
				$arrs = array('flag'=>$idtype.'_not_exist');
				returnflag($arrs);
			} 

			$tospace = getspace($thread['uid']);
					
			//权限
			$mtag = ckmtagspace($thread['tagid']);
			
			//是否允许发
			if(empty($mtag['allowpost'])) {
				$arrs = array('flag'=>'no_privilege');
				returnflag($arrs);
			}
			$stattype = 'post';
			break;
		case 'uid':
			//检索空间
			$tospace = getspace($id);
			$stattype = 'wall';//统计
			break;
		case 'picid':
			//检索图片
			$query = $_SGLOBAL['db']->query("SELECT p.*, pf.hotuser
				FROM ".tname('pic')." p
				LEFT JOIN ".tname('picfield')." pf
				ON pf.picid=p.picid
				WHERE p.picid='$id'");
			$pic = $_SGLOBAL['db']->fetch_array($query);
			//图片不存在
			if(empty($pic)) {
					$arrs = array('flag'=>$idtype.'_not_exist');
					returnflag($arrs);
			}

			//检索空间
			$tospace = getspace($pic['uid']);

			//获取相册
			$album = array();
			if($pic['albumid']) {
				$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('album')." WHERE albumid='$pic[albumid]'");
				if(!$album = $_SGLOBAL['db']->fetch_array($query)) {
					updatetable('pic', array('albumid'=>0), array('albumid'=>$pic['albumid']));//相册丢失
				}
			}
			//验证隐私
			if(!ckfriend($album['uid'], $album['friend'], $album['target_ids'])) {
				$arrs = array('flag'=>'no_privilege');
				returnflag($arrs);
			} 
			
			$hotarr = array('picid', $pic['picid'], $pic['hotuser']);
			$stattype = 'piccomment';//统计
			break;
		case 'blogid':
			//读取日志
			$query = $_SGLOBAL['db']->query("SELECT b.*, bf.target_ids, bf.hotuser
				FROM ".tname('blog')." b
				LEFT JOIN ".tname('blogfield')." bf ON bf.blogid=b.blogid
				WHERE b.blogid='$id'");
			$blog = $_SGLOBAL['db']->fetch_array($query);
			//日志不存在
			if(empty($blog)) {
					$arrs = array('flag'=>$idtype.'_not_exist');
					returnflag($arrs);
			}
			
			//检索空间
			$tospace = getspace($blog['uid']);
			
			//验证隐私
			if(!ckfriend($blog['uid'], $blog['friend'], $blog['target_ids'])) {
				//没有权限
				$arrs = array('flag'=>'no_privilege');
				returnflag($arrs);
			} 

			//是否允许评论
			if(!empty($blog['noreply'])) {
				$arrs = array('flag'=>'do_not_accept_comments');
				returnflag($arrs);
			}
			if($blog['target_ids']) {
				$blog['target_ids'] .= ",$blog[uid]";
			}
			
			$hotarr = array('blogid', $blog['blogid'], $blog['hotuser']);
			$stattype = 'blogcomment';//统计
			break;
		case 'arrangementid':
			//读取校庆安排
			$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('arrangement')." WHERE arrangementid='$id'");
			$arrangement = $_SGLOBAL['db']->fetch_array($query);
			//校庆安排不存在
			if(empty($arrangement)) {
				$arrs = array('flag'=>$idtype.'_not_exist');
				returnflag($arrs);
			}
			
			//检索空间
			$tospace = getspace($arrangement['uid']);
			
			//是否允许评论
			if(!empty($arrangement['noreply'])) {
				$arrs = array('flag'=>'do_not_accept_comments');
				returnflag($arrs);
			}
			break;
		case 'sid':
			//读取分享
			$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('share')." WHERE sid='$id'");
			$share = $_SGLOBAL['db']->fetch_array($query);
			//分享不存在
			if(empty($share)) {
				$arrs = array('flag'=>$idtype.'_not_exist');
				returnflag($arrs);
			}

			//检索空间
			$tospace = getspace($share['uid']);
			
			$hotarr = array('sid', $share['sid'], $share['hotuser']);
			$stattype = 'sharecomment';//统计
			break;
		case 'pid':
			$query = $_SGLOBAL['db']->query("SELECT p.*, pf.hotuser
				FROM ".tname('poll')." p
				LEFT JOIN ".tname('pollfield')." pf ON pf.pid=p.pid
				WHERE p.pid='$id'");
			$poll = $_SGLOBAL['db']->fetch_array($query);
			if(empty($poll)) {
				$arrs = array('flag'=>$idtype.'_not_exist');
				returnflag($arrs);
			}
			//是否允许评论
			$tospace = getspace($poll['uid']);
			if($poll['noreply']) {
				//是否好友
				if(!$tospace['self'] && !in_array($_SGLOBAL['supe_uid'], $tospace['friends'])) {
					$arrs = array('flag'=>'no_privilege');
					returnflag($arrs);
				}
			}
			
			$hotarr = array('pid', $poll['pid'], $poll['hotuser']);
			$stattype = 'pollcomment';//统计
			break;
		case 'eventid':
		    // 读取活动
		    $query = $_SGLOBAL['db']->query("SELECT e.*, ef.* FROM ".tname('event')." e LEFT JOIN ".tname("eventfield")." ef ON e.eventid=ef.eventid WHERE e.eventid='$id'");
			$event = $_SGLOBAL['db']->fetch_array($query);

			if(empty($event)) {
				$arrs = array('flag'=>$idtype.'_not_exist');
				returnflag($arrs);
			}
			
			if($event['grade'] < -1){
				$arrs = array('flag'=>'event_is_closed');//活动已经关闭
				returnflag($arrs);
			} elseif($event['grade'] <= 0){
				$arrs = array('flag'=>'event_under_verify');//活动未通过审核
				returnflag($arrs);
			}
			
			if(!$event['allowpost']){
				$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname("userevent")." WHERE eventid='$id' AND uid='$_SGLOBAL[supe_uid]' LIMIT 1");
				$value = $_SGLOBAL['db']->fetch_array($query);
				if(empty($value) || $value['status'] < 2){
					$arrs = array('flag'=>'no_privilege');
					returnflag($arrs);
				}
			}

			//检索空间
			$tospace = getspace($event['uid']);
			
			$hotarr = array('eventid', $event['eventid'], $event['hotuser']);
			$stattype = 'eventcomment';//统计
			break;
		default:
			$arrs = array('flag'=>'failed');
			returnflag($arrs);
			break;
	}
			
	//黑名单
	if(isblacklist($tospace['uid'])) {
		$arrs = array('flag'=>'is_blacklist');
		returnflag($arrs);
	}
			
	if($idtype == 'doid'){
		$setarr = array(
			'doid' => $updo['doid'],
			'upid' => $updo['id'],
			'uid' => $userid,
			'username' => $username,
			'dateline' => $_SGLOBAL['timestamp'],
			'message' => $message,
			'ip' => '',
			'grade' => $updo['grade']+1
		);
		
		//最多层级
		if($updo['grade'] >= 3) {
			$setarr['upid'] = $updo['upid'];//更母一个级别
		}

		$cid = inserttable('docomment', $setarr, 1);
		
		//更新回复数
		$_SGLOBAL['db']->query("UPDATE ".tname('doing')." SET replynum=replynum+1 WHERE doid='$updo[doid]'");
		
		if($updo['uid'] != $userid) {
			$note = cplang('note_doing_reply', array("space.php?do=doing&doid=$updo[doid]&highlight=$cid"));
			notification_add($updo['uid'], 'doing', $note);
		}
		if($UserIds){
			foreach($UserIds as $UserId){
				$note = cplang('note_doingcomment_at', array("space.php?do=doing&doid=$updo[doid]&highlight=$cid"));
				notification_add($UserId, 'atyou', $note);
			}
		}

	}elseif($idtype == 'threadid'){
		$setarr = array(
			'tagid' => intval($thread['tagid']),
			'tid' => $id,
			'uid' => $userid,
			'username' => $username,
			'ip' => '',
			'dateline' => $_SGLOBAL['timestamp'],
			'message' => $message
		);
		$cid = inserttable('post', $setarr, 1);

		//邮件通知
		smail($thread['uid'], '', cplang('mtag_reply',array($_SN[$userid], shtmlspecialchars(getsiteurl()."space.php?uid=$thread[uid]&do=thread&id=$thread[tid]"))), '', 'mtag_reply');

		//更新统计数据
		$_SGLOBAL['db']->query("UPDATE ".tname('thread')."
			SET replynum=replynum+1, lastpost='$_SGLOBAL[timestamp]', lastauthor='$username', lastauthorid='$userid'
			WHERE tid='$id'");
		
		//更新群组统计
		$_SGLOBAL['db']->query("UPDATE ".tname("mtag")." SET postnum=postnum+1 WHERE tagid='$thread[tagid]'");
		
		$note = cplang('note_post_reply', array("space.php?uid=$thread[uid]&do=thread&id=$thread[tid]", $thread['subject'], "space.php?uid=$thread[uid]&do=thread&id=$thread[tid]&pid=$cid"));
		notification_add($post['uid'], 'post', $note);


	}else{
		$setarr = array(
			'uid' => $tospace['uid'],
			'id' => $id,
			'idtype' => $idtype,
			'authorid' => $userid,
			'author' => $username,
			'dateline' => $_SGLOBAL['timestamp'],
			'message' => $message,
			'ip' => ''
		);
		//入库
		$cid = inserttable('comment', $setarr, 1);

		switch ($idtype) {
			case 'uid':
				$n_url = "space.php?uid=$tospace[uid]&do=wall&cid=$cid";
				$note_type = 'wall';
				$q_note = cplang('note_wall_reply', array($n_url));
				$q_msgtype = 'comment_friend_reply';
				break;
			case 'picid':
				$n_url = "space.php?uid=$tospace[uid]&do=album&picid=$id&cid=$cid";
				$note_type = 'piccomment';
				$q_note = cplang('note_pic_comment_reply', array($n_url));
				$q_msgtype = 'photo_comment_reply';
				break;
			case 'blogid':
				//通知
				$n_url = "space.php?uid=$tospace[uid]&do=blog&id=$id&cid=$cid";
				$note_type = 'blogcomment';
				$q_note = cplang('note_blog_comment_reply', array($n_url));
				$q_msgtype = 'blog_comment_reply';
				break;
			case 'arrangementid':
				//通知
				$n_url = "space.php?uid=$tospace[uid]&do=arrangement&id=$id&cid=$cid";
				$note_type = 'arrangementcomment';
				$q_note = cplang('note_arrangement_comment_reply', array($n_url));
				$q_msgtype = 'arrangement_comment_reply';
				break;
			case 'sid':
				//分享
				$n_url = "space.php?uid=$tospace[uid]&do=share&id=$id&cid=$cid";
				$note_type = 'sharecomment';
				$q_note = cplang('note_share_comment_reply', array($n_url));
				$q_msgtype = 'share_comment_reply';
				break;
			case 'pid':
				$n_url = "space.php?uid=$tospace[uid]&do=poll&pid=$id&cid=$cid";
				$note_type = 'pollcomment';
				$q_note = cplang('note_poll_comment_reply', array($n_url));
				$q_msgtype = 'poll_comment_reply';
				break;
			case 'eventid':
				// 活动
				$n_url = "space.php?do=event&id=$id&view=comment&cid=$cid";
				$note_type = 'eventcomment';
				$q_note = cplang('note_event_comment_reply', array($n_url));
				$q_msgtype = 'event_comment_reply';
				break;
		}

		if($comment['authorid'] != $_SGLOBAL['supe_uid']) {
			//发送邮件通知
			smail($comment['authorid'], '', cplang($q_msgtype, array($_SN[$userid], shtmlspecialchars(getsiteurl().$n_url))), '', $q_msgtype);
			notification_add($comment['authorid'], $note_type, $q_note);
			
		}
		
		//通知被@的用户
		if($UserIds){
			$note = cplang('note_comment_at', array($n_url));
			foreach($UserIds as $UserId){
				notification_add($UserId, 'atyou', $note);
			}
		}
	}
	
	//统计
	if($stattype) {
		updatestat($stattype);
	}
	if($cid){
		$arrs = array('flag'=>'success');
	}else{
		$arrs = array('flag'=>'failed');
	}
	returnflag($arrs);
}
function returnflag($flag){
		$result = json_encode($flag);
		$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
		echo $result;
		exit();
}	

	
		
?>