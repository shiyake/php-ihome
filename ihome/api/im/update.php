<?php 
	$startTime = time();
	include_once('../../common.php');
 	include_once(S_ROOT.'./source/function_space.php');
	include_once('verify.php');

	header("Connection: Keep-Alive");
	header("Proxy-Connection: Keep-Alive");

	set_time_limit(0);

	if ($_POST['time']) {
		$startTime = intval($_POST['time']);
	}

	$uid = $_SGLOBAL['supe_uid'];

	require 'Predis/Autoloader.php';

	Predis\Autoloader::register();

	$client = new Predis\Client();

	$miss = 0;
	$keyR = 'R'.$uid;
	while (1) {
		if (time()-$startTime>52) {
			$stopTime = time();
			break;
		}
		if ($client->exists($keyR)) {
			if (connection_aborted()) {
				exit();
			}
			$value = $client->decr($keyR);
			if ($value <= 0) {
				$client->del($keyR);
			}
			break;
		}
		if ($miss < 5000000) {
			$miss += 1000;
		}
		usleep($miss);
	}

	if (connection_aborted()) {
		exit();
	}
	
	if ($stopTime) {
		$result = array();
		$result['status'] = '0';
		$result['time'] = $stopTime;
	} else {
		$q = $_SGLOBAL['db']->query("select * from ".UC_DBTABLEPRE."pms where msgtoid='".$_SGLOBAL['supe_uid']."' and related and (dateline>".$startTime." or new) order by dateline limit 100");
		$data = array();
		while ($r = $_SGLOBAL['db']->fetch_array($q)) {
			$datum = array();
			$datum['id'] = $r['msgfromid'];
			$datum['message'] = htmlspecialchars($r['message']);
			$datum['time'] = $r['dateline'].'000';

			$data[] = $datum;
			$_SGLOBAL['db']->query("update ".UC_DBTABLEPRE."pms set new=0 where pmid='".$r['pmid']."'");
		}

		$result = array();
		if ($data) {
			$result['status'] = '1';
			$result['data'] = $data;
		} else {
			$result['status'] = '0';
		}
	}

	$update = json_encode($result);
	echo $update;

	exit();

?>