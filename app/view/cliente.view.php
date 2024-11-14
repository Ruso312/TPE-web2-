<?php

require_once "./app/model/cliente.model.php";
require_once "./app/model/ejercicio.model.php";

class ClienteView{
    private $cliente = null;

    public function __construct($cliente) {
        $this->cliente = $cliente;
    }

    public function showHome(){
        require './src/templates/home.phtml';
    }

    public function showClientes($clientes, $ejercicios){
        require './src/templates/detalle_cliente.phtml';
    }

    public function showEdit($id,$error = ''){
        require './src/templates/editarCliente.phtml';
    }

    public function crearCliente($error = ''){
        require './src/templates/crear_cliente.phtml';
    }

    public function showError($error = ''){
        require './src/templates/layout/showError.phtml';
    }
}