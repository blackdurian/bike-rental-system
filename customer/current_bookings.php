<!DOCTYPE html>
<html lang="en">

  <head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">

    <style type="text/css">
      .centor {
        text-align: center;
      }
      .fullwidthbtn {
        width: 100%;
      }

    </style>

  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    
    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



      <header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-3 ">
              <div class="site-logo">
                <a href="index.html">CarRent</a>
              </div>
            </div>

            <div class="col-9  text-right">
              

              <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>

              

              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  <li class="active"><a href="index.html" class="nav-link">Home</a></li>
                  <li><a href="rent.php" class="nav-link">Rent a Bike</a></li>
                  <li><a href="current_bookings.php" class="nav-link">View Bookings</a></li>
                  <li><a href="feedback.php" class="nav-link">Feedback for Rental</a></li>
                  <li><a href="blog.html" class="nav-link">Blog</a></li>
                  <li><a href="contact.html" class="nav-link">Contact</a></li>
                </ul>
              </nav>
            </div>

            
          </div>
        </div>

      </header>

    <div class="ftco-blocks-cover-1">
      <div class="ftco-cover-1 overlay innerpage" style="background-image: url('images/bg.jpg')">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 text-center">
              <h1>Welcome</h1>
              <p>Choose any function from the ones stated below.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-light" style="overflow-x:auto;">
    	<div class="container">
    		<div class="row">

                <div class="container" id="sqltable">

<?php

include("conn.php");
include ("../core/util/UUID.php");

// $result = mysqli_query($db,"SELECT * FROM rental");

// $result = mysqli_query($db,'SELECT b.*, v.username AS vendor_name,s.name AS station_name, c.name AS category_name 
//                     FROM (((bike b LEFT JOIN br_user v ON b.vendor_id = v.id) 
//                         LEFT JOIN station s ON b.current_station = s.id) 
//                         LEFT JOIN category c ON b.category = c.id)');

$result = mysqli_query($db,'SELECT b.*, r.*, v.username AS vendor_name,s.name AS station_name, c.name AS category_name,  
                    FROM ((((rental r LEFT JOIN br_user v ON r.customer_id = v.id) 
                        LEFT JOIN bike b ON r.bike_id = b.id) 
                        LEFT JOIN category c ON b.category = c.id)
                        LEFT JOIN rental r ON v.id = r.customer_id)');
?>
      
        <table class="table table-bordered" >
            <thead>
                  <tr>
                    <th>Bike Name</th>
                    <th>Check In Time</th>
                    <th>Check Out Time</th>
                    <th>Check In Station</th>
                    <th>Check Out Station</th>
                    <th>Total Price</th>
                </tr>
            </thead>

            <?php
        while($row = mysqli_fetch_array($result)) 
        { 
            $id = $row['id'];
            echo "<tr>";
                echo "<tbody>";
                echo "<td>"; 
                echo $row['name'];
                echo "</td>";

                echo "<td>";
                echo $row['check_in_time'];
                echo "</td>";

                echo "<td>";
                echo '
                <form>
                        <div class="msg"></div>
                        <input type="text" class="valRow" value="'.$row['id'].'" hidden>
                        <input type="button" value="Delete" class="btnDelete">
                        <div class="error_msg"></div>
                </form>
                    ';
                echo "</td>";

                echo "<td>";
                echo '
                <form>
                        <div class="msg"></div>
                        <input type="text" class="valRow" value="'.$row['id'].'" hidden>
                        <input type="button" value="Edit" class="btnEdit" onclick="editBooking(\''.$id.'\')">
                        <div class="error_msg"></div>
                </form>
                    ';
                echo "</td>";
                echo "</tbody>";
            echo "</tr>";
        } 
            mysqli_close($db); //to close the database connection 
        ?> 





        </table>
    </div>

</div>
</div>
</div>

    <footer class="site-footer">
      <div class="container">
        <div class="row pt-1 mt-2 text-center">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <div class="border-top pt-5">
              <h3>About Us</h3> 
              <p>We want to make this world a better place and allow more access to bikes so that everyone can reduce the
              usage of fuel based transportation to help our environment heal</p>
            </div>
          </div>
          <div class="col-md-2"></div>
        </div>
      </div>
    </footer>

    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>

  </body>

</html>

