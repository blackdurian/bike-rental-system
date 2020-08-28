<?php
require_once "core/database/DatabaseLoader.php";
require_once "core/util/UUID.php";

use admin\util\DatabaseLoader;
use admin\model\Admin;

class AdminDao {

    private $db_handle;
  

    function __construct() {
        $this->db_handle = DatabaseLoader::getInstance();
    }
    
    function add(Admin $admin) {  //Todo validation : user not null 
        $user = $admin->getUser(); // TODO validation : new user or existing user
        $user->setId(UUID::v4());
        $admin->setId(UUID::v4())->setUser($user);
  
        $query = "INSERT INTO br_user (id, username, password, role, email, dob, profile_photo) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $paramType = "ssssssb";
        $paramValue = array(
            $user->getId(),
            $user->getUsername(),
            $user->getPassword(),
            $user->getRole(),
            $user->getEmail(),
            $user->getDob(),
            $user->getProfilePhoto()
        );       
        $this->db_handle->insert($query, $paramType, $paramValue); 


        $query = "INSERT INTO admin (id, user_id) VALUES (?, ?)";
        $paramType = "ss";
        $paramValue = array(
            $admin->getId(),
            $admin->getUser()->getId()
        );       
        $this->db_handle->insert($query, $paramType, $paramValue); 
    }

    function delete(Admin $admin) { 
        $query = "DELETE FROM admin WHERE id = ?";
        $paramType = "s";
        $paramValue = array(
            $admin->getId()
        );
        $this->db_handle->update($query, $paramType, $paramValue);

        $query = "DELETE FROM br_user WHERE id = ?";
        $paramType = "s";
        $paramValue = array(
            $admin->getUser()->getId()
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    

    function findAllFetchArray() {
        $query = "SELECT * FROM admin";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }


    function findOneFetchArray($id) {
        $query = "SELECT * FROM admin WHERE id = ?";
        $paramType = "s";
        $paramValue = array(
            $id
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }

    function update(Admin $admin) { // TODO: Change user mapping 

        $query = "UPDATE br_user SET username = ?, password = ?, role = ?, email = ?, dob = ?, profile_photo = ? WHERE id = ?";
        $paramType = "sssssbs";
        $paramValue = array(
            $admin->getUser()->getUsername(),
            $admin->getUser()->getPassword(),
            $admin->getUser()->getRole(),
            $admin->getUser()->getEmail(),
            $admin->getUser()->getDob(),
            $admin->getUser()->getProfilePhoto(),
            $admin->getUser()->getId()
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    
        $query = "UPDATE admin SET name = ? WHERE id = ?";
        $paramType = "ss";
        $paramValue = array(
            $admin->getUser()->getId(),
            $admin->getId()
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    

}
?>