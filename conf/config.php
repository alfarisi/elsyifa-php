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

// dbtype option: none, mysql
$sysconf['dbtype'] = "mysql";
$sysconf['dbhost'] = "localhost";
$sysconf['dbport'] = "3306";
$sysconf['dbuser'] = "root";
$sysconf['dbpass'] = "password";
$sysconf['dbname'] = "elsyifa-community";

$sysconf['default_module'] = 'home';
$sysconf['cookie_name']    = 'elSyifa-PHP';

// only work if ini_set() function is enabled (PHP default configuration)
$sysconf['err_display'] = 1;	// display error, for debugging purpose, 1 or 0
$sysconf['exec_time']   = 60;	// max execution time

?>