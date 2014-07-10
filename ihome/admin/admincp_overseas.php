<?php
if(!defined('iBUAA') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
$apply = array();
$pass = array();
$pos = array();

$query = $_SGLOBAL['db']->query("SELECT distinct lng,lat FROM ".tname("spaceforeign"));
while($res = $_SGLOBAL['db']->fetch_array($query))	{
	
	
	$pos[] = $res;
}

$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname("spaceforeign")." AS a LEFT JOIN ".tname("space")." AS b ON a.uid=b.uid LEFT JOIN ".tname("forgienCreate")." AS c on b.username=c.username WHERE a.cer=0 order by a.dataline desc");
while($res = $_SGLOBAL['db']->fetch_array($query))	{
	$apply[] = $res ;
}
$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname("spaceforeign")." AS a LEFT JOIN ".tname("space")." AS b on a.uid=b.uid LEFT JOIN ".tname("forgienCreate")." AS c on b.username=c.username WHERE a.cer=1 order by a.passline desc");
while($res = $_SGLOBAL['db']->fetch_array($query))	{
	$pass[] = $res ;
}
if("change" == $_GET['do'])	{
	$change_uid = $_POST['change_uid'];
	$query = $_SGLOBAL['db'] -> query("SELECT * FROM ".tname("space")." WHERE uid=".$_POST['change_uid']);
	$_SGLOBAL['db'] -> query("UPDATE ".tname("space")." SET consul = 0 WHERE consul = 1");
	
	if($_SGLOBAL['db']->fetch_array($query))	{
		$_SGLOBAL['db'] -> query("UPDATE ".tname("space")." SET consul = 1 WHERE uid=".$change_uid);
		$setarr = array(
			'uid' => $change_uid,
			'type' => "friend",
			'new' => 1,
			'authorid' => $_SGLOBAL['supe_uid'],
			'author' => $name,
			'note' => '管理员授权您为外事处，处理国外校友相关事务',
			'dateline' => $_SGLOBAL['timestamp']
		) ;
		$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET notenum=notenum+1 WHERE uid='$change_uid'");
		inserttable('notification', $setarr);
		echo 'do_success';

	}
	else {
		echo 'error';
	}
}
?>
