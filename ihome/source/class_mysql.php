<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}

class dbstuff {
	var $querynum = 0;
	var $link;
	var $charset;
	function connect($dbhost, $dbuser, $dbpw, $dbname = '', $pconnect = 0, $halt = TRUE) {
		if($pconnect) {
			if(!$this->link = @mysql_pconnect($dbhost, $dbuser, $dbpw)) {
				$halt && $this->halt('Can not connect to MySQL server');
			}
		} else {
			if(!$this->link = @mysql_connect($dbhost, $dbuser, $dbpw, 1)) {
				$halt && $this->halt('Can not connect to MySQL server');
			}
		}

		if($this->version() > '4.1') {
			if($this->charset) {
				@mysql_query("SET character_set_connection=$this->charset, character_set_results=$this->charset, character_set_client=binary", $this->link);
			}
			if($this->version() > '5.0.1') {
				@mysql_query("SET sql_mode=''", $this->link);
			}
		}
		if($dbname) {
			@mysql_select_db($dbname, $this->link);
		}
	}

	function select_db($dbname) {
		return mysql_select_db($dbname, $this->link);
	}

	function fetch_array($query, $result_type = MYSQL_ASSOC) {
		return mysql_fetch_array($query, $result_type);
	}

	function query($sql, $type = '') {
		if(D_BUG) {
			global $_SGLOBAL;
			$sqlstarttime = $sqlendttime = 0;
			$mtime = explode(' ', microtime());
			$sqlstarttime = number_format(($mtime[1] + $mtime[0] - $_SGLOBAL['supe_starttime']), 6) * 1000;
		}
		$func = $type == 'UNBUFFERED' && @function_exists('mysql_unbuffered_query') ?
			'mysql_unbuffered_query' : 'mysql_query';
		if(!($query = $func($sql, $this->link)) && $type != 'SILENT') {
			$this->halt('MySQL Query Error', $sql);
		}
		if(D_BUG) {
			$mtime = explode(' ', microtime());
			$sqlendttime = number_format(($mtime[1] + $mtime[0] - $_SGLOBAL['supe_starttime']), 6) * 1000;
			$sqltime = round(($sqlendttime - $sqlstarttime), 3);

			$explain = array();
			$info = mysql_info();
			if($query && preg_match("/^(select )/i", $sql)) {
				$explain = mysql_fetch_assoc(mysql_query('EXPLAIN '.$sql, $this->link));
			}
			$_SGLOBAL['debug_query'][] = array('sql'=>$sql, 'time'=>$sqltime, 'info'=>$info, 'explain'=>$explain);
		}
		$this->querynum++;
		return $query;
	}

	function affected_rows() {
		return mysql_affected_rows($this->link);
	}

	function error() {
		return (($this->link) ? mysql_error($this->link) : mysql_error());
	}

	function errno() {
		return intval(($this->link) ? mysql_errno($this->link) : mysql_errno());
	}

	function result($query, $row=0) {
		$query = @mysql_result($query, $row);
		return $query;
	}

	function num_rows($query) {
		$query = mysql_num_rows($query);
		return $query;
	}

	function num_fields($query) {
		return mysql_num_fields($query);
	}

	function free_result($query) {
		return mysql_free_result($query);
	}

	function insert_id() {
		return ($id = mysql_insert_id($this->link)) >= 0 ? $id : $this->result($this->query("SELECT last_insert_id()"), 0);
	}

	function fetch_row($query) {
		$query = mysql_fetch_row($query);
		return $query;
	}

	function fetch_fields($query) {
		return mysql_fetch_field($query);
	}

	function version() {
		return mysql_get_server_info($this->link);
	}

	function close() {
		return mysql_close($this->link);
	}


/*
	function halt($message = '', $sql = '') {
		$dberror = $this->error();
		$dberrno = $this->errno();
		$help_link = "http://faq.comsenz.com/?type=mysql&dberrno=".rawurlencode($dberrno)."&dberror=".rawurlencode($dberror);
		echo "<div style=\"position:absolute;font-size:11px;font-family:verdana,arial;background:#EBEBEB;padding:0.5em;\">
				<b>MySQL Error</b><br>
				<b>Message</b>: $message<br>
				<b>SQL</b>: $sql<br>
				<b>Error</b>: $dberror<br>
				<b>Errno.</b>: $dberrno<br>
				<a href=\"$help_link\" target=\"_blank\">Click here to seek help.</a>
				</div>";
		exit();
	}
*/


	function halt($message = '', $sql = '') {
		$dberror = $this->error();
		$dberrno = $this->errno();
		$help_link = "mailto:ihome@buaa.edu.cn";
		echo "<div style=\"position:absolute;font-size:11px;font-family:verdana,arial;background:#FAFAFA;padding:1.5em;\">
				<b>ihome@MySQL Error</b><br>
				<b>Message</b>: $message<br>
				<b>Errno.</b>: $dberrno<br>
				<a href=\"$help_link\" target=\"_blank\">ihome@buaa.edu.cn</a>
				</div>";
		exit();
	}
}

class mysqlproxy extends dbstuff
{
	var $rdb;
	var $dbhost;
	var $dbuser;
	var $dbpw;
	var $dbname;
	var $pconnect;
	var $halt;
	var $writeable;

	function connect($dbhost, $dbuser, $dbpw, $dbname = '', $pconnect = 0, $halt = TRUE) {
		$this->dbhost = $dbhost;
		$this->dbuser = $dbuser;
		$this->dbpw = $dbpw;
		$this->dbname = $dbname;
		$this->pconnect = $pconnect;
		$this->halt = $halt;
		$this->writeable = false;
	}

	function query($sql, $type = '') 
	{
		if (preg_match("/^\\s*[Ss][Ee][Ll][Ee][Cc][Tt]/", $sql))
		{ 
              return $this->rdb->query($sql, $type);
        } 
        if(!$this->writeable)
        	{
        		dbstuff::connect($this->dbhost, $this->dbuser, $this->dbpw, $this->dbname, $this->pconnect, $this->halt);
        		$this->writeable = true;
        	}
		return dbstuff::query($sql, $type);
	}

	function close() {
		$this->rdb->close();
		return dbstuff::close();
	}

	function fetch_array($query)
	{
		return $this->rdb->fetch_array($query);
	}
}
?>
