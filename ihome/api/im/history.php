<?php 
	include_once('../../common.php');
 	include_once(S_ROOT.'./source/function_space.php');
	include_once('verify.php');

	$uid = $_SGLOBAL['supe_uid'];
	$result = array();
	$result['status'] = 0;
	if ($_POST['id']) {
		$fuid = intval($_POST['id']);
		$q = $_SGLOBAL['db']->query("select * from ".UC_DBTABLEPRE."pms where msgtoid in ($uid, $fuid) and msgfromid in ($uid, $fuid) and related order by pmid desc limit 30");

		$data = array();
		while ($r = $_SGLOBAL['db']->fetch_array($q)) {
			$datum = array();
			$datum['message'] = $r['message'];
			$datum['id'] = $r['msgfromid'];
			$datum['time'] = $r['dateline'].'000';

			$data[] = $datum;
		}

		if ($data) {
			$result['status'] = 1;
			$result['data'] = $data;
		}
	}

	$history = json_encode($result);
	echo $history;
	exit();
?>