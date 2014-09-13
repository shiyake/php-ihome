<?php
	include_once('../../common.php');
 	include_once(S_ROOT.'./source/function_space.php');
	include_once('verify.php');

	$q = $_SGLOBAL['db']->query("select * from ".UC_DBTABLEPRE."pms where (msgfromid='".$_SGLOBAL['supe_uid']."' or msgtoid='".$_SGLOBAL['supe_uid']."') and msgfromid and !related order by dateline desc limit 100");
	$pms = array();
	$mem = array();
	while ($r = $_SGLOBAL['db']->fetch_array($q)) {
		$uid = intval($r['msgfromid'])^intval($r['msgtoid'])^intval($_SGLOBAL['supe_uid']);
		if ($mem[$uid]) {
			continue;
		} else {
			$mem[$uid] = 1;
			$r['id'] = $uid;
			$pms[] = $r;
		}
	}

	$data = array();
	$now = time();
	$today = mktime(0,0,0);
	$yesterday = $today - 24 * 60 * 60;
	foreach ($pms as $value) {
		$uid = intval($value['id']);
		$query = $_SGLOBAL['db']->query("select avatar,name,username from ".tname('space')." where uid='$uid'");
		if ($rs2 = $_SGLOBAL['db']->fetch_array($query)) {
			$datum = array();
			$datum['id'] = $value['id'];
			$datum['message'] = $value['message'];
			$datum['name'] = empty($rs2['name'])?$rs2['username']:$rs2['name'];

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
			$datum['face'] = $face;

			$past = $value['dateline'];
			if ($past >= $now) {
				$datum['time'] = '现在';
			} else if ($past > $today) {
				$datum['time'] = date('H:i', $past);
			} else if ($past > $yesterday) {
				$datum['time'] = '昨天';
			} else {
				$datum['time'] = date('Y-m-d', $past);
			}

			$data[] = $datum;
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