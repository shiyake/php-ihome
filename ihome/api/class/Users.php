<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}

class Users extends MyBase {

	function getInfo($uIds, $fields = array(), $isExtra = false) {
		$users = $this->getUsers($uIds, false, true, $isExtra, false);
		$result = array();
		if ($users) {
			if ($fields) {
				foreach($users as $key => $user) {
					foreach($user as $k => $v) {
						if (in_array($k, $fields)) {
							$result[$key][$k] = $v;
						}
					}
				}
			}
		}

		if (!$result) {
			$result = $users;
		}
		
		return new APIResponse($result);
	}

	function getFriendInfo($uId, $num = MY_FRIEND_NUM_LIMIT, $isExtra = false) {

		$users = $this->getUsers(array($uId), false, true, $isExtra, true, $num, false, true);

		$where = array('uId' => $uId,
					   'status' => 1
					  );
		$totalNum = getcount('friend', $where);
		$friends = $users[0]['friends'];
		unset($users[0]['friends']);
		$result = array('totalNum'	=> $totalNum,
						'friends' => $friends,
						'me'	=> $users[0],
						);
		return new APIResponse($result);
	}

	function getExtraInfo($uIds) {
		$result = $this->getExtraByUsers($uIds);
		return new APIResponse($result);
	}

}
?>
