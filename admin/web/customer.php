<?php
    
    include('session.php');
    require_once "../dao/UserDao.php";
     
        $title = 'Home';
        $meta = 'partials/meta.php';
        $sidebar = 'partials/sidebar.php';
        $navbar = 'partials/navbar.php';
        $footer = 'partials/footer.php';
        $childView = 'views/_customer_list.php';
        $customJs = 'assets/js/custom.js';
        
        $action ="";
        if (! empty($_GET["action"])) {
            $action = $_GET["action"];
        }
    
        switch ($action) { 
        
            case "add":
              //todo: add customer user
            case "update":
            //todo: update customer user
            case "delete":
                $customer_id = $_GET["id"];
                $dao = new UserDao();
                //todo: role validaion 
                $dao->delete($customer_id);
                $result = $dao->findAll();
                $childView = 'views/_customer_list.php';
                include('partials/layout.php');
                break;
            
    
                case "view":
                    $customer_id = $_GET["id"];
                    $dao = new UserDao();    
                  //  $result =  $dao->findOneJoinFeedback($customer_id);
                    $childView = 'views/_customer_detail.php';
                    include('partials/layout.php');
                    break;
    
            default:
                $dao = new UserDao();
                $result = $dao->findAllcustomer();
                $childView = 'views/_customer_list.php';
                include('partials/layout.php');
                break;
    
                
        }

?>