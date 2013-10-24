<?php

if(!defined('iBUAA') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

//权限
if(!checkperm('managereport')) {
	cpmessage('no_authority_management_operation');
}

if (submitcheck('listsubmit')) {
	if($ac != 'report' && !in_array($_POST['optype'], array(1,2))) {
		$_POST['optype'] = 0;
	}
	if($_POST['ids'] && is_array($_POST['ids']) && $_POST['optype']) {
		$createlog = false;
		$url = "admincp.php?ac=$ac&perpage=$_GET[perpage]&page=$_GET[page]";

		if($_POST['optype'] == 1) {
			//忽略举报
			$_SGLOBAL['db']->query("UPDATE ".tname('report')." SET num='0' WHERE rid IN (".simplode($_POST['ids']).")");
			$createlog = true;
            //忽略了举报，通知举报人
            $query = $_SGLOBAL['db']->query("select * from ".tname('report')." where rid in (".simplode($_POST['ids']).")");
            while ($report = $_SGLOBAL['db']->fetch_array($query)) {
                $idtype = $report['idtype'];
                $id = $report['id'];
                $report_uids = unserialize($report['uids']);
                $reported_uid = get_reported_uid($idtype, $id);
                $reported_name = get_user_name($reported_uid);
                foreach ($report_uids as $key=>$value) {
                    $msgs=array();
                    $msgs[] = $reported_uid;
                    $msgs[] = $reported_name;
                    $msgs[] = cplang('report_'.$idtype);
                    $msgs[] = get_reported_message($idtype, $id);
                    $msgs[] = cplang('report_type_'.$report['rtype']);
                    notice_report($key, $_SGLOBAL['supe_uid'], cplang('reporter_message_success', $msgs));
                }
            }

		} else {
			if($_POST['optype'] == 3) {
                //通过了举报，通知举报人和非举报人
                $query = $_SGLOBAL['db']->query("select * from ".tname('report')." where rid in (".simplode($_POST['ids']).")");
                while ($report = $_SGLOBAL['db']->fetch_array($query)) {
                    $idtype = $report['idtype'];
                    $id = $report['id'];
                    $report_uids = unserialize($report['uids']);
                    $reported_uid = get_reported_uid($idtype, $id);
                    $reported_name = get_user_name($reported_uid);
                    foreach ($report_uids as $key=>$value) {
                        $msgs=array();
                        $msgs[] = $reported_uid;
                        $msgs[] = $reported_name;
                        $msgs[] = cplang('report_'.$idtype);
                        $msgs[] = get_reported_message($idtype, $id);
                        $msgs[] = cplang('report_type_'.$report['rtype']);
                        notice_report($key, $_SGLOBAL['supe_uid'], cplang('reporter_message_success', $msgs));
                    }
                    notice_report($reported_uid, $_SGLOBAL['supe_uid'], cplang('reportee_message', $msgs));
                }
				deleteinfo($_POST['ids']);
			} else {
                //删除了举报，通知举报人
                $query = $_SGLOBAL['db']->query("select * from ".tname('report')." where rid in (".simplode($_POST['ids']).")");
                while ($report = $_SGLOBAL['db']->fetch_array($query)) {
                    $idtype = $report['idtype'];
                    $id = $report['id'];
                    $report_uids = unserialize($report['uids']);
                    $reported_uid = get_reported_uid($idtype, $id);
                    $reported_name = get_user_name($reported_uid);
                    foreach ($report_uids as $key=>$value) {
                        $msgs=array();
                        $msgs[] = $reported_uid;
                        $msgs[] = $reported_name;
                        $msgs[] = cplang('report_'.$idtype);
                        $msgs[] = get_reported_message($idtype, $id);
                        $msgs[] = cplang('report_type_'.$report['rtype']);
                        notice_report($key, $_SGLOBAL['supe_uid'], cplang('reporter_message_delete', $msgs));
                    }
                }
            }
			$_SGLOBAL['db']->query("DELETE FROM ".tname('report')." WHERE rid IN (".simplode($_POST['ids']).")");
			$createlog = true;
		}
		cpmessage('do_success', $url);
	}
}

if($_GET['op'] == 'delete') {

	$rid = isset($_GET['rid'])?intval($_GET['rid']):0;
	if(!$rid) {
		cpmessage('the_right_to_report_the_specified_id', 'admincp.php?ac=report');
	}
	if($_GET['subop'] == 'delinfo') {
        //通过了举报，通知举报人和非举报人
        $query = $_SGLOBAL['db']->query("select * from ".tname('report')." where rid=$rid");
        if ($report = $_SGLOBAL['db']->fetch_array($query)) {
            $idtype = $report['idtype'];
            $id = $report['id'];
            $report_uids = unserialize($report['uids']);
            $reported_uid = get_reported_uid($idtype, $id);
            $reported_name = get_user_name($reported_uid);
            foreach ($report_uids as $key=>$value) {
                $msgs=array();
                $msgs[] = $reported_uid;
                $msgs[] = $reported_name;
                $msgs[] = cplang('report_'.$idtype);
                $msgs[] = get_reported_message($idtype, $id);
                $msgs[] = cplang('report_type_'.$report['rtype']);
                notice_report($key, $_SGLOBAL['supe_uid'], cplang('reporter_message_success', $msgs));
            }
            
            notice_report($reported_uid, $_SGLOBAL['supe_uid'], cplang('reportee_message', $msgs));
        }
		deleteinfo(array($rid));
	} else {
        //删除了举报，通知举报人
        $query = $_SGLOBAL['db']->query("select * from ".tname('report')." where rid=$rid");
        if ($report = $_SGLOBAL['db']->fetch_array($query)) {
            $idtype = $report['idtype'];
            $id = $report['id'];
            $report_uids = unserialize($report['uids']);
            $reported_uid = get_reported_uid($idtype, $id);
            $reported_name = get_user_name($reported_uid);
            foreach ($report_uids as $key=>$value) {
                $msgs=array();
                $msgs[] = $reported_uid;
                $msgs[] = $reported_name;
                $msgs[] = cplang('report_'.$idtype);
                $msgs[] = get_reported_message($idtype, $id);
                $msgs[] = cplang('report_type_'.$report['rtype']);
                notice_report($key, $_SGLOBAL['supe_uid'], cplang('reporter_message_delete', $msgs));
            }
        }
    }

	//删除举报
	$_SGLOBAL['db']->query("DELETE FROM ".tname('report')." WHERE rid='$rid'");
	cpmessage('do_success', 'admincp.php?ac=report');

} elseif($_GET['op'] == 'ignore') {

	$rid = isset($_GET['rid'])?intval($_GET['rid']):0;
	if(!$rid) {
		cpmessage('the_right_to_report_the_specified_id', 'admincp.php?ac=report');
	}
    //忽略了举报，通知举报人
    $query = $_SGLOBAL['db']->query("select * from ".tname('report')." where rid=$rid");
    if ($report = $_SGLOBAL['db']->fetch_array($query)) {
        $idtype = $report['idtype'];
        $id = $report['id'];
        $report_uids = unserialize($report['uids']);
        $reported_uid = get_reported_uid($idtype, $id);
        $reported_name = get_user_name($reported_uid);
        foreach ($report_uids as $key=>$value) {
            $msgs=array();
            $msgs[] = $reported_uid;
            $msgs[] = $reported_name;
            $msgs[] = cplang('report_'.$idtype);
            $msgs[] = get_reported_message($idtype, $id);
            $msgs[] = cplang('report_type_'.$report['rtype']);
            notice_report($key, $_SGLOBAL['supe_uid'], cplang('reporter_message_ignore', $msgs));
        }
    }
	$_SGLOBAL['db']->query("UPDATE ".tname('report')." SET num='0' WHERE rid='$rid'");
	cpmessage('do_success', 'admincp.php?ac=report');
}

//处理搜索
$intkeys = array();
if(!isset($_GET['status']) || $_GET['status'] == 1) {
	$_GET['num1'] = 1;
	$_GET['status'] = 1;
} elseif($_GET['status'] == 0) {
	$_GET['num'] = 0;
	$intkeys = array('num');
}
$mpurl = 'admincp.php?ac=report';
$strkeys = array('idtype');
$randkeys = array(array('intval', 'num'));
$likekeys = array();
$results = getwheres($intkeys, $strkeys, $randkeys, $likekeys);
$wherearr = $results['wherearr'];

$wheresql = empty($wherearr)?'1':implode(' AND ', $wherearr);
$mpurl .= '&'.implode('&', $results['urls']);

$actives = array($_GET['status'] => ' class="active"');

//排序
$orders = getorders(array('dateline', 'num'), 'new,num');
$ordersql = $orders['sql'];
if($orders['urls']) $mpurl .= '&'.implode('&', $orders['urls']);
$orderby = array($_GET['orderby']=>' selected');
$ordersc = array($_GET['ordersc']=>' selected');

$scstr = $_GET['ordersc'] == 'asc'? 'desc' : 'asc';
//显示分页
$perpage = empty($_GET['perpage'])?0:intval($_GET['perpage']);
if(!in_array($perpage, array(20,50,100,1000))) $perpage = 20;

$page = empty($_GET['page'])?1:intval($_GET['page']);
if($page<1) $page = 1;
$start = ($page-1)*$perpage;
//检查开始数
ckstart($start, $perpage);

//显示分页
if($perpage > 100) {
	$count = 1;
	$selectsql = 'rid';
} else {
	$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('report')." WHERE $wheresql"), 0);
	$selectsql = '*';
}
$mpurl .= '&perpage='.$perpage;
$perpages = array($perpage => ' selected');

$list = array();
$multi = '';

$reports = $users = array();
if($count) {
	$emptyids = $readids = array();
	$posts = $comments = $ids = $blogids = $arrangementids = $picids = $albumids = $spaceids = $pollids = $mtagids = $threadids = $shareids = $eventids = $shareids = array();

	$query = $_SGLOBAL['db']->query("SELECT $selectsql FROM ".tname('report')." WHERE $wheresql $ordersql LIMIT $start,$perpage");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$value['user'] = unserialize($value['uids']);
		$emptyids[$value['idtype'].$value['id']] = $ids[] = $value['rid'];
		if($value['new']) {
			$readids[] = $value['rid'];
		}
		switch($value['idtype']) {
			case 'blogid':
				$blogids[$value['id']] = $value['id'];
				$list['blog'][$value['id']] = $value;
				break;
			case 'arrangementid':
				$arrangementids[$value['id']] = $value['id'];
				$list['arrangement'][$value['id']] = $value;
				break;
			case 'picid':
				$picids[$value['id']] = $value['id'];
				$list['pic'][$value['id']] = $value;
				break;
			case 'albumid':
				$albumids[$value['id']] = $value['id'];
				$list['album'][$value['id']] = $value;
				break;
			case 'tid':
				$threadids[$value['id']] = $value['id'];
				$list['thread'][$value['id']] = $value;
				break;
			case 'tagid':
				$mtagids[$value['id']] = $value['id'];
				$list['mtag'][$value['id']] = $value;
				break;
			case 'sid':
				$shareids[$value['id']] = $value['id'];
				$list['share'][$value['id']] = $value;
				break;
			case 'uid':
				$spaceids[$value['id']] = $value['id'];
				$list['space'][$value['id']] = $value;
				break;
			case 'eventid':
			    $eventids[$value['id']] = $value['id'];
				$list['event'][$value['id']] = $value;
				break;
			case 'pid':
				$pollids[$value['id']] = $value['id'];
				$list['poll'][$value['id']] = $value;
				break;
			case 'comment':
				$comments[$value['id']] = $value['id'];
				$list['comment'][$value['id']] = $value;
				break;
			case 'post':
				$posts[$value['id']] = $value['id'];
				$list['post'][$value['id']] = $value;
				break;
            case 'doid':
                $doids[$value['id']] = $value['id'];
				$list['do'][$value['id']] = $value;
                break;
		}
	}

	if($readids) {
		$_SGLOBAL['db']->query("UPDATE ".tname('report')." SET new='0' WHERE rid IN(".implode(',', $readids).")");
	}

	//取出相关信息
	//日志
	if($blogids) {
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('blog')." WHERE blogid IN (".simplode($blogids).")");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$list['blog'][$value['blogid']]['info'] = $value;
			unset($emptyids['blogid'.$value['blogid']]);
		}
	}
	//校历安排
	if($arrangementids) {
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('arrangement')." WHERE arrangementid IN (".simplode($arrangementids).")");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$list['arrangement'][$value['arrangementid']]['info'] = $value;
			unset($emptyids['arrangementid'.$value['arrangementid']]);
		}
	}
	//图片
	if($picids) {
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('pic')." WHERE picid IN (".simplode($picids).")");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$value['pic'] = pic_get($value['filepath'], $value['thumb'], $value['remote']);
			$list['pic'][$value['picid']]['info'] = $value;
			unset($emptyids['picid'.$value['picid']]);
		}
	}
	//相册
	if($albumids) {
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('album')." WHERE albumid IN (".simplode($albumids).")");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$value['pic'] = pic_cover_get($value['pic'], $value['picflag']);
			$list['album'][$value['albumid']]['info'] = $value;
			unset($emptyids['albumid'.$value['albumid']]);
		}
	}

	//话题
	if($threadids) {
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('thread')." WHERE tid IN (".simplode($threadids).")");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$list['thread'][$value['tid']]['info'] = $value;
			unset($emptyids['tid'.$value['tid']]);
		}
	}
	
	//话题回复
	if($posts) {
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('post')." WHERE pid IN (".simplode($posts).")");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$value['message'] = getstr($value['message'], 150);
			$list['post'][$value['pid']]['info'] = $value;
			unset($emptyids['post'.$value['pid']]);
		}
		
	}

	//群组
	if($mtagids) {
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('mtag')." WHERE tagid IN (".simplode($mtagids).")");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$list['mtag'][$value['tagid']]['info'] = $value;
			unset($emptyids['tagid'.$value['tagid']]);
		}
	}

	//分享
	if($shareids) {
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('share')." WHERE sid IN (".simplode($shareids).")");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$value = mkshare($value);
			$list['share'][$value['sid']]['info'] = $value;
			unset($emptyids['sid'.$value['sid']]);
		}
	}
	//空间
	if($spaceids) {
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('space')." WHERE uid IN (".simplode($spaceids).")");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$list['space'][$value['uid']]['info'] = $value;
			unset($emptyids['uid'.$value['uid']]);
		}
	}

	// 活动
	if($eventids) {
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('event')." WHERE eventid IN (".simplode($eventids).")");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$list['event'][$value['eventid']]['info'] = $value;
			unset($emptyids['eventid'.$value['eventid']]);
		}
	}

	//投票
	if($pollids) {
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('poll')." WHERE pid IN (".simplode($pollids).")");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$list['poll'][$value['pid']]['info'] = $value;
			unset($emptyids['pid'.$value['pid']]);
		}
	}
	
    //动态
    if($doids) {
        $query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('doing')." WHERE doid IN (".simplode($doids).")");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$list['do'][$value['doid']]['info'] = $value;
			unset($emptyids['doid'.$value['doid']]);
		}
    }
	
	
	//评论
	if($comments) {
		
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('comment')." WHERE cid IN (".simplode($comments).")");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$url = "space.php?uid=$value[uid]&do=";
			switch ($value['idtype']) {
				case 'uid':
					//留言
					$url .= "wall&view=me&cid=$value[cid]";
					break;
				case 'picid':
					//相册
					$url .= "album&picid=$value[id]&cid=$value[cid]";
					break;
				case 'blogid':
					//日志
					$url .= "blog&id=$value[id]&cid=$value[cid]";
					break;
				case 'arrangementid':
					//日志
					$url .= "arrangement&id=$value[id]&cid=$value[cid]";
					break;
				case 'sid':
					//分享
					$url .= "share&id=$value[id]&cid=$value[cid]";
					break;
				case 'pid':
					//投票
					$url .= "poll&pid=$value[id]&cid=$value[cid]";
					break;
				case 'eventid':
				    // 活动
					$url .= "event&id=$value[id]&cid=$value[cid]";
				    break;
			}
			
			$value['url'] = $url;
			$value['message'] = getstr($value['message'], 150, 1, 1, 0, 0, -1);
			$list['comment'][$value['cid']]['info'] = $value;
			unset($emptyids['comment'.$value['cid']]);
		}
		
	}

	$multi = multi($count, $perpage, $page, $mpurl);
	//删除由删除空间引起的冗余数据
	if($emptyids) {
		$_SGLOBAL['db']->query("DELETE FROM ".tname('report')." WHERE rid IN (".simplode($emptyids).")");
	}

}

//显示分页
if($perpage > 100) {
	$count = count($list);
}

function notice_report($uid, $authorid, $note) {
    global $_SGLOBAL;
    
    $query = $_SGLOBAL['db']->query("select * from ".tname('space')." where uid = $authorid");
    $author = '';
    if ($value = $_SGLOBAL['db']->fetch_array($query)) {
        $author = $value['username'];
    }
    $note = getstr($note, 500, 0, 1);
    $setarr = array(
        'uid' => $uid,
        'type' => 'report',
        'new' => 1,
        'authorid' => $authorid,
        'author' => $author,
        'note' => addslashes(sstripslashes($note)),
        'dateline' => time()
    );
    $setarr['note'] = htmlspecialchars_decode($setarr['note']);
    inserttable('notification', $setarr);
    $_SGLOBAL['db']->query("UPDATE ".tname('space')." SET notenum=notenum+1 WHERE uid='$uid'");
}
function get_reported_message($idtype, $id) {
	global $_SGLOBAL;
    switch($idtype) {
        case 'blogid':
            $query = $_SGLOBAL['db']->query("select * from ".tname("blog")." where blogid=$id");
            $item = $_SGLOBAL['db']->fetch_array($query);
            return $item['subject'];
        case 'picid':
            $query = $_SGLOBAL['db']->query("select * from ".tname("pic")." where picid=$id");
            $item = $_SGLOBAL['db']->fetch_array($query);
            return $item['title'];
        case 'albumid':
            $query = $_SGLOBAL['db']->query("select * from ".tname("album")." where albumid=$id");
            $item = $_SGLOBAL['db']->fetch_array($query);
            return $item['albumname'];
        case 'tid':
            $query = $_SGLOBAL['db']->query("select * from ".tname("thread")." where tid=$id");
            $item = $_SGLOBAL['db']->fetch_array($query);
            return $item['subject'];
        case 'tagid':
            $query = $_SGLOBAL['db']->query("select * from ".tname("mtag")." where tagid=$id");
            $item = $_SGLOBAL['db']->fetch_array($query);
            return $item['tagname'];
        case 'sid':
            $query = $_SGLOBAL['db']->query("select * from ".tname("share")." where sid=$id");
            $item = $_SGLOBAL['db']->fetch_array($query);
            return $item['title_template'];
        case 'eventid':
            $query = $_SGLOBAL['db']->query("select * from ".tname("event")." where eventid=$id");
            $item = $_SGLOBAL['db']->fetch_array($query);
            return $item['title'];
        case 'pid':
            $query = $_SGLOBAL['db']->query("select * from ".tname("poll")." where pid=$id");
            $item = $_SGLOBAL['db']->fetch_array($query);
            return $item['subject'];
        case 'comment':
            $query = $_SGLOBAL['db']->query("select * from ".tname("comment")." where cid=$id");
            $item = $_SGLOBAL['db']->fetch_array($query);
            return $item['message'];
        case 'post':
            $query = $_SGLOBAL['db']->query("select * from ".tname("post")." where pid=$id");
            $item = $_SGLOBAL['db']->fetch_array($query);
            return $item['message'];
        case 'doid':
            $query = $_SGLOBAL['db']->query("select * from ".tname("doing")." where doid=$id");
            $item = $_SGLOBAL['db']->fetch_array($query);
            return $item['message'];
        case 'uid':
            $item = getspace($id);
            if ($item['namestatus']) {
                return $item['name'];
            } else {
                return $item['username'];
            }
            break;
    }
    return '';
}

function get_user_name($uid) {
    global $_SGLOBAL;
    $query = $_SGLOBAL['db']->query("select * from ".tname("space")." where uid=$uid");
    if ($item = $_SGLOBAL['db']->fetch_array($query)) {
        if ($item['namestatus']) {
            return $item['name'];
        } else {
            return $item['username'];
        }
    }
    return '';
}


function get_reported_uid($idtype, $id) {
	global $_SGLOBAL;
    switch($idtype) {
        case 'blogid':
            $query = $_SGLOBAL['db']->query("select * from ".tname("blog")." where blogid=$id");
            break;
        case 'picid':
            $query = $_SGLOBAL['db']->query("select * from ".tname("pic")." where picid=$id");
            break;
        case 'albumid':
            $query = $_SGLOBAL['db']->query("select * from ".tname("album")." where albumid=$id");
            break;
        case 'tid':
            $query = $_SGLOBAL['db']->query("select * from ".tname("thread")." where tid=$id");
            break;
        case 'tagid':
            $query = $_SGLOBAL['db']->query("select * from ".tname("tagspace")." where tagid=$id");
            break;
        case 'sid':
            $query = $_SGLOBAL['db']->query("select * from ".tname("share")." where sid=$id");
            break;
        case 'eventid':
            $query = $_SGLOBAL['db']->query("select * from ".tname("event")." where eventid=$id");
            break;
        case 'pid':
            $query = $_SGLOBAL['db']->query("select * from ".tname("poll")." where pid=$id");
            break;
        case 'comment':
            $query = $_SGLOBAL['db']->query("select * from ".tname("comment")." where cid=$id");
            break;
        case 'post':
            $query = $_SGLOBAL['db']->query("select * from ".tname("post")." where pid=$id");
            break;
        case 'doid':
            $query = $_SGLOBAL['db']->query("select * from ".tname("doing")." where doid=$id");
            break;
        case 'uid':
            return $id;
            break;
    }
    if ($query) {
        if ($item = $_SGLOBAL['db']->fetch_array($query)) {
            if ($idtype == 'sid') {
                return $item['authorid'];
            } else {
                return $item['uid'];
            }
        }
    }
    return 0;
}

function deleteinfo($ids) {
	global $_SGLOBAL;

	include_once(S_ROOT.'./source/function_delete.php');
	$deltype = array();
	$reportuser = array();
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('report')." WHERE rid IN (".simplode($ids).")");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$value['user'] = unserialize($value['uids']);
		$reportuser[] = array_shift(array_flip($value['user']));
		$deltype[$value['idtype']][] = $value['id'];
	}
	$gid = getgroupid($_SGLOBAL['member']['experience'], $_SGLOBAL['member']['groupid']);
	//执行相应的删除操作
	$i = 0;
	
	$_SGLOBAL['usergroup'][$gid]['managebatch'] = 1;
	foreach($deltype as $key => $value) {
		switch($key) {
			case 'blogid':
				$_SGLOBAL['usergroup'][$gid]['manageblog'] = 1;
				deleteblogs($value);
				break;
			case 'arrangementid':
				$_SGLOBAL['usergroup'][$gid]['manageblog'] = 1;
				deletearrangements($value);
				break;
			case 'picid':
				$_SGLOBAL['usergroup'][$gid]['managealbum'] = 1;
				deletepics($value);
				break;
			case 'albumid':
				$_SGLOBAL['usergroup'][$gid]['managealbum'] = 1;
				deletealbums($value);
				break;
			case 'tid':
				$_SGLOBAL['usergroup'][$gid]['managethread'] = 1;
				deletethreads(0, $value);
				break;
			case 'tagid':
				$_SGLOBAL['usergroup'][$gid]['managemtag'] = 1;
				deletemtag($value);
				break;
			case 'sid':
				$_SGLOBAL['usergroup'][$gid]['manageshare'] = 1;
				deleteshares($value);
				break;
			case 'uid':
				$_SGLOBAL['usergroup'][$gid]['managedelspace'] = 1;
				foreach($value as $uid) {
					deletespace($uid);
				}
				break;
			case 'eventid':
			    $_SGLOBAL['usergroup'][$gid]['manageevent'] = 1;
			    deleteevents($value);
			    break;
			case 'pid':
				$_SGLOBAL['usergroup'][$gid]['managepoll'] = 1;
				deletepolls($value);
				break;
			case 'comment':
				$_SGLOBAL['usergroup'][$gid]['managecomment'] = 1;
				deletecomments($value);
				break;
			case 'post':
				$_SGLOBAL['usergroup'][$gid]['managethread'] = 1;
				deleteposts(0,$value);
				break;
            case 'doid':
				$_SGLOBAL['usergroup'][$gid]['managedoing'] = 1;
                deletedoings($value);
                break;
		}
		//奖励第一个举报者
		getreward('report', 1, $reportuser[$i], '', 0);
		$i++;
	}
}
?>
