<?php
 
 require_once "../util/DatabaseLoader.php";
 
 class BikeDao {
 
     private $db_handle;
   
 
     function __construct() {
         $this->db_handle = DatabaseLoader::getInstance();
     }
 
     function addWithPhoto($id, $name,$vendor_id, $photo, $category, $current_station, $is_return, $unit_price, $description) {   
         $query = "INSERT INTO bike (id, name, vendor_id, photo, category, current_station, is_return, unit_price, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)";
         $paramType = "ssssssids";
         $paramValue = array(
            $id, 
            $name,
            $vendor_id, 
            $photo, 
            $category, 
            $current_station, 
            $is_return, 
            $unit_price, 
            $description
         );       
         $this->db_handle->insert($query, $paramType, $paramValue); 
     }

     function add($id, $name,$vendor_id, $category, $current_station, $is_return, $unit_price, $description) {   
        $query = "INSERT INTO bike (id, name, vendor_id, category, current_station, is_return, unit_price, description) VALUES (?, ?, ?, ?, ?, ?, ?,?)";
        $paramType = "sssssids";
        $paramValue = array(
           $id, 
           $name,
           $vendor_id, 
           $category, 
           $current_station, 
           $is_return, 
           $unit_price, 
           $description
        );       
        $this->db_handle->insert($query, $paramType, $paramValue); 
    }
     function delete($id) { 
         $query = "DELETE FROM bike WHERE id = ?";
         $paramType = "s";
         $paramValue = array(
             $id
         );
         $this->db_handle->update($query, $paramType, $paramValue);
     }
 
     function findAll() {
         $query = "SELECT * FROM bike";
         $result = $this->db_handle->runBaseQuery($query);
         return $result;
     }
 
     function findAllWithDetail() {
        $query = 'SELECT b.*, v.username AS vendor_name,s.name AS station_name, c.name AS category_name 
                    FROM (((bike b LEFT JOIN br_user v ON b.vendor_id = v.id) 
                        LEFT JOIN station s ON b.current_station = s.id) 
                        LEFT JOIN category c ON b.category = c.id)';
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

       
     function findOne($id) {
         $query = "SELECT * FROM bike WHERE id = ?";
         $paramType = "s";
         $paramValue = array(
             $id
         );
         $result = $this->db_handle->runQuery($query, $paramType, $paramValue);    
         return $result;
     }
 
     function update($id, $name, $vendor_id, $category, $current_station, $is_return, $unit_price, $description) { // TODO: Change user mapping 
         $query = "UPDATE bike SET name=?, vendor_id=?, category=?, current_station=?, is_return=?, unit_price=?, description=? WHERE id = ?";
         $paramType = "ssssidss";
         $paramValue = array(
             $name,
            $vendor_id,  
            $category, 
            $current_station, 
            $is_return, 
            $unit_price, 
            $description,
            $id
         );
         $this->db_handle->update($query, $paramType, $paramValue);
     }

     function updateWithPhoto($id, $name, $vendor_id, $photo, $category, $current_station, $is_return, $unit_price, $description) { // TODO: Change user mapping 
        $query = "UPDATE bike SET name=?, vendor_id=?, photo=?, category=?, current_station=?, is_return=?, unit_price=?, description=? WHERE id = ?";
        $paramType = "sssssidss";
        $paramValue = array(
            $name,
           $vendor_id, 
           $photo, 
           $category, 
           $current_station, 
           $is_return, 
           $unit_price, 
           $description,
           $id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }
 }
 

?>