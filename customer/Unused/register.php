<!DOCTYPE html>
<html lang="en">

  <head>

	<link rel="icon" href="img/favicon.png" type="image/jpg" sizes="16x16">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Half Slider - Start Bootstrap Template</title>

	<!-- Bootstrap core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="css/half-slider.css" rel="stylesheet">

	<!-- Style for tab UI -->
	<link href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css" rel="stylesheet">


  </head>

  <body>

	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">FWDD</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="register.php">Register</a>
            </li>
			<?php
			if (isset($_SESSION['name']) && $_SESSION['role']=="Admin")
			{
			?>
			<li class="nav-item">
              <a class="nav-link" href="addProduct.php">Add Product</a>
            </li>
			<?php
			}
			?>
            <li class="nav-item">
              <a class="nav-link" href="search.php">Search</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
			<?php
			if(!isset($_SESSION['name']))
			{
			?>
			<li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
			<?php
			}
			else
			{
			?>
			<li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
			<?php
			}
			
			?>
          </ul>
        </div>
      </div>
    </nav>

	<header>
	  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
		  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner" role="listbox">
		  <!-- Slide One - Set the background image for this slide in the line below -->
		  <div class="carousel-item active" style="background-image: url('img/pic1.jpg')">
			<div class="carousel-caption d-none d-md-block">
			  <h3>First Slide</h3>
			  <p>This is a description for the first slide.</p>
			</div>
		  </div>
		  <!-- Slide Two - Set the background image for this slide in the line below -->
		  <div class="carousel-item" style="background-image: url('img/pic2.jpg')">
			<div class="carousel-caption d-none d-md-block">
			  <h3>Second Slide</h3>
			  <p>This is a description for the second slide.</p>
			</div>
		  </div>
		  <!-- Slide Three - Set the background image for this slide in the line below -->
		  <div class="carousel-item" style="background-image: url('img/pic3.jpg')">
			<div class="carousel-caption d-none d-md-block">
			  <h3>Third Slide</h3>
			  <p>This is a description for the third slide.</p>
			</div>
		  </div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		  <span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		  <span class="carousel-control-next-icon" aria-hidden="true"></span>
		  <span class="sr-only">Next</span>
		</a>
	  </div>
	</header>

	<!-- Page Content -->

 <section class="py-5">

 <div class="container">

 <form>

 <h1>Register</h1>

 Username :<input type="text" placeholder="Preferred Username" id="username" required><br/>

 Email : <input type="email" placeholder="Email" id="email" required> <br/>

 Password : <input type="password" placeholder="Password" id="password" required> <br/>

 <div id="msg"></div>

 <input type="button" value="Register" id="btnSubmit">

 <div id="error_msg"></div>

 </form>

 </div>

 </section>



<!-- Footer -->

 <footer class="py-5 bg-dark">

 <div class="container">

 <p class="m-0 text-center text-white">Copyright &copy; FWDD Demo 2019</p>

 </div>

 <!-- /.container -->

 </footer>



<!-- Bootstrap core JavaScript -->

 <script src="vendor/jquery/jquery.min.js"></script>

 <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <script>

 	$("document").ready(function(){
 		var email_state = false;
 		$("#email").blur(function(){
 			var emailAdd = $("#email").val();
 			if (emailAdd == "") {
 				email_state = false;
 				return;
 			}
 			$.ajax({
 				url: "process.php",
 				type: "post",
 				data: {
 					"email_check" : 1,
 					"email" : emailAdd,
 				},
 				success: function(response){
 					alert(response);
 					if (response == "not_available" ) {
 						email_state = false;
 						$("#msg").text("Email already exist!!");
 					}else if (response == "available") {
 						email_state = true;
 						$("#msg").text("");
 					}
 				}
 			});
 		});
 		$("#btnSubmit").click( function(){
 			var user_name = $("#username").val();
 			var emailAdd = $("#email").val();
 			var pass_word = $("#password").val();
 			if (email_state == false) {
 				$("#error_msg").text("Fix the errors in the form first");
 			}else{
 				$("#error_msg").text("");
 // proceed with form submission
 $.ajax({
 	url: "process.php",
 	type: "post",
 	data: {
 		"save" : 1,
 		"username" : user_name,
 		"email" : emailAdd,
 		"password" : pass_word,
 	},
 	success: function(response){
 		alert(response);
 		$("#username").val("");
 		$("#email").val("");
 		$("#password").val("");
 	}
 });
}
});
 	});
 	
 </script>



</body>

</html>
