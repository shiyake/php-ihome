<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}

class APIResponse {

	var $result;

	var $mode;

	function APIResponse($res, $mode = null) {
		$this->result = $res;
		$this->mode = $mode;
	}

	function getResult() {
		return $this->result;
	}

	function getMode() {
		return $this->mode;
	}
}

?>
