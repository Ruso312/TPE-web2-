<?php

require_once "./app/model/ejercicio.model.php";
require_once "./app/model/cliente.model.php";
require_once "./app/view/cliente.view.php";

class ClienteController{
    private $modelCliente;
    private $modelEjercicio;
    private $view;

    public function __construct($res){
        $this->modelCliente = new ClienteModel();
        $this->modelEjercicio = new EjercicioModel();
        $this->view = new ClienteView($res->user);
    }
    
    //Funcion para mostrar el Home de la pagina.
    public function showHome(){
        return $this->view->showHome();
    }

    public function mostrar(){
        $clientes = $this->modelCliente->getClientes();
        $ejercicios = $this->modelEjercicio->getEjercicios();
        return $this->view->showClientes($clientes, $ejercicios);
    }
    public function showError($error){
        return $this->view->showError($error);
    }
    
    public function eliminar($id){
        echo $id;
        if(!isset($id) || empty($id)){
            echo 'hola';
            return $this->view->showError("ID vacio o invalido.");
        }
        $clienteDb = $this->modelCliente->getClienteByID($id);

        if(!$clienteDb){
            echo 'jelow';
            return $this->view->showError("El cliente no existe.");
        }
        echo 'wiwi';
        $this->modelCliente->delCliente($id);
        //Redirijo al home.
        header('Location: ' . BASE_URL);
    }

    public function showCreateCliente($error = ''){
        $this->view->crearCliente($error = '');
    }

    //Funcion para crear un cliente
    public function crearCliente(){
        //Verificamos que los campos requeridos esten completos y no vacios.
        if(!isset($_POST['nombre']) || empty($_POST['nombre']) && 
        !isset($_POST['email']) || empty($_POST['email'])){
            return $this->view->crearCliente('Verifique que los campos esten correctos.');
        }
        //Verificamos que el email no exista.
        if($this->modelCliente->getClienteByEmail($_POST['email'])){
            return $this->view->crearCliente('El Email ya existe.');
        }
            
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];

        $this->modelCliente->addCliente($nombre, $email);
        
        //Redirijo al home.
        header('Location: ' . BASE_URL);
    }

    public function showEditar($id,$error = null){
        return $this->view->showEdit($id,$error);
    }

    public function editarCliente($id){
        if (!empty($_POST['email']) && isset($_POST['email'])) {
            if($this->modelCliente->getClienteByEmail($_POST['email'])){
                return $this->view->showEdit($id,"El cliente no existe");
            }else{
                $this->modelCliente->updateEmailCliente($_POST['email'], $id);
            }
        }
        
        if (isset($_POST['nombre']) && !empty($_POST['nombre'])) {
            $nombre = $_POST['nombre'];
            $this->modelCliente->updateNombreCliente($nombre, $id);
        }
        // Redirijo al home.
        header('Location: ' . BASE_URL);
    }
}