<?php
    require_once './app/model/model.php';

    class EjercicioModel extends Model{
        //private $db;

        public function __construct(){
            parent::__construct();    
    }   

    public function getEjercicios(){
        $query = $this->db->prepare('SELECT * FROM Ejercicio');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
        //Obtenemos todos los Ejercicios de un Cliente dado.
    public function getEjerciciosByID($id){
        $query = $this->db->prepare("SELECT * FROM Ejercicio WHERE clienete_id = ?");
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getNombreEjercicioById($id){
        $query = $this->db->prepare("SELECT nombre FROM Ejercicio WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function addEjercicio($nombre_ejercicio,$musculo_implicado,$descripcion,$series,$repeticiones){
        
    }
}