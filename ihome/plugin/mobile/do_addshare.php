<?php
/*
     addshare.php发布分享
     Add by am@ihome.2012-10-15  11:34

*/

    //include_once('../../common.php'); 
	include_once(S_ROOT.'./uc_client/client.php');
	include_once('do_mobileverify.php');
	//$userid = 96;
	//$username = 'anminghao';
	$Body =trim($_POST['message']);
	//$Body ='This is a message.';
	//$type = 'doing';
	//$id = 484;
	$type = trim($_POST['type']);
    $id = intval($_POST['typeid']);
    $FromDevice = trim($_POST['fromdevice']);
	
	//am 修改 start
		//检查类别
	switch ($type) {
		case 'space':
		$tospace = getspace($id);
			if($id == $space['uid'] || empty($tospace) || isblacklist($tospace['uid'])) {
				$arrs = array('flag'=>'fail');
				$result = json_encode($arrs);
				$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
				echo $result;
				exit();
			}

			$arr['title_template'] = cplang('share_space');
			$arr['body_template'] = '<b>{username}</b><br>{reside}<br>{spacenote}';
			$arr['body_data'] = array(
				'username' => "<a href=\"space.php?uid=$id\">".$_SN[$tospace['uid']]."</a>",
				'reside' => $tospace['resideprovince'].$tospace['residecity'],
				'spacenote' => $tospace['spacenote']
			);
			
			$arr['image'] = ckavatar($id)?avatar($id, 'middle', true):UC_API.'/images/noavatar_middle.gif';
			$arr['image_link'] = "space.php?uid=$id";
			
			//通知
			$note_uid = $id;
			$note_message = cplang('note_share_space');

			break;
		//martin 修改 start 
		case 'doing':
			$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('doing')." WHERE doid='$id'");
			$do = $_SGLOBAL['db']->fetch_array($query);
			
			//实名
			realname_set($do['uid'], $do['username']);
			realname_get();
			$arr['title_template'] = cplang('share_doing');
			$arr['body_template'] = '<b>{username}</b>:&nbsp;'.$do['message'];
			$arr['body_data'] = array(
				'username' => "<a href=\"space.php?uid=$do[uid]\">".$_SN[$do['uid']]."</a>",
				'message' => getstr($do['message'], 150, 0, 1, 0, 0, -1)
			);
			
			$note_uid = $do['uid'];
			
			$note_message = cplang('note_share_doing', array("space.php?uid=$do[uid]&do=doing&doid=$do[doid]", $do['message']));
			break;
	/*  手机第二版启用
	case 'arrangement':
			$query = $_SGLOBAL['db']->query("SELECT * from ".tname('arrangement')." WHERE arrangementid='$id'");
			$arrangement = $_SGLOBAL['db']->fetch_array($query);
				
			//实名
			realname_set($arrangement['uid']);
			realname_get();

			$arr['title_template'] = cplang('share_arrangement');
			$arr['body_template'] = '<b>{subject}</b><br>{time}<br>{message}';
			$arr['body_data'] = array(
				'subject' => "标题：<a href=\"space.php?uid=$arrangement[uid]&do=arrangement&id=$arrangement[arrangementid]\">$arrangement[subject]</a>",
				'time' => "开始时间：".sgmdate('Y-m-d H:i',$arrangement['starttime']),
				'message' => getstr($arrangement['message'], 150, 0, 1, 0, 0, -1)
			);
			if($arrangement['pic']) {
				$arr['image'] = pic_cover_get($arrangement['pic'], $arrangement['picflag']);
				$arr['image_link'] = "space.php?uid=$arrangement[uid]&do=arrangement&id=$arrangement[arrangementid]";
			}
			//通知
			$note_uid = $arrangement['uid'];
			$note_message = cplang('note_share_arrangement', array("space.php?uid=$arrangement[uid]&do=arrangement&id=$arrangement[arrangementid]", $arrangement['subject']));
			
			break;
			*/
		case 'blog':
			$query = $_SGLOBAL['db']->query("SELECT b.*,bf.message,bf.hotuser FROM ".tname('blog')." b
				LEFT JOIN ".tname('blogfield')." bf ON bf.blogid=b.blogid
				WHERE b.blogid='$id'");
			$blog = $_SGLOBAL['db']->fetch_array($query);
			//实名
			realname_set($blog['uid'], $blog['username']);
			realname_get();

			$arr['title_template'] = cplang('share_blog');
			$arr['body_template'] = '<b>{subject}</b><br>{username}<br>{message}';
			$arr['body_data'] = array(
				'subject' => "<a href=\"space.php?uid=$blog[uid]&do=blog&id=$blog[blogid]\">$blog[subject]</a>",
				'username' => "<a href=\"space.php?uid=$blog[uid]\">".$_SN[$blog['uid']]."</a>",
				'message' => getstr($blog['message'], 150, 0, 1, 0, 0, -1)
			);
			if($blog['pic']) {
				$arr['image'] = pic_cover_get($blog['pic'], $blog['picflag']);
				$arr['image_link'] = "space.php?uid=$blog[uid]&do=blog&id=$blog[blogid]";
			}
			//通知
			$note_uid = $blog['uid'];
			$note_message = cplang('note_share_blog', array("space.php?uid=$blog[uid]&do=blog&id=$blog[blogid]", $blog['subject']));
			
			$hotarr = array('blogid', $blog['blogid'], $blog['hotuser']);
			
			break;
	/*		
		case 'album':
			$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('album')." WHERE albumid='$id'");
			$album = $_SGLOBAL['db']->fetch_array($query);
			//实名
			realname_set($album['uid'], $album['username']);
			realname_get();

			$arr['title_template'] =  cplang('share_album');
			$arr['body_template'] = '<b>{albumname}</b><br>{username}';
			$arr['body_data'] = array(
				'albumname' => "<a href=\"space.php?uid=$album[uid]&do=album&id=$album[albumid]\">$album[albumname]</a>",
				'username' => "<a href=\"space.php?uid=$album[uid]\">".$_SN[$album['uid']]."</a>"
			);
			$arr['image'] = pic_cover_get($album['pic'], $album['picflag']);
			$arr['image_link'] = "space.php?uid=$album[uid]&do=album&id=$album[albumid]";
			//通知
			$note_uid = $album['uid'];
			$note_message = cplang('note_share_album', array("space.php?uid=$album[uid]&do=album&id=$album[albumid]", $album['albumname']));
			
			break;
		case 'pic':
			$query = $_SGLOBAL['db']->query("SELECT album.username, album.albumid, album.albumname, album.friend, pic.*, pf.*
				FROM ".tname('pic')." pic
				LEFT JOIN ".tname('picfield')." pf ON pf.picid=pic.picid
				LEFT JOIN ".tname('album')." album ON album.albumid=pic.albumid
				WHERE pic.picid='$id'");
			$pic = $_SGLOBAL['db']->fetch_array($query);
			//实名
			realname_set($pic['uid'], $pic['username']);
			realname_get();

			$arr['title_template'] = cplang('share_image');
			$arr['body_template'] = cplang('album').': <b>{albumname}</b><br>{username}<br>{title}';
			$arr['body_data'] = array(
				'albumname' => "<a href=\"space.php?uid=$pic[uid]&do=album&id=$pic[albumid]\">$pic[albumname]</a>",
				'username' => "<a href=\"space.php?uid=$pic[uid]\">".$_SN[$pic['uid']]."</a>",
				'title' => getstr($pic['title'], 100, 0, 1, 0, 0, -1)
			);
			$arr['image'] = pic_get($pic['filepath'], $pic['thumb'], $pic['remote']);
			$arr['image_link'] = "space.php?uid=$pic[uid]&do=album&picid=$pic[picid]";
			//通知
			$note_uid = $pic['uid'];
			$note_message = cplang('note_share_pic', array("space.php?uid=$pic[uid]&do=album&picid=$pic[picid]", $pic['albumname']));
			
			$hotarr = array('picid', $pic['picid'], $pic['hotuser']);
			
			break;
		case 'thread':
			$query = $_SGLOBAL['db']->query("SELECT t.*, p.message, p.hotuser FROM ".tname('thread')." t
				LEFT JOIN ".tname('post')." p ON p.tid=t.tid AND p.isthread='1'
				WHERE t.tid='$id'");
			$thread = $_SGLOBAL['db']->fetch_array($query);
			include_once(S_ROOT.'./data/data_profield.php');

			$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('mtag')." WHERE tagid='$thread[tagid]'");
			$mtag = $_SGLOBAL['db']->fetch_array($query);
			$mtag['title'] = $_SGLOBAL['profield'][$mtag['fieldid']]['title'];

			//实名
			realname_set($thread['uid'], $thread['username']);
			realname_get();

			$arr['title_template'] = cplang('share_thread');
			$arr['body_template'] = '<b>{subject}</b><br>{username}<br>'.cplang('mtag').': {mtag} ({field})<br>{message}';
			$arr['body_data'] = array(
				'subject' => "<a href=\"space.php?uid=$thread[uid]&do=thread&id=$thread[tid]\">$thread[subject]</a>",
				'username' => "<a href=\"space.php?uid=$thread[uid]\">".$_SN[$thread['uid']]."</a>",
				'mtag' => "<a href=\"space.php?do=mtag&tagid=$mtag[tagid]\">$mtag[tagname]</a>",
				'field' => "<a href=\"space.php?do=mtag&id=$mtag[fieldid]\">$mtag[title]</a>",
				'message' => getstr($thread['message'], 150, 0, 1, 0, 0, -1)
			);
			$arr['image'] = '';
			$arr['image_link'] = '';
			//通知
			$note_uid = $thread['uid'];
			$note_message = cplang('note_share_thread', array("space.php?uid=$thread[uid]&do=thread&id=$thread[tid]", $thread['subject']));
			
			$hotarr = array('tid', $thread['tid'], $thread['hotuser']);
			
			break;
		case 'mtag':
			$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('mtag')." WHERE tagid='$id'");
			$mtag = $_SGLOBAL['db']->fetch_array($query);
			include_once(S_ROOT.'./data/data_profield.php');

			$mtag['title'] = $_SGLOBAL['profield'][$mtag['fieldid']]['title'];

			$arr['title_template'] = cplang('share_mtag');
			$arr['body_template'] = '<b>{mtag}</b><br>{field}<br>'.cplang('share_mtag_membernum');
			$arr['body_data'] = array(
				'mtag' => "<a href=\"space.php?do=mtag&tagid=$mtag[tagid]\">$mtag[tagname]</a>",
				'field' => "<a href=\"space.php?do=mtag&id=$mtag[fieldid]\">$mtag[title]</a>",
				'membernum' => $mtag['membernum']
			);
			$arr['image'] = $mtag['pic'];
			$arr['image_link'] = "space.php?do=mtag&tagid=$mtag[tagid]";
			break;
		case 'tag':
			$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('tag')." WHERE tagid='$id'");
			$tag = $_SGLOBAL['db']->fetch_array($query);

			$arr['title_template'] = cplang('share_tag');
			$arr['body_template'] = '<b>{tagname}</b><br>'.cplang('share_tag_blognum');
			$arr['body_data'] = array(
				'tagname' => "<a href=\"space.php?do=tag&id=$tag[tagid]\">$tag[tagname]</a>",
				'blognum' => $tag['blognum']
			);
			$arr['image'] = '';
			$arr['image_link'] = '';
			break;
		case 'event':
		    $query = $_SGLOBAL['db']->query("SELECT e.*, ef.hotuser
		    	FROM ".tname("event")." e
		    	LEFT JOIN ".tname('eventfield')." ef
		    	ON ef.eventid=e.eventid
		    	WHERE e.eventid='$id'");
		    $event = $_SGLOBAL['db']->fetch_array($query);

		    $arr['title_template'] = cplang('share_event');
			$arr['body_template'] = '<b>{eventname}</b><br>'.cplang("event_time").": {eventtime}<br>".cplang("event_location").": {eventlocation}<br>".cplang("event_creator").": {eventcreator}";			
			$arr['body_data'] = array(
				'eventname' => "<a href=\"space.php?do=event&id=$event[eventid]\">$event[title]</a>",
				'eventtime' => sgmdate('m-d H:i', $event['starttime']) . " - " . sgmdate("m-d H:i", $event['endtime']),
				'eventlocation' => "$event[province] $event[city] $event[location]",
				'eventcreator' => $event[realname]
			);
			$arr['image'] = $_SC['attachurl'] . $event['poster'];
			if(empty($event['poster'])){
			    include_once(S_ROOT.'./data/data_eventclass.php');
			    $arr['image'] = $_SGLOBAL['eventclass'][$event['classid']]['poster'];
			}
			$arr['image_link'] = "space.php?do=event&id=$event[eventid]";
			
			$hotarr = array('eventid', $event['eventid'], $event['hotuser']);
			
			break;
		case 'poll':
			$query = $_SGLOBAL['db']->query("SELECT p.*,pf.* FROM ".tname('poll')." p
				LEFT JOIN ".tname('pollfield')." pf ON pf.pid=p.pid
				WHERE p.pid='$id'");
			$poll = $_SGLOBAL['db']->fetch_array($query);

			//实名
			realname_set($poll['uid'], $poll['username']);
			realname_get();

			$arr['title_template'] = cplang('share_poll', array($poll['percredit'] ? cplang('reward') : ''));
			$arr['body_template'] = '<b>{subject}</b><br>{user}<br>{option}';
			$optionstr = '';
			$poll['option'] = unserialize($poll['option']);
			foreach($poll['option'] as $key => $val) {
				$optionstr .= '<input type="'.($poll['multiple'] ? 'checkbox' : 'radio').'" disabled name="poll_'.$key.'"/>'.$val.'<br/>';
			}
		
			$arr['body_data'] = array(
				'user' => "<a href=\"space.php?uid=$poll[uid]\">".$_SN[$poll['uid']]."</a>",
				'subject' => "<a href=\"space.php?uid=$poll[uid]&do=poll&pid=$poll[pid]\">$poll[subject]</a>",
				'option' => $optionstr
			);
			//通知
			$note_uid = $poll['uid'];
			$note_message = cplang('note_share_poll', array("space.php?uid=$poll[uid]&do=poll&pid=$poll[pid]", $poll['subject']));
			
			$hotarr = array('pid', $poll['pid'], $poll['hotuser']);
			break;
			*/
		default:
			//获得feed
			$topic = array();
			$topicid = $_GET['topicid'] = intval($_GET['topicid']);
			if($topicid) {
				$topic = topic_get($topicid);
			}
			if($topic) $actives = array('share' => ' class="active"');
	
			$_SGLOBAL['refer'] = 'space.php?do=share&view=me';
			$type = 'link';
			$_GET['op'] = 'link';
			break;
	}
	$arr['body_general'] = $Body; 
		
		$arr['type'] = $type;
		$arr['id'] = $id;
		$arr['uid'] = $userid;
		$arr['username'] = $username;
		$arr['dateline'] = $_SGLOBAL['timestamp'];
		$arr['topicid'] = 0;
		$arr['body_data'] = serialize($arr['body_data']);//数组转化
		$arr['fromdevice'] = $FromDevice;
		//入库
		$setarr = saddslashes($arr);//增加转义
		$sid = inserttable('share', $setarr, 1);
		//统计
		updatestat('share');
		include_once(S_ROOT.'./source/function_feed.php');
		feed_publish($sid, 'sid', 1, $FromDevice);

	if($sid){
	$arrs = array('flag'=>'success');
	}else{
	$arrs = array('flag'=>'fail');
	}
	   $result = json_encode($arrs);
	   $result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
	
	
	
?>
