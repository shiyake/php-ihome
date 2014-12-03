<?php

include_once('CAS.php');
if(!defined('iBUAA')) {
	exit('Access Denied');
}

$op = empty($_GET['op'])?'':trim($_GET['op']);

if($op == 'logout') {
	
	if($_GET['uhash'] == $_SGLOBAL['uhash']) {
		//删除session
		if($_SGLOBAL['supe_uid']) {
			$_SGLOBAL['db']->query("DELETE FROM ".tname('session')." WHERE uid='$_SGLOBAL[supe_uid]'");
			$_SGLOBAL['db']->query("DELETE FROM ".tname('adminsession')." WHERE uid='$_SGLOBAL[supe_uid]'");//管理平台
		}
		if($_SCONFIG['uc_status']) {
			include_once S_ROOT.'./uc_client/client.php';
			$ucsynlogout = uc_user_synlogout();
		} else {
			$ucsynlogout = '';
		}
	
		clearcookie();
		ssetcookie('_refer', '');
	}
	
	showmessage('security_exit', 'index.php', 1, array($ucsynlogout));

} elseif($op == 'seccode') {

	if(ckseccode(trim($_GET['code']))) {
		showmessage('succeed');
	} else {
		showmessage('incorrect_code');
	}

} elseif($op == 'report') {

	$_GET['idtype'] = trim($_GET['idtype']);
	$_GET['id'] = intval($_GET['id']);
    $query = null;
	$uidarr = $report = array();
    switch($_GET['idtype']) {
        case 'blogid':
            $query = $_SGLOBAL['db']->query("select * from ".tname("blog")." where blogid=$_GET[id]");
            break;
        case 'picid':
            $query = $_SGLOBAL['db']->query("select * from ".tname("pic")." where picid=$_GET[id]");
            break;
        case 'albumid':
            $query = $_SGLOBAL['db']->query("select * from ".tname("album")." where albumid=$_GET[id]");
            break;
        case 'tid':
            $query = $_SGLOBAL['db']->query("select * from ".tname("thread")." where tid=$_GET[id]");
            break;
        case 'tagid':
            $query = $_SGLOBAL['db']->query("select * from ".tname("tagspace")." where tagid=$_GET[id]");
            break;
        case 'sid':
            $query = $_SGLOBAL['db']->query("select * from ".tname("share")." where sid=$_GET[id]");
            break;
        case 'eventid':
            $query = $_SGLOBAL['db']->query("select * from ".tname("event")." where eventid=$_GET[id]");
            break;
        case 'pid':
            $query = $_SGLOBAL['db']->query("select * from ".tname("poll")." where pid=$_GET[id]");
            break;
        case 'comment':
            $query = $_SGLOBAL['db']->query("select * from ".tname("comment")." where cid=$_GET[id]");
            break;
        case 'post':
            $query = $_SGLOBAL['db']->query("select * from ".tname("post")." where pid=$_GET[id]");
            break;
        case 'doid':
            $query = $_SGLOBAL['db']->query("select * from ".tname("doing")." where doid=$_GET[id]");
            break;
		case 'jobid':
            $query = $_SGLOBAL['db']->query("select * from ".tname("job")." where id=$_GET[id]");
            break;
        case 'uid':
            $_GET['uid'] = $_GET['id'];
            break;
    }
    if ($query) {
        if ($item = $_SGLOBAL['db']->fetch_array($query)) {
            if ($_GET['idtype'] == 'comment') {
                $_GET['uid'] = $item['authorid'];
            } else {
                $_GET['uid'] = $item['uid'];
            }
        }
    }
	
	if(!in_array($_GET['idtype'], array('picid', 'blogid', 'albumid', 'tagid', 'tid', 'sid', 'uid', 'pid', 'eventid', 'comment', 'post', 'doid', 'jobid')) || empty($_GET['id'])) {
		showmessage('report_error');
	}
	//获取举报记录
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('report')." WHERE id='$_GET[id]' AND idtype='$_GET[idtype]'");
	if($report = $_SGLOBAL['db']->fetch_array($query)) {
		$uidarr = unserialize($report['uids']);
		if($uidarr[$space['uid']]) {
			showmessage('repeat_report');
		}
	}
    if ($_GET['uid']) {
        $query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('space')." WHERE uid=$_GET[uid]");
        if ($value = $_SGLOBAL['db']->fetch_array($query)) {
            if ($value['namestatus']) {
                $_SN[$_GET['uid']] = $value['name'];
            } else {
                $_SN[$_GET['uid']] = $value['username'];
            }
        }
    }

	if(submitcheck('reportsubmit')) {
		$reason = getstr($_POST['reason'], 150, 1, 1);

		$reason = "<li><strong><a href=\"space.php?uid=$space[uid]\" target=\"_blank\">$_SGLOBAL[supe_username]</a>:</strong> ".$reason.' ('.sgmdate('m-d H:i').')</li>';

		if($report) {
			$uidarr[$space['uid']] = $space['username'];
			$uids = addslashes(serialize($uidarr));
			$reason = addslashes($report['reason']).$reason;
			$_SGLOBAL['db']->query("UPDATE ".tname('report')." SET num=num+1, reason='$reason', dateline='$_SGLOBAL[timestamp]', uids='$uids' WHERE rid='$report[rid]'");
		} else {
			$uidarr[$space['uid']] = $space['username'];

			$setarr = array(
				'id' => $_GET['id'],
				'idtype' => $_GET['idtype'],
				'rtype' => $_POST['rtype'],
				'num' => 1,
				'new' => 1,
				'reason' => $reason,
				'uids' => addslashes(serialize($uidarr)),
				'dateline' => $_SGLOBAL['timestamp']
			);
			inserttable('report', $setarr);
		}
		showmessage('report_success');
	}

	//判断是否是被忽略的举报
	if(isset($report['num']) && $report['num'] < 1) {
		showmessage('the_normal_information');
	}

	$reason = explode("\r\n", trim(preg_replace("/(\s*(\r\n|\n\r|\n|\r)\s*)/", "\r\n", data_get('reason'))));
	if(is_array($reason) && count($reason) == 1 && empty($reason[0])) {
		$reason = array();
	}

} elseif($op == 'ignore') {

	$type = empty($_GET['type'])?'':preg_replace("/[^0-9a-zA-Z\_\-\.]/", '', $_GET['type']);
	if(submitcheck('ignoresubmit')) {
		$authorid = $_POST['notice_uid'];
		if($type) {
			$type_uid = $type.'|'.$authorid;
			if(empty($space['privacy']['filter_note']) || !is_array($space['privacy']['filter_note'])) {
				$space['privacy']['filter_note'] = array();
			}
			$space['privacy']['filter_note'][$type_uid] = $type_uid;
			privacy_update();
		}
        $ignore_type = $_POST['ignore_type'];
        if ($ignore_type == 'black') {
            //删除好友
            if($space['friends'] && in_array($authorid, $space['friends'])) {
                friend_update($_SGLOBAL['supe_uid'], $_SGLOBAL['supe_username'], $authorid, '', 'ignore');
            }
            inserttable('blacklist', array('uid'=>$_SGLOBAL['supe_uid'], 'buid'=>$authorid, 'dateline'=>$_SGLOBAL['timestamp']), 0, true);
		}

		showmessage('do_success', $_POST['refer']);
	}
	$formid = random(8);

} elseif($op == 'getuserapp') {
	//处理
	if(empty($_GET['subop'])) {
		//展开
		$my_userapp = array();
		foreach ($_SGLOBAL['my_userapp'] as $value) {
			if($value['allowsidenav'] && !isset($_SGLOBAL['userapp'][$value['appid']])) {
				$my_userapp[] = $value;
			}
		}
	} else {
		$my_userapp = $_SGLOBAL['my_menu'];
	}
} elseif($op == 'closefeedbox') {

	ssetcookie('closefeedbox', 1);

} elseif($op == 'changetpl') {

	$dir = empty($_GET['name'])?'':str_replace('.','', trim($_GET['name']));
	//if($dir && file_exists(S_ROOT.'./template/'.$dir.'/style.css')) {
if($dir && file_exists(S_ROOT.$dir.'/default/style.css')) {
    ssetcookie('mytemplate', $dir, 3600*24*365);//长期有效
	}
	showmessage('do_success', 'space.php?do=feed', 0);
}

include template('cp_common');

?>
