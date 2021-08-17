<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 16/08/21
 * Time: 12:18
 */

session_start();
define('DS',DIRECTORY_SEPARATOR);
define('ROOT',dirname(__FILE__));
$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'],'/')) : [];
require_once(ROOT . DS . 'core' . DS . 'bootstrap.php');
//var_dump($url);
//echo $_SERVER['PATH_INFO'];


?>

