<?php 
	include_once('../../common.php');
 	include_once(S_ROOT.'./source/function_space.php');
	include_once('verify.php');

	$uid = $_SGLOBAL['supe_uid'];

	require 'Predis/Autoloader.php';

	set_time_limit(0);
	// header("Connection: Keep-Alive");
	// header("Proxy-Connection: Keep-Alive");

	Predis\Autoloader::register();

	$client = new Predis\Client();

	$miss = 0;
	$keyR = 'R'.$uid;
	while (1) {
		if ($client->exists($keyR)) {
			$value = $client->decr($keyR);
			if ($value <= 0) {
				$client->del($keyR);
			}
			break;
		}
		// if ($miss < 5000000) {
		// 	$miss += 1000;
		// }
		// usleep($miss);
	}
	
	$q = $_SGLOBAL['db']->query("select * from ".UC_DBTABLEPRE."pms where new and msgtoid='".$_SGLOBAL['supe_uid']."' and related order by dateline limit 100");
	$data = array();
	while ($r = $_SGLOBAL['db']->fetch_array($q)) {
		$datum = array();
		$datum['id'] = $r['msgfromid'];
		$datum['message'] = $r['message'];
		$datum['time'] = $r['dateline'].'000';

		$data[] = $datum;
	}

	$result = array();
	if ($data) {
		if (!$value) {
			$_SGLOBAL['db']->query("update ".UC_DBTABLEPRE."pms set new=0 where new and msgtoid='".$_SGLOBAL['supe_uid']."'");
		}

		$result['status'] = '1';
		$result['data'] = $data;

	} else {
		$result['status'] = '0';
	}

	$update = json_encode($result);
	echo $update;

	exit();

?>