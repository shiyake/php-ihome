<?php
	include_once('../../common.php');
 	include_once(S_ROOT.'./source/function_space.php');
 	include_once(S_ROOT.'./uc_client/client.php');
	include_once('verify.php');
 	$space = getspace($_SGLOBAL['supe_uid']);

 	$type = $_POST['type'];
 	$touid = $_POST['id'];
 	$content = trim($_POST['content']);
 	$key = $_POST['key'];
	$pmid = 0;

 	cknewuser();

 	$result = array();
 	if ($type == 'one') {
 		if($touid) {
			if(isblacklist($touid)) {
				$result['status'] = 0;
				$result['msg'] = '很悲桑的说，你大概被拉黑了。。';
				echo json_encode($result);
				exit();
			}
		}
		
		if(empty($content)) {
			$result['status'] = 0;
			$result['msg'] = '这条可怜的消息木有了，再来一发吧';
			echo json_encode($result);
			exit();
		}
		$subject = '';

		$return = 0;
		if($touid) {
			$return = uc_pm_send($_SGLOBAL['supe_uid'], $touid, $subject, $content, 1, $pmid, 0);
				
			if($return > 0) {
				require 'Predis/Autoloader.php';
				Predis\Autoloader::register();
				$client = new Predis\Client();
				
				$keyT = 'ihome_T'.$touid;
				if ($client->exists($keyT)) {
					$keyR = 'ihome_R'.$touid;
					if ($client->exists($keyR)) {
						$value = intval($client->get($keyR));
						$return = $value > $return ? $value : $return;
					}
					
					$client->set($keyR, $return);
				}
				smail($touid, '', cplang('friend_pm',array($_SN[$space['uid']], getsiteurl().'space.php?do=pm')), '', 'friend_pm');
			}

		} else {
			$result['status'] = 0;
			$result['msg'] = '自言自语是不对滴~';
			echo json_encode($result);
			exit();
		}

		if($return > 0) {
			$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET lastpost='$_SGLOBAL[timestamp]' WHERE uid='$_SGLOBAL[supe_uid]'");
		} else {
			if(in_array($return, array(-1,-2,-3,-4))) {
				$result['status'] = 0;
				$result['msg'] = '你的消息在前往服务器的旅途中迷路了。嗯，就是这样的说x'.abs($return);
				echo json_encode($result);
				exit();
			} else {
				$result['status'] = 0;
				$result['msg'] = '你的消息在前往服务器的旅途中迷路了。嗯，就是这样的说。';
				echo json_encode($result);
				exit();
			}
		}
 	} else {
		$result['status'] = 0;
		$result['msg'] = '你的消息在前往服务器的旅途中迷路了';
		echo json_encode($result);
		exit();
 	}
 	
	$result['status'] = 1;
	$result['msg'] = 'aloha';
	echo json_encode($result);
 	exit();
 	
?>