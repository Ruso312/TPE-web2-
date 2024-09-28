<?php

class ClienteModel {
    private $db;

    public function __construct(){
    $this->db = new PDO("mysql:host=localhost;dbname=gimnasio_db", "root", "");
    }

    //TODO:: consultas a la tabla Cliente
    
}

