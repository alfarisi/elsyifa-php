<?php

class add extends output_none {

	function process() {
		$obj = new ExampleModel;
		$obj->start_transaction();
		$ok  = false;
		
		if (isset($_POST)) {
			$ok = elsyifa::instance()->verify_code($_POST['randomcode'], $_POST['captcha']);
			if ($ok) {
				$ok = $obj->add_data($_POST);
			}
		}
		
		if ($ok) {
			elsyifa::instance()->message_send('example', 'example02a', '', 'Thank you for applying. If you are selected for interview, we shall contact you within five working days.', 'success');
		} else {
			elsyifa::instance()->message_send('example', 'example02a', $_POST, 'Data submission failed. Please enter the required fields and re-submit your data.', 'warning');
		}
		
		$obj->end_transaction($ok);
		elsyifa::instance()->redirect('./index.php?m=example#ui-tabs-2');
		return $ok;
	}
	
	function parse_template($data = NULL) { }
}

?>