<?php
 
 require_once "../util/DatabaseLoader.php";
 
 class RentalDao {
 
     private $db_handle;
   
 
     function __construct() {
         $this->db_handle = DatabaseLoader::getInstance();
     }
 
     function add($id, $customer_id, $bike_id, $check_in_time, 
                    $check_out_time, $check_in_station, $check_out_station, 
                    $total_price, $is_complete, $feedback_id) {   
         $query = "INSERT INTO rental (id, customer_id, bike_id, check_in_time, 
                                        check_out_time, check_in_station, check_out_station, 
                                        total_price, is_complete, feedback_id) VALUES (?, ?, ?, ?,
                                                                                         ?, ?, ?,
                                                                                         ?, ?, ?)";
         $paramType = "sssssssdis";
         $paramValue = array(
            $id, 
            $customer_id, 
            $bike_id, 
            $check_in_time, 
            $check_out_time, 
            $check_in_station, 
            $check_out_station, 
            $total_price, 
            $is_complete, 
            $feedback_id
         );       
         $this->db_handle->insert($query, $paramType, $paramValue); 
     }
 
     function delete($id) { 
         $query = "DELETE FROM rental WHERE id = ?";
         $paramType = "s";
         $paramValue = array(
             $id
         );
         $this->db_handle->update($query, $paramType, $paramValue);
     }
 
     function findAll() {
         $query = "SELECT * FROM rental";
         $result = $this->db_handle->runBaseQuery($query);
         return $result;
     }
 
       
     function findOne($id) {
         $query = "SELECT * FROM rental WHERE id = ?";
         $paramType = "s";
         $paramValue = array(
             $id
         );
         $result = $this->db_handle->runQuery($query, $paramType, $paramValue);    
         return $result;
     }
 
     function update($id, $customer_id, $bike_id, $check_in_time, 
                        $check_out_time, $check_in_station, $check_out_station, 
                        $total_price, $is_complete, $feedback_id) { // TODO: Change user mapping 
         $query = "UPDATE rental SET customer_id = ?, bike_id = ?, check_in_time = ?, 
                                        check_out_time = ?, check_in_station = ?, check_out_station = ?, 
                                        total_price = ?, is_complete = ?, feedback_id = ? WHERE id = ?";
         $paramType = "ssssssdiss";
         $paramValue = array(
            $customer_id, $bike_id, $check_in_time, 
            $check_out_time, $check_in_station, $check_out_station, 
            $total_price, $is_complete, $feedback_id,
            $id
         );
         $this->db_handle->update($query, $paramType, $paramValue);
     }
 }
 

?>