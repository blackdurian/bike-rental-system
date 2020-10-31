<?php

session_start();
require_once "../dao/CategoryDao.php";
require_once "../util/UUID.php";
    $title = 'Home';
    $meta = 'partials/meta.php';
    $sidebar = 'partials/sidebar.php';
    $navbar = 'partials/navbar.php';
    $footer = 'partials/footer.php';
    $childView = 'views/_category_list.php';
    $customJs = 'assets/js/category.js';
    $response = array(
        "message" => "",
        "status" => ""
    );
    $action="";

    if (! empty($_GET["action"])) {
        $action = $_GET["action"];
    }

    switch ($action) { 
        //todo: optimize if else condition
        case "add":
            if (isset($_POST['add'])) {
                $id = $_POST['id'];
                if(UUID::is_valid($id)){
                    $name = $_POST['name'];
                    $description = $_POST['description'];
                    $dao = new CategoryDao();
                    if(!(empty(trim($name))||empty(trim($description)))){
                        $insertId = $dao->add($id,$name,$description);  
                        $respond["message"] = "Successfully Adding New Record!";
                        $respond["status"] = "success";
                    }else{
                        $respond["message"] = "Field cannot be Empty.";
                        $respond["status"] = "fail";
                    }
                }else{
                    $respond["message"] = "Invalid UUID.";
                    $respond["status"] = "fail";
                }
            }else{
                $respond["message"] = "Invalid Request.";
                $respond["status"] = "fail";
            }
            echo json_encode($respond);
            break;
        
        case "update":       
            if (isset($_POST['update'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $description = $_POST['description'];
                $dao = new CategoryDao();
                //todo: valid exist id 
                $dao->update($id,$name,$description);
                $respond["message"] = "Update success!";
                $respond["status"] = "success";
            }else{
                $respond["message"] = "Invalid Request.";
                $respond["status"] = "fail";
            }
            echo json_encode($respond);
            
            break;
        
        case "delete":
            if (isset($_POST['delete'])) {
                $id = $_POST['id'];
                $ajexResponse = "";
                $dao = new CategoryDao();
                $dao->delete($id);   
                $respond["message"] = "Delete success!";
                $respond["status"] = "success";
            }else{
                $respond["message"] = "Invalid Request.";
                $respond["status"] = "fail";
            }
            echo json_encode($respond);
            break;

        default:
            $dao = new CategoryDao();
            $result = $dao->findAll();
            $childView = 'views/_category_list.php';
            include('partials/layout.php');
            break;
        }
?>