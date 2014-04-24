<?php

class captcha extends output_none {
	
	function process() {
		$obj = new CaptchaModel;
		
		$query = $_GET['code'];
		$randomcode = preg_replace("#\D#", "", $query);
		
		if (empty($_SESSION["{$obj->sysconf['cookie_name']}"]["captcha"]) || $_SESSION["{$obj->sysconf['cookie_name']}"]["captcha"]["randomcode"] != $randomcode) {
			exit;
		}

		$code = $_SESSION["{$obj->sysconf['cookie_name']}"]["captcha"]["code"];

		$image = ImageCreateFromJPEG("tpl/images/code_bg.jpg");
		$text_color = ImageColorAllocate($image, 70, 70, 70);

		header("Content-type: image/jpeg");
		imagestring ($image, 5, 12, 2, $code, $text_color);
		imagejpeg($image);
		imagedestroy($image);
	
	}
	
	function parse_template($data = NULL) {}
}
?>