<?php
	include_once('../../common.php');
 	include_once(S_ROOT.'./source/function_space.php');
	include_once('verify.php');

 	$uid = $_SGLOBAL['supe_uid'];
 	require 'Predis/Autoloader.php';
	Predis\Autoloader::register();
	$client = new Predis\Client();
	$keyT = 'ihome_T'.$uid;
	$keyR = 'ihome_R'.$uid;
	$value = $client->decr($keyT);

	if ($value <= 0) {
		$client->del($keyT);
		$client->del($keyR);
	}
?>