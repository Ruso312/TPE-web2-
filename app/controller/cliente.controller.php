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
        $this->view = new ClienteEjercicioView($res->user);
        
    }
    //Funcion para mostrar el Home de la pagina.
    public function showHome(){
        $clientes = $this->modelCliente->getClientes();
        $ejercicios = $this->modelEjercicio->getEjercicios();
        return $this->view->showHome($ejercicios, $clientes);
    }

    public function showError($error){
        return $this->view->showError($error);
    }

    //Funcion para actualizar un cliente
    public function crearPerfil(){
        $this->view->crearCliente();
        //Verificamos que los campos requeridos esten completos y no vacios.
        if(!isset($_POST['nombre']) || empty($_POST['nombre']) && 
            !isset($_POST['email']) || empty($_POST['email']) &&
            !isset($_POST['contraseña']) || empty($_POST['contraseña']))
        {return $this->view->showError('Verifique que los campos esten correctos.');}

        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $contraseña = $_POST['contraseña'];
        $this->modelCliente->addCliente($nombre, $email, $contraseña);
    }

    public function delete($id){
        $this->modelCliente->delCliente($id);
    }

    public function verMas($id){
        $ejercicio = $this->modelEjercicio->getEjercicio($id);
        $this->view->showEjercicio($ejercicio);
    }
}