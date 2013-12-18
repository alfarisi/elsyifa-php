<?php

class example02a extends output_html {

	function process() {
		$msg = madani::instance()->message_receive();
		
		if (!empty($msg[0])) {
            $data = $msg[0];
        } else {
            $data['name'] = '';
            $data['address'] = '';
            $data['city'] = '';
            $data['postcode'] = '';
            $data['dob'] = '';
            $data['phone'] = '';
            $data['email'] = '';
            $data['other_info'] = '';
        }
		
		
		$return['msg'] = $msg;
		$return['data'] = $data;
		$return['captcha'] = madani::instance()->get_captcha();
		
		return $return;
	}
	
	function parse_template($data = NULL) {
		$this->tmpl->assign('url_action', './index.php?m=example&f=add');
		
		$this->tmpl->assign('msg_text', $data['msg'][1]);
		$this->tmpl->assign('msg_css', $data['msg'][2]);
		
		$this->tmpl->assign('randomcode', $data['captcha'][0]);
		$this->tmpl->assign('code', $data['captcha'][1]);
		
		$this->tmpl->assign($data['data']);
	}
}

?>