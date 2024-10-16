<?php
    require_once "libs/Router.php";
    require_once "app/controller/clienteEjercicio.controller.php";

    $router = new Router();

    $router->setDefaultRoute('ClienteEjercicioController','showMain');

    $router->addRoute('ejercicios','GET','ClienteEjercicioController','obtenerEjercicios');

    $router->route($_GET['resource'],$_SERVER['REQUEST_METHOD']);

