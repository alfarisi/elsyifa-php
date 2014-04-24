<?php

class update extends output_none {

	function process() {
		$obj = new ExampleModel;
		$ok  = false;
		
		if (isset($_POST)) {
            $obj->start_transaction();
            
			$ok = $obj->update_config('app_name', $_POST['app_name']);
			if ($ok) {
                $ok = $obj->update_config('app_version', $_POST['app_version']);
			}
			
            $obj->end_transaction($ok);
		}
		
		
		if ($ok) {
			elsyifa::instance()->message_send('example', 'example01', '', 'You have successfully updated', 'success');
		} else {
			elsyifa::instance()->message_send('example', 'example01', $_POST, 'Update Failed..', 'warning');
		}
		
		elsyifa::instance()->redirect('./index.php?m=example#ui-tabs-1');
		return $ok;
	}
	
	function parse_template($data = NULL) { }
}

?>