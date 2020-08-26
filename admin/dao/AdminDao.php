<?php
require_once "core/database/DatabaseLoader.php";

use core\database\DatabaseLoader;

class AdminDao {

    private $db_handle;
    
    function __construct() {
        $this->db_handle = new DatabaseLoader();
    }
    
    function add($name, $citizen_id, $phone, $role) {  //todo admin object
        $query = "INSERT INTO admin (name, citizen_id, phone, role) VALUES (?, ?, ?, ?)";
        $paramType = "ssss";
        $paramValue = array(
            $name,
            $citizen_id,
            $phone,
            $role
        );       
        $this->db_handle->insert($query, $paramType, $paramValue); 
    }

    function delete($admin_id) { // todo admin id to admin oject
        $query = "DELETE FROM admin WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $admin_id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    

    function findAll() {
        $query = "SELECT * FROM admin ORDER BY id";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }


    function findOne($id) {
        $query = "SELECT * FROM admin WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }

    function update($name, $citizen_id, $phone, $role, $admin_id) { // admin object
        $query = "UPDATE admin SET name = ?,citizen_id = ?,phone = ?,role = ? WHERE id = ?";
        $paramType = "ssssi";
        $paramValue = array(
            $name,
            $citizen_id,
            $phone,
            $role,
            $admin_id
        );
        
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    

}
?>