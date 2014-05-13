<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}

if(trim($_GET['op']) == 'checkpublic' && $uid = $_SGLOBAL['supe_uid']){
	
	//echo $_SGLOBAL['member']['groupid'];// == 3
	
	$query = $_SGLOBAL['db']->query("SELECT uid,name FROM ".tname('publicapply')." WHERE ruthed=1 and appuid=$uid");
	while($value = $_SGLOBAL['db']->fetch_array($query)){
		$public[] = $value;
	}

	echo json_encode($public);
	exit;
}

exit;


///////////lv
include_once('../common.php');
$i = 0;
$publiclist = array();
$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('space')." WHERE groupid=3");
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
	if(!in_array($value['uid'], $nouids)) {
		realname_set($value['uid'], $value['username']);
		$publiclist[] = $value;
		$i++;
		//if($i>=$maxnum) break;
	}
}

include template('cp_public');
?>
