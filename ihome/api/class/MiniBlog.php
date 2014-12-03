<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}

class MiniBlog {

	function post($uId, $message, $clientIdentify, $ip = '') {
		$fields = array('uid'		=> $uId,
						'message'	=> $message,
						'from'		=> $clientIdentify,
						'dateline'	=> time()
					   );
		if ($ip) {
			$fields['ip'] = $ip;
		}
		$result = inserttable('doing', $fields, 1);
		return new APIResponse($result);
	}

	function get($uId, $num) {
		global $_SGLOBAL;
		$sql = 'SELECT * FROM %s WHERE uid = %d LIMIT %d';
		$sql = sprintf($sql, tname('doing'), $uId, $num);
		$query = $_SGLOBAL['db']->query($sql);

		$result = array();
		while($doing = $_SGLOBAL['db']->fetch_array($query)) {
			$result[] = array('created' => $doing['dateline'],
							  'message'	=> $doing['message'],
							  'ip'		=> $doing['ip'],
							  'clientIdentify'	=> $doing['from']
							 );
		}
		return new APIResponse($result);
	}

}
?>
