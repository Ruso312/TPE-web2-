<?php
    require_once "./app/model/model.php";
    
class ClienteModel extends Model {
    private $db;

    public function __construct(){
        parent::__construct();
    }

    //TODO:: consultas a la tabla Cliente
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

    public function addCliente($nombre,$email,$contraseña){
        $query = $this->db->prepare('INSERT INTO cliente()');
    }

    public function updateCliente($nombre,$email,$contraseña){

    }

    public function delCliente($id){

    }
}