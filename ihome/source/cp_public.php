<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}
//echo $_SGLOBAL['member']['groupid'];// == 3
if(trim($_GET['op']) == 'checkpublic' && $uid = $_SGLOBAL['supe_uid']){
	
	
	if($_SGLOBAL['member']['groupid'] == 3){
		$query = $_SGLOBAL['db']->query("SELECT appuid as uid,contact as name FROM ".tname('publicapply')." WHERE ruthed=1 and uid=$uid");
		while($value = $_SGLOBAL['db']->fetch_array($query)){
			$value['type'] = 3;
			$public[] = $value;
			
		}
	}else{
		$query = $_SGLOBAL['db']->query("SELECT uid,name FROM ".tname('publicapply')." WHERE ruthed=1 and appuid=$uid");
		while($value = $_SGLOBAL['db']->fetch_array($query)){
			$value['type'] = 1;
			$public[] = $value;
		}
	}
	//print_r($public);
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
