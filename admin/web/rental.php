<?php

session_start();
require_once "../dao/RentalDao.php";
 
    $title = 'Home';
    $meta = 'partials/meta.php';
    $sidebar = 'partials/sidebar.php';
    $navbar = 'partials/navbar.php';
    $footer = 'partials/footer.php';
    $childView = 'views/_rental_list.php';
    $customJs = 'assets/js/custom.js';
    
    $action ="";
    if (! empty($_GET["action"])) {
        $action = $_GET["action"];
    }

    switch ($action) { 


        
        case "add":
            if (isset($_POST['add'])) {
                $name = $_POST['name'];
                $roll_number = $_POST['roll_number'];
                $dob = "";
                if ($_POST["dob"]) {
                    $dob_timestamp = strtotime($_POST["dob"]);
                    $dob = date("Y-m-d", $dob_timestamp);
                }
                $class = $_POST['class'];
                
                $dao = new RentalDao();
                //$insertId = $dao->add($name, $roll_number, $dob, $class);
                if (empty($insertId)) {
                    $response = array(
                        "message" => "Problem in Adding New Record",
                        "type" => "error"
                    );
                } else {
                    header("Location: index.php");
                }
            }
            $childView = 'views/_booking.php'; //booking add
            break;
        
        case "edit":
            $rental_id = $_GET["id"];
            $dao = new RentalDao();
            
            if (isset($_POST['add'])) {
                $name = $_POST['name'];
                $roll_number = $_POST['roll_number'];
                $dob = "";
                if ($_POST["dob"]) {
                    $dob_timestamp = strtotime($_POST["dob"]);
                    $dob = date("Y-m-d", $dob_timestamp);
                }
                $class = $_POST['class'];
                $bookingDao->editStudent($name, $roll_number, $dob, $class, $bookingDao_id);
                
                header("Location: index.php");
            }
            
            $result = $bookingDao->getStudentById($bookingDao_id);
            $childView = 'views/_booking.php';//booking edit
            break;
        
        case "delete":
            $rental_id = $_GET["id"];
            $dao = new RentalDao();
            
            $bookingDao->deleteStudent($bookingDao_id);
            
            $result = $bookingDao->getAllStudent();
            $childView = 'views/_booking.php';
            break;
        

            case "view":
                $rental_id = $_GET["id"];
                $dao = new RentalDao();    
                $result =  $dao->findOneJoinFeedback($rental_id);
                $childView = 'views/_rental_detail.php';
                include('partials/layout.php');
                break;

        default:
            $dao = new RentalDao();
            $result = $dao->findAll();
            $childView = 'views/_rental_list.php';
            include('partials/layout.php');
            break;

            
    }

  




    
?>