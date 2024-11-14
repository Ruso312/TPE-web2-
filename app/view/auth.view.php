<?php

class AuthView {
    private $cliente = null;

    public function __construct($cliente) {
        $this->cliente = $cliente;
    }

    public function showLogin($error = '') {
        require './src/templates/login.phtml';
    }
}