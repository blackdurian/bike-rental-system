<?php
 
 require_once "../util/DatabaseLoader.php";
 
 class StationDao {
 
     private $db_handle;
   
 
     function __construct() {
         $this->db_handle = DatabaseLoader::getInstance();
     }
 
     function add($id, $name, $address) {   
         $query = "INSERT INTO station (id, name, address) VALUES (?, ?, ?)";
         $paramType = "sss";
         $paramValue = array(
            $id, $name, $address
         );       
         $insert_id =$this->db_handle->insert($query, $paramType, $paramValue); 
         return $insert_id;
     }
 
     function delete($id) { 
         $query = "DELETE FROM station WHERE id = ?";
         $paramType = "s";
         $paramValue = array(
             $id
         );
         $this->db_handle->update($query, $paramType, $paramValue);
     }
 
     function findAll() {
         $query = "SELECT * FROM station ORDER BY name;";
         $result = $this->db_handle->runBaseQuery($query);
         return $result;
     }
 
       
     function findOne($id) {
         $query = "SELECT * FROM station WHERE id = ?";
         $paramType = "s";
         $paramValue = array(
             $id
         );
         $result = $this->db_handle->runQuery($query, $paramType, $paramValue);    
         return $result;
     }
 
     function update($id, $name, $address) { // TODO: Change user mapping 
         $query = "UPDATE station SET name = ?, address = ? WHERE id = ?";
         $paramType = "sss";
         $paramValue = array(
            $name, 
            $address, 
            $id
         );
         $this->db_handle->update($query, $paramType, $paramValue);
     }
 }
 

?>