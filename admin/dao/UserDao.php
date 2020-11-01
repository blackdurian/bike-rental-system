<?php
require_once "../util/DatabaseLoader.php";

class UserDao {

    private $db_handle;
  

    function __construct() {
        $this->db_handle = DatabaseLoader::getInstance();
    }
    function add($id, $username, $password, $role, $email, $dob) {   
        $query = "INSERT INTO br_user (id, username, password, role, email, dob) VALUES (?, ?, ?, ?, ?, ?)";
        $paramType = "ssssss";
        $paramValue = array(
            $id,
            $username, 
            $password, 
            $role, 
            $email,
            $dob
        );       
        $insert_id =$this->db_handle->insert($query, $paramType, $paramValue); 
    //    $queryUpdate =  "UPDATE br_user SET profile_photo = '{$profile_photo}' WHERE id = '{$id}'";
     //  $this->db_handle->runBaseQuery($queryUpdate);
         return $insert_id;
    }

    function addWithPhoto($id, $username, $password, $role, $email, $dob, $profile_photo) {   
        $query = "INSERT INTO br_user (id, username, password, role, email, dob,profile_photo) VALUES (?, ?, ?, ?, ?, ?,?)";
        $paramType = "sssssss";
        $paramValue = array(
            $id,
            $username, 
            $password, 
            $role, 
            $email,
            $dob,
            $profile_photo 
        );       
        $insert_id =$this->db_handle->insert($query, $paramType, $paramValue); 
    //    $queryUpdate =  "UPDATE br_user SET profile_photo = '{$profile_photo}' WHERE id = '{$id}'";
     //  $this->db_handle->runBaseQuery($queryUpdate);
         return $insert_id;
    }

    function delete($id) { 
        $query = "DELETE FROM br_user WHERE id = ?";
        $paramType = "s";
        $paramValue = array(
            $id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function findAll() {
        $query = "SELECT * FROM br_user";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function findAllVendor() {
        $query = "SELECT * FROM br_user WHERE role = 'vendor' ORDER BY date_created;";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    
    function findAllVendorName() {
        $query = "SELECT id, username FROM br_user WHERE role = 'vendor' ORDER BY date_created;";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }
    function findAllCustomer() {
        $query = "SELECT * FROM br_user WHERE role = 'customer' ORDER BY date_created;";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }
      
    function findOne($id) {
        $query = "SELECT * FROM br_user WHERE id = ?";
        $paramType = "s";
        $paramValue = array(
            $id
        );
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);    
        return $result;
    }

    function update($id, $username, $password, $role, $email, $dob, $profile_photo) { // TODO: Change user mapping 
        $query = "UPDATE br_user SET username = ?, password = ?, role = ?, email = ?, dob = ?, profile_photo = ? WHERE id = ?";
        $paramType = "sssssbs";
        $paramValue = array(
            $username, 
            $password, 
            $role, 
            $email,
            $dob,             
            $profile_photo,
            $id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function findByUsername($username) {
        $query = "SELECT * FROM br_user WHERE username = ?";
        $paramType = "s";
        $paramValue = array(
            $username
        );
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);    
        return $result;
    }
}

?>