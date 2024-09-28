<?php

    require_once "./model/model.php";
    
    class EjercicioModel extends Model{
        private $db;

        //@Override
        public function __construct(){
            $this->db = parent::$db;    
    }   
        //Obtenemos todos los Ejercicios de un Cliente dado.
        public function getEjerciciosByID($id){
            $query = $this->db->prepare("SELECT * FROM Ejercicio WHERE clienete_id = ?");
            $query->execute([$id]);
            $ejercicios = $query->fetchAll(PDO::FETCH_OBJ);

            return $ejercicios;
        }

        public function getNombreEjercicioById($id){

            $query = $this->db->prepare("SELECT nombre FROM Ejercicio WHERE id = ?");
            $query->execute([$id]);
            $nombreEjercicio = $query->fetch(PDO::FETCH_OBJ);

            return $nombreEjercicio;
        }
    }