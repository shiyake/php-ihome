<?php
/*
	wall_screen.php 用于晚会投影至大屏幕。
	Add by xuxing@ihome 2012-8-21 19：24：00
	Modfile Ancon
	Last Modfile: 2013-4-15 10:30:59
*/

if(!defined('iBUAA')) {
	exit('Access Denied');
}
$op = $_GET['op'] ? trim($_GET['op']) : '';
/************************测试时为0,正式环境时应该为900.*******************************/
$RightNow = 0;

if(empty($op)) {
	if($WallId) {
		$Query = $_SGLOBAL['db']->query("select wallname from ".tname("wall")." where id=".$WallId." and pass > 0 ");
		if($Value = $_SGLOBAL['db']->result($Query)) {
			$WallTitle = $Value;
		}
		else {
			showmessage('对不起，您不能访问该墙！');
		}

		$QueryUid = $_SGLOBAL['db']->query("select uid from ".tname("wall")." where id=".$WallId." ");
		if($Value = $_SGLOBAL['db']->result($QueryUid)) {
			$UserId = $Value;
		}
		$QueryWallUrl = $_SGLOBAL['db']->query("select wallurl from ".tname("wall")." where id=".$WallId." ");
		if($Value = $_SGLOBAL['db']->result($QueryWallUrl)) {
			$WallUrl = $Value;
		}
		if($uid == $UserId || $uid == 10000 || $uid == 1) {
			$Query = $_SGLOBAL['db']->query("select * from ".tname("wallfield")." where wallid=".$WallId." and pass >= 1 and timeline > ".$RightNow." AND display < 1 order by timeline ASC limit 3 ");//timeline是发布时间
			if($Value = $_SGLOBAL['db']->fetch_array($Query)) {
				inserttable('walluser', array('wfid' =>$Value['id'], 'userid' =>$uid), 1, true);
				$floorid =  $_SGLOBAL['db']->insert_id();
				$Value['floorid'] = $floorid;
				updatetable('wallfield', array('display' => 1, 'now' =>$_SGLOBAL['timestamp'], 'floorid' =>$Value['floorid']), array('id' =>$Value['id']));
				realname_set($Value[uid]);
				$WallRecList[] = $Value;
			}
			if(count($WallRecList) < 3) {
				$Left = 3 - count($WallRecList);
				$Query = $_SGLOBAL['db']->query("select * from ".tname("wallfield")." where wallid=".$WallId." AND display >= 1 order by floorid desc limit $Left ");
				while($Value = $_SGLOBAL['db']->fetch_array($Query)) {
					realname_set($Value[uid]);
					$WallRecList[] = $Value;
				}
			}
		}
		else {
			$Query = $_SGLOBAL['db']->query("select * from ".tname("wallfield")." where wallid=".$WallId." AND display >= 1 order by floorid desc limit 3 ");
			while($Value = $_SGLOBAL['db']->fetch_array($Query)) {
				realname_set($Value[uid]);
				$WallRecList[] = $Value;
			}
		}
		realname_get();
		include_once template("./plugin/wall/template/screen");
	}
	else {
		showmessage('you_do_not_have_permission_to_visit');
	}
}

if($op =='fetchOne') {
	$QueryId = $_SGLOBAL['db']->query("select uid from ".tname("wall")." where id=".$WallId." ");
	if($Value = $_SGLOBAL['db']->result($QueryId)) {
		$UserId = $Value;
	}
	if($uid == $UserId || $uid == 10000 || $uid == 1) {
		$Query = $_SGLOBAL['db']->query("select * from ".tname("wallfield")." where wallid=".$WallId." and pass >= 1 and timeline > ".$RightNow." and display < 1 limit 1 ");
		if($Value = $_SGLOBAL['db']->fetch_array($Query)) {
			inserttable('walluser', array('wfid' =>$Value['id'], 'userid' =>$uid), 1, true);
			$floorid =  $_SGLOBAL['db']->insert_id();
			$Value['floorid'] = $floorid;
			updatetable('wallfield', array('display' => 1, 'now' =>$_SGLOBAL['timestamp'], 'floorid' =>$Value['floorid']), array('id' =>$Value['id']));
			realname_set($Value[uid]);
			$WallRecList[] = $Value;
			realname_get();
			include_once template('./plugin/wall/template/wait');
			exit();
		}
	}
	else {
		$TwoSecond = $_SGLOBAL['timestamp'] - 2;
		$Query = $_SGLOBAL['db']->query("select * from ".tname("wallfield")." where wallid=".$WallId." and now > ".$TwoSecond." and display >= 1 order by floorid desc limit 1 ");
		if($Value = $_SGLOBAL['db']->fetch_array($Query)) {
			realname_set($Value[uid]);
			$WallRecList[] = $Value;
			realname_get();
			include_once template('./plugin/wall/template/wait');
			exit();
		}
	}
}

?>
