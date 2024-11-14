<?php

require_once "./app/model/ejercicio.model.php";
require_once "./app/model/cliente.model.php";
require_once "./app/view/ejercicio.view.php";

class EjercicioController{
    private $modelCliente;
    private $modelEjercicio;
    private $view;

    public function __construct($res){
        $this->modelCliente = new ClienteModel();
        $this->modelEjercicio = new EjercicioModel();
        $this->view = new EjercicioView($res->user);
    }

    public function showError($error){
        return $this->view->showError($error);
    }

    public function mostrar() {
            $ejercicios = $this->modelEjercicio->getEjercicios();
            $clientes = $this->modelCliente->getClientes();          
            return $this->view->showEjercicio($ejercicios, $clientes);
    }

    public function showCrear($id){
        return $this->view->crearEjercicio($id,$error = '');
    }

    public function crearEjercicio($id){
        if(!$this->modelCliente->getClienteByID($id)){
            return $this->view->showError("ID del usuario invalido");
        }

        if(!isset($_POST['nombre']) || empty($_POST['nombre'])){
            return $this->view->crearEjercicio($id,"Nombre invalido y/o vacio.");
        } 
        if(!isset($_POST['musculo']) || empty($_POST['musculo'])){
            return $this->view->crearEjercicio($id,"Musculo invalido y/o vacio.");
        }
        if(!isset($_POST['descripcion'])){
            return $this->view->crearEjercicio($id,"Descripcion invalida.");
        } 
        if(!isset($_POST['series']) || empty($_POST['series'])){
            return $this->view->crearEjercicio($id,"Series invalida y/o vacia.");
        } 
        if(!isset($_POST['repeticiones']) || empty($_POST['repeticiones'])){
            return $this->view->crearEjercicio($id,"Repeticiones invalidas y/o vacia.");
        }

        $nombre_ejercicio = $_POST['nombre'];
        $musculo_implicado = $_POST['musculo'];
        $descripcion = $_POST['descripcion'];
        $series = $_POST['series'];
        $repeticiones = $_POST['repeticiones'];
        $idCliente = $id;

        $this->modelEjercicio->agregar($nombre_ejercicio,$musculo_implicado,$descripcion,$series,$repeticiones,$idCliente);
        // Redirijo al home.
        header('Location: ' . BASE_URL);
    }

    public function showEditar($id,$error = null){
        return $this->view->editarEjercicio($id,$error);
    }

    //Funcion para modificar el ejercicio.
    public function editarEjercicio($id){
        $ej = $this->modelEjercicio->getEjercicio($id);
        if (!$ej) {
            echo 'holasasasa';
            return $this->view->showError("El ejercicio no existe.");
        }
        
        if (isset($_POST['nombre']) && !empty($_POST['nombre'])) {
            $nombre = $_POST['nombre'];
            $this->modelEjercicio->updateNombre($nombre, $id);
        }
        
        if (isset($_POST['musculo']) && !empty($_POST['musculo'])) {
            $musculo = $_POST['musculo'];
            $this->modelEjercicio->updateMusculo($musculo, $id);
        }

        if (isset($_POST['descripcion'])) {
            $descripcion = $_POST['descripcion'];
            $this->modelEjercicio->updateDescripcion($descripcion, $id);
        }

        if (isset($_POST['series']) && !empty($_POST['series'])) {
            $series = $_POST['series'];
            $this->modelEjercicio->updateSeries($series, $id);
        }

        if (isset($_POST['repeticiones']) && !empty($_POST['repeticiones'])) {
            $repeticiones = $_POST['repeticiones'];
            $this->modelEjercicio->updateRepeticiones($repeticiones, $id);
        }
        echo 'hola6666666';
        // Redirijo al home.
        header('Location: ' . BASE_URL);
    }

    public function eliminar($id){
        $this->modelEjercicio->eliminar($id);
        //Redirijo al home.
        header('Location: ' . BASE_URL);
    }
}