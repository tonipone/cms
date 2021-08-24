<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 16/08/21
 * Time: 17:01
 */

class Register extends Controller {

	public function __construct( $controller, $action ) {
		parent::__construct( $controller, $action );
		$this->view->setLayout('default');
	}

	public function loginAction(){
		echo  password_hash('password',PASSWORD_DEFAULT);
		$this->view->render('register/login');
	}
}