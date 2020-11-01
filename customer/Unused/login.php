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
		<a class="navbar-brand" href="#">FWDD</a>
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
              <a class="nav-link" href="Contact.html">Contact</a>
            </li>

            
            <?php  
            if (!isset($_SESSION['name'])) 
            {
              ?>
              <li class="nav—item">
                <a class="nav—link" href="login.php">Login</a>
              </li>
              <?php
            }
            else
            {
              ?>
              <li class="nav—item">
                <a class="nav—link" href="logout.php">Logout</a>
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
			<h1>Login</h1>
			<form>
				Username : <input type="text" id="username" required /> <br/>
				Password : <input type="password" id="password" required /> <br/>
				<input type="button" id="btnLogin" value="Login"></input><br/>
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
 		$("#btnLogin").click(function() {
 			var un = $("#username").val();
 			var pw = $("#password").val();
 			$.ajax({
 				type: "POST",
 				url: "process.php",
 				data: {
 					login:1,
 					uName: un,
 					pWord: pw,
 				},
 				success: function(respond) {
 					if(respond ==="Customer")
 						window.location.href="search.php";
 					else if (respond ==="Admin")
 						window.location.href="addProduct.php";
 					else
 						alert(respond);
 				}
 			});
 		});
 	});
 </script>



</body>

</html>
