<?php
/*
+----------------------------------------------------------------------------+
|   Copyright (c) 2010 by Al Farisi
|   E-mail  : elfarish@gmail.com
|   Website : www.alfarisi.web.id
|             www.indokreatif.net
+----------------------------------------------------------------------------+
*/

require_once ROOT_DIR . 'main/query.sql.php';

class madani extends db {
	
	static $o = NULL;
	
	function __construct() {
		parent::__construct();
	}
	
	public static function &instance() {
		if (self::$o == NULL) {
			$class_name = __CLASS__;
			self::$o = new $class_name();
		}
		return self::$o;
	}
	
	//common function
	function get_config() {
		$result = $this->open($this->sql_main['get_config'], array());
		
		$conf = array();
		for ($i=0; $i<count($result); $i++) {
			$name = $result[$i]['name'];
			$conf["{$name}"] = $result[$i]['value'];
		}
		
		return $conf;
	}
	
	
	// captcha
	function verify_code($randomcode, $checkstr) {
		if (!empty($_SESSION["{$this->sysconf['cookie_name']}"]["captcha"]) &&
		$_SESSION["{$this->sysconf['cookie_name']}"]["captcha"]["randomcode"] == $randomcode) {
			$code = $_SESSION["{$this->sysconf['cookie_name']}"]["captcha"]["code"];
			$_SESSION["{$this->sysconf['cookie_name']}"]["captcha"] = '';
			return ($checkstr == $code);
		}
		return false;
	}

	function get_captcha() {
		mt_srand ((double)microtime() * 1000000);
		$maxran = 1000000;
		$rand_num = mt_rand(0, $maxran);
		$rcode = hexdec(md5($_SERVER['HTTP_USER_AGENT'] . $_SERVER['SERVER_NAME'] . $rand_num . time()));
		$code = substr($rcode, 2, 6);
		
		list($usec, $sec) = explode(" ", microtime());
		$randomcode = str_replace(".", "", $sec.$usec);
		$code_tmpl = (extension_loaded("gd") ? "" : $code);
		
		$_SESSION["{$this->sysconf['cookie_name']}"]["captcha"]["randomcode"] = $randomcode;
		$_SESSION["{$this->sysconf['cookie_name']}"]["captcha"]["code"] = $code;
		
		return array($randomcode, $code_tmpl);
	}
    
	function message_send($modul, $submodul, $data='', $pesan='', $css='warning') {
		$nama = $modul . '---' . $submodul;
		$_SESSION["{$this->sysconf['cookie_name']}"]["message"]["{$nama}"][0] = $data;
		$_SESSION["{$this->sysconf['cookie_name']}"]["message"]["{$nama}"][1] = $pesan;
		$_SESSION["{$this->sysconf['cookie_name']}"]["message"]["{$nama}"][2] = $css;
	}
	
	function message_receive() {
		$nama = MODULE . '---' . SUBMODULE;
		$data = array();
		if (!empty($_SESSION["{$this->sysconf['cookie_name']}"]["message"]["{$nama}"])) {
			$data[0] = $_SESSION["{$this->sysconf['cookie_name']}"]["message"]["{$nama}"][0];
			$data[1] = $_SESSION["{$this->sysconf['cookie_name']}"]["message"]["{$nama}"][1];
			$data[2] = $_SESSION["{$this->sysconf['cookie_name']}"]["message"]["{$nama}"][2];
		} else {
			$data = false;
		}
		
		$_SESSION["{$this->sysconf['cookie_name']}"]["message"]["{$nama}"] = '';
		return $data;
	}
	
	function redirect($url) {
		header("location: {$url}");
		exit;
	}

	function check_query($query) {
		return preg_match("/^[_a-zA-Z0-9-]+$/" , $query) ? $query : false;
	}

}

?>