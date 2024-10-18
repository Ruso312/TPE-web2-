<?php
    require_once "app/controller/clienteEjercicio.controller.php";

    // base_url para redirecciones y base tag
    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    $res = new Response();

    $action = 'home';
    if(!empty($_GET['action'])){
        $action = $_GET['action'];
    }

    // parsea la accion para separar accion real de parametros
    $parametro = explode('/', $action);

    switch ($parametro[0]){
        case 'home':
            $controlador = new ClienteController($res);
            $controlador->showHome();
            break;
        default: 
        echo "404 Page Not Found"; // deberiamos llamar a un controlador que maneje esto
        break;
    }