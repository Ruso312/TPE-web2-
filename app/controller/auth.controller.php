<?php
require_once './app/model/cliente.model.php';
require_once './app/view/auth.view.php';

class AuthController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new ClienteModel();
        $this->view = new AuthView();
    }

    public function showLogin() {
        //formulario de login
        return $this->view->showLogin();
    }

    public function login() {
        if (!isset($_POST['email']) || empty($_POST['email'])) {
            return $this->view->showLogin('Falta completar el nombre de usuario');
        }
    
        if (!isset($_POST['password']) || empty($_POST['password'])) {
            return $this->view->showLogin('Falta completar la contraseña');
        }
    
        $email = $_POST['email'];
        $contraseña = $_POST['password'];
    
        // Verificar que el usuario está en la base de datos
        $cliente = $this->model->getClienteByEmail($email);

        if($cliente && password_verify($contraseña, $cliente->contraseña)){
            // Guardo en la sesión el ID del usuario
            session_start();
            $_SESSION['ID_USER'] = $cliente->id;
            $_SESSION['EMAIL_USER'] = $cliente->email;
            $_SESSION['LAST_ACTIVITY'] = time();
    
            // Redirijo al home
            header('Location: ' . BASE_URL);
        } else {
            return $this->view->showLogin('Credenciales incorrectas');
        }
    }

    public function logout() {
        session_start();
        session_destroy(); 
        header('Location: ' . BASE_URL);
    }
}