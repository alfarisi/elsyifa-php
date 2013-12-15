<?php
/*
+----------------------------------------------------------------------------+
|   Copyright (c) 2010-2013 by Al Farisi & Indokreatif Teknologi
|   E-mail  : info [at] indokreatif.net
|   Website : www.indokreatif.net
|             www.alfarisi.web.id
+----------------------------------------------------------------------------+
*/

if (!defined('INIT_LOADED')) { exit; }

require_once ROOT_DIR . 'lib/rain.tpl.class.php';
require_once ROOT_DIR . 'lib/patTemplate/patTemplate.php';
require_once ROOT_DIR . 'lib/patError/patErrorManager.php';

class output_html {

	var $tmpl;
	var $engine = 'rain';
	var $rainConfig = array(
		"base_url"     => null,
		"tpl_dir"      => "",
		"cache_dir"    => "cache/",
		"path_replace" => false
	);
	
	function __construct() {
		if ($this->engine == 'patTemplate') {
			$this->tmpl = &new patTemplate();
		} else {
			$this->rain_configure($this->rainConfig);
			$this->tmpl = new RainTPL();
		}
	}
	
	function main_template() {
		if ($this->engine == 'patTemplate') {
			$this->set_template_dir(ROOT_DIR . 'main/template_pat');
			$this->set_template_file('document.html');
			$this->set_template_file('top_menu.html');
		} else {
			$this->main_template_file = 'main/template/document';
		}
	}
	
	function set_template() {
		if ($this->engine == 'patTemplate') {
			if (TYPE != 'COMPONENT') {
				$this->main_template();
			}
			$this->set_template_dir(ROOT_DIR . 'modules/' .MODULE. '/view');
			$this->set_template_file(SUBMODULE.'.html');
		} else {
			if (TYPE != 'COMPONENT') {
				$this->main_template();
				$this->content_template_file = 'modules/' .MODULE. '/view/' . SUBMODULE;
			} else {
				$this->main_template_file = 'modules/' .MODULE. '/view/' . SUBMODULE;
				$this->content_template_file = 'modules/' .MODULE. '/view/' . SUBMODULE;
			}
		}
	}
	
	function set_template_dir($tmpldir) {
		$this->tmpl->setRoot($tmpldir);
	}
	
	function set_template_file($tmplfile) {
		$this->tmpl->readTemplatesFromInput($tmplfile);
	}
	
	function rain_configure($setting, $value=null) {
		raintpl::configure($setting, $value);
	}
	
	function display_template() {
		if ($this->engine == 'patTemplate') {
			$this->tmpl->displayParsedTemplate();
		} else {
			$this->tmpl->assign('tpl_content', $this->content_template_file);
			$this->tmpl->draw("{$this->main_template_file}");
		}
	}

}

?>