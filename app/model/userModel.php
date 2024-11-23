<?php
class userModel{
    private $db;
    function __construct()
    {
        $this->db = new Database();
    }

    function getAllUser(){
        $sql = "SELECT * FROM users";
        return $this->db->getAll($sql);
    }
    function getUser($id){
        $sql = "SELECT * FROM users WHERE id = $id";
        return $this->db->getOne($sql,[$id]);
    }
    function insertUser($data){
        $sql = "INSERT INTO users(email, password, name, role, active) VALUE (?,?,?,?,?)";
        $param = [$data['email'],$data['password'],$data['name'],$data['role'],$data['active']];
        return $this->db->insert($sql, $param);
        
    }

    function editUser($data){
        $sql = "UPDATE users SET email =?, name =?, role =?, active =? WHERE id =?";
        $param = [$data['email'], $data['name'], $data['role'], $data['active'], $data['id']];
        return $this->db->update($sql,$param);
    }
}
?>