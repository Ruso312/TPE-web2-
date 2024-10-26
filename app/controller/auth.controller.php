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

    public function registrarCliente(){
        if (!isset($_POST['email']) || empty($_POST['email'])) {
            return $this->view->showRegister('Falta completar el email de usuario.');
        }

        if (!isset($_POST['nombre']) || empty($_POST['nombre'])) {
            return $this->view->showRegister('Falta completar el nombre de usuario.');
        }
        
        if (!isset($_POST['password']) || empty($_POST['password'])) {
            return $this->view->showRegister('Falta completar la contraseña.');
        }
        if (!isset($_POST['confirmPassword']) || empty($_POST['confirmPassword'])) {
            return $this->view->showRegister('Falta confirmar la contraseña.');
        }

        $contraseña = $_POST['password'];
        $confirmarContraseña = $_POST['confirmPassword'];
        if($contraseña !== $confirmarContraseña){
            return $this->view->showRegister('Las contraseñas no coinciden.');
        }

        $email = $_POST['email'];
        $nombre = $_POST['nombre'];

        $existeCliente = $this->model->getClienteByEmail($email);

        //Corroboro que el Cliente no exista mediante el Email.
        if($existeCliente){
            return $this->view->showRegister('El email ya pertenece a una cuenta registrada.');
        }

        $this->model->addCliente($nombre,$email,$contraseña);
        // Redirijo al home.
        header('Location: ' . BASE_URL);
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
    
        // Verificar que el usuario está en la base de datos.
        $cliente = $this->model->getClienteByEmail($email);
        if($cliente && password_verify($contraseña, $cliente->contraseña)){
            // Guardo en la sesión el ID del usuario.
            session_start();
            $_SESSION['ID_CLIENTE'] = $cliente->id;
            $_SESSION['EMAIL_CLIENTE'] = $cliente->email;
            $_SESSION['LAST_ACTIVITY'] = time();
    
            // Redirijo al home.
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