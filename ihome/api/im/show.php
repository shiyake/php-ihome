<?php 
	require 'Predis/Autoloader.php';
	Predis\Autoloader::register();
	$client = new Predis\Client();
	echo 'T3: '.$client->get('T3')."<br>";
	echo 'R3: '.$client->get('R3')."<br>";
	echo 'T247: '.$client->get('T247')."<br>";
	echo 'R247: '.$client->get('R247')."<br>";
?>