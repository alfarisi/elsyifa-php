<?php

class example02b extends output_html {
	
	function process() {
		$obj = new ExampleModel;
		$msg = madani::instance()->message_receive();
		
		if (isset($_POST['name'])) {
			$name = $_POST['name'];
		} else {
			$name = '';
		}
        
        $return['msg'] = $msg;
		$return['name'] = $name;
		$return['datalist'] = $obj->get_data($name);
		
		return $return;
	}
	
	function parse_template($data = NULL) {
		$this->tmpl->assign('url_action', './index.php?m=example&f=example02b');
		$this->tmpl->assign('name', $data['name']);
		
		$this->tmpl->assign('msg_text', $data['msg'][1]);
		$this->tmpl->assign('msg_css', $data['msg'][2]);
		
		$this->tmpl->assign('datalist', $data['datalist']);
	}
	
}
?>