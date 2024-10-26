<?php

require_once "./app/model/cliente.model.php";
require_once "./app/model/ejercicio.model.php";

class ClienteEjercicioView{
    private $cliente = null;

    public function __construct($cliente) {
        $this->cliente = $cliente;
    }

    public function showHome($ejercicios, $clientes){
        require './src/templates/home.phtml';
    }

    public function crearCliente(){
        require './src/templates/form_user.phtml';
    }

    public function showError($error = ''){
        require './src/template/layout/showError.phtml';
    }

    public function showEjercicio($ejercicio,$clientes){
        require './src/templates/detalle.phtml';
    }
}