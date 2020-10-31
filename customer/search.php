<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if(!isset($_SESSION['role']))
	header("location:login.php");
?>
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Search Product</title>
    
    <link rel="icon" href="img/Koala.jpg" type="image/jpg" sizes="16x16">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
		a:hover {
	cursor: pointer;
	
	}
</style>
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

   

    <!-- Page Content -->
    <section class="py-5">
      <div class="container">
	  <h1>Search</h1> 
        Product Name : <input type="text" id="search" required /> 
   <input type="button" id="btnSearch" value="Search"></input><br/>
   <div id="display"></div>
   <div id="test"></div>
   <input type="button" id="btnEdit" value="Update" style="display: none;"></input>
   <input type="button" id="btnDelete" value="Delete" style="display: none;"></input>   
   <input type="button" id="btnSave" value="Save" style="display: none;"></input> 
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
	$("#search").keyup(function() {
	
	var prodName = $("#search").val();
    if (prodName == "") {
           $("#display").html("");
     }
	else {
           $.ajax({
               type: "POST",
               url: "process.php",
               data: {
				   search_prod:1,
                   searchName: prodName
               },
               success: function(respond) {
                   $("#display").html(respond).show();
				   $('#test').hide();
               }
           });
       }
   });
   
   $("#btnSearch").click(function() {
	var prodName = $("#search").val();
    $.ajax({
         type: "POST",
         url: "process.php",
         data: {
			  display_product:1,
              searchName: prodName
               },
         success: function(respond) {
               $("#test").html(respond).show();
			   $("#display").hide();
			   <?php
			   if($_SESSION['role']=="Admin")
			   {
			   ?>
			   $("#btnEdit").show();
			   $("#btnDelete").show();
			   <?php
			   }
			   ?>

         }
         });
     });
	 
	 




$("#btnEdit").click(function() {
	var prodName = $("#search").val();
    $.ajax({
         type: "POST",
         url: "process.php",
         data: {
			  edit_product:1,
              searchName: prodName
               },
         success: function(respond) {
               $("#test").html(respond).show();
			   $("#btnSave").show();
			   $("#btnEdit").hide();
			   $("#btnDelete").hide();
         }
         });
     });
	 
$("#btnSave").click(function() {
	var prodName = $("#search").val();
	var nPrice =$("#newPrice").val();
	var nDesc =$("#newDesc").val();
	
    $.ajax({
         type: "POST",
         url: "process.php",
         data: {
			  save_edit:1,
              searchName: prodName,
			  nP : nPrice,
			  nD : nDesc
               },
         success: function(respond) {
			   alert(respond);
			   $("#btnSave").hide();   
         }
         });
     });
	 
	$("#btnDelete").click(function() {
	var prodName = $("#search").val();
	
    $.ajax({
         type: "POST",
         url: "process.php",
         data: {
			  del:1,
              nm: prodName,
               },
         success: function(respond) {
               alert(respond);
			   $('#search').val('');
			   $('#display').hide();
			   $('#test').hide();
			   $("#btnEdit").hide();
			   $("#btnDelete").hide();  
         }
         });
     });
});

function insert(data) {
   $("#search").val(data);
   $("#display").hide();
}

</script>
  </body>
</html>







