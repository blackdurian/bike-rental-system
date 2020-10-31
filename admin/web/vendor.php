<?php
    
    include('session.php');
    require_once "../dao/UserDao.php";
     
        $title = 'Home';
        $meta = 'partials/meta.php';
        $sidebar = 'partials/sidebar.php';
        $navbar = 'partials/navbar.php';
        $footer = 'partials/footer.php';
        $childView = 'views/_vendor_list.php';
        $customJs = 'assets/js/custom.js';
        
        $action ="";
        if (! empty($_GET["action"])) {
            $action = $_GET["action"];
        }
    
        switch ($action) { 
        
            case "add":
              //todo: add vendor user
            case "update":
            //todo: update vendor user
            case "delete":
                $vendor_id = $_GET["id"];
                $dao = new UserDao();
                //todo: role validaion 
                $dao->delete($vendor_id);
                $result = $dao->findAll();
                $childView = 'views/_vendor_list.php';
                include('partials/layout.php');
                break;
            
    
                case "view":
                    $vendor_id = $_GET["id"];
                    $dao = new UserDao();    
                  //  $result =  $dao->findOneJoinFeedback($vendor_id);
                    $childView = 'views/_vendor_detail.php';
                    include('partials/layout.php');
                    break;
    
            default:
                $dao = new UserDao();
                $result = $dao->findAllVendor();
                $childView = 'views/_vendor_list.php';
                include('partials/layout.php');
                break;
    
                
        }

?>