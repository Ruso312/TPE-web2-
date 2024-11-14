<?php

require_once "./app/model/cliente.model.php";
require_once "./app/model/ejercicio.model.php";

class EjercicioView{
    private $cliente = null;

    public function __construct($cliente) {
        $this->cliente = $cliente;
    }

    public function showEjercicio($ejercicios,$clientes){
        require './src/templates/detalle_ejercicio.phtml';
    }
    
    public function crearEjercicio($id,$error = ''){
        require './src/templates/form_ejercicio.phtml';
    }

    public function editarEjercicio($id, $error = ''){
        require './src/templates/editarEjercicio.phtml';
    }
    
    public function showError($error = ''){
        require './src/templates/layout/showError.phtml';
    }
}