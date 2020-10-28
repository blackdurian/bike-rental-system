<?php
 
 require_once "core/database/DatabaseLoader.php";
 require_once "core/util/UUID.php";
 
 class FeedbackDao {
 
     private $db_handle;
   
 
     function __construct() {
         $this->db_handle = DatabaseLoader::getInstance();
     }
 
     function add($id, $rating, $description) {   
         $query = "INSERT INTO feedback (id, rating, description) VALUES (?, ?, ?)";
         $paramType = "sss";
         $paramValue = array(
            $id, 
            $rating, 
            $description
         );       
         $this->db_handle->insert($query, $paramType, $paramValue); 
     }
 
     function delete($id) { 
         $query = "DELETE FROM feedback WHERE id = ?";
         $paramType = "s";
         $paramValue = array(
             $id
         );
         $this->db_handle->update($query, $paramType, $paramValue);
     }
 
     function findAll() {
         $query = "SELECT * FROM feedback";
         $result = $this->db_handle->runBaseQuery($query);
         return $result;
     }
 
       
     function findOne($id) {
         $query = "SELECT * FROM feedback WHERE id = ?";
         $paramType = "s";
         $paramValue = array(
             $id
         );
         $result = $this->db_handle->runQuery($query, $paramType, $paramValue);    
         return $result;
     }
 
     function update($id, $rating, $description) { // TODO: Change user mapping 
         $query = "UPDATE feedback SET rating = ?, description = ? WHERE id = ?";
         $paramType = "sss";
         $paramValue = array(
            $rating, 
            $description,
            $id
         );
         $this->db_handle->update($query, $paramType, $paramValue);
     }
 }
 

?>