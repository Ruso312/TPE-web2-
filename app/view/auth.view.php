<?php

class AuthView {
    private $cliente = null;

    public function showLogin($error = '') {
        require './src/templates/login.phtml';
    }

    public function showSignup($error = '') {
        require 'templates/form_signup.phtml';
    }
}
