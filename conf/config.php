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

$sysconf['dbtype'] = "mysql";
$sysconf['dbhost'] = "localhost";
$sysconf['dbport'] = "3306";
$sysconf['dbuser'] = "root";
$sysconf['dbpass'] = "password";
$sysconf['dbname'] = "phpmadani";

$sysconf['default_module'] = 'home';
$sysconf['cookie_name']    = 'phpMadani';

// only work if ini_set() function is enabled (PHP default configuration)
$sysconf['err_display'] = 1;	// display error, for debugging purpose, 1 or 0
$sysconf['exec_time']   = 60;	// max execution time

?>