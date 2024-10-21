<?php
    require_once './libs/response.php';
    require_once './app/middlewear/verify.auth.middleware.php';
    require_once './app/middlewear/session.auth.middleware.php';    
    require_once './app/controller/cliente.controller.php';
    require_once './app/controller/auth.controller.php';

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
            sessionAuthMiddleware($res);
            $controlador = new ClienteController($res);
            $controlador->showHome();
            break;
        case 'delete':
            sessionAuthMiddleware($res);
            verifyAuthMiddleware($res);
            $controlador = new ClienteController($res);
            $controlador->delete($id,);
            break; 
        case 'actualizarCliente':
        case 'cargarCliente':
            sessionAuthMiddleware($res);
            verifyAuthMiddleware($res);
            $controlador = new ClienteController($res);
            $controlador->crearPerfil();
            break;
        case 'showLogin':
            $controlador = new AuthController();
            $controlador->showLogin();
            break;
        case 'login':
            $controlador = new AuthController();
            $controlador->login();
            break;
        case 'logout':
            $controlador = new AuthController();
            $controlador->logout();
            break;
        case 'verMas':
            $controlador = new ClienteController($res);
            $controlador->verMas($id);
            break;
        default: 
            $controlador = new ClienteController($res);
            $controlador->showError('404 not found');
            break;
    }