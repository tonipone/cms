<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 16/08/21
 * Time: 13:41
 */
function dnd($data){
    echo '<pre>';
        var_dump($data);
    echo '</pre>';
    die();
}


function sanitize($dirty){
	return htmlentities($dirty, ENT_QUOTES, 'UTF-8');
}

function currentUser(){
	return Users::currentLoggedInUser();
}