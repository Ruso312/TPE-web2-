<?php
    require_once './libs/response.php';
    require_once './app/middlewear/verify.auth.middleware.php';
    require_once './app/middlewear/session.auth.middleware.php';    
    require_once './app/controller/cliente.controller.php';
    require_once './app/controller/ejercicio.controller.php';
    require_once './app/controller/auth.controller.php';
    require_once './app/controller/error.controller.php';

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
            switch($parametro[1]){
                case 'cliente':
                    $controlador = new ClienteController($res);
                    $controlador->eliminar($parametro[2]);
                    break;
                case 'ejercicio':
                    $controlador = new EjercicioController($res);
                    $controlador->eliminar($parametro[2]);
                    break;
                default:
                    $controlador = new ErrorController($res);
                    $controlador->error('Verifique que la URL sea correcta.');
                    break;
            }
            break;
        case 'detalle':
            sessionAuthMiddleware($res);
            if($parametro[1]=='ejercicio'){
                $controlador = new EjercicioController($res);
                $controlador->mostrar();
                break;
            }elseif($parametro[1]=='cliente'){
                $controlador = new ClienteController($res);
                $controlador->mostrar();
                break;
            }else{
                $controlador = new ErrorController($res);
                $controlador->error("Url invalida");
                break;
            }
            break;
        case 'showEditar':
                sessionAuthMiddleware($res);
                if($parametro[1]=='cliente'){
                    $controlador = new ClienteController($res);
                    $controlador->showEditar($parametro[2]);
                    break;
                } elseif($parametro[1]=='ejercicio'){
                    $controlador = new EjercicioController($res);
                    $controlador->showEditar($parametro[2]);
                    break;
                }else{
                    $controlador = new ErrorController($res);
                    $controlador->error('Url invalida');
                    break;
                }
                break;
        case 'editar':
                sessionAuthMiddleware($res);
                if($res->user){
                    if($parametro[1]== 'cliente'){
                        $controlador = new ClienteController($res);
                        $controlador->editarCliente($parametro[2]);
                        break;
                    } elseif($parametro[1]== 'ejercicio'){
                        $controlador = new EjercicioController($res);
                        $controlador->editarEjercicio($parametro[2]);
                        break;
                    }else{
                        $controlador = new ErrorController($res);
                        $controlador->error('Url invalida');
                        break;
                    }
            }
            $controlador = new ClienteController($res);
            $controlador->showError('No tiene los permisos para realizar las modificaciones.');
            break;
        case 'crear':
            sessionAuthMiddleware($res);
            verifyAuthMiddleware($res);
            switch($parametro[1]){
                case 'cliente':
                    $controlador = new ClienteController($res);
                    $controlador->crearCliente();
                    break;
                case 'ejercicio':
                    $controlador = new EjercicioController($res);
                    $controlador->crearEjercicio($parametro[2]);
                    break;
            }
            break;
        case 'crearCliente':
            sessionAuthMiddleware($res);
            verifyAuthMiddleware($res);
            $controlador = new ClienteController($res);
            $controlador->showCreateCliente();
            break;
        case 'crearEjercicio':
            sessionAuthMiddleware($res);
            verifyAuthMiddleware($res);
            $controlador = new EjercicioController($res);
            $controlador->showCrear($parametro[1]);
            break;
        case 'showLogin':
            $controlador = new AuthController($res);
            $controlador->showLogin();
            break;
        case 'login':
            $controlador = new AuthController($res);
            $controlador->login();
            break;
        case 'logout':
            $controlador = new AuthController($res);
            $controlador->logout();
            break;
        default: 
            $controlador = new ErrorController($res);
            $controlador->error('404 not found');
            break;
        }