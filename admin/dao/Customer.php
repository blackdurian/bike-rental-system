<?php
 
 require_once "core/database/DatabaseLoader.php";
 require_once "core/util/UUID.php";
 
 class CustomerDao {
 
     private $db_handle;
   
 
     function __construct() {
         $this->db_handle = DatabaseLoader::getInstance();
     }
 
     function add($id, $user_id) {   
         $query = "INSERT INTO customer (id, user_id) VALUES (?, ?)";
         $paramType = "ss";
         $paramValue = array(
            $id, 
            $user_id
         );       
         $this->db_handle->insert($query, $paramType, $paramValue); 
     }
 
     function delete($id) { 
         $query = "DELETE FROM customer WHERE id = ?";
         $paramType = "s";
         $paramValue = array(
             $id
         );
         $this->db_handle->update($query, $paramType, $paramValue);
     }
 
     function findAll() {
         $query = "SELECT * FROM customer";
         $result = $this->db_handle->runBaseQuery($query);
         return $result;
     }
 
       
     function findOne($id) {
         $query = "SELECT * FROM customer WHERE id = ?";
         $paramType = "s";
         $paramValue = array(
             $id
         );
         $result = $this->db_handle->runQuery($query, $paramType, $paramValue);    
         return $result;
     }
 
     function update($id, $user_id) { // TODO: Change user mapping 
         $query = "UPDATE customer SET user_id = ? WHERE id = ?";
         $paramType = "sssssbs";
         $paramValue = array(
            $user_id,
            $id
         );
         $this->db_handle->update($query, $paramType, $paramValue);
     }
 }
 

?>