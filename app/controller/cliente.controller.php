<?php

require_once "./app/model/ejercicio.model.php";
require_once "./app/model/cliente.model.php";
require_once "./app/view/cliente.view.php";

class ClienteController{
    private $modelCliente;
    private $modelEjercicio;
    private $view;

    public function __construct(){
        $this->modelCliente = new ClienteModel();
        $this->modelEjercicio = new EjercicioModel();
        $this->view = new ClienteEjercicioView();
        
    }
    //Funcion para mostrar el Home de la pagina.
    public function showHome(){
        $ejercicios = $this->modelEjercicio->getEjercicios();
        $clientes = $this->modelCliente->getClientes();
        return $this->view->showHome($ejercicios, $clientes);
    }
}