<?php 
	$startTime = time();
	include_once('../../common.php');
 	include_once(S_ROOT.'./source/function_space.php');
	include_once('verify.php');

	header("Connection: Keep-Alive");
	header("Proxy-Connection: Keep-Alive");

	set_time_limit(0);

	if ($_POST['version']) {
		$hajime = 0;
		$version = intval($_POST['version']);
	} else {
		$hajime = 1;
		$q = $_SGLOBAL['db']->query("select max(pmid) from ".UC_DBTABLEPRE."pms where msgtoid='".$_SGLOBAL['supe_uid']."' and related");
		$r = $_SGLOBAL['db']->result($q);
		$version = intval($r);
	}

	$uid = $_SGLOBAL['supe_uid'];

	require 'Predis/Autoloader.php';

	Predis\Autoloader::register();

	$client = new Predis\Client();

	$miss = 0;
	$keyR = 'R'.$uid;
	if (!$hajime) {
		while (1) {
			if (time()-$startTime>52) {
				// $stopTime = time();
				break;
			}
			if ($client->exists($keyR)) {
				$value = intval($client->get($keyR));
				if ($value > $version) {
					break;
				}
				if (connection_aborted()) {
					exit();
				}
			}
			if ($miss < 5000000) {
				$miss += 1000;
			}
			usleep($miss);
		}
	}

	if (connection_aborted()) {
		exit();
	}
	
	// if ($stopTime) {
	// 	$result = array();
	// 	$result['status'] = '0';
	// 	$result['version'] = $version;
	// } else {
		$q = $_SGLOBAL['db']->query("select * from ".UC_DBTABLEPRE."pms where msgtoid='".$_SGLOBAL['supe_uid']."' and related and (pmid>".$version." or new) order by dateline limit 100");
		$data = array();
		while ($r = $_SGLOBAL['db']->fetch_array($q)) {
			$datum = array();
			$datum['id'] = $r['msgfromid'];
			$datum['message'] = htmlspecialchars($r['message']);
			$datum['time'] = $r['dateline'].'000';

			$fuid = intval($datum['id']);
			if (getfriendstatus($fuid, $uid) < 0) {
				$q1 = $_SGLOBAL['db']->query("select avatar,name,username from ".tname('space')." where uid='$fuid'");
				if ($r1 = $_SGLOBAL['db']->fetch_array($q1)) {
					$datum['name'] = empty($r1['name'])?$r1['username']:$r1['name'];

					if ($r1['avatar']) {
						$face = avatar($fuid,'big',TRUE);
					} else {
						$query = $_SGLOBAL['db']->query("SELECT sex FROM ".tname('spacefield')." WHERE uid='$fuid' LIMIT 1");
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
				}
			}
			
		
			$data[] = $datum;
			$_SGLOBAL['db']->query("update ".UC_DBTABLEPRE."pms set new=0 where pmid='".$r['pmid']."'");

			$version = intval($r['pmid']) > $version ? intval($r['pmid']) : $version;
		}

		$result = array();
		if ($data) {
			$result['status'] = '1';
			$result['data'] = $data;
			$result['version'] = $version;
		} else {
			$result['status'] = '0';
			$result['version'] = $version;
		}
	// }

	$update = json_encode($result);
	echo $update;

	exit();

?>