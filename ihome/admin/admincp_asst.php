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

			foreach ($apply as $value) {
				$degree = $value['degree'];
				$year = $value['year'];
				$academy = $value['academy'];
				$applyer = $value['uid'];
				$setarr = array(
					'uid' => $change_uid,
					'type' => "friend",
					'new' => 1,
					'authorid' => $applyer,
					'author' => $value['name'],
					'note' => "登录名{$value['username']}".'向您发起了'.$degree.$year.'级'.$academy.'辅导员的认证请求<br/><a href="space.php?do=friend&view=confirmasst&uid=%27'.$applyer.'%27&type=asst">通过请求</a><span class="pipe">|</span><a href="space.php?do=friend&view=refuseasst&uid=%27'.$applyer.'%27&type=asst">拒绝</a>',
					'dateline' => $_SGLOBAL['timestamp']
				);
				$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET notenum=notenum+1 WHERE uid='$change_uid'");
				inserttable('notification', $setarr);
			}

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
