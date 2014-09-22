<?php 
	include_once('../../common.php');
 	include_once(S_ROOT.'./source/function_space.php');
	include_once('verify.php');

	require 'Predis/Autoloader.php';
	Predis\Autoloader::register();
	$client = new Predis\Client();
	echo 'T3: '.$client->get('T3')."<br>";
	echo 'R3: '.$client->get('R3')."<br>";
	echo 'T11: '.$client->get('T11')."<br>";
	echo 'R11: '.$client->get('R11')."<br>";

	echo getfriendstatus(11,'3') <0 
?>