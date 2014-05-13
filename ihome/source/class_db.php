<?

/*	[iBUAA] (C)2012-2111 BUAANIC . 
	Create By 
	Last Modfile By 
	Last Time : 
*/

if(!defined('iBUAA')) {
	exit('Access Denied');
}

class db_mysql
{
	var $tablepre;
	var $version = '';
	var $querynum = 0;
	var $slaveid = 0;
	var $curlink;
	var $link = array();
	var $config = array();
	var $sqldebug = array();
	var $map = array();

	function db_mysql($config = array()) {
		if(!empty($config)) {
			$this->set_config($config);
		}
	}

	function set_config($config) {
		$this->config = &$config;
		$this->tablepre = $config['1']['tablepre'];
		if(!empty($this->config['map'])) {
			$this->map = $this->config['map'];
		}
	}

	function connect($serverid = 1) {

		if(empty($this->config) || empty($this->config[$serverid])) {
			$this->halt('config_db_not_found');
		}

		$this->link[$serverid] = $this->_dbconnect(
			$this->config[$serverid]['dbhost'],
			$this->config[$serverid]['dbuser'],
			$this->config[$serverid]['dbpw'],
			$this->config[$serverid]['dbcharset'],
			$this->config[$serverid]['dbname'],
			$this->config[$serverid]['pconnect']
			);
		$this->curlink = $this->link[$serverid];

	}

	function _dbconnect($dbhost, $dbuser, $dbpw, $dbcharset, $dbname, $pconnect) {
		$link = null;
		$func = empty($pconnect) ? 'mysql_connect' : 'mysql_pconnect';
		if(!$link = @$func($dbhost, $dbuser, $dbpw, 1)) {
			$this->halt('notconnect');
		} else {
			$this->curlink = $link;
			if($this->version() > '4.1') {
				$dbcharset = $dbcharset ? $dbcharset : $this->config[1]['dbcharset'];
				$serverset = $dbcharset ? 'character_set_connection='.$dbcharset.', character_set_results='.$dbcharset.', character_set_client=binary' : '';
				$serverset .= $this->version() > '5.0.1' ? ((empty($serverset) ? '' : ',').'sql_mode=\'\'') : '';
				$serverset && mysql_query("SET $serverset", $link);
			}
			$dbname && @mysql_select_db($dbname, $link);
		}
		return $link;
	}

	function table_name($tablename) {
		if(!empty($this->map) && !empty($this->map[$tablename])) {
			$id = $this->map[$tablename];
			if(!$this->link[$id]) {
				$this->connect($id);
			}
			$this->curlink = $this->link[$id];
		} else {
			$this->curlink = $this->link[1];
		}
		return $this->tablepre.$tablename;
	}

	function select_db($dbname) {
		return mysql_select_db($dbname, $this->curlink);
	}

	function fetch_array($query, $result_type = MYSQL_ASSOC) {
		return mysql_fetch_array($query, $result_type);
	}

	function fetch_first($sql) {
		return $this->fetch_array($this->query($sql));
	}

	function result_first($sql) {
		return $this->result($this->query($sql), 0);
	}

	function query($sql, $type = '') {

		if(defined('DISCUZ_DEBUG') && DISCUZ_DEBUG) {
			$starttime = dmicrotime();
		}
		$func = $type == 'UNBUFFERED' && @function_exists('mysql_unbuffered_query') ?
		'mysql_unbuffered_query' : 'mysql_query';
		if(!($query = $func($sql, $this->curlink))) {
			if(in_array($this->errno(), array(2006, 2013)) && substr($type, 0, 5) != 'RETRY') {
				$this->connect();
				return $this->query($sql, 'RETRY'.$type);
			}
			if($type != 'SILENT' && substr($type, 5) != 'SILENT') {
				$this->halt('query_error', $sql);
			}
		}

		if(defined('DISCUZ_DEBUG') && DISCUZ_DEBUG) {
			$this->sqldebug[] = array($sql, number_format((dmicrotime() - $starttime), 6), debug_backtrace());
		}

		$this->querynum++;
		return $query;
	}

	function affected_rows() {
		return mysql_affected_rows($this->curlink);
	}

	function error() {
		return (($this->curlink) ? mysql_error($this->curlink) : mysql_error());
	}

	function errno() {
		return intval(($this->curlink) ? mysql_errno($this->curlink) : mysql_errno());
	}

	function result($query, $row = 0) {
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
		return ($id = mysql_insert_id($this->curlink)) >= 0 ? $id : $this->result($this->query("SELECT last_insert_id()"), 0);
	}

	function fetch_row($query) {
		$query = mysql_fetch_row($query);
		return $query;
	}

	function fetch_fields($query) {
		return mysql_fetch_field($query);
	}

	function version() {
		if(empty($this->version)) {
			$this->version = mysql_get_server_info($this->curlink);
		}
		return $this->version;
	}

	function close() {
		return mysql_close($this->curlink);
	}

	function halt($message = '', $sql = '') {
		require_once libfile('class/error');
		discuz_error::db_error($message, $sql);
	}

}

class DB
{

	function table($table) {
		return DB::_execute('table_name', $table);
	}

	function delete($table, $condition, $limit = 0, $unbuffered = true) {
		if(empty($condition)) {
			$where = '1';
		} elseif(is_array($condition)) {
			$where = DB::implode_field_value($condition, ' AND ');
		} else {
			$where = $condition;
		}
		$sql = "DELETE FROM ".DB::table($table)." WHERE $where ".($limit ? "LIMIT $limit" : '');
		return DB::query($sql, ($unbuffered ? 'UNBUFFERED' : ''));
	}

	function insert($table, $data, $return_insert_id = false, $replace = false, $silent = false) {

		$sql = DB::implode_field_value($data);

		$cmd = $replace ? 'REPLACE INTO' : 'INSERT INTO';

		$table = DB::table($table);
		$silent = $silent ? 'SILENT' : '';

		$return = DB::query("$cmd $table SET $sql", $silent);

		return $return_insert_id ? DB::insert_id() : $return;

	}

	function update($table, $data, $condition, $unbuffered = false, $low_priority = false) {
		$sql = DB::implode_field_value($data);
		$cmd = "UPDATE ".($low_priority ? 'LOW_PRIORITY' : '');
		$table = DB::table($table);
		$where = '';
		if(empty($condition)) {
			$where = '1';
		} elseif(is_array($condition)) {
			$where = DB::implode_field_value($condition, ' AND ');
		} else {
			$where = $condition;
		}
		$res = DB::query("$cmd $table SET $sql WHERE $where", $unbuffered ? 'UNBUFFERED' : '');
		return $res;
	}

	function implode_field_value($array, $glue = ',') {
		$sql = $comma = '';
		foreach ($array as $k => $v) {
			$sql .= $comma."`$k`='$v'";
			$comma = $glue;
		}
		return $sql;
	}

	function insert_id() {
		return DB::_execute('insert_id');
	}

	function fetch($resourceid, $type = MYSQL_ASSOC) {
		return DB::_execute('fetch_array', $resourceid, $type);
	}

	function fetch_first($sql) {
		DB::checkquery($sql);
		return DB::_execute('fetch_first', $sql);
	}

	function result($resourceid, $row = 0) {
		return DB::_execute('result', $resourceid, $row);
	}

	function result_first($sql) {
		DB::checkquery($sql);
		return DB::_execute('result_first', $sql);
	}

	function query($sql, $type = '') {
		DB::checkquery($sql);
		return DB::_execute('query', $sql, $type);
	}

	function num_rows($resourceid) {
		return DB::_execute('num_rows', $resourceid);
	}

	function affected_rows() {
		return DB::_execute('affected_rows');
	}

	function free_result($query) {
		return DB::_execute('free_result', $query);
	}

	function error() {
		return DB::_execute('error');
	}

	function errno() {
		return DB::_execute('errno');
	}

	function _execute($cmd , $arg1 = '', $arg2 = '') {
		static $db;
		if(empty($db)) $db = & DB::object();
		$res = $db->$cmd($arg1, $arg2);
		return $res;
	}

	function &object($dbclass = 'db_mysql') {
		static $db;
		if(empty($db)) $db = new $dbclass();
		return $db;
	}

	function checkquery($sql) {
		static $status = null, $checkcmd = array('SELECT', 'UPDATE', 'INSERT', 'REPLACE', 'DELETE');
		if($status === null) $status = getglobal('config/security/querysafe/status');
		if($status) {
			$cmd = trim(strtoupper(substr($sql, 0, strpos($sql, ' '))));
			if(in_array($cmd, $checkcmd)) {
				$test = DB::_do_query_safe($sql);
				if($test < 1) DB::_execute('halt', 'security_error', $sql);
			}
		}
		return true;
	}

	function _do_query_safe($sql) {
		static $_CONFIG = null;
		if($_CONFIG === null) {
			$_CONFIG = getglobal('config/security/querysafe');
		}

		$sql = str_replace(array('\\\\', '\\\'', '\\"', '\'\''), '', $sql);
		$mark = $clean = '';
		if(strpos($sql, '/') === false && strpos($sql, '#') === false && strpos($sql, '-- ') === false) {
			$clean = preg_replace("/'(.+?)'/s", '', $sql);
		} else {
			$len = strlen($sql);
			$mark = $clean = '';
			for ($i = 0; $i <$len; $i++) {
				$str = $sql[$i];
				switch ($str) {
					case '\'':
						if(!$mark) {
							$mark = '\'';
							$clean .= $str;
						} elseif ($mark == '\'') {
							$mark = '';
						}
						break;
					case '/':
						if(empty($mark) && $sql[$i+1] == '*') {
							$mark = '/*';
							$clean .= $mark;
							$i++;
						} elseif($mark == '/*' && $sql[$i -1] == '*') {
							$mark = '';
							$clean .= '*';
						}
						break;
					case '#':
						if(empty($mark)) {
							$mark = $str;
							$clean .= $str;
						}
						break;
					case "\n":
						if($mark == '#' || $mark == '--') {
							$mark = '';
						}
						break;
					case '-':
						if(empty($mark)&& substr($sql, $i, 3) == '-- ') {
							$mark = '-- ';
							$clean .= $mark;
						}
						break;

					default:

						break;
				}
				$clean .= $mark ? '' : $str;
			}
		}

		$clean = preg_replace("/[^a-z0-9_\-\(\)#\*\/\"]+/is", "", strtolower($clean));

		if($_CONFIG['afullnote']) {
			$clean = str_replace('/**/','',$clean);
		}

		if(is_array($_CONFIG['dfunction'])) {
			foreach($_CONFIG['dfunction'] as $fun) {
				if(strpos($clean, $fun.'(') !== false) return '-1';
			}
		}

		if(is_array($_CONFIG['daction'])) {
			foreach($_CONFIG['daction'] as $action) {
				if(strpos($clean,$action) !== false) return '-3';
			}
		}

		if($_CONFIG['dlikehex'] && strpos($clean, 'like0x')) {
			return '-2';
		}

		if(is_array($_CONFIG['dnote'])) {
			foreach($_CONFIG['dnote'] as $note) {
				if(strpos($clean,$note) !== false) return '-4';
			}
		}

		return 1;

	}

}


?>