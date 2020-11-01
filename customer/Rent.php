<!doctype html>
<html lang="en">

  <head>
    <title>Rent a Bike</title>
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
    	.fullImg {
        /*object-fit: cover;*/
        /*object-fit: fill;*/

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
                  <li><a href="index.php" class="nav-link">Home</a></li>
                  <li class="active"><a href="rent.php" class="nav-link">Rent a Bike</a></li>
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
      <div class="ftco-cover-1 overlay innerpage" style="background-image: url('images/bg.jpg')">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 text-center">
              <h1>Rent a Bike</h1>
              <p>Choose any Bike to rent from our list of amazing bikes.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">


<?php

include("conn.php");

// $result = mysqli_query($db,"SELECT * FROM bike");
// $result = mysqli_query($db,"SELECT * FROM category INNER JOIN bike ON category.id = bike.category");
$result = mysqli_query($db,'SELECT b.*, v.username AS vendor_name,s.name AS station_name, c.name AS category_name 
                    FROM (((bike b LEFT JOIN br_user v ON b.vendor_id = v.id) 
                        LEFT JOIN station s ON b.current_station = s.id) 
                        LEFT JOIN category c ON b.category = c.id)');

    while($row = mysqli_fetch_array($result)) 
    { 
    	$id = $row['id'];
        echo '
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="item-1">
                <img src="data:image/jpeg;base64,'.base64_encode( $row['photo'] ).'" alt="Image" class="img-fluid fullImg">
                <div class="item-1-contents">
                  <div class="text-center">
                  <h3>'.$row['name'].'</h3>
                  <div class="rating">
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                  </div>
                  <div class="rent-price"><span>RM'.$row['unit_price'].'/</span>hour</div>
                  </div>
                  <ul class="specs">
                    <li>
                      <span>Bike Category</span>
                      <span class="spec">'.$row['category_name'].'</span>
                    </li>
                    <li>
                      <span>Seats</span>
                      <span class="spec">5</span>
                    </li>
                  </ul>
                  <div class="d-flex action">
                      <input class="valRow" value="'.$row['id'].'" hidden>
                      <input type="button" value="Rent Now" onclick="editBooking(\''.$id.'\')" class="btn btn-primary">
                  </div>
                </div>
              </div>
          </div>
          ';
        }
        mysqli_close($db); //to close the database connection
?>

        </div>
      </div>
    </div>

    <div class="site-section pt-5 pb-5 bg-light" id="MoreDetails">
    	<div class="container">
    		<div class="row">
    			<div class="col-12">

    				<form class="trip-form">
    					<div class="row align-items-center mb-4">
    						<div class="col-md-6">
    							<h3 class="m-0">Booking Details<span id="bikename"></span></h3>
    						</div>
    						<!-- <div class="col-md-6 text-md-right">
    							<span class="text-primary">32</span> <span>cars available</span></span>
    						</div> -->
    					</div>
    					<div class="row">
    						<div class="form-group col-md-3">
    							<label for="cf-1">Choose Pick-Up Station</label>
    							<input type="text" id="cf-1" placeholder="Your pickup address" class="form-control">
    						</div>
    						<div class="form-group col-md-3">
    							<label for="cf-2">Choose Drop-off Station</label>
    							<input type="text" id="cf-2" placeholder="Your drop-off address" class="form-control">
    						</div>
    						<div class="form-group col-md-3">
    							<label for="cf-3">Select Check-In Time</label>
    							<input type="text" id="cf-3" placeholder="Your pickup address" class="form-control datepicker px-3">
    						</div>
    						<div class="form-group col-md-3">
    							<label for="cf-4">Select Check-Out Time</label>
    							<input type="text" id="cf-4" placeholder="Your pickup address" class="form-control datepicker px-3">
    						</div>
    					</div>
    					<div class="row">
    						<div class="col-lg-6">
    							<input type="submit" value="Submit" class="btnSubmit btn btn-primary">
    						</div>
    					</div>
    				</form>
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
    <script src="jquery/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>

    function editBooking(id){

		console.log(id);
		$("#MoreDetails").show();
	}


    	$("document").ready(function(){
    		$("#MoreDetails").hide();
    		var bike_state = true;


    		$(".btnSubmit").click(function(){
    			var tbody = $(this).closest('tbody');
    			var val_Row = $('.valRow', tbody).val()
    			if (bike_state == false) {
    				$(".error_msg").text("Fix the errors in the form first");
    			}else{
    				$(".error_msg").text("");
           // proceed with form submission
           $.ajax({
           	url: "process.php",
           	type: "post",
           	data: {
           		"save" : 1,
           		"bike_id" : val_Row,
           	},
           	success: function(response){
           		alert(response);
           		alert("Bike has been booked");
           	}
           });
       }
   });
    	});

    </script>

  </body>

</html>

