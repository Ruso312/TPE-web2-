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

    public function getEjercicio($id){
        $query = $this->db->prepare('SELECT * FROM ejercicio WHERE id = ?');
        $query->execute($id);
        return $query->fetch(PDO::FETCH_OBJ);
    }
    
        //Obtenemos todos los Ejercicios de un Cliente dado.
    public function getEjerciciosByID($id){
        $query = $this->db->prepare("SELECT * FROM ejercicio WHERE cliente_id = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getNombreEjercicioById($id){
        $query = $this->db->prepare("SELECT nombre FROM ejercicio WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function addEjercicio($nombre_ejercicio,$musculo_implicado,$descripcion,$series,$repeticiones){
        $query = $this->db->prepare('INSERT INTO ejercicio (nombre_ejercicio, musculo_implicado, descripcion, series, repeticiones)
                                     VALUES (?, ?, ?, ?, ?)');
        $query->execute([$nombre_ejercicio,$musculo_implicado,$descripcion,$series,$repeticiones]);
    }

    //Funciones para actualizar una columna en particular de la tabla Ejercicio(manejado por el controlador)
    public function updateNombreEjercicio($nombreEjercicio, $id){
        $query = $this->db->prepare('UPDATE ejercicio SET nombre_ejercicio=? WHERE id=?');
        $query->execute([$nombreEjercicio,$id]);
    }
    public function updateMusculoEjercicio($musculoImplicado, $id){
        $query = $this->db->prepare('UPDATE ejercicio SET musculo_implicado=? WHERE id=?');
        $query->execute([$musculoImplicado,$id]);
    }
    public function updateDescripcionEjercicio($descripcion, $id){
        $query = $this->db->prepare('UPDATE ejercicio SET descripcion=? WHERE id=?');
        $query->execute([$descripcion,$id]);
    }
    public function updateSeriesEjercicio($series, $id){
        $query = $this->db->prepare('UPDATE ejercicio SET series=? WHERE id=?');
        $query->execute([$series,$id]);
    }
    public function updateRepeticionesEjercicio($repeticiones, $id){
        $query = $this->db->prepare('UPDATE ejercicio SET repeticiones=? WHERE id=?');
        $query->execute([$repeticiones,$id]);
    }

    public function delEjercicio($id){
        $query = $this->db->prepare('DELETE FROM ejercicio WHERE id = ?');
        $query->execute([$id]);
    }
}