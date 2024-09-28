<?php
    require_once "libs/Router.php";
    require_once "app/controller/clienteEjercicio.controller.php";

    define('BASE_URL','//'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].dirname($_SERVER['PHP_SELF']).'/');

    $action = 'main';
    if(!empty($_GET['action'])){
        $action = $_GET['action'];
    }

    $params = explode('/', $action);

    switch($params[]){
        case 'ejercicios':
            $controller = new ClienteEjercicioController();
            $controller->obtenerEjercicios();
            break;
    }


