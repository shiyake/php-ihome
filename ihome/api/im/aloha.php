<?php
	include_once('../../common.php');
 	include_once(S_ROOT.'./source/function_space.php');
	include_once('verify.php');

 	$uid = $_SGLOBAL['supe_uid'];

 	$result = array();
 	function query($api, $data) {
 		$servername = $_SERVER['SERVER_NAME'];
		$base = 'https://a1.easemob.com/ihome/ihometest/';
		if ($servername == 'i.buaa.edu.cn') {
			$base = 'https://a1.easemob.com/ihome/ihome/';
		}
		$content = json_encode($data);

		$url = $base.$api;
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

		$json_response = curl_exec($curl);
		$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		curl_close($curl);
		$response = json_decode($json_response, true);

		// var_dump($url);
		// echo '<br>';
		// var_dump($content);
		// echo '<br>';
		// var_dump($response);
		return $response;
 	}
 	function get_token($uid) {
		$data = array('grant_type' => 'password', 'username' => "$uid", 'password' => '123456');
		$response = query('token', $data);
		if ($response['access_token']) {
			return $response;
		}
		return 0;
	}
	function register($uid, $name) {
		$data = array('username' => "$uid", 'password' => '123456', 'nickname' => $name);
		$response = query('users', $data);
		if (!$response['error']) {
			return $response;
		}
		return 0;
	}
	function get_token_wrapper($uid, $name) {
		$token = get_token($uid);
		if (!$token && register($uid, $name)) {
			$token = get_token($uid);
		}
		return $token;
	}

 	$query = $_SGLOBAL['db']->query("select avatar,name,username from ".tname('space')." where uid='$uid' LIMIT 1");
	if ($rs = $_SGLOBAL['db']->fetch_array($query)) {
		require 'Predis/Autoloader.php';
		Predis\Autoloader::register();
		$client = new Predis\Client();

		if(empty($rs['name'])) $rs['name'] = $rs['username'];
		$name = $rs['name'];

		$key = 'ihome_token_'.$uid;
		$token = $client->get($key);
		if (!$token && ($ret = get_token_wrapper($uid, $name))) {
			$token = $ret['access_token'];
			$expire = $ret['expires_in'];
			$client->set($key, $token);
			$client->expire($key, $expire);
		}

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
		$result['id'] = $uid;
		$result['token'] = $token;

		echo json_encode($result);
		exit();
	}

	$result['status'] = 0;
	echo json_encode($result);
	exit();
?>
