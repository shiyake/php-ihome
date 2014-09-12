<?php
	include_once('../../common.php');
 	include_once(S_ROOT.'./source/function_space.php');
	include_once('verify.php');

 	$uid = $_SGLOBAL['supe_uid'];

 	$result = array();
 	$query = $_SGLOBAL['db']->query("select avatar,name,username from ".tname('space')." where uid='$uid' LIMIT 1");
	if ($rs = $_SGLOBAL['db']->fetch_array($query)) {
		if(empty($rs['name'])) $rs['name'] = $rs['username'];
		$name = $rs['name'];

		if ($rs['avatar']) {
			$face = avatar($uid,'big',TRUE);
		} else {
			$query = $_SGLOBAL['db']->query("SELECT sex FROM ".tname('spacefield')." WHERE uid='$uid' LIMIT 1");
			if($gd = $_SGLOBAL['db']->result($query))
			{
				if($gd==1) $gender = 'm'; else $gender='f';
			}
			else
			{
				$gender = "m";
			}
			$face = UC_API.'/images/avatar/'.$gender.'_big_1.png';
		}

		$result['status'] = 1;
		$result['name'] = $name;
		$result['face'] = $face;

		echo json_encode($result);
		exit();
	}

	$result['status'] = 0;
	echo json_encode($result);
	exit();
?>