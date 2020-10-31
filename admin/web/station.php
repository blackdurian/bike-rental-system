<?php
include('session.php');
require_once "../dao/StationDao.php";
require_once "../util/UUID.php";
    $title = 'Home';
    $meta = 'partials/meta.php';
    $sidebar = 'partials/sidebar.php';
    $navbar = 'partials/navbar.php';
    $footer = 'partials/footer.php';
    $childView = 'views/_station_list.php';
    $customJs = 'assets/js/station.js';
    $respond = array(
        "message" => "",
        "status" => ""
    );
    $action="";

    if (! empty($_GET["action"])) {
        $action = $_GET["action"];
    }

    switch ($action) { 
        case "add":
            if (isset($_POST['add'])) {
                $id = $_POST['id'];
                if(UUID::is_valid($id)){
                    $name = $_POST['name'];
                    $address = $_POST['address'];
                    $dao = new StationDao();
                    if(!(empty(trim($name))||empty(trim($address)))){
                        $insertId = $dao->add($id,$name,$address);
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
                $address = $_POST['address'];
                $dao = new StationDao();
                //todo: valid exist id 
                $dao->update($id,$name,$address);
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
                $dao = new StationDao();
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
            $dao = new StationDao();
            $result = $dao->findAll();
            $childView = 'views/_station_list.php';
            include('partials/layout.php');
            break;
        }
?>