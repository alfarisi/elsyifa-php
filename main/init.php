<?php
/*
+----------------------------------------------------------------------------+
|   Copyright (c) 2010 by Al Farisi
|   E-mail  : elfarish@gmail.com
|   Website : www.alfarisi.web.id
|             www.indokreatif.net
+----------------------------------------------------------------------------+
*/

while(@ob_end_clean());
ob_start();

$register_globals = true;
if (function_exists('ini_get')) {
	$register_globals = @ini_get('register_globals');
}

if ($register_globals == true) {
	while (list($global) = each($GLOBALS)) {
		if (!preg_match('/^(_POST|_GET|_COOKIE|_SERVER|_FILES|GLOBALS|HTTP.*|_REQUEST)$/', $global)) {
			unset($$global);
		}
	}
	unset($global);
}

$phpver = phpversion();
if ($phpver < '4.1.0') {
	$_GET = $HTTP_GET_VARS;
	$_POST = $HTTP_POST_VARS;
	$_SERVER = $HTTP_SERVER_VARS;
	$_FILES = $HTTP_POST_FILES;
	$_COOKIE = $HTTP_COOKIE_VARS;
	$_SESSION = $HTTP_SESSION_VARS;
}

if (stristr($_SERVER['SCRIPT_NAME'], 'init.php')) {
	header('location: ../');
	exit;
}

$inArray = array("'", "/**/", "/UNION/", "/SELECT/", "AS ");
foreach($inArray as $res) {
	if (stristr($_SERVER['QUERY_STRING'], $res)) {
		exit("Access denied.");
	}
}

define('INIT_LOADED', true);

$inc_path = explode(PATH_SEPARATOR, @ini_get('include_path'));
if ($inc_path[0] != ".") {
	array_unshift($inc_path, ".");
	$inc_path = implode(PATH_SEPARATOR, $inc_path);
	@ini_set("include_path", $inc_path);
}
unset($inc_path);

@ini_set('magic_quotes_runtime', 0);
@ini_set('magic_quotes_sybase', 0);
@ini_set('arg_separator.output', '&amp;');
@ini_set('session.use_only_cookies', 1);
@ini_set('session.use_trans_sid', 0);

define("MAGIC_QUOTES_GPC", (@ini_get('magic_quotes_gpc') ? true : false));

if (preg_match("#\[(.*?)](.*)#", $_SERVER['QUERY_STRING'], $matches)) {
	define('MYSELF', './index.php?' . $matches[2]);
} else {
	define('MYSELF', './index.php?' . $_SERVER['QUERY_STRING']);
}

if (isset($_GET['type']) && $_GET['type'] == 'component') {
	define('TYPE', 'COMPONENT');
} else {
	define('TYPE', 'FULLPAGE');
}

require_once ROOT_DIR . 'conf/config.php';

@ini_set('display_errors', $sysconf['err_display']);
@ini_set('max_execution_time', $sysconf['exec_time']);

require_once 'dbconnect.php';
require_once ROOT_DIR . 'main/output.php';
require_once ROOT_DIR . 'main/madani.php';

session_start();

?>