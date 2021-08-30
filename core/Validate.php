<?php

/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 30/08/21
 * Time: 08:56
 */
class Validate {
	private $_passed = false, $_errors =[], $_db =null;

	public function __construct() {
		$this->_db = DB::getInstance();
	}

	public function check($source, $items=[]){
		$this->_errors = [];
		foreach ( $items as $item => $rules ) {
			$item = Input::sanitize($item);
			$display = $rules['display'];
			foreach ( $rules as $rule => $rule_value ) {
				$value = Input::sanitize(trim($source[$item]));

				if($rule == 'required' && empty($value)){
					$this->addError(["{$display} is required", $item]);
				} else if(!empty($value)){
					switch ($rule){
						case 'min':
							if(strlen($value) < $rule_value){
								$this->addError(["{$display} must be a minimum of {$rule_value} characters", $item]);
							}
							break;
						case max:
							if(strlen($value) > $rule_value){
								$this->addError(["{$display} must be a maximum of {$rule_value} characters", $item]);
							}
							break;
						case 'matches':
							if($value != $source[$rule_value]){
								$matchDisplay = $items[$rule_value]['display'];
								$this->addError(["{$matchDisplay} and {$display} must match"],$item);
							}
							break;
						case 'unique':
							$check = $this->_db->query("SELECT {$item} FROM {$rule_value} WHERE {$item} = ? ", [$value]);
					}
				}
			}

		}
	}

	public function addError($error){
		$this->_errors[] = $error;
		if(empty($this->_errors)){
			$this->_passed = true;
		} else {
			$this->_passed = false;
		}
	}


}