<?php
    require_once "libs/Router.php";
    require_once "app/controller/clienteEjercicio.controller.php";

    define('BASE_URL','//'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].dirname($_SERVER['PHP_SELF']).'/');

    $action = 'main';
    if(!empty($_GET['action'])){
        $action = $_GET['action'];
    }

    $params = explode('/', $action);

    switch($params[0]){
        case 'ejercicios':
            $controller = new ClienteEjercicioController();
            $controller->obtenerEjercicios();
            break;
        default:
            echo"404 Page Not Found";
            break;
    }

    $router = new Router();

    $router->setDefaultRoute('ClienteEjercicioController','showMain');

    $router->addRoute('ejercicios','GET','ClienteEjercicioController','obtenerEjercicios');

    $router->route($_GET['resource'],$_SERVER['REQUEST_METHOD']);



