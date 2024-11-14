<?php

require_once './app/view/cliente.view.php';

class ErrorController{
    private $vista;

    public function __construct($res){
        $this->vista = new ClienteView($res);
    }

    function error($error){
        $this->vista->showError($error);
    }
}