<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}

class ImbotMsn extends MyBase {

	function setBindStatus($uId, $op, $msn = null) {
		global $_SGLOBAL;

		if ($op == 'bind') {
			$status = 1;
		} else if ($op == 'unbind') {
			$status = 0;
		} else {
			$errCode = '200';
			$errMessage = 'Error arguments';
		}

		if ($errCode) {
			return new APIErrorResponse($errCode, $errMessage);
		}

		$sql = 'UPDATE ' . tname('spacefield') . ' set  msncstatus = ' . $status ;
		if ($msn !== null) {
			$sql .= ' , msnrobot = ' . $msn;
		}
		$sql .= ' WHERE uid =' . $uId;
		$result = $_SGLOBAL['db']->query($sql);
		return new APIResponse($result);
	}

}

?>
