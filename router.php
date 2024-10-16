<?php
    //require_once "libs/Router.php";
    require_once "app/controller/cliente.controller.php";

    
    $action = 'home'; //default action

    //en caso de no venir por parámetro es remplazada con la default
    if(!empty($_GET['action'])){
        $action = $_GET['action'];
    }

    //separa lo que viene por parametros
    $params = explode('/', $action);

    switch($params[0]){
        case 'home':
            $controller = new ClienteController();
            $controller->showHome();
            break;
        default:
            echo"404 Page Not Found";
            break;
    }

