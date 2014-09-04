<?php
if(!defined('iBUAA') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
if(!checkperm('manageasst')) {
	cpmessage('no_authority_management_operation');
}
$apply = array();
$passdeny = array();
$pos = array();

$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname("asst")." ORDER BY passdate+0 desc");
while($res = $_SGLOBAL['db']->fetch_array($query))	{
	if ($res['state'] == 0) {
		$apply[] = $res;
	} else {
		$passdeny[] = $res;
	}
}

$query = $_SGLOBAL['db'] -> query("SELECT uid, username FROM ".tname("space")." WHERE asstConsul = 1");
$asstConsulNow = 0;
$asstConsulName = '';
if($res = $_SGLOBAL['db']->fetch_array($query)) {
	$asstConsulNow = $res['uid'];
	$asstConsulName = $res['username'];
}

if("change" == $_GET['do'])	{
	$change_uid = $_POST['change_uid'];
	$query = $_SGLOBAL['db'] -> query("SELECT * FROM ".tname("space")." WHERE uid=".$_POST['change_uid']);
	$_SGLOBAL['db'] -> query("UPDATE ".tname("space")." SET asstConsul = 0 WHERE asstConsul = 1");
	
	if($_SGLOBAL['db']->fetch_array($query))	{
		$_SGLOBAL['db'] -> query("UPDATE ".tname("space")." SET asstConsul = 1 WHERE uid=".$change_uid);
		if ($asstConsulNow != $change_uid) {
			$setarr = array(
			'uid' => $change_uid,
			'type' => "systemnote",
			'new' => 1,
			'authorid' => 0,
			'author' => $name,
			'note' => '您好，您已成为辅导员申请认证的审核人。',
			'dateline' => $_SGLOBAL['timestamp']
			) ;
			$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET notenum=notenum+1 WHERE uid='$change_uid'");
			inserttable('notification', $setarr);

			if ($asstConsulNow) {
				$setarr = array(
				'uid' => $asstConsulNow,
				'type' => "systemnote",
				'new' => 1,
				'authorid' => 0,
				'author' => $name,
				'note' => '您好，您已不再是辅导员申请认证的审核人。',
				'dateline' => $_SGLOBAL['timestamp']
				) ;
				$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET notenum=notenum+1 WHERE uid='$asstConsulNow'");
				inserttable('notification', $setarr);
			}
		}
		echo 'do_success';
	}
	else {
		echo 'error';
	}
}
?>
