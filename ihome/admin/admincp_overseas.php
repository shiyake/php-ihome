<?php
if(!defined('iBUAA') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
if(!checkperm('manageoverseas')) {
	cpmessage('no_authority_management_operation');
}
$apply = array();
$passdeny = array();
$pos = array();

$query = $_SGLOBAL['db']->query("SELECT distinct lng,lat FROM ".tname("spaceforeign"));
while($res = $_SGLOBAL['db']->fetch_array($query))	{
	
	
	$pos[] = $res;
}

$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname("spaceforeign")." AS a LEFT JOIN ".tname("space")." AS b ON a.uid=b.uid LEFT JOIN ".tname("forgienCreate")." AS c on b.username=c.username WHERE a.cer=0 order by a.dataline desc");
while($res = $_SGLOBAL['db']->fetch_array($query))	{
	$apply[] = $res ;
}
$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname("spaceforeign")." AS a LEFT JOIN ".tname("space")." AS b on a.uid=b.uid LEFT JOIN ".tname("forgienCreate")." AS c on b.username=c.username WHERE a.cer!=0 order by a.passline desc");
while($res = $_SGLOBAL['db']->fetch_array($query))	{
	$passdeny[] = $res ;
}
$query = $_SGLOBAL['db'] -> query("SELECT uid, username FROM ".tname("space")." WHERE consul = 1");
$consulNow = 0;
$consulName = '';
if($res = $_SGLOBAL['db']->fetch_array($query)) {
	$consulNow = $res['uid'];
	$consulName = $res['username'];
}

if("change" == $_GET['do'])	{
	$change_uid = $_POST['change_uid'];
	$query = $_SGLOBAL['db'] -> query("SELECT * FROM ".tname("space")." WHERE uid=".$_POST['change_uid']);
	$_SGLOBAL['db'] -> query("UPDATE ".tname("space")." SET consul = 0 WHERE consul = 1");
	
	if($_SGLOBAL['db']->fetch_array($query))	{
		$_SGLOBAL['db'] -> query("UPDATE ".tname("space")." SET consul = 1 WHERE uid=".$change_uid);
		if ($consulNow != $change_uid) {
			$setarr = array(
			'uid' => $change_uid,
			'type' => "friend",
			'new' => 1,
			'authorid' => $_SGLOBAL['supe_uid'],
			'author' => $name,
			'note' => '管理员授权您处理国外校友信息认证相关事务',
			'dateline' => $_SGLOBAL['timestamp']
			) ;
			$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET notenum=notenum+1 WHERE uid='$change_uid'");
			inserttable('notification', $setarr);

			if ($consulNow) {
				$setarr = array(
				'uid' => $consulNow,
				'type' => "friend",
				'new' => 1,
				'authorid' => $_SGLOBAL['supe_uid'],
				'author' => $name,
				'note' => '管理员取消了授权您处理国外校友信息认证相关事务',
				'dateline' => $_SGLOBAL['timestamp']
				) ;
				$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET notenum=notenum+1 WHERE uid='$consulNow'");
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
