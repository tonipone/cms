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
		$validation = new Validate();

		if($_POST){
			$validation->check($_POST,[
				'username' => [
					'display' => "Username",
					'required' => true
				],
				'password' => [
					'display' => "Password",
					'required' => true
				]
			]);
			if($validation->passed()){
				$user = $this->UsersModel->findByUsername($_POST['username']);
				//echo password_hash("12345",PASSWORD_DEFAULT);
				//dnd(Input::get('password'));

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