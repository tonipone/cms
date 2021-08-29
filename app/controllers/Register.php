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
		$this->load_model('Users');
		$this->view->setLayout('default');
	}

	public function loginAction(){
		// echo  password_hash('password',PASSWORD_DEFAULT);
		if($_POST){
			$validation = true;
			if($validation == true){
				$user = $this->UsersModel->findByUsername($_POST['username']);
				//dnd($user);
				if($user && password_verify(Input::get('password'), $user->password)){
					$remember = (isset($_POST['remember_me']) && Input::get('remember_me')) ? true : false;
					$user->login($remember);
					Router::redirect('');
				}
			}
		}
		$this->view->render('register/login');
	}
}