<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 16/08/21
 * Time: 16:44
 */

class View {
	protected $_head, $_body, $_siteTitle = SITE_TITLE, $_outputBuffer, $_layout = DEFAULT_LAYOUT;

	public function __construct() {

	}

	public function render($viewName){
		$viewAry = explode('/',$viewName);
		$viewString = implode(DS,$viewAry);
		if(file_exists(ROOT . DS . 'app' . DS . 'views' . DS . $viewString . '.php')){
			include(ROOT . DS . 'app' . DS . 'views' . DS . $viewString . '.php');
			//include(ROOT . DS . 'app' . DS . 'views' . 'layouts' . DS . $this->_layout . '.php');
		} else {
			die('The View \"' . $viewName . '\" does not exist.');
		}
	}

	public function content($type){
		if($type == 'head'){
			return $this->_head;
		}else {
			return $this->_body;
		}

		return false;
	}

	public function start($type) {
		$this->_outputBuffer = $type;
		ob_start();
	}

	public function end() {
		if($this->_outputBuffer == 'head'){
			$this->_head = ob_get_clean();
		}elseif($this->_outputBuffer == 'body'){
			$this->_body = ob_get_clean();
		}else{
			die('You must first run the first method');
		}
	}

	public function siteTitle(){
		return $this->_siteTitle;
	}

	public function setSiteTitle($title){
		$this->_siteTitle = $title;
	}

	public function setLayout($path){
		$this->_layout = $path;
	}

}