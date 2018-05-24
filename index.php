<?php
// iniciamos sesion
session_start();
require_once 'model/database.php';

$default_controller = 'auth';
 
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
    $action = isset($_GET['action']) ? $_GET['action'] : 'Index';
    
    // Instanciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    
    // Llama la action
    call_user_func( array( $controller, $action ) );   
}
// Borramos variable de sesion de mensajes de success y error
if(isset($_SESSION)) {
    unset($_SESSION['success']);
    unset($_SESSION['error']);
}

?>