<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 16/08/21
 * Time: 17:01
 */

class Home extends Controller {

	public function __construct( $controller, $action ) {
		parent::__construct( $controller, $action );

	}

	public function indexAction(){
		$db = DB::getInstance();

		$contacts = $db->find('contacts',[
			'conditions' => ['fname = ?','lname = ?'],
			'bind' => ['Pasquale','Esposito'],
			'order' => "lname, fname",
			'limit' => 1
		]);
		dnd($contacts);
		$this->view->render('home/index');
	}
}