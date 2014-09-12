<?php
	include_once('../../common.php');
 	include_once(S_ROOT.'./source/function_space.php');
 	include_once(S_ROOT.'./uc_client/client.php');
	include_once('verify.php');
 	$space = getspace($_SGLOBAL['supe_uid']);

 	$filter = 'privatepm';
	$perpage = 50;
	$page = 1;
	
	$rs1 = uc_pm_list($_SGLOBAL['supe_uid'], $page, $perpage, 'inbox', $filter, 100);
	$pms = $rs1['data'];

	$data = array();
	$now = time();
	$today = mktime(0,0,0);
	$yesterday = $today - 24 * 60 * 60;
	foreach ($pms as $value) {
		$uid = intval($value['msgfromid']);
		$query = $_SGLOBAL['db']->query("select avatar,name,username from ".tname('space')." where uid='$uid'");
		if ($rs2 = $_SGLOBAL['db']->fetch_array($query)) {
			$value['id'] = $uid;
			$value['name'] = empty($rs2['name'])?$rs2['username']:$rs2['name'];

			if ($rs2['avatar']) {
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
			$value['face'] = $face;

			$past = $value['dateline'];
			if ($past >= $now) {
				$value['time'] = '现在';
			} else if ($past > $today) {
				$value['time'] = date('H:i', $past);
			} else if ($past > $yesterday) {
				$value['time'] = '昨天';
			} else {
				$value['time'] = date('Y-m-d', $past);
			}
			$data[] = $value;
		}
	}

	$result = array();
	if ($data) {
		$result['status']=1;
		$result['msg']='ok';
		$result['data']=$data;
	} else {
		$result['status']=0;
		$result['msg']='泪目~~都木有人理我~~';
	}

	$chatlog = json_encode($result);
	echo $chatlog;
	exit();
?>