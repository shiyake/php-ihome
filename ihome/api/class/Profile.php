<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}

class Profile {

	function setMYML($uId, $appId, $markup, $actionMarkup) {
		global $_SGLOBAL;

		$fields = array('myml'	=> $markup,
						'profileLink'	=> $actionMarkup);
		$where = array('uid'	=> $uId,
					   'appid'	=> $appId
					  );
		updatetable('userappfield', $fields, $where);
		$result = $_SGLOBAL['db']->affected_rows();
		return new APIResponse($result);
	}

	function setActionLink($uId, $appId, $actionMarkup) {
		global $_SGLOBAL;

		$fields = array('profilelink'	=> $actionMarkup);
		$where = array('uid'	=> $uId,
					   'appid'	=> $appId
					  );
		updatetable('userappfield', $fields, $where);
		$result = $_SGLOBAL['db']->affected_rows();
		return new APIResponse($result);
	}

}

?>
