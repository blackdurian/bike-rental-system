<?php
    
    include('session.php');
    require_once "../dao/BikeDao.php";
     
        $title = 'Home';
        $meta = 'partials/meta.php';
        $sidebar = 'partials/sidebar.php';
        $navbar = 'partials/navbar.php';
        $footer = 'partials/footer.php';
        $childView = 'views/_bike_list.php';
        $customJs = 'assets/js/custom.js';
        
        $action ="";
        if (! empty($_GET["action"])) {
            $action = $_GET["action"];
        }
    
        switch ($action) { 
        
            case "add":
              //todo: add bike user
            case "update":
            //todo: update bike user
            case "delete":
                $bike_id = $_GET["id"];
                $dao = new BikeDao();
                $dao->delete($bike_id);
                $result = $dao->findAll();
                $childView = 'views/_bike_list.php';
                include('partials/layout.php');
                break;
            
    
                case "view":
                    $bike_id = $_GET["id"];
                    $dao = new BikeDao();    
                  //  $result =  $dao->findOneJoinFeedback($bike_id);
                    $childView = 'views/_bike_detail.php';
                    include('partials/layout.php');
                    break;
    
            default:
                $dao = new BikeDao();
                $result = $dao->findAllWithDetail();
                $childView = 'views/_bike_list.php';
                include('partials/layout.php');
                break;
    
                
        }

?>