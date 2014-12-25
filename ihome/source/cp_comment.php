<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}

include_once(S_ROOT.'./source/function_bbcode.php');

//���ñ���
$tospace = $pic = $blog = $album = $share = $event = $poll = array();

if(submitcheck('commentsubmit')) {

	$idtype = $_POST['idtype'];
	if(!checkperm('allowcomment')) {
		ckspacelog();
		showmessage('no_privilege');
	}

	//ʵ����֤
	ckrealname('comment');

	//���û���ϰ
	cknewuser();

	//�ж��Ƿ񷢲�̫��
	$waittime = interval_check('post');
	if($waittime > 0) {
		showmessage('operating_too_fast','',1,array($waittime));
	}

	$message = getstr($_POST['message'], 0, 1, 1, 1, 2);
	if(strlen($message) < 2) {
		showmessage('content_is_too_short');
	}
	$message = $message.' ';
	
	//�������۵�@���� Add by xuxing 2012-10-14 start
	//��ȡAT�û�
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

			//���ü�麯����@������ݽ�����֤��ΪUID��Ӧ��������ͬ�򷵻�@������������ͬ������ж���һ��@��û���ҵ�ƥ������ս�����false
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
	//ժҪ
	$summay = getstr($message, 150, 1, 1, 0, 0, -1);

	$id = intval($_POST['id']);

	//��������
	$cid = empty($_POST['cid'])?0:intval($_POST['cid']);
	$comment = array();
	if($cid) {
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('comment')." WHERE cid='$cid' AND id='$id' AND idtype='$_POST[idtype]'");
		$comment = $_SGLOBAL['db']->fetch_array($query);
		if($comment && $comment['authorid'] != $_SGLOBAL['supe_uid']) {
			//ʵ��
			if($comment['author'] == '') {
				$_SN[$comment['authorid']] = lang('hidden_username');
			} else {
				realname_set($comment['authorid'], $comment['author']);
				realname_get();
			}
			$comment['message'] = preg_replace("/\<div class=\"quote\"\>\<span class=\"q\"\>.*?\<\/span\>\<\/div\>/is", '', $comment['message']);
			//bbcodeת��
			$comment['message'] = html2bbcode($comment['message']);
			$message = addslashes("<div class=\"quote\"><span class=\"q\"><b>".$_SN[$comment['authorid']]."</b>: ".getstr($comment['message'], 150, 0, 0, 0, 2, 1).'</span></div>').$message;
			if($comment['idtype']=='uid') {
				$id = $comment['authorid'];
			}
		} else {
			$comment = array();
		}
	}

	$hotarr = array();
	$stattype = '';

	//���Ȩ��
	switch ($idtype) {
		case 'uid':
			//�����ռ�
			$tospace = getspace($id);
			$stattype = 'wall';//ͳ��
			break;
		case 'picid':
			//����ͼƬ
			$query = $_SGLOBAL['db']->query("SELECT p.*, pf.hotuser
				FROM ".tname('pic')." p
				LEFT JOIN ".tname('picfield')." pf
				ON pf.picid=p.picid
				WHERE p.picid='$id'");
			$pic = $_SGLOBAL['db']->fetch_array($query);
			//ͼƬ������
			if(empty($pic)) {
				showmessage('view_images_do_not_exist');
			}

			//�����ռ�
			$tospace = getspace($pic['uid']);

			//��ȡ���
			$album = array();
			if($pic['albumid']) {
				$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('album')." WHERE albumid='$pic[albumid]'");
				if(!$album = $_SGLOBAL['db']->fetch_array($query)) {
					updatetable('pic', array('albumid'=>0), array('albumid'=>$pic['albumid']));//��ᶪʧ
				}
			}
			//��֤��˽
			if(!ckfriend($album['uid'], $album['friend'], $album['target_ids'])) {
				showmessage('no_privilege');
			} elseif(!$tospace['self'] && $album['friend'] == 4) {
				//������������
				$cookiename = "view_pwd_album_$album[albumid]";
				$cookievalue = empty($_SCOOKIE[$cookiename])?'':$_SCOOKIE[$cookiename];
				if($cookievalue != md5(md5($album['password']))) {
					showmessage('no_privilege');
				}
			}
			
			$hotarr = array('picid', $pic['picid'], $pic['hotuser']);
			$stattype = 'piccomment';//ͳ��
			break;
		case 'blogid':
			//��ȡ��־
			$query = $_SGLOBAL['db']->query("SELECT b.*, bf.target_ids, bf.hotuser
				FROM ".tname('blog')." b
				LEFT JOIN ".tname('blogfield')." bf ON bf.blogid=b.blogid
				WHERE b.blogid='$id'");
			$blog = $_SGLOBAL['db']->fetch_array($query);
			//��־������
			if(empty($blog)) {
				showmessage('view_to_info_did_not_exist');
			}
			
			//�����ռ�
			$tospace = getspace($blog['uid']);
			
			//��֤��˽
			if(!ckfriend($blog['uid'], $blog['friend'], $blog['target_ids'])) {
				//û��Ȩ��
				showmessage('no_privilege');
			} elseif(!$tospace['self'] && $blog['friend'] == 4) {
				//������������
				$cookiename = "view_pwd_blog_$blog[blogid]";
				$cookievalue = empty($_SCOOKIE[$cookiename])?'':$_SCOOKIE[$cookiename];
				if($cookievalue != md5(md5($blog['password']))) {
					showmessage('no_privilege');
				}
			}

			//�Ƿ���������
			if(!empty($blog['noreply'])) {
				showmessage('do_not_accept_comments');
			}
			if($blog['target_ids']) {
				$blog['target_ids'] .= ",$blog[uid]";
			}
			
			$hotarr = array('blogid', $blog['blogid'], $blog['hotuser']);
			$stattype = 'blogcomment';//ͳ��
			break;
		case 'arrangementid':
			//��ȡУ�찲��
			$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('arrangement')." WHERE arrangementid='$id'");
			$arrangement = $_SGLOBAL['db']->fetch_array($query);
			//У�찲�Ų�����
			if(empty($arrangement)) {
				showmessage('view_to_info_did_not_exist');
			}
			
			//�����ռ�
			$tospace = getspace($arrangement['uid']);
			
			//�Ƿ���������
			if(!empty($arrangement['noreply'])) {
				showmessage('do_not_accept_comments');
			}
			break;
		case 'sid':
			//��ȡ��־
			$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('share')." WHERE sid='$id'");
			$share = $_SGLOBAL['db']->fetch_array($query);
			//��־������
			if(empty($share)) {
				showmessage('sharing_does_not_exist');
			}

			//�����ռ�
			$tospace = getspace($share['uid']);
			
			$hotarr = array('sid', $share['sid'], $share['hotuser']);
			$stattype = 'sharecomment';//ͳ��
			break;
		case 'pid':
			$query = $_SGLOBAL['db']->query("SELECT p.*, pf.hotuser
				FROM ".tname('poll')." p
				LEFT JOIN ".tname('pollfield')." pf ON pf.pid=p.pid
				WHERE p.pid='$id'");
			$poll = $_SGLOBAL['db']->fetch_array($query);
			if(empty($poll)) {
				showmessage('voting_does_not_exist');
			}
			//�Ƿ���������
			$tospace = getspace($poll['uid']);
			if($poll['noreply']) {
				//�Ƿ����
				if(!$tospace['self'] && !in_array($_SGLOBAL['supe_uid'], $tospace['friends'])) {
					showmessage('the_vote_only_allows_friends_to_comment');
				}
			}
			
			$hotarr = array('pid', $poll['pid'], $poll['hotuser']);
			$stattype = 'pollcomment';//ͳ��
			break;
		case 'eventid':
		    // ��ȡ�
		    $query = $_SGLOBAL['db']->query("SELECT e.*, ef.* FROM ".tname('event')." e LEFT JOIN ".tname("eventfield")." ef ON e.eventid=ef.eventid WHERE e.eventid='$id'");
			$event = $_SGLOBAL['db']->fetch_array($query);

			if(empty($event)) {
				showmessage('event_does_not_exist');
			}
			
			if($event['grade'] < -1){
				showmessage('event_is_closed');//��Ѿ��ر�
			} elseif($event['grade'] <= 0){
				showmessage('event_under_verify');//�δͨ�����
			}
			
			if(!$event['allowpost']){
				$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname("userevent")." WHERE eventid='$id' AND uid='$_SGLOBAL[supe_uid]' LIMIT 1");
				$value = $_SGLOBAL['db']->fetch_array($query);
				if(empty($value) || $value['status'] < 2){
					showmessage('event_only_allows_members_to_comment');//ֻ�л��Ա����������
				}
			}

			//�����ռ�
			$tospace = getspace($event['uid']);
			
			$hotarr = array('eventid', $event['eventid'], $event['hotuser']);
			$stattype = 'eventcomment';//ͳ��
			break;
		case 'videoid':
		    $query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('video')." WHERE id=$id ");
			$video = $_SGLOBAL['db']->fetch_array($query);

			if(empty($video)) {
				showmessage('video_does_not_exist');//ûдlang
			}

			if($video['pass'] < 1) {
				showmessage('video_is_illegality');//ûдlang
			}

			if($video['noreply']){
				showmessage('this_video_noreply');
			}

			$tospace = getspace($video['uid']);
			
			$stattype = 'videocomment';//ͳ��
			break;
		//���ӹ�����comment����
		case 'jobid':
			$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('job')." WHERE id=$id ");
			$job = $_SGLOBAL['db']->fetch_array($query);
			if(empty($job)) {
				showmessage('job_does_not_exist');//ûдlang
			}
			
			$tospace = getspace($job['uid']);
			$stattype = false;//ͳ��
			break;
		default:
			showmessage('non_normal_operation');
			break;
	}
	
	if(empty($tospace)) {
		showmessage('space_does_not_exist');
	}
	
	//��Ƶ��֤
	if($tospace['videostatus']) {
		if($idtype == 'uid') {
			ckvideophoto('wall', $tospace);
		} else {
			ckvideophoto('comment', $tospace);
		}
	}
	
	//������
	if(isblacklist($tospace['uid'])) {
		showmessage('is_blacklist');
	}
	
	//�ȵ�
	if($hotarr && $tospace['uid'] != $_SGLOBAL['supe_uid']) {
		hot_update($hotarr[0], $hotarr[1], $hotarr[2]);
	}

	//�¼�
	$fs = array();
	$fs['icon'] = 'comment';
	$fs['target_ids'] = $fs['friend'] = '';

	switch ($_POST['idtype']) {
		case 'uid':
			//�¼�
			$fs['icon'] = 'wall';
			$fs['title_template'] = cplang('feed_comment_space');
			$fs['title_data'] = array('touser'=>"<a href=\"space.php?uid=$tospace[uid]\">".$_SN[$tospace['uid']]."</a>");
			$fs['body_template'] = '';
			$fs['body_data'] = array();
			$fs['body_general'] = '';
			$fs['images'] = array();
			$fs['image_links'] = array();
			break;
		case 'picid':
			//�¼�
			$fs['title_template'] = cplang('feed_comment_image');
			$fs['title_data'] = array('touser'=>"<a href=\"space.php?uid=$tospace[uid]\">".$_SN[$tospace['uid']]."</a>");
			$fs['body_template'] = '{pic_title}';
			$fs['body_data'] = array('pic_title'=>$pic['title']);
			$fs['body_general'] = $summay;
			$fs['images'] = array(pic_get($pic['filepath'], $pic['thumb'], $pic['remote']));
			$fs['image_links'] = array("space.php?uid=$tospace[uid]&do=album&picid=$pic[picid]");
			$fs['target_ids'] = $album['target_ids'];
			$fs['friend'] = $album['friend'];
			break;
		case 'videoid':
			//�¼�
			$fs['title_template'] = cplang('feed_comment_video');
			$fs['title_data'] = array('touser'=>"<a href=\"space.php?uid=$tospace[uid]\">".$_SN[$tospace['uid']]."</a>");
			$url = $_SC['attachurl'].$video['filepath'];
			$fs['body_data'] = array(
				'video_comment'=>$message,
				'desc'=>$video['desc'],
				'videourl'=>$url
				);
			break;
		case 'blogid':
			//��������ͳ��
			$_SGLOBAL['db']->query("UPDATE ".tname('blog')." SET replynum=replynum+1 WHERE blogid='$id'");
			//�¼�
			$fs['title_template'] = cplang('feed_comment_blog');
			$fs['title_data'] = array('touser'=>"<a href=\"space.php?uid=$tospace[uid]\">".$_SN[$tospace['uid']]."</a>", 'blog'=>"<a href=\"space.php?uid=$tospace[uid]&do=blog&id=$id\">$blog[subject]</a>");
			$fs['body_template'] = '';
			$fs['body_data'] = array();
			$fs['body_general'] = '';
			$fs['target_ids'] = $blog['target_ids'];
			$fs['friend'] = $blog['friend'];
			break;
		case 'jobid':
			//��������ͳ��
			$_SGLOBAL['db']->query("UPDATE ".tname('job')." SET replynum=replynum+1 WHERE id='$id'");
			//�¼�
			$fs['title_template'] = cplang('feed_comment_job');
			$fs['title_data'] = array('touser'=>"<a href=\"space.php?uid=$tospace[uid]\">".$_SN[$tospace['uid']]."</a>", 'job'=>"<a href=\"job.php?do=nei&m=view&id=$id\">$job[title]</a>");
			$fs['body_template'] = '';
			$fs['body_data'] = array();
			$fs['body_general'] = '';
			$fs['target_ids'] = '';
			$fs['friend'] = '';
			break;
		case 'arrangementid':
			//��������ͳ��
			$_SGLOBAL['db']->query("UPDATE ".tname('arrangement')." SET replynum=replynum+1 WHERE arrangementid='$id'");
			//�¼�
			$fs['title_template'] = cplang('feed_comment_arrangement');
			$fs['title_data'] = array('touser'=>"<a href=\"space.php?uid=$tospace[uid]\">".$_SN[$tospace['uid']]."</a>", 'arrangement'=>"<a href=\"space.php?uid=$tospace[uid]&do=arrangement&id=$id\">$arrangement[subject]</a>");
			$fs['body_template'] = '';
			$fs['body_data'] = array();
			$fs['body_general'] = '';
			$fs['target_ids'] = $arrangement['target_ids'];
			$fs['friend'] = $arrangement['friend'];
			break;
		case 'sid':
			//�¼�
			$fs['title_template'] = cplang('feed_comment_share');
			$fs['title_data'] = array('touser'=>"<a href=\"space.php?uid=$tospace[uid]\">".$_SN[$tospace['uid']]."</a>", 'share'=>"<a href=\"space.php?uid=$tospace[uid]&do=share&id=$id\">".str_replace(cplang('share_action'), '', $share['title_template'])."</a>");
			$fs['body_template'] = '';
			$fs['body_data'] = array();
			$fs['body_general'] = '';
			break;
		case 'eventid':
		    // �
		    $fs['title_template'] = cplang('feed_comment_event');
			$fs['title_data'] = array('touser'=>"<a href=\"space.php?uid=$tospace[uid]\">".$_SN[$tospace['uid']]."</a>", 'event'=>'<a href="space.php?do=event&id='.$event['eventid'].'">'.$event['title'].'</a>');
			$fs['body_template'] = '';
			$fs['body_data'] = array();
			$fs['body_general'] = '';
			break;
		case 'pid':
			// ͶƱ
			//��������ͳ��
			$_SGLOBAL['db']->query("UPDATE ".tname('poll')." SET replynum=replynum+1 WHERE pid='$id'");
			$fs['title_template'] = cplang('feed_comment_poll');
			$fs['title_data'] = array('touser'=>"<a href=\"space.php?uid=$tospace[uid]\">".$_SN[$tospace['uid']]."</a>", 'poll'=>"<a href=\"space.php?uid=$tospace[uid]&do=poll&pid=$id\">$poll[subject]</a>");
			$fs['body_template'] = '';
			$fs['body_data'] = array();
			$fs['body_general'] = '';
			$fs['friend'] = '';
			break;
	}
	
	$setarr = array(
		'uid' => $tospace['uid'],
		'id' => $id,
		'idtype' => $_POST['idtype'],
		'authorid' => $_SGLOBAL['supe_uid'],
		'author' => $_SGLOBAL['supe_username'],
		'dateline' => $_SGLOBAL['timestamp'],
		'message' => $message,
		'ip' => getonlineip()
	);
	
	if($_POST['idtype']=='uid'){
		$setarr['image'] = $_POST['datapicpath'];
		$setarr['image_link'] = "space.php?uid=$_SGLOBAL[supe_uid]&do=album&picid=".$_POST['datapicid'];
	}
	
	//���
	$cid = inserttable('comment', $setarr, 1);
	//�������Ϊvideoid�����������ϼ�1
	if ($idtype == 'videoid') {
		$_SGLOBAL['db']->query("UPDATE ".tname('video')." SET comment=comment+1 WHERE id='$id'");
	}
	$action = 'comment';
	$becomment = 'getcomment';
	switch ($_POST['idtype']) {
		case 'uid':
			$n_url = "space.php?uid=$tospace[uid]&do=wall&cid=$cid";
			$note_type = 'wall';
			$note = cplang('note_wall', array($n_url));
			$q_note = cplang('note_wall_reply', array($n_url));
			if($comment) {
				$msg = 'note_wall_reply_success';
				$magvalues = array($_SN[$tospace['uid']]);
				$becomment = '';
			} else {
				$msg = 'do_success';
				$magvalues = array();
				$becomment = 'getguestbook';
			}
			$msgtype = 'comment_friend';
			$q_msgtype = 'comment_friend_reply';
			$action = 'guestbook';
			break;
		case 'picid':
			$n_url = "space.php?uid=$tospace[uid]&do=album&picid=$id&cid=$cid";
			$note_type = 'piccomment';
			$note = cplang('note_pic_comment', array($n_url));
			$q_note = cplang('note_pic_comment_reply', array($n_url));
			$msg = 'do_success';
			$magvalues = array();
			$msgtype = 'photo_comment';
			$q_msgtype = 'photo_comment_reply';
			break;
		case 'videoid':
			$n_url = "plugin.php?pluginid=video&ac=view&op=commment&vid=$id&cid=$cid";
			$note_type = 'videocomment';
			$note = cplang('note_video_comment', array($n_url));
			$q_note = cplang('note_video_comment_reply', array($n_url));
			$msg = 'do_success';
			$magvalues = array();
			$msgtype = 'video_comment';
			$q_msgtype = 'video_comment_reply';
			break;
		case 'blogid':
			//֪ͨ
			$n_url = "space.php?uid=$tospace[uid]&do=blog&id=$id&cid=$cid";
			$note_type = 'blogcomment';
			$note = cplang('note_blog_comment', array($n_url, $blog['subject']));
			$q_note = cplang('note_blog_comment_reply', array($n_url));
			$msg = 'do_success';
			$magvalues = array();
			$msgtype = 'blog_comment';
			$q_msgtype = 'blog_comment_reply';
			break;
		case 'arrangementid':
			//֪ͨ
			$n_url = "space.php?uid=$tospace[uid]&do=arrangement&id=$id&cid=$cid";
			$note_type = 'arrangementcomment';
			$note = cplang('note_arrangement_comment', array($n_url, $arrangement['subject']));
			$q_note = cplang('note_arrangement_comment_reply', array($n_url));
			$msg = 'do_success';
			$magvalues = array();
			$msgtype = 'arrangement_comment';
			$q_msgtype = 'arrangement_comment_reply';
			break;
		case 'sid':
			//����
			$n_url = "space.php?uid=$tospace[uid]&do=share&id=$id&cid=$cid";
			$note_type = 'sharecomment';
			$note = cplang('note_share_comment', array($n_url));
			$q_note = cplang('note_share_comment_reply', array($n_url));
			$msg = 'do_success';
			$magvalues = array();
			$msgtype = 'share_comment';
			$q_msgtype = 'share_comment_reply';
			break;
		case 'pid':
			$n_url = "space.php?uid=$tospace[uid]&do=poll&pid=$id&cid=$cid";
			$note_type = 'pollcomment';
			$note = cplang('note_poll_comment', array($n_url, $poll['subject']));
			$q_note = cplang('note_poll_comment_reply', array($n_url));
			$msg = 'do_success';
			$magvalues = array();
			$msgtype = 'poll_comment';
			$q_msgtype = 'poll_comment_reply';
			break;
		case 'eventid':
		    // �
		    $n_url = "space.php?do=event&id=$id&view=comment&cid=$cid";
		    $note_type = 'eventcomment';
		    $note = cplang('note_event_comment', array($n_url));
		    $q_note = cplang('note_event_comment_reply', array($n_url));
		    $msg = 'do_success';
		    $magvalues = array();
		    $msgtype = 'event_comment';
		    $q_msgtype = 'event_comment_reply';
		    break;
		case 'jobid':
		    // job
		    $n_url = "job.php?do=nei&m=view&id=$id";
		    $note_type = 'jobcomment';
		    $note = cplang('note_job_comment', array($n_url));
		    $q_note = cplang('note_job_comment_reply', array($n_url));
		    $msg = 'do_success';
		    $magvalues = array();
		    $msgtype = 'job_comment';
		    $q_msgtype = 'job_comment_reply';
		    break;
	}

	if(empty($comment)) {
		
		//����������
		if($tospace['uid'] != $_SGLOBAL['supe_uid']) {
			//�¼�����
			//showmessage("$_POST[withshare]; aa");
			//���ԵĶ���,�ȵ��������ߵ�ʱ����ɾ��
			if(ckprivacy('comment', 1) || (ckprivacy('comment', 0) && $_POST['withshare']=true)) {
				feed_add($fs['icon'], $fs['title_template'], $fs['title_data'], $fs['body_template'], $fs['body_data'], $fs['body_general'],$fs['images'], $fs['image_links'], $fs['target_ids'], $fs['friend']);
				if ($idtype == 'videoid') {
					$_SGLOBAL['db']->query("UPDATE ".tname('video')." SET share=share+1 WHERE id='$id'");
				}
			}
			
			//����֪ͨ
			notification_add($tospace['uid'], $note_type, $note);
			
			//���Է��Ͷ���Ϣ
			if($_POST['idtype'] == 'uid' && $tospace['updatetime'] == $tospace['dateline']) {
				include_once S_ROOT.'./uc_client/client.php';
				uc_pm_send($_SGLOBAL['supe_uid'], $tospace['uid'], cplang('wall_pm_subject'), cplang('wall_pm_message', array(addslashes(getsiteurl().$n_url))), 1, 0, 0);
			}
			
			//�����ʼ�֪ͨ
			smail($tospace['uid'], '', cplang($msgtype, array($_SN[$space['uid']], shtmlspecialchars(getsiteurl().$n_url))), '', $msgtype);
		}
		
	} elseif($comment['authorid'] != $_SGLOBAL['supe_uid']) {
		
		//�����ʼ�֪ͨ
		smail($comment['authorid'], '', cplang($q_msgtype, array($_SN[$space['uid']], shtmlspecialchars(getsiteurl().$n_url))), '', $q_msgtype);
		notification_add($comment['authorid'], $note_type, $q_note);
		
	}
	
	//֪ͨ��@���û�
	$note = cplang('note_comment_at', array($n_url));
	foreach($UserIds as $UserId){
		notification_add($UserId, 'atyou', $note);
	}

	//ͳ��
	if($stattype) {
		updatestat($stattype);
	}

	//����
	if($tospace['uid'] != $_SGLOBAL['supe_uid']) {
		$needle = $id;
		if($_POST['idtype'] != 'uid') {
			$needle = $_POST['idtype'].$id;
		} else {
			$needle = $tospace['uid'];
		}
		//�������۷�����
		getreward($action, 1, 0, $needle);
		//������������
		if($becomment) {
			if($_POST['idtype'] == 'uid') {
				$needle = $_SGLOBAL['supe_uid'];
			}
			getreward($becomment, 1, $tospace['uid'], $needle, 0);
		}
	}

	showmessage($msg, $_POST['refer'], 0, $magvalues);
}

$cid = empty($_GET['cid'])?0:intval($_GET['cid']);

//�༭
if($_GET['op'] == 'edit') {

	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('comment')." WHERE cid='$cid' AND authorid='$_SGLOBAL[supe_uid]'");
	if(!$comment = $_SGLOBAL['db']->fetch_array($query)) {
		showmessage('no_privilege');
	}

	//�ύ�༭
	if(submitcheck('editsubmit')) {

		$message = getstr($_POST['message'], 0, 1, 1, 1, 2);
		if(strlen($message) < 2) showmessage('content_is_too_short');

		updatetable('comment', array('message'=>$message), array('cid'=>$comment['cid']));

		showmessage('do_success', $_POST['refer'], 0);
	}

	//bbcodeת��
	$comment['message'] = html2bbcode($comment['message']);//��ʾ��

} elseif($_GET['op'] == 'delete') {

	if(submitcheck('deletesubmit')) {
		include_once(S_ROOT.'./source/function_delete.php');
		if(deletecomments(array($cid))) {
			showmessage('do_success', $_POST['refer'], 0);
		} else {
			showmessage('no_privilege');
		}
	}

} elseif($_GET['op'] == 'reply') {

	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('comment')." WHERE cid='$cid'");
	if(!$comment = $_SGLOBAL['db']->fetch_array($query)) {
		showmessage('comments_do_not_exist');
	}

} else {

	showmessage('no_privilege');
}

include template('cp_comment');

?>
