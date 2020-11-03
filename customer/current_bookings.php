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
    <link rel="stylesheet" href="dtsel/dtsel.css" />

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
                  <li class="active"><a href="current_bookings.php" class="nav-link">View Bookings</a></li>
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

$result = mysqli_query($db,"SELECT r.id AS rental_id, b.name AS bike_name, r.check_in_time, r.check_out_time, CI.name AS CI_station_name, 
                        CO.name AS CO_station_name, r.total_price
                        FROM (((rental r 
                        INNER JOIN station CI ON  r.check_in_station = CI.id)
                        INNER JOIN station CO ON  r.check_out_station = CO.id)
                        INNER JOIN bike b ON r.bike_id = b.id) WHERE is_complete=0 AND r.customer_id = '{$user_id}'");
?>
      
        <table class="table table-bordered" >
            <thead>
                  <tr>
                  	<th>Booking Number</th>
                    <th>Bike Name</th>
                    <th>Check In Time</th>
                    <th>Check Out Time</th>
                    <th>Check In Station</th>
                    <th>Check Out Station</th>
                    <th>Total Price</th>
                    <th>Delete</th>
                    <th>Edit</th>
                    <th>Mark As Done</th>
                </tr>
            </thead>

            <?php
        $rowNum = 0;
        while($row = mysqli_fetch_array($result)) 
        { 
            $id = $row['rental_id'];
            
            $rowNum++;
            echo "<tr>";
                echo "<tbody>";

                echo "<td>";
                echo "<span>".$rowNum."</span>"; 
                echo '<input type="text" class="rowNum" value="'.$rowNum.'" hidden>';
                echo "</td>";

                echo "<td>"; 
                echo $row['bike_name'];
                echo "</td>";

                echo "<td>";
                echo $row['check_in_time'];
                echo "</td>";

                echo "<td>";
                echo $row['check_out_time'];
                echo "</td>";

                echo "<td>";
                echo $row['CI_station_name'];
                echo "</td>";

                echo "<td>";
                echo $row['CO_station_name'];
                echo "</td>";

                echo "<td>";
                echo $row['total_price'];
                echo "</td>";

                echo "<td>";
                echo '
                <form>
                        <input type="text" class="valRow" value="'.$row['rental_id'].'" hidden>
                        <input type="button" value="Delete" class="btnDelete">
                </form>
                    ';
                echo "</td>";

                echo "<td>";
                echo '
                <form>
                        <input type="text" class="valRow" value="'.$row['rental_id'].'" hidden>
                        <input type="button" value="Edit" class="btnEdit" onclick="editBooking(\''.$id.'\')">
                </form>
                    ';
                echo "</td>";

                echo "<td>";
                echo '
                <form>
                        <input type="text" class="valRow" value="'.$row['rental_id'].'" hidden>
                        <input type="button" value="Done" class="btnDone">
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

  <div class="site-section pt-5 pb-5 bg-light" id="MoreDetails">
      <div class="container">
        <div class="row">
          <div class="col-12">

            <form class="trip-form">
              <div class="row align-items-center mb-4">
                <div class="col-md-6">
                  <h3 class="m-0">Edit Booking Details for Booking Number <span id="BookingNum"></span><span id="row_value"></span></h3>
                </div>
                <!-- <div class="col-md-6 text-md-right">
                  <span class="text-primary">32</span> <span>cars available</span></span>
                </div> -->
              </div>
              <div class="row">
                <div class="form-group col-md-3">
                  <label for="cf-3">Select Check-In Time</label>
                  <input type="text" id="CI_DT" name="date_field" placeholder="Your Check-In Time" class="form-control px-3">
                </div>
                <div class="form-group col-md-3">
                  <label for="cf-4">Select Check-Out Time</label>
                  <input type="text" id="CO_DT" name="date_field2" placeholder="Your Check-Out Time" class="form-control px-3">
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
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <input type="button" value="Update" id="btnUpdate" class=" btn btn-primary">
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


      function editBooking(id){

        console.log(id);
        $("#optVal_CI").val('default');
        $("#optVal_CO").val('default');

        $("#CI_DT").val('');
        $("#CO_DT").val('');

        $("#btnUpdate").show();

        $("#MoreDetails").show();
        $('#row_value').text(id);

      }

      $(".btnEdit").click(function(){ 
 		var tbody = $(this).closest('tbody');
        var rowNum = $('.rowNum', tbody).val();
        $('#BookingNum').text(rowNum);
      });

      $("document").ready(function(){
        var bike_state = true;
        $("#MoreDetails").hide();
        $("#row_value").hide();
        
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
                  // $(".msg", tbody).text("Bike has been booked");
                }
               });
            }
        });

        
          $(".btnDelete").click(function(){
            var tbody = $(this).closest('tbody');
            var val_Row = $('.valRow', tbody).val();

            var result = confirm("Do you want to delete this booking?");
            if (result) {
               $.ajax({
                url: "process.php",
                type: "post",
                data: {
                  "del" : 1,
                  "id" : val_Row,
                },
                success: function(response){
                    alert(response);
                    /*$("#sqltable").reload();*/
                    $("#sqltable").load(location.href + " #sqltable");
                  }
               });
            }  
        });


         $(".btnDone").click(function(){
            var tbody = $(this).closest('tbody');
            var val_Row = $('.valRow', tbody).val();

            var result = confirm("Do you want to mark this booking as complete?");
            if (result) {
               $.ajax({
                url: "process.php",
                type: "post",
                data: {
                  "mark_done" : 1,
                  "is_complete": 1,
                  "id" : val_Row,
                },
                success: function(response){
                    alert(response);
                    /*$("#sqltable").reload();*/
                    $("#sqltable").load(location.href + " #sqltable");
                  }
               });
            }  
        }); 
        

          $("#btnUpdate").click(function() {
          	var allow_update = true;

          	var row_value = document.getElementById('row_value').innerHTML;
			var optVal_CI = $("#optVal_CI").val();
			var optVal_CO = $("#optVal_CO").val();
			var CI_DT = $("#CI_DT").val();
            var CO_DT = $("#CI_DT").val();
      
			// var result = confirm("Are you sure you want to save this?");
   //          if (result) {
	            $.ajax({
	              type: "POST",
	              url: "process.php",
	              data: {
	                "save_edit": 1,
	                "check_in_time": CI_DT,
	                "check_out_time": CO_DT,
	                "check_in_station": optVal_CI,
	                "check_out_station": optVal_CO,
	                "id": row_value,
	              },
	              success: function(respond) {
	                alert(respond);
	                $("#MoreDetails").hide();
	                $("#btnUpdate").hide();
					$("#sqltable").load(location.href + " #sqltable");

	              }
	            });
        	// }
          });
        
      });

    </script>

  </body>

</html>

