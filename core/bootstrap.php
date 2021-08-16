<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 16/08/21
 * Time: 13:24
 */
require_once (ROOT . DS . 'config' . DS . 'config.php');
require_once (ROOT . DS . 'app' . DS . 'lib' . DS . 'helpers' . DS . 'functions.php');

//Autoload Classes
/*function __autoload($classname){
    if(file_exists(ROOT . DS . 'core' . DS . $classname . '.php')) {
        require_once (ROOT . DS . 'core' . DS . $classname . '.php');
    }elseif (ROOT . DS . 'app' . DS . 'controllers' . DS . $classname . '.php'){
        require_once (ROOT . DS . 'app' . DS . 'controllers' . DS . $classname . '.php');
    }elseif (ROOT . DS . 'app' . DS . 'models' . DS . $classname . '.php'){
	    require_once (ROOT . DS . 'app' . DS . 'models' . DS . $classname . '.php');
    }
}*/

spl_autoload_register(function ($classname) {
	if(file_exists(ROOT . DS . 'core' . DS . $classname . '.php')) {
		require_once (ROOT . DS . 'core' . DS . $classname . '.php');
	}elseif (ROOT . DS . 'app' . DS . 'controllers' . DS . $classname . '.php'){
		require_once (ROOT . DS . 'app' . DS . 'controllers' . DS . $classname . '.php');
	}elseif (ROOT . DS . 'app' . DS . 'models' . DS . $classname . '.php'){
		require_once (ROOT . DS . 'app' . DS . 'models' . DS . $classname . '.php');
	}
});
//Route the request
Router::route($url);

