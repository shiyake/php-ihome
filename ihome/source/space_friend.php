<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}

//·ÖÒ³
$perpage = 9;
$perpage = mob_perpage($perpage);

$list = $ols = $fuids = array();
$count = 0;
$page = empty($_GET['page'])?0:intval($_GET['page']);
if($page<1) $page = 1;
$start = ($page-1)*$perpage;

//¼ì²é¿ªÊ¼Êý
ckstart($start, $perpage);

if($_GET['view'] == 'online') {
	$theurl = "space.php?uid=$space[uid]&do=friend&view=online";
	$actives = array('me'=>' class="active"');

	$wheresql = '';
	if($_GET['type']=='near') {
		$theurl = "space.php?uid=$space[uid]&do=friend&view=online&type=near";
		$wheresql = " WHERE main.ip='".getonlineip(1)."'";
	} elseif($_GET['type']=='friend' && $space['feedfriend']) {
		$theurl = "space.php?uid=$space[uid]&do=friend&view=online&type=friend";
		$wheresql = " WHERE main.uid IN ($space[feedfriend])";
	} else {
		$_GET['type']=='all';
		$theurl = "space.php?uid=$space[uid]&do=friend&view=online&type=all";
		$wheresql = ' WHERE 1';
	}

	$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('session')." main $wheresql"), 0);
	if($count) {
		$query = $_SGLOBAL['db']->query("SELECT f.resideprovince, f.residecity, f.sex, f.note, f.spacenote, main.*
			FROM ".tname('session')." main
			LEFT JOIN ".tname('spacefield')." f ON f.uid=main.uid
			$wheresql
			ORDER BY main.lastactivity DESC
			LIMIT $start,$perpage");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {			
			if($value['magichidden']) {
				$count = $count - 1;
				continue;
			}
			if($_GET['type']=='near') {
				if($value['uid'] == $space['uid']) {
					$count = $count-1;
					continue;
				}
			}
			realname_set($value['uid'], $value['username']);
			$value['p'] = rawurlencode($value['resideprovince']);
			$value['c'] = rawurlencode($value['residecity']);
			$value['isfriend'] = ($value['uid']==$space['uid'] || ($space['friends'] && in_array($value['uid'], $space['friends'])))?1:0;
			$ols[$value['uid']] = $value['lastactivity'];			
			$value['note'] = getstr($value['note'], 35, 0, 0, 0, 0, -1);
			$list[$value['uid']] = $value;
		}
	}
	$multi = multi($count, $perpage, $page, $theurl);

} elseif($_GET['view'] == 'visitor' || $_GET['view'] == 'trace') {

	$theurl = "space.php?uid=$space[uid]&do=friend&view=$_GET[view]";
	$actives = array('me'=>' class="active"');

	if($_GET['view'] == 'visitor') {//·Ã¿Í
		$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('visitor')." main WHERE main.uid='$space[uid]'"), 0);
		$query = $_SGLOBAL['db']->query("SELECT f.resideprovince, f.residecity, f.note, f.spacenote, f.sex, main.vuid AS uid, main.vusername AS username, main.dateline
			FROM ".tname('visitor')." main
			LEFT JOIN ".tname('spacefield')." f ON f.uid=main.vuid
			WHERE main.uid='$space[uid]'
			ORDER BY main.dateline DESC
			LIMIT $start,$perpage");
	} else {//×ã¼£
		$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('visitor')." main WHERE main.vuid='$space[uid]'"), 0);
		$query = $_SGLOBAL['db']->query("SELECT s.username, s.name, s.namestatus, s.groupid, f.resideprovince, f.residecity, f.note, f.spacenote, f.sex, main.uid AS uid, main.dateline
			FROM ".tname('visitor')." main
			LEFT JOIN ".tname('space')." s ON s.uid=main.uid
			LEFT JOIN ".tname('spacefield')." f ON f.uid=main.uid
			WHERE main.vuid='$space[uid]'
			ORDER BY main.dateline DESC
			LIMIT $start,$perpage");
	}
	if($count) {
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			realname_set($value['uid'], $value['username'], $value['name'], $value['namestatus']);
			$value['p'] = rawurlencode($value['resideprovince']);
			$value['c'] = rawurlencode($value['residecity']);
			$value['isfriend'] = ($value['uid']==$space['uid'] || ($space['friends'] && in_array($value['uid'], $space['friends'])))?1:0;
			$fuids[] = $value['uid'];
			$value['note'] = getstr($value['note'], 28, 0, 0, 0, 0, -1);
			$list[$value['uid']] = $value;
		}
	}
	$multi = multi($count, $perpage, $page, $theurl);

} elseif($_GET['view'] == 'blacklist') {

	$theurl = "space.php?uid=$space[uid]&do=friend&view=$_GET[view]";
	$actives = array('me'=>' class="active"');

	$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('blacklist')." main WHERE main.uid='$space[uid]'"), 0);
	if($count) {
		$query = $_SGLOBAL['db']->query("SELECT s.username, s.name, s.namestatus, s.groupid, main.dateline, main.buid AS uid
			FROM ".tname('blacklist')." main
			LEFT JOIN ".tname('space')." s ON s.uid=main.buid
			WHERE main.uid='$space[uid]'
			ORDER BY main.dateline DESC
			LIMIT $start,$perpage");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$value['isfriend'] = 0;
			realname_set($value['uid'], $value['username'], $value['name'], $value['namestatus']);
			$fuids[] = $value['uid'];
			$list[$value['uid']] = $value;
		}
	}
	$multi = multi($count, $perpage, $page, $theurl);

} elseif($_GET['view']=="confirm"){
	$uid = $_GET['uid'];
	$uid = substr($uid, 2, strlen($uid)-4);
	//找到baseprofile
	//如果是国外校友
	
	$type = $_GET['type'];

	$q = $_SGLOBAL['db']->query("SELECT * FROM ".tname('baseprofile')." WHERE uid='$uid'");
	$bp = $_SGLOBAL['db']->fetch_array($q);
	if($bp)
	{
		//改成认证过的
		$q = $_SGLOBAL['db']->query("UPDATE ".tname('space')." SET namestatus='1' WHERE uid='$bp[uid]'");
		$_SGLOBAL['db']->fetch_array($q);
		//拿出来学院跟入学年份
		$academy = $bp['academy'];
		$startyear = $bp['startyear'];
		//加入群组
		if($academy && $startyear)
		{
			$gid = tagGrade3($startyear, $academy, $_SGLOBAL['db']);
			jointag($bp['uid'], $gid, $_SGLOBAL['db']);
		}
		showmessage('do_success',"/",2);
	}
} 
elseif ($_GET['view']=='confirmoverseas')	{
	$uid = $_GET['uid'];
	$uid = substr($uid, 2, strlen($uid)-4);
	
	//如果是国外校友
	
	$type = $_GET['type'];

	if( $type == 'overseas' )	{
		//记录审批时间
		$_SGLOBAL['db'] -> query("UPDATE ".tname('spaceforeign')." SET passline='".time()."' , pass_uid='".$_SGLOBAL['supe_uid']."' , cer=1  WHERE uid='$uid'");

		$query = $_SGLOBAL['db'] -> query("SELECT * FROM ".tname('spaceforeign')." WHERE uid={$uid}");
		if($value = $_SGLOBAL['db'] -> fetch_array($query))	{
			
			tagGroupOverseas($uid,$value["country"].$value["school"]);
		}
		$setarr = array(
			'uid' => $uid,
			'type' => "systemnote",
			'new' => 1,
			'authorid' => $_SGLOBAL['supe_uid'],
			'author' => $name,
			'note' => '恭喜，我们已经通过了您的国外信息申请。',
			'dateline' => $_SGLOBAL['timestamp']
		) ;
		$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET notenum=notenum+1 WHERE uid='$uid'");
		inserttable('notification', $setarr);
	}

	
	$bp = $_SGLOBAL['db']->fetch_array($q);
	
	if($type == 'overseas')	{
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname("space")." WHERE groupid=1 and uid='$_SGLOBAL[supe_uid]'");

		if($_SGLOBAL['db']->fetch_array($query))	{
			showmessage('do_success','admincp.php?ac=overseas',1);
		}
	}
	showmessage('do_success',"space.php?do=notice",1);
	
}
elseif ($_GET['view']=='refuseoverseas')	{
	$uid = $_GET['uid'];
	$uid = substr($uid,2,strlen($uid)-4);
	$type = $_GET['type'];
	if( $type == 'overseas' )	{
		$_SGLOBAL['db'] -> query("UPDATE ".tname('spaceforeign')." SET passline='".time()."' , pass_uid='".$_SGLOBAL['supe_uid']."' ,cer=-1 WHERE uid='$uid'");
		$setarr = array(
			'uid' => $uid,
			'type' => "systemnote",
			'new' => 1,
			'authorid' => $_SGLOBAL['supe_uid'],
			'author' => $name,
			'note' => '很遗憾，经过考虑，我们现在不能通过您的国外信息申请。我们建议您继续完善您的申请。',
			'dateline' => $_SGLOBAL['timestamp']
		) ;
		$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET notenum=notenum+1 WHERE uid='$uid'");
		inserttable('notification', $setarr);
	}
	
	$bp = $_SGLOBAL['db']->fetch_array($q);
	if($type == 'overseas')	{
		$query = $_SGLOBAL['db'] -> query("SELECT * FROM ".tname("space")." WHERE groupid=1 and uid='$_SGLOBAL[supe_uid]'");
		if($_SGLOBAL['db']->fetch_array($query))	{
			showmessage('do_success','admincp.php?ac=overseas',1);
		}
	}
	showmessage('do_success',"space.php?do=notice",1);
	
}
else {

	//´¦Àí²éÑ¯
	$theurl = "space.php?uid=$space[uid]&do=$do";
	$actives = array('me'=>' class="active"');
	
	$_GET['view'] = 'me';

	//ºÃÓÑ·Ö×é
	$wheresql = '';
	if($space['self']) {
		$groups = getfriendgroup();
		$group = !isset($_GET['group'])?'-1':intval($_GET['group']);
		if($group > -1) {
			$wheresql = "AND main.gid='$group'";
			$theurl .= "&group=$group";
		}
	}
	if($_GET['searchkey']) {
		$wheresql = "AND main.fusername='$_GET[searchkey]'";
		$theurl .= "&searchkey=$_GET[searchkey]";
	}

	if($space['friendnum']) {
		if($wheresql) {
			$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('friend')." main WHERE main.uid='$space[uid]' AND main.status='1' $wheresql"), 0);
		} else {
			$count = $space['friendnum'];
		}
		if($count) {
			$query = $_SGLOBAL['db']->query("SELECT s.*, f.resideprovince, f.residecity, f.note, f.spacenote, f.sex, main.gid, main.num
				FROM ".tname('friend')." main
				LEFT JOIN ".tname('space')." s ON s.uid=main.fuid
				LEFT JOIN ".tname('spacefield')." f ON f.uid=main.fuid
				WHERE main.uid='$space[uid]' AND main.status='1' $wheresql
				ORDER BY main.num DESC, main.dateline DESC
				LIMIT $start,$perpage");
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				realname_set($value['uid'], $value['username'], $value['name'], $value['namestatus']);
				$value['p'] = rawurlencode($value['resideprovince']);
				$value['c'] = rawurlencode($value['residecity']);
				$value['group'] = $groups[$value['gid']];
				$value['isfriend'] = 1;
				$fuids[] = $value['uid'];
				$value['note'] = getstr($value['note'], 28, 0, 0, 0, 0, -1);
				$list[$value['uid']] = $value;
			}
		}

		//·ÖÒ³
		$multi = multi($count, $perpage, $page, $theurl);
		$friends = array();
		//È¡100ºÃÓÑÓÃ»§Ãû
		$query = $_SGLOBAL['db']->query("SELECT f.fusername, s.name, s.namestatus, s.groupid FROM ".tname('friend')." f
			LEFT JOIN ".tname('space')." s ON s.uid=f.fuid
			WHERE f.uid=$_SGLOBAL[supe_uid] AND f.status='1' ORDER BY f.num DESC, f.dateline DESC LIMIT 0,100");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$fusername = ($_SCONFIG['realname'] && $value['name'] && $value['namestatus'])?$value['name']:$value['fusername'];
			$friends[] = addslashes($fusername);
		}
		$friendstr = implode(',', $friends);
	}

	if($space['self']) {
		$groupselect = array($group => ' class="current"');

		//ºÃÓÑ¸öÊý
		$maxfriendnum = checkperm('maxfriendnum');
		if($maxfriendnum) {
			$maxfriendnum = checkperm('maxfriendnum') + $space['addfriend'];
		}
	}
}

//ÔÚÏß×´Ì¬
if($fuids) {
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('session')." WHERE uid IN (".simplode($fuids).")");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		if(!$value['magichidden']) {
			$ols[$value['uid']] = $value['lastactivity'];
		} elseif($list[$value['uid']] && !in_array($_GET['view'], array('me', 'trace', 'blacklist'))) {
			unset($list[$value['uid']]);
			$count = $count - 1;
		}
	}
}

realname_get();

if(empty($_GET['view']) || $_GET['view'] == 'all') $_GET['view'] = 'me';
$a_actives = array($_GET['view'].$_GET['type'] => ' class="current"');

include_once template("space_friend");

?>
