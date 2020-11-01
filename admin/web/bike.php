<?php
    
    include('session.php');
    require_once "../dao/BikeDao.php";
    require_once "../dao/CategoryDao.php";
    require_once "../dao/StationDao.php";
    require_once "../dao/UserDao.php";
    require_once "../util/UUID.php";

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
                if(isset($_POST['name'])){
                      $id =  UUID::v4();
                      $name = $_POST['name'];
                      $vendor_Id = $_POST['vendor'];
                      $category = $_POST['category'];
                     $current_station =$_POST['station'];
                    $is_return = ($_POST['status']=="true")?true:false;
                    $unit_price = $_POST['price'];
                    $description = $_POST['description'];

                      $dao = new BikeDao();
                      if (isset($_FILES['profile-photo'])) {
                          if (is_uploaded_file($_FILES['profile-photo']['tmp_name'])) {
                              $photo = addslashes(file_get_contents($_FILES['profile-photo']['tmp_name']));
                              $dao->addWithPhoto($id,$name, $vendor_Id,$photo,$category,$current_station,$is_return,$unit_price,$description);
                        
                          }  
                      }else{
                          $dao->add($id,$name, $vendor_Id,$category,$current_station,$is_return,$unit_price,$description);
                          
                      }
                     
                    header("Location: bike.php");
                  } else{
                    $userDao = new UserDao();
                    $categoryDao = new CategoryDao();
                    $stationDao = new StationDao();
                    $vendor = $userDao->findAllVendorName();
                    $category = $categoryDao->findAll();
                    $station = $stationDao->findAll();   
                    $childView = 'views/_bike_form.php';
                    include('partials/layout.php');
                }
                break;
            case "update":
                if(isset($_POST['id'])){
                    $id =  $_POST['id'];
                    $name = $_POST['name'];
                    $vendor_Id = $_POST['vendor'];
                    $category = $_POST['category'];
                    $current_station =$_POST['station'];
                    $is_return = ($_POST['status']=="true")?true:false;
                    $unit_price = $_POST['price'];
                    $description = $_POST['description'];
                    $dao = new BikeDao();
                    if (isset($_FILES['profile-photo'])) {
                        if (is_uploaded_file($_FILES['profile-photo']['tmp_name'])) {
                            $photo = addslashes(file_get_contents($_FILES['profile-photo']['tmp_name']));
                            $dao->updateWithPhoto($id,$name, $vendor_Id,$photo,$category,$current_station,$is_return,$unit_price,$description);                       
                        }  
                    }else{
                        $dao->update($id,$name, $vendor_Id,$category,$current_station,$is_return,$unit_price,$description);
                    }
                }
             

            case "delete":
                if(isset($_GET["id"])){
                    $bike_id = $_GET["id"];
                    $dao = new BikeDao();
                    $dao->delete($bike_id);
                    $result = $dao->findAllWithDetail();
                    $childView = 'views/_bike_list.php';
                    include('partials/layout.php');
                    break;
                }
    
                case "view":
                    if(isset($_GET["id"])){
                        $id = $_GET["id"];
                        $bikeDao = new BikeDao();    
                        $userDao = new UserDao();
                        $categoryDao = new CategoryDao();
                        $stationDao = new StationDao();
                        $vendor = $userDao->findAllVendorName();
                        $category = $categoryDao->findAll();
                        $station = $stationDao->findAll();   
                        $result = $bikeDao->findOne($id);
                        if(!empty($result)){
                            $childView = 'views/_bike_detail.php';
                            include('partials/layout.php');
                            break;
                        }
                    }                
    
            default:
                $dao = new BikeDao();
                $result = $dao->findAllWithDetail();
                $childView = 'views/_bike_list.php';
                include('partials/layout.php');
                break;
    
                
        }
