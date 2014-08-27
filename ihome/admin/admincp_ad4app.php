<?php
if(!defined('iBUAA') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
if(!checkperm('managead4app')) {
	cpmessage('no_authority_management_operation');
}

if (!empty($_POST['url'])) {
	$id = trim($_POST['id']);
	$url = empty($_POST['url'])?0:trim($_POST['url']);
	$img = empty($_POST['img'])?0:trim($_POST['img']);
	$action = empty($_POST['action'])?0:$_POST['action'];
	if ($action == 'modify') {
		if (!$url || !$img) {
			echo "1";
			exit();
		}
		$arr = array(
			'img' => $img,
			'url' => $url,
			'state' => 1
		);
		if ($id == 'n') {
			inserttable('ad4app', $arr, 0);
		} else if (is_numeric($id)){
			$arr_where = array(
				'id' => $id
			);
			updatetable('ad4app', $arr, $arr_where);
		}
	} else if ($action == 'remove') {
		if (is_numeric($id)) {
			$_SGLOBAL['db']->query("UPDATE ".tname('ad4app')." SET state=0 WHERE id=$id");
		} else {
			echo "1";
			exit();
		}
	}
}

$ads = array();
$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname("ad4app")." WHERE state=1");
while($res = $_SGLOBAL['db']->fetch_array($query))	{
	$ads[] = $res;
}

?>