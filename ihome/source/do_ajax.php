<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}

$op = empty($_GET['op'])?'':$_GET['op'];

if($op == 'comment') {

	$cid = empty($_GET['cid'])?0:intval($_GET['cid']);
	
	if($cid) {
		$cidsql = "cid='$cid' AND";
		$ajax_edit = 1;
	} else {
		$cidsql = '';
		$ajax_edit = 0;
	}

	//����
	$list = array();
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('comment')." WHERE $cidsql authorid='$_SGLOBAL[supe_uid]' ORDER BY dateline DESC LIMIT 0,1");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		realname_set($value['authorid'], $value['author']);
		$list[] = $value;
	}
	
	realname_get();
	
	$isAjax = 1;
	
} elseif($op == 'getfriendgroup') {
	
	$uid = intval($_GET['uid']);
	if($_SGLOBAL['supe_uid'] && $uid) {
		$space = getspace($_SGLOBAL['supe_uid']);
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('friend')." WHERE uid='$_SGLOBAL[supe_uid]' AND fuid='$uid'");
		$value = $_SGLOBAL['db']->fetch_array($query);
	}
	
	//��ȡ�û�
	$groups = getfriendgroup();
	
	if(empty($value['gid'])) $value['gid'] = 0;
	$group =$groups[$value['gid']];
} elseif($op == 'calendar'){
    //获取日历
    $calendar_id = empty($_GET['calendar_id'])  ? 0 :intval($_GET['calendar_id']);
    if($calendar_id) {
        $cidsql = "id='$calendar_id' AND";
        $ajax_edit = 1;
    } else {
        $cidsql = '';
        $ajax_edit = 0;
    }
    
    $list = array();
    if(!empty($calendar_id)){
        $query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('calendar')." WHERE $cidsql uid='$_SGLOBAL[supe_uid]' LIMIT 0,1");
    }else{
        $query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('calendar')." WHERE uid='$_SGLOBAL[supe_uid]' order by id asc");
    }
    while ($value = $_SGLOBAL['db']->fetch_array($query)) {
        $list[] = $value;
    }
    $isAjax = 1;
}elseif($op == 'checkcalendarstart'){
    //检测日历事件是否到达开始时间，如到达时间，则返回数据，并进行提醒
    $uid = $_SGLOBAL['supe_uid'];
    $list_query = $_SGLOBAL['db']->query("select * from ".tname('calendar')." where uid=$uid order by id asc");
    $t = time();
    $msg = array();
    while($row = $_SGLOBAL['db']->fetch_array($list_query)){
        $sql = "select * from ".tname('calendar_info')." where calendar_id=".$row['id']." and is_alert=0";
        $s = $_SGLOBAL['db']->query($sql);
        while($val = $_SGLOBAL['db']->fetch_array($s)){
            if($val['start_t']-$t <= 600){
                $m = ceil(($val['start_t'] - $t)/60);
                $msg[] = '日历“'.$row['calendar_name'].'”的事件“'.$val['content'].'”还有'.$m."分钟开始\r\n";
                $sql = "update ".tname('calendar_info')." set is_alert=1 where id=".$val['id'];
                $_SGLOBA['db']->query($sql);
            }
        }
    }
    header('Content-Type: application/json');
    exit(json_encode(array('date'=>$msg,'info'=>'','data_staus'=>1)));
    $isAjax = 1;
}elseif($op == 'getfriendname') {
	
	//��ȡ�û��ĺ��ѷ�����
	$groupname = '';
	$group = intval($_GET['group']);
	
	if($_SGLOBAL['supe_uid'] && $group) {
		$space = getspace($_SGLOBAL['supe_uid']);
		$groups = getfriendgroup();
		$groupname = $groups[$group];
	}
	
} elseif($op == 'getmtagmember') {
	
	//��ȡ�û��ĺ��ѷ�����
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('tagspace')." WHERE tagid='$tagid' AND uid='$uid'");
	$tagspace = $_SGLOBAL['db']->fetch_array($query);
	
} elseif($op == 'share') {

	//����
	$list = array();
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('share')." WHERE uid='$_SGLOBAL[supe_uid]' ORDER BY dateline DESC LIMIT 0,1");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		realname_set($value['uid'], $value['username']);
		$value = mkshare($value);
		$list[] = $value;
	}
	
	realname_get();
	
} elseif($op == 'post') {

	$pid = empty($_GET['pid'])?0:intval($_GET['pid']);

	if($pid) {
		$pidsql = " WHERE pid='$pid'";
		$ajax_edit = 1;
	} else {
		$pidsql = '';
		$ajax_edit = 0;
	}
	
	//����
	$list = array();
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('post')." $pidsql ORDER BY dateline DESC LIMIT 0,1");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		realname_set($value['uid'], $value['username']);
		$list[] = $value;
	}
	
	realname_get();
	
} elseif($op == 'album') {
	
	$id = empty($_GET['id'])?0:intval($_GET['id']);
	$start = empty($_GET['start'])?0:intval($_GET['start']);

	if(empty($_SGLOBAL['supe_uid'])) {
		showmessage('to_login', 'do.php?ac='.$_SCONFIG['login_action']);
	}
	
	$perpage = 10;
	//��鿪ʼ��
	ckstart($start, $perpage);

	$count = 0;
	
	$piclist = array();
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('pic')." WHERE albumid='$id' AND uid='$_SGLOBAL[supe_uid]' ORDER BY dateline DESC LIMIT $start,$perpage");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$value['bigpic'] = pic_get($value['filepath'], $value['thumb'], $value['remote'], 0);
		$value['pic'] = pic_get($value['filepath'], $value['thumb'], $value['remote']);
		$piclist[] = $value;
		$count++;
	}
	$multi = smulti($start, $perpage, $count, "do.php?ac=ajax&op=album&id=$id", $_GET['ajaxdiv']);

} elseif($op == 'docomment') {
	
	$doid = intval($_GET['doid']);
	$clist = $do = array();
	$icon = $_GET['icon'] == 'plus' ? 'minus' : 'plus';
	if($doid) {
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('doing')." WHERE doid='$doid'");
		if ($value = $_SGLOBAL['db']->fetch_array($query)) {
			realname_set($value['uid'], $value['username']);
			$value['icon'] = 'plus';
			//�Զ�չ�����20������
			if($value['replynum'] > 0 && ($value['replynum'] < 20 || $doid == $value['doid'])) {
				$doids[] = $value['doid'];
				$value['icon'] = 'minus';
			} elseif($value['replynum']<1) {
				$value['icon'] = 'minus';
			}
			$value['id'] = 0;
			$value['layer'] = 0;
			$clist[] = $value;
		}
	}
		
	if($_GET['icon'] == 'plus' && $value['replynum']) {

		include_once(S_ROOT.'./source/class_tree.php');
		$tree = new tree();
		
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('docomment')." WHERE doid='$doid' ORDER BY dateline");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			realname_set($value['uid'], $value['username']);
			if(empty($value['upid'])) {
				$value['upid'] = "do";
			}
			$tree->setNode($value['id'], $value['upid'], $value);
		}

		$values = $tree->getChilds("do");
		foreach ($values as $key => $id) {
			$one = $tree->getValue($id);
			$one['layer'] = $tree->getLayer($id) * 2;
			$clist[] = $one;
		}
	}
	
	realname_get();
	
} elseif($op == 'deluserapp') {
	
	if(empty($_SGLOBAL['supe_uid'])) {
		showmessage('no_privilege');
	}
	$hash = trim($_GET['hash']);
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('myinvite')." WHERE hash='$hash' AND touid='$_SGLOBAL[supe_uid]'");
	if($value = $_SGLOBAL['db']->fetch_array($query)) {
		$_SGLOBAL['db']->query("DELETE FROM ".tname('myinvite')." WHERE hash='$hash' AND touid='$_SGLOBAL[supe_uid]'");
		
		//ͳ�Ƹ���
		$myinvitenum = getcount('myinvite', array('touid'=>$_SGLOBAL['supe_uid']));
		updatetable('space', array('myinvitenum'=>$myinvitenum), array('uid'=>$_SGLOBAL['supe_uid']));
		
		showmessage('do_success');
	} else {
		showmessage('no_privilege');
	}
} elseif($op == 'getreward') {
	$reward = '';
	if($_SCOOKIE['reward_log']) {
		$log = explode(',', $_SCOOKIE['reward_log']);
		if(count($log) == 2 && $log[1]) {
			@include_once(S_ROOT.'./data/data_creditrule.php');
			$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('creditlog')." WHERE clid='$log[1]'");
			$creditlog = $_SGLOBAL['db']->fetch_array($query);
			$rule = $_SGLOBAL['creditrule'][$log[0]];
			$rule['cyclenum'] = $rule['rewardnum']? $rule['rewardnum'] - $creditlog['cyclenum'] : 0;
		}
		ssetcookie('reward_log', '');
	}
	
}

include template('do_ajax');

?>
