<?php

class AuthView {
    private $cliente = null;

    public function showLogin($error = '') {
        require './src/templates/login.phtml';
    }

    public function showRegister($error = '') {
        require './src/templates/register_form.phtml';
    }

    public function showSignup($error = '') {
        require 'templates/form_signup.phtml';
    }
}
