<?php

class ExampleModel extends db {
	
	function __construct() {
		parent::__construct();
	}
	
	// example 01
	function get_config() {
		$result = $this->open($this->sql['get_config'], array());
		return $result;
	}
	
	function update_config($name, $value) {
		$result = $this->execute($this->sql['update_config'], array($value, $name));
		return $result;
	}
	
	// example 02
	function add_data($data) {
		$result = $this->execute($this->sql['add_data'], array(
			$data['name'], $data['address'], $data['city'], $data['postcode'],
			$data['dob'], $data['phone'], $data['email'], $data['other_info']
		));
		
		return $result;
	}
	
	function get_data($name='') {
		$result = $this->open($this->sql['get_data'], array("%{$name}%"));
		return $result;
	}
	
}
?>
