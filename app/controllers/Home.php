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
		$sql = "SELECT * FROM contacts";
		$contactsQ = $db->query($sql);
		dnd($contactsQ);
		$this->view->render('home/index');
	}
}