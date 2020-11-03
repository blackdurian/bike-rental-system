<?php
    
    include('session.php');

?>

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
                  <li class="active"><a href="index.php" class="nav-link">Home</a></li>
                  <li><a href="rent.php" class="nav-link">Rent a Bike</a></li>
                  <li><a href="current_bookings.php" class="nav-link">View Bookings</a></li>
                  <li><a href="feedback.php" class="nav-link">Feedback for Rental</a></li>
                  <li><a href="logout.php" class="nav-link">Logout</a></li>
                </ul>
              </nav>
            </div>

            
          </div>
        </div>

      </header>

    <div class="ftco-blocks-cover-1">
      <div class="ftco-cover-1 overlay innerpage" style="background-image: url('../images/bg-customer.jpg')">
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

    <div class="site-section bg-light">
    	<div class="container">
    		<div class="row">

    			<div class="col-lg-4 col-md-6 mb-4">
    				<div class="item-1">
    					<!-- <a href="#"><img src="images/img_1.jpg" alt="Image" class="img-fluid"></a> -->
    					<div class="item-1-contents">
    						<div class="text-center">
    							<h2>View Bikes for Rental</h2>
    							<div class="rating">
    								<span class="icon-star text-warning"></span>
    								<span class="icon-star text-warning"></span>
    								<span class="icon-star text-warning"></span>
    								<span class="icon-star text-warning"></span>
    								<span class="icon-star text-warning"></span>
    							</div>
    						</div>
    						<ul class="specs">
    							<li>
    								<span class="spec"></span>
    							</li>
    							<li>
    								<span class="centor">Book a Bike For Rental</span>
    								<span class="spec"></span>
    							</li>
    						</ul>
    						<div class="d-flex action">
    							<a href="rent.php" class="btn btn-primary fullwidthbtn">Rent a Bike</a>
    						</div>
    					</div>
    				</div>
    			</div>

    			<div class="col-lg-4 col-md-6 mb-4">
    				<div class="item-1">
    					<!-- <a href="#"><img src="images/img_1.jpg" alt="Image" class="img-fluid"></a> -->
    					<div class="item-1-contents">
    						<div class="text-center">
    							<h2>View Bookings</h2>
    							<div class="rating">
    								<span class="icon-star text-warning"></span>
    								<span class="icon-star text-warning"></span>
    								<span class="icon-star text-warning"></span>
    								<span class="icon-star text-warning"></span>
    								<span class="icon-star text-warning"></span>
    							</div>
    						</div>
    						<ul class="specs">
    							<li>
    								<span class="spec"></span>
    							</li>
    							<li>
    								<span class="centor">View, Edit or Delete your Bookings</span>
    								<span class="spec"></span>
    							</li>
    						</ul>
    						<div class="d-flex action">
    							<a href="contact.html" class="btn btn-primary fullwidthbtn">Current Bookings</a>
    						</div>
    					</div>
    				</div>
    			</div>

    			<div class="col-lg-4 col-md-6 mb-4">
    				<div class="item-1">
    					<!-- <a href="#"><img src="images/img_1.jpg" alt="Image" class="img-fluid"></a> -->
    					<div class="item-1-contents">
    						<div class="text-center">
    							<h2>Give Feedback</h2>
    							<div class="rating">
    								<span class="icon-star text-warning"></span>
    								<span class="icon-star text-warning"></span>
    								<span class="icon-star text-warning"></span>
    								<span class="icon-star text-warning"></span>
    								<span class="icon-star text-warning"></span>
    							</div>
    						</div>
    						<ul class="specs">
    							<li>
    								<span class="spec"></span>
    							</li>
    							<li>
    								<span class="centor">Give feedback for your previous rentals</span>
    								<span class="spec"></span>
    							</li>
    						</ul>
    						<div class="d-flex action">
    							<a href="contact.html" class="btn btn-primary fullwidthbtn">Rental Feedback</a>
    						</div>
    					</div>
    				</div>
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

