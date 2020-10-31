<?php
include('session.php');
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
          //todo: add rental
        case "update":
        //todo: update rental
        case "delete":
            $rental_id = $_GET["id"];
            $dao = new RentalDao();
            $dao->delete($rental_id);
            $result = $dao->findAll();
            $childView = 'views/_rental_list.php';
            include('partials/layout.php');
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