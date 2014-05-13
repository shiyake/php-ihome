<?php
if(!defined('iBUAA')) {
	exit('Access Denied');
}
$feedid = empty($_GET['feedid'])?0:intval($_GET['feedid']);
$page = empty($_GET['page'])?0:intval($_GET['page']);
if($page<1) $page=1;
if($feedid) {
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('feed')." WHERE feedid='$feedid'");
	if(!$feed = $_SGLOBAL['db']->fetch_array($query)) {
		showmessage('feed_no_found');
	}
}
if(submitcheck('commentsubmit')) {
	if(empty($feed['id']) || empty($feed['idtype'])) {
		showmessage('non_normal_operation');
	}
	if($feed['idtype'] == 'doid') {
		$_GET['id'] = intval($_POST['cid']);
		$_GET['doid'] = $feed['id'];
		include_once(S_ROOT.'./source/cp_doing.php');
	} else {
		$_POST['id'] = $feed['id'];
		$_POST['idtype'] = $feed['idtype'];
		include_once(S_ROOT.'./source/cp_comment.php');
	}
}
if($_GET['op'] == 'delete') {
	if(submitcheck('feedsubmit')) {
		include_once(S_ROOT.'./source/function_delete.php');
		if(deletefeeds(array($feedid))) {
			showmessage('do_success', $_POST['refer']);
		} else {
			showmessage('no_privilege');
		}
	}
} elseif($_GET['op'] == 'ignore') {
	if(submitcheck('feedignoresubmit')) {
		$uid = empty($_POST['feed_uid'])?0:$_POST['feed_uid'];
        $ignore_type = $_POST['ignore_type'];
		if($ignore_type == 'black_feed') {
			if(empty($space['privacy']['black_feed']) || !is_array($space['privacy']['black_feed'])) {
				$space['privacy']['black_feed'] = array();
			}
			$space['privacy']['black_feed'][$uid] = $uid;
			privacy_update();
		} elseif($ignore_type == 'black_all') {
            //删除好友
            if($space['friends'] && in_array($uid, $space['friends'])) {
                friend_update($_SGLOBAL['supe_uid'], $_SGLOBAL['supe_username'], $uid, '', 'ignore');
            }
            inserttable('blacklist', array('uid'=>$_SGLOBAL['supe_uid'], 'buid'=>$uid, 'dateline'=>$_SGLOBAL['timestamp']), 0, true);
		}
		showmessage('do_success', $_POST['refer']);
	}
} elseif($_GET['op'] == 'get') {
	//获得好友的feed
	$cp_mode = 1;
	$_GET['start'] = intval($_GET['start']);
	if($_GET['start'] < 1) {
		$_GET['start'] = $_SCONFIG['feedmaxnum']<50?50:$_SCONFIG['feedmaxnum'];
		$_GET['start'] = $_GET['start'] + 1;
	}
	$_TPL['getmore'] = 1;
	include_once(S_ROOT.'./source/space_feed.php');
	include_once template('space_feed');
	exit();
} elseif($_GET['op'] == 'getcomment') {
	if(empty($feed['id']) || empty($feed['idtype'])) {
		showmessage('non_normal_operation');
	}
	$feedid = $feed['feedid'];
	$list = array();
	$multi = '';
	if($feed['idtype'] == 'doid') {
		$_GET['doid'] = $feed['id'];
		include_once(S_ROOT.'./source/cp_doing.php');
	} else {
		$perpage = 10000;
		$start = ($page-1)*$perpage;
		ckstart($start, $perpage);
		$count = getcount('comment', array('id'=>$feed['id'], 'idtype'=>$feed['idtype']));
		if($count) {
			$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('comment')."
				WHERE id='$feed[id]' AND idtype='$feed[idtype]'
				ORDER BY dateline
				LIMIT $start,$perpage");
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				realname_set($value['authorid'], $value['author']);
				$list[] = $value;
			}
			$multi = multi($count, $perpage, $page, "cp.php?ac=feed&op=getcomment&feedid=$feedid", "feedcomment_$feedid");
		}
		realname_get();
	}
} elseif($_GET['op'] == 'menu') {
	$allowmanage = checkperm('managefeed');
	if(empty($feed['uid'])) {
		showmessage('non_normal_operation');
	}
} else {
	$url = "space.php?uid=$feed[uid]";
	switch ($feed['idtype']) {
		case 'doid':
			$url .= "&do=doing&id=$feed[id]";
			break;
		case 'blogid':
			$url .= "&do=blog&id=$feed[id]";
			break;
		case 'picid':
			$url .= "&do=album&picid=$feed[id]";
			break;
		case 'albumid':
			$url .= "&do=album&id=$feed[id]";
			break;
		case 'tid':
			$url .= "&do=thread&id=$feed[id]";
			break;
		case 'sid':
			$url .= "&do=share&id=$feed[id]";
			break;
		case 'pid':
			$url .= "&do=poll&pid=$feed[id]";
			break;
		case 'eventid':
			$url .= "&do=event&id=$feed[id]";
			break;
		default:
			break;
	}
	showmessage('do_success', $url, 0);
}
include template('cp_feed');
?>
