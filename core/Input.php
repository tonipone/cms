<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 29/08/21
 * Time: 13:07
 */

class Input {
	public static function sanitize($dirty){
		return htmlentities($dirty, ENT_QUOTES, "UTF-8");
	}

	public static function get($input){
		if(isset($_POST[$input])){
			return self::sanitize($_POST[$input]);
		}else{
			if(isset($_GET[$input])){
				return self::sanitize($_GET[$input]);
			}
		}
	}
}