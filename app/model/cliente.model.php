<?php
    
class ClienteModel {
    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=gimnasio;charset=utf8', 'root', '');
    }

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

    public function addCliente($nombre,$email,$contraseña){
        $query = $this->db->prepare('INSERT INTO cliente (nombre, email, contraseña)
                                    VALUES (?, ?, ?)');
        $query->execute([$nombre,$email,$contraseña]);
    }

    //Funciones para actualizar los datos del Cliente segun un parametro dado(manejado en el controlador)
    public function updateNombreCliente($nombre, $id){
        $query = $this->db->prepare('UPDATE cliente SET nombre=? WHERE id=?');
        $query->execute([$nombre,$id]);
    }
    public function updateEmailCliente($email, $id){
        $query = $this->db->prepare('UPDATE cliente SET email=? WHERE id=?');
        $query->execute([$email,$id]);
    }
    public function updateContraseñaCliente($contraseña, $id){
        $query = $this->db->prepare('UPDATE cliente SET contraseña=? WHERE id=?');
        $query->execute([$contraseña,$id]);
    }

    public function delCliente($id){
        $query = $this->db->prepare('DELETE FROM cliente WHERE id = ?');
        $query->execute([$id]);
    }
}