<?php

class DB {
	private static $_instance = null;
	private $_pdo, $_query, $_error, $_result, $_count = 0, $_lastInsertID = null;
	private $var = 0;

	private function __construct() {
		$this->var =1;
		try{
			$this->_pdo = new PDO("mysql:host=localhost;dbname=ap_mvc","root","root");
		}catch (PDOException $e){
			die($e->getMessage());
		}
	}
}

