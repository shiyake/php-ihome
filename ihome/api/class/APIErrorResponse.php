<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}

// 服务器返回结果对象
class APIErrorResponse {

	var $errCode = 0;
	
	var $errMessage = '';

	function APIErrorResponse($errCode, $errMessage) {
		$this->errCode = $errCode;
		$this->errMessage = $errMessage;
	}

	function getErrCode() {
		return $this->errCode;
	}

	function getErrMessage() {
		return $this->errMessage;
	}

	function getResult() {
		return null;
	}
}
?>
