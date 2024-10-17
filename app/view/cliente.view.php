<?php

require_once "./app/model/cliente.model.php";
require_once "./app/model/ejercicio.model.php";

class ClienteEjercicioView{
    private $user = null;

    public function __construct($user){
        $this->user = $user;
    }

    public function showHome($ejercicios, $clientes){
        require './src/templates/home.phtml';
    }

    public function showEjercicios($ejercicios){

    }

    public function showClientes($clientes){
  
    }
}