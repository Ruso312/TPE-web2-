<?php
    
require_once 'model.php';

class ClienteModel extends Model{

    public function getClientes(){
        $query = $this->db->prepare('SELECT * FROM cliente');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getClienteByID($id){
        $query = $this->db->prepare('SELECT * FROM cliente WHERE id = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getClienteByEmail($email){
        $query = $this->db->prepare('SELECT * FROM cliente WHERE email = ?');
        $query->execute([$email]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function addCliente($nombre,$email){
        $query = $this->db->prepare('INSERT INTO cliente (nombre, email)
                                    VALUES (?, ?)');
        $query->execute([$nombre,$email]);
    }

    //Funciones para actualizar los datos del Cliente segun un parametro dado
    public function updateNombreCliente($nombre, $id){
        $query = $this->db->prepare('UPDATE cliente SET nombre=? WHERE id=?');
        $query->execute([$nombre,$id]);
    }
    public function updateEmailCliente($email, $id){
        $query = $this->db->prepare('UPDATE cliente SET email=? WHERE id=?');
        $query->execute([$email,$id]);
    }

    public function delCliente($id){     
        //Elimino los ejercicios vinculados al Cliente (sino no se puede eliminar por )
        $query = $this->db->prepare('DELETE FROM ejercicio WHERE cliente_id = ?');
        $query->execute([$id]);
        //Elimino el Cliente una vez eliminados los Ejercicios vinculados.
        $query = $this->db->prepare('DELETE FROM cliente WHERE id = ?');
        $query->execute([$id]);
    }
}