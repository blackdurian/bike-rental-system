<?php
 
 require_once "../util/DatabaseLoader.php";
 
 class CategoryDao {
 
     private $db_handle;
   
 
     function __construct() {
         $this->db_handle = DatabaseLoader::getInstance();
     }
 
     function add($id, $name, $description) {   
         $query = "INSERT INTO category (id, name, description) VALUES (?, ?, ?)";
         $paramType = "sss";
         $paramValue = array(
            $id, 
            $name, 
            $description
         );       
         $this->db_handle->insert($query, $paramType, $paramValue); 
     }
 
     function delete($id) { 
         $query = "DELETE FROM category WHERE id = ?";
         $paramType = "s";
         $paramValue = array(
             $id
         );
         $this->db_handle->update($query, $paramType, $paramValue);
     }
 
     function findAll() {
         $query = "SELECT * FROM category";
         $result = $this->db_handle->runBaseQuery($query);
         return $result;
     }
 
       
     function findOne($id) {
         $query = "SELECT * FROM category WHERE id = ?";
         $paramType = "s";
         $paramValue = array(
             $id
         );
         $result = $this->db_handle->runQuery($query, $paramType, $paramValue);    
         return $result;
     }
 
     function update($id, $name, $description) { // TODO: Change user mapping 
         $query = "UPDATE category SET name = ?, description = ? WHERE id = ?";
         $paramType = "sss";
         $paramValue = array(
            $name, 
            $description,
            $id
         );
         $this->db_handle->update($query, $paramType, $paramValue);
     }
 }
 

?>