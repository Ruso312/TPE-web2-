<?php

require_once 'model.php';

class EjercicioModel extends Model{

    public function getEjercicios(){
        $query = $this->db->prepare('SELECT * FROM ejercicio');
        $query->execute();
        $ejercicios = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $ejercicios;
    }

    public function getEjercicio($id){
        $query = $this->db->prepare('SELECT * FROM ejercicio WHERE id = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function obtenerNombreEjercicioById($id){
        $query = $this->db->prepare("SELECT nombre FROM ejercicio WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function agregar($nombre_ejercicio,$musculo_implicado,$descripcion,$series,$repeticiones,$idCliente){
        $query = $this->db->prepare('INSERT INTO ejercicio (nombre_ejercicio, musculo_implicado, descripcion, series, repeticiones,cliente_id)
                                    VALUES (?, ?, ?, ?, ?,?)');
        $query->execute([$nombre_ejercicio,$musculo_implicado,$descripcion,$series,$repeticiones,$idCliente]);
    }

    //Funciones para actualizar una columna en particular de la tabla Ejercicio(manejado por el controlador)
    public function updateNombre($nombreEjercicio, $id){
        $query = $this->db->prepare('UPDATE ejercicio SET nombre_ejercicio=? WHERE id=?');
        $query->execute([$nombreEjercicio,$id]);
    }
    public function updateMusculo($musculoImplicado, $id){
        $query = $this->db->prepare('UPDATE ejercicio SET musculo_implicado=? WHERE id=?');
        $query->execute([$musculoImplicado,$id]);
    }
    public function updateDescripcion($descripcion, $id){
        $query = $this->db->prepare('UPDATE ejercicio SET descripcion=? WHERE id=?');
        $query->execute([$descripcion,$id]);
    }
    public function updateSeries($series, $id){
        $query = $this->db->prepare('UPDATE ejercicio SET series=? WHERE id=?');
        $query->execute([$series,$id]);
    }
    public function updateRepeticiones($repeticiones, $id){
        $query = $this->db->prepare('UPDATE ejercicio SET repeticiones=? WHERE id=?');
        $query->execute([$repeticiones,$id]);
    }

    public function eliminar($id){
        $query = $this->db->prepare('DELETE FROM ejercicio WHERE id = ?');
        $query->execute([$id]);
    }
}