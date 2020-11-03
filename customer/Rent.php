<?php
		
		include('session.php');

?>

<!DOCTYPE html>
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
		<link rel="stylesheet" href="dtsel/dtsel.css" />

		<!-- MAIN CSS -->
		<link rel="stylesheet" href="css/style.css">

		<style type="text/css">
			.fullImg {
				width: 700px;
				height: 200px;
				object-fit: cover;
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
			<div class="ftco-cover-1 overlay innerpage" style="background-image: url('../images/bg-customer.jpg')">
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
$result = mysqli_query($db,'SELECT b.*, b.name AS bike_name, v.username AS vendor_name,s.name AS station_name, c.name AS category_name 
										FROM (((bike b LEFT JOIN br_user v ON b.vendor_id = v.id) 
												LEFT JOIN station s ON b.current_station = s.id) 
												LEFT JOIN category c ON b.category = c.id)');

		while($row = mysqli_fetch_array($result)) 
		{ 
			$id = $row['id'];
			$bike_name = $row['bike_name'];
			$unitprice = $row['unit_price'];
			$vendor_id = $row['vendor_id'];
				echo '
					<div class="col-lg-4 col-md-6 mb-4">
						<div class="item-1">
								<img src="data:image/jpeg;base64,'.base64_encode( $row['photo'] ).'" alt="Image" class="img-fluid fullImg">
								<div class="item-1-contents">
									<div class="text-center">
									<h3><span>'.$bike_name.'</span></h3>
									<div class="rating">
										<span class="icon-star text-warning"></span>
										<span class="icon-star text-warning"></span>
										<span class="icon-star text-warning"></span>
										<span class="icon-star text-warning"></span>
										<span class="icon-star text-warning"></span>
									</div>
									<div class="rent-price"><span>RM'.$row['unit_price'].'/</span>Day</div>
									</div>
									<ul class="specs">
										<li>
											<span>Bike Category</span>
											<span class="spec">'.$row['category_name'].'</span>
										</li>
									</ul>
									<ul class="specs">
										<li>
											<span>Bike Description</span>
											<span class="spec">'.$row['description'].'</span>
										</li>
									</ul>
									<div class="d-flex action">
											<input class="valRow" value="'.$row['id'].'" hidden>
											<input type="button" value="Rent Now" onclick="showBooking(\''.$bike_name.'\',\''.$unitprice.'\',\''.$vendor_id.'\'); bikeID(\''.$id.'\');" class="btnRent btn btn-primary">
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
									<h3 class="m-0">Enter Booking Details for <span id="BikeName"></span><span id="row_value" hidden></span></h3>
								</div>
								<!-- <div class="col-md-6 text-md-right">
									<span class="text-primary">32</span> <span>cars available</span></span>
								</div> -->
							</div>
							<div class="row">
								<div class="form-group col-md-3">
									<label for="cf-3">Select Check-In Time</label>
									<input type="text" id="picked_price" hidden>
									<input type="text" id="vendor_id" hidden>
									<input type="text" id="CI_DT" name="date_field" placeholder="Your Check-In Time" class="form-control px-3">
								</div>
								<div class="form-group col-md-3">
									<label for="cf-4">Select Check-Out Time</label>
									<input type="text" id="CO_DT" name="date_field2" placeholder="Your Check-Out Time" onfocusout="calcTotalPrice()" class="form-control px-3">
								</div>
								<div class="form-group col-md-3">
									<label for="cf-1">Choose Pick-Up Station</label>
									<select class="form-control" id="optVal_CI" >
										<option class="form-control" selected="selected"  value='default'>Please Select a Station</option>
										<?php
										include ("conn.php");
										// $result = mysqli_query($db, "SELECT * FROM rental INNER JOIN feedback on rental.feedback_id = feedback.id WHERE rental.is_complete = 1");
										$result = mysqli_query($db, "SELECT * FROM station ");

										while($row = mysqli_fetch_array($result)) {                     
											echo("<option class=\"form-control\" value='".$row['id']."'>".$row['name']."</option>");                        
										}
										?>
										<label for="dropdown">Select</label>
									</select>
								</div>
								<div class="form-group col-md-3">
									<label for="cf-2">Choose Drop-off Station</label>
									<select class="form-control" id="optVal_CO">
										<option class="form-control" selected="selected"  value='default'>Please Select a Station</option>
										<?php
										include ("conn.php");
										// $result = mysqli_query($db, "SELECT * FROM rental INNER JOIN feedback on rental.feedback_id = feedback.id WHERE rental.is_complete = 1");
										$result = mysqli_query($db, "SELECT * FROM station ");

										while($row = mysqli_fetch_array($result)) {                     
											echo("<option class=\"form-control\" value='".$row['id']."'>".$row['name']."</option>");
										}
										?>
										<label for="dropdown">Select</label>
									</select>
								</div>
								<!-- <div class="form-group col-md-7">
									<label for="cf-4">Total Price</label>
									<input type="text" id="totalPrice" readonly placeholder="Price will update once you select your check-in and check-out time"  class="form-control px-3">
								</div> -->
							</div>
							<div class="row">
								<div class="col-lg-6">
									<input type="button" value="Book Rental" id="btnBook" class="btn btn-primary">
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
		<script src="dtsel/dtsel.js"></script>
		<script>


// for the new date picker
instance = new dtsel.DTS('input[name="date_field"]',  {
	direction: 'BOTTOM',
	dateFormat: "yyyy-mm-dd",
	showTime: true,
	timeFormat: "HH:MM:SS"
});

instance = new dtsel.DTS('input[name="date_field2"]',  {
	direction: 'BOTTOM',
	dateFormat: "yyyy-mm-dd",
	showTime: true,
	timeFormat: "HH:MM:SS"
});

function showBooking(bike_name, unitprice, vendor_id){
	$("#MoreDetails").show();

	$("#optVal_CI").val('default');
	$("#optVal_CO").val('default');
	$("#CI_DT").val('');
	$("#CO_DT").val('');


	$('#BikeName').text(bike_name);
	$("#picked_price").text(unitprice);
	$('#vendor_id').text(vendor_id);

}

function bikeID(id){
	$('#row_value').text(id);
}


//to calculate the total price by date difference as soon as the checkout time loses focus
// function calcTotalPrice(unit_price){

// 	var totalPrice = 0;
// 	var CI_DT = $("#CI_DT").val();
// 	var CO_DT = $("#CO_DT").val();

	
// 	var date1 = new Date(CI_DT); 
// 	var date2 = new Date(CO_DT); 
// 	var timeDifference= newDate1.getTime() - newDate2.getTime();
// 	var daysDifference = timeDifference / (1000 * 3600 * 24);
// 	var totalPrice = daysDifference*unit_price;

// 		if(document.getElementById("CI_DT").value.length == 0)
// 		{
// 		    ("#totalPrice").val('');
// 		}

// 		if(document.getElementById("CO_DT").value.length == 0)
// 		{
// 		    $("#totalPrice").val('');
// 		}

// 	return totalPrice; 
// }


$("document").ready(function(){
	$("#MoreDetails").hide();
	$("#row_value").hide();
	var bike_state = true;


	$("#btnBook").click(function(){

		var bike_id = document.getElementById('row_value').innerHTML;
		var vendor_id = document.getElementById('vendor_id').innerHTML;
		var picked_price = document.getElementById('picked_price').innerHTML;
		var optVal_CI = $("#optVal_CI").val();
		var optVal_CO = $("#optVal_CO").val();
		var CI_DT = $("#CI_DT").val();
		var CO_DT = $("#CO_DT").val();


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
					 		"bike_id": bike_id,
					 		"check_in_time": CI_DT,
					 		"check_out_time": CO_DT,
					 		"check_in_station": optVal_CI,
					 		"check_out_station": optVal_CO,
					 		"unit_price": picked_price,
					 		"is_complete": 0,
					 		"vendor_id": vendor_id,
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

