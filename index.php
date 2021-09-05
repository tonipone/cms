<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 16/08/21
 * Time: 12:18
 */

define('DS',DIRECTORY_SEPARATOR);
define('ROOT',dirname(__FILE__));

// load configuration and helper function
require_once (ROOT . DS . 'config' . DS . 'config.php');
require_once (ROOT . DS . 'app' . DS . 'lib' . DS . 'helpers' . DS . 'functions.php');

//Autoload Classes
function autoload($classname){
    if(file_exists(ROOT . DS . 'core' . DS . $classname . '.php')) {
        require_once (ROOT . DS . 'core' . DS . $classname . '.php');
    }elseif (file_exists(ROOT . DS . 'app' . DS . 'controllers' . DS . $classname . '.php')){
        require_once (ROOT . DS . 'app' . DS . 'controllers' . DS . $classname . '.php');
    }elseif (file_exists(ROOT . DS . 'app' . DS . 'models' . DS . $classname . '.php')){
	    require_once (ROOT . DS . 'app' . DS . 'models' . DS . $classname . '.php');
    }
}

spl_autoload_register('autoload');
session_start();

$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'],'/')) : [];
//$db = DB::getInstance();
//dnd($url);
//Route the requestdnd(Session::exists(CURRENT_USER_SESSION_NAME));
if(!Session::exists(CURRENT_USER_SESSION_NAME) && Cookie::exists(REMEMBER_ME_COOKIE_NAME)){

    Users::loginUserFromCookie();
}
Router::route($url);

//echo $_SERVER['PATH_INFO'];


?>

