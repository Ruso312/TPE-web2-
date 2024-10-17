<?php

    class EjercicioModel{
        private $db;

        public function __construct(){
            $this->db = new PDO('mysql:host=localhost;dbname=gimnasio;charset=utf8', 'root', '');
        }   

    public function getEjercicios(){
        $query = $this->db->prepare('SELECT * FROM ejercicio');
        $query->execute();
        $ejercicios = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $ejercicios;
    }
        //Obtenemos todos los Ejercicios de un Cliente dado.
    public function getEjerciciosByID($id){
        $query = $this->db->prepare("SELECT * FROM ejercicio WHERE clienete_id = ?");
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getNombreEjercicioById($id){
        $query = $this->db->prepare("SELECT nombre FROM ejercicio WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function addEjercicio($nombre_ejercicio,$musculo_implicado,$descripcion,$series,$repeticiones){
        
    }
}