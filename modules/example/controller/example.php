<?php

class example extends output_html {

	function process() {
		$return['msg'] = madani::instance()->message_receive();
		return $return;
	}
	
	function parse_template($data = NULL) {
		$this->tmpl->assign('MSG_TEXT', $data['msg'][1]);
		$this->tmpl->assign('MSG_CSS', $data['msg'][2]);
		$this->tmpl->assign('URL_1', './index.php?m=example&f=example01&type=component');
		$this->tmpl->assign('URL_2A', './index.php?m=example&f=example02a&type=component');
		$this->tmpl->assign('URL_2B', './index.php?m=example&f=example02b&type=component');
		
	}
}

?>