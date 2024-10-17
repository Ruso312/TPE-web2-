<?php

require_once "./app/model/cliente.model.php";
require_once "./app/model/ejercicio.model.php";

class ClienteEjercicioView{

    public function showHome($ejercicios, $clientes){
        require './src/templates/layout/header.phtml';
        require 'src/templates/home.phtml';
    }

    public function showEjercicios($ejercicios){
        foreach($ejercicios as $ejercicio){
            echo '<div>';
                $ejercicio->nombre_ejercicio;
                $ejercicio->musculo_implicado;
                $ejercicio->descripcion;
                $ejercicio->series;
                $ejercicio->repeticiones;
            echo '</div>';
        }
    }

    public function showClientes($clientes){
        foreach($clientes as $cliente){
            echo '<div>';
                $cliente->nombre;
                $cliente->email;
            echo '</div>';
        }
    }
}