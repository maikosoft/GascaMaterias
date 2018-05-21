<?php
//require_once 'model/database.php';
 
$default_controller = 'user';
 
// cargamo el controlador default
if(!isset($_GET['sec']))
{
    require_once "controller/$default_controller.controller.php";
    $controller = ucwords($default_controller) . 'Controller';
    $controller = new $controller;
    $controller->Index();    
}
else
{
    // Cargamos el controlador indicado en "sec"
    $controller = strtolower($_GET['sec']);
    $accion = isset($_GET['action']) ? $_GET['action'] : 'Index';
    
    // Instanciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    
    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}
?>