<?php

class DB {
	private static $_instance = null;
	private $_pdo, $_query, $_error, $_result, $_count = 0, $_lastInsertID = null;

	public function __construct() {
		try{
			$this->_pdo = new PDO('mysql:host=127.0.0.1;dbname=ap_mvc','root','root');
		}catch (PDOException $e){
			die($e->getMessage());
		}
	}
}

