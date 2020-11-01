<!doctype html>
<html lang="en">
<?php
include("conn.php");


?>

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
                  <li><a href="index.php" class="nav-link">Home</a></li>
                  <li><a href="rent.php" class="nav-link">Rent a Bike</a></li>
                  <li><a href="current_bookings.php" class="nav-link">View Bookings</a></li>
                  <li class="active"><a href="feedback.php" class="nav-link">Feedback for Rental</a></li>
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
              <h1>Submit Feedback</h1>
              <p>Use this form to submit feedback on any of your previous bookings</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-light" id="contact-section">
      <div class="container">
        <div class="row justify-content-center text-center">
      </div>
        <div class="row">
          <div class="col-lg-12 mb-5" >
            <form action="#" method="post">

              <div class="form-group row">
                <div class="col-md-12">
                  <select class="form-control">
                  	<option class="form-control" selected="selected"  value='default'>Please Select a Rental</option>
                  	<?php
                  	include ("conn.php");
                  	// $result = mysqli_query($db, "SELECT * FROM rental INNER JOIN feedback on rental.feedback_id = feedback.id WHERE rental.is_complete = 1");
                  	$result = mysqli_query($db, "SELECT * FROM rental ");

                  	while($row = mysqli_fetch_array($result)) {
                  		echo("<option class=\"form-control\" class=\"optVal\" value='".$row['id']."'>".$row['id']."</option>");
                  	}
                  	?>
                  	<label for="dropdown">Select</label>
                  </select>
                </div>
              </div>

              <div class="form-group row">
              	<div class="col-md-12">
              		<input type="number" id="rating" class="form-control" min="1" max="5" placeholder="Enter a value from 1 (Very Bad) to 5 (Very Good) ">
              	</div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <textarea id="description" class="form-control" placeholder="Write a description" cols="30" rows="5"></textarea>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12 mr-auto">
                  <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" id="btnSubmit" value="Submit Feedback">
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

    	$("document").ready(function(){

$(".optVal").click(function(){

	var select = $(this).closest('select');
    var optVal = $('.optVal', select).val();

	alert(.text(optVal));
});

    		var bike_state = true;
    		
    		$(".btnSubmit").click(function(){
    			var select = $(this).closest('select');
    			var optVal = $('.optVal', select).val()

    			var rating = $("#rating").val();
	    		var description =$("#description").val();

    			if (bike_state == false) {
    				$(".error_msg").text("Fix the errors in the form first");
    			}else{
    				$(".error_msg").text("");
           // proceed with form submission
           $.ajax({
           	url: "process.php",
           	type: "post",
           	data: {
           		"save_feedback" : 1,
           		"chosenOpt" : optVal,
           		"rating" : rating,
           		"description": description,
           	},
           	success: function(response){
           		alert(response);
           		alert("Feedback Submitted Successfully!");
           	}
           });
       }
   });
    	});

    </script>

  </body>

</html>

