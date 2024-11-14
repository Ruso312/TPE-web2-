<?php
    
require_once 'model.php';

class AdminModel extends Model{

    public function getAdminByEmail($email){
        $query = $this->db->prepare('SELECT * FROM admin WHERE email = ?');
        $query->execute([$email]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
}