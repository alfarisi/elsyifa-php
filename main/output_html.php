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
require_once ROOT_DIR . 'lib/rain.tpl.class.php';

class output_html {

	var $tmpl;
	var $rainConfig = array(
		"base_url"     => null,
		"tpl_dir"      => "",
		"cache_dir"    => "cache/",
		"path_replace" => false
	);
	
	function __construct() {
		$this->rain_configure($this->rainConfig);
		$this->tmpl = new RainTPL();
	}
	
	function main_template() {
		$this->main_template_file = 'tpl/document';
	}
	
	function set_template() {
		if (TYPE != 'COMPONENT') {
			$this->main_template();
			$this->content_template_file = 'modules/' .MODULE. '/view/' . SUBMODULE;
		} else {
			$this->main_template_file = 'modules/' .MODULE. '/view/' . SUBMODULE;
			$this->content_template_file = 'modules/' .MODULE. '/view/' . SUBMODULE;
		}
	}
	
	// these two functions will be deleted
	function set_template_dir($tmpldir) {
		$this->tmpl->setRoot($tmpldir);
	}
	
	function set_template_file($tmplfile) {
		$this->tmpl->readTemplatesFromInput($tmplfile);
	}
	//
	
	function rain_configure($setting, $value=null) {
		raintpl::configure($setting, $value);
	}
	
	function display_template() {
		$this->tmpl->assign('tpl_content', $this->content_template_file);
		$this->tmpl->draw("{$this->main_template_file}");
	}

}

?>