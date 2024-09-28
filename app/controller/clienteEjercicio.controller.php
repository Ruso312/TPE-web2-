<?php

require_once "./app/model/ejercicio.model.php";
require_once "./app/model/cliente.model.php";
require_once "./app/view/cliente.view.php";

class ClienteEjercicioController{
    private $modelCliente;
    private $modelEjercicio;
    private $view;

    public function __construct($modelCliente, $modelEjercicio, $view){
        $this->modelCliente = new ClienteModel();
        $this->modelEjercicio = new EjercicioModel();
        $this->view = new ClienteEjercicioView();
        
    }

    public function obtenerEjercicios($params =[]){
        if($params){
            $ejercicios = $this->modelEjercicio->obtenerEjerciciosByID($params[":ID"]);
        }
        


    }

    public function showItemById($id){



    }





}