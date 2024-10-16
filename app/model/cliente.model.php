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
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getClienteByEmail($email){
        $query = $this->db->prepare('SELECT * FROM cliente WHERE email = ?');
        $query->execute([$email]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function addCliente($nombre,$email,$contraseña){
        $query = $this->db->prepare('INSERT INTO cliente()');
    }

    public function updateCliente($nombre,$email,$contraseña){

    }

    public function delCliente($id){

    }
}