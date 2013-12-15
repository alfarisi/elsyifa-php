<?php
/*
+----------------------------------------------------------------------------+
|   Copyright (c) 2010 by Al Farisi
|   E-mail  : elfarish@gmail.com
|   Website : www.alfarisi.web.id
|             www.indokreatif.net
+----------------------------------------------------------------------------+
*/

if (!defined('INIT_LOADED')) { exit; }

class db {

	var $conn_id;
	var $sysconf;
	
	function db() {
		global $sql, $sql_main, $dbconn_id, $sysconf;
		
		$this->sql = $sql;
		$this->sql_main = $sql_main;
		$this->conn_id = $dbconn_id;
		$this->sysconf = $sysconf;
	}
	
	function connect($dbhost, $dbport, $dbuser, $dbpass, $dbname) {
		if ($dbport != '') {
			$host = "{$dbhost}:{$dbport}";
		} else {
			$host = $dbhost;
		}
		
		$this->conn_id = mysql_connect($host, $dbuser, $dbpass);
		if($this->conn_id) {
			$dbselect = mysql_select_db($dbname);
			if(!$dbselect) {
				mysql_close($this->conn_id);
				$this->conn_id = false;
			}
		}
		return $this->conn_id;
	}
	
	function open($query, $params=array()) {
		$do_query = $this->sql_query($query, $params);
		$result = array();
		while ($row = $this->sql_fetch($do_query)) {
			$result[] = $this->parsing_text($row);
		}
		return $result;
	}

	function execute($query, $params=array()) {
		$result = $this->sql_query($query, $params);
		return $result;
	}
	
	function last_insert_id() {
		$result = $this->open("SELECT LAST_INSERT_ID() as `id`", array());
		return $result[0]['id'];
	}
	
	function start_transaction() {
		$result = $this->sql_query("BEGIN", array());
		return $result;
	}
	
	function end_transaction($status) {
		if ($status) {
			$result = $this->sql_query("COMMIT", array());
		} else {
			$result = $this->sql_query("ROLLBACK", array());
		}
		return $result;
	}

	private function sql_query($query, $params) {
		$query = $this->parsing_query($query, $params);
		$result = mysql_query($query, $this->conn_id);
		return $result;
	}

	private function sql_fetch($result, $type=MYSQL_BOTH) {
		$result = mysql_fetch_array($result, $type);
		return $result;
	}
	
	private function parsing_query($sql, $params) {
		foreach ($params as $k => $v) {
			if (MAGIC_QUOTES_GPC) {
				$params[$k] = stripslashes($params[$k]);
			}
			
			$search = array('$', '"', "'", '\\', '<?');
			$replace = array('&#036;','&quot;','&#039;', '&#092;', '&lt?');
			$params[$k] = str_replace($search, $replace, $params[$k]);
		}
		$param_serialized = "'" . implode("', '", $params) . "'";
		eval('$sql_parsed = sprintf("' . $sql . '", ' . $param_serialized . ');');
		return $sql_parsed;
	}
	
	private function parsing_text($params) {
		foreach ($params as $k => $v) {
			$search = array('&#39;', '&#039;', '&quot;', 'onerror', '&gt;', '&amp;#039;', '&amp;quot;');
			$replace = array("'", "'", '"', 'one<i></i>rror', '>', "'", '"');
			$params[$k] = str_replace($search, $replace, $params[$k]);
		}
		
		return $params;
	}

}

?>