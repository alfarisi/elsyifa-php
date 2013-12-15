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

require_once ROOT_DIR . 'main/database/' . $sysconf['dbtype'] . '.php';

$db = new db();
$db->connect(
    $sysconf['dbhost'], $sysconf['dbport'], $sysconf['dbuser'],
    $sysconf['dbpass'], $sysconf['dbname']
);

$dbconn_id = $db->conn_id;

if (!$dbconn_id) {
    $exitmsg = "
		<div align='center'><pre>


There seems to be a problem with database connection.


---
Al Farisi
elfarish [at] gmail.com
<a href='http://alfarisi.web.id' target='_blank'>www.alfarisi.web.id</a>


Indokreatif Teknologi
Technology Serving Humanity
<a href='http://www.indokreatif.net' target='_blank'>www.indokreatif.net</a>
		</pre></div>
	";
	
	exit($exitmsg);
}

?>