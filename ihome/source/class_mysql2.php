<?php
define('iBUAA',0);
if(!defined('iBUAA')) {
	exit('Access Denied');
}

//include 'class_mysql.php'；
include_once('./class_mysql.php');
class mysqlproxy extends dbstuff
{
	var $rdb;
	var $wdb;

	function __construct($wdb, $rdb)
	{
		$this->$wdb = $wdb;
		$this->$rdb = $rdb;
	}

	function query($sql, $type = '') {
		if (ereg("^\\s*[Ss][Ee][Ll][Ee][Cc][Tt]", $sql))
		{ 
              return $this->$rdb.query($sql, $type);
          } 
		return $this->$wdb.query($sql, $type);
	}
}
?>