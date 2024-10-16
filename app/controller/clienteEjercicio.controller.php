<?php

require_once "./app/model/ejercicio.model.php";
require_once "./app/model/cliente.model.php";
require_once "./app/view/cliente.view.php";

class ClienteEjercicioController{
    private $modelCliente;
    private $modelEjercicio;
    private $view;

    public function __construct(){
        $this->modelCliente = new ClienteModel();
        $this->modelEjercicio = new EjercicioModel();
        $this->view = new ClienteEjercicioView();
        
    }
    //Funcion para mostrar el Home de la pagina.
    public function showMain(){
        $ejercicios = $this->modelEjercicio->getEjercicios();
        $clientes = $this->modelCliente->getClientes();
        return $this->view->showMain($ejercicios, $clientes);
    }
}