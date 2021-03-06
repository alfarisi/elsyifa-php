<?php

class example01 extends output_html {
	
	function process() {
		$obj = new ExampleModel;
		
		$msg = elsyifa::instance()->message_receive();
        
        if (empty($msg[0])) {
            $conf_edit = elsyifa::instance()->get_config();
        } else {
            $conf_edit['app_name'] = $msg[0]['app_name'];
            $conf_edit['app_version'] = $msg[0]['app_version'];
        }
        
        $return['msg'] = $msg;
        $return['conf_edit'] = $conf_edit;
		$return['datalist'] = $obj->get_config();
		
		return $return;
	}
	
	function parse_template($data = NULL) {
		$this->tmpl->assign('URL_ACTION', './index.php?m=example&f=update');
        $this->tmpl->assign('APP_NAME', $data['conf_edit']['app_name']);
        $this->tmpl->assign('APP_VERSION', $data['conf_edit']['app_version']);
		
		$this->tmpl->assign('MSG_TEXT', $data['msg'][1]);
		$this->tmpl->assign('MSG_CSS', $data['msg'][2]);
		
		$this->tmpl->assign('datalist', $data['datalist']);
	}
	
}
?>