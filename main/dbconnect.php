<?php
/*
+----------------------------------------------------------------------------+
|   elSyifa PHP Framework
|   Copyright 2010-2013, Al Farisi and Indokreatif Teknologi
|   Website
|   - http://www.indokreatif.net
|   - https://github.com/alfarisi/elsyifa-php
|   - http://alfarisi.web.id
+----------------------------------------------------------------------------+
*/

if (!defined('INIT_LOADED')) { exit; }

require_once ROOT_DIR . 'main/database/' . $sysconf['dbtype'] . '.php';

$db = new db();
$db->connect(
    $sysconf['dbhost'], $sysconf['dbport'], $sysconf['dbuser'],
    $sysconf['dbpass'], $sysconf['dbname']
);

$dbconn_id = $db->conn_id;

if (!$dbconn_id) {
    $exitmsg = "<div align='center'>There seems to be a problem with database connection.</div>";
	exit($exitmsg);
}

?>