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

if (!empty($_GET['m'])) {
	$modul = madani::instance()->check_query($_GET['m']) ? $_GET['m'] : $sysconf['default_module'];
} else {
	$modul = $sysconf['default_module'];
}

define('MODULE', $modul);

if (!empty($_GET['f'])) {
	$sub_modul = madani::instance()->check_query($_GET['f']);
	if ($sub_modul) {
		$modfile = ROOT_DIR.'modules/'.MODULE.'/controller/'.$sub_modul.'.php';
		define('SUBMODULE', $sub_modul);
	} else {
		$sub_modul = MODULE;
		$modfile = ROOT_DIR.'modules/'.MODULE.'/controller/'.$sub_modul.'.php';
		define('SUBMODULE', $sub_modul);
	}
} else {
	$sub_modul = MODULE;
	$modfile = 'modules/'.MODULE.'/controller/'.$sub_modul.'.php';
	define('SUBMODULE', $sub_modul);
}

$existed = file_exists($modfile);

if ($existed) {
	define('INMODUL', true);
	if (file_exists('modules/'.MODULE.'/model/'.MODULE.'.sql.php')) {
		require_once 'modules/'.MODULE.'/model/'.MODULE.'.sql.php';
	}
	if (file_exists('modules/'.MODULE.'/model/'.MODULE.'.class.php')) {
		require_once 'modules/'.MODULE.'/model/'.MODULE.'.class.php';
	}
	require_once $modfile;
} else {
	if ($modul == $sysconf['default_module']) {
		echo 'Module not found';
	} else {
		header('location: ./');
		exit;
	}
}

if (defined('INMODUL')) {
	$obj = new $sub_modul;
	$obj->set_template();
	$data = $obj->process();
	$obj->parse_template($data);
	$obj->display_template();
}

?>