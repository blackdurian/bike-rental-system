<!-- This webpage is to VIEW all the available bookings, the user should be able to UPDATE, DELETE as well -->

<!DOCTYPE html>
<html>
<head>
	<title>View All Bookings</title>
</head>

<style>
	.valRow {
		color: black;
	}

</style>

<body>
<h1>BOOK A BIKE</h1>

<div id="sqltable">
<?php

include("conn.php");
include ("../core/util/UUID.php");

$result = mysqli_query($db,"SELECT * FROM rental");
?>



	<table width="90%"> 
		<tr> 
			<td>ID</td>
			<td>Bike ID</td> 
			<td>Delete</td> 
			<td>Edit</td> 
		</tr> 



		<?php
		while($row = mysqli_fetch_array($result)) 
		{ 
			$id = $row['id'];
			echo "<tr>";
				echo "<tbody>";
				echo "<td>"; 
				echo $row['id'];
				echo "</td>";

				echo "<td>";
				echo $row['bike_id'];
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

<br>

 

</div>

<div id="EditForBooking">
	<h2>For Booking ID: <span id="row_value"></span></h2>
	Check in station:  <input type="text" id="check_in_station"> <br>
	Check out station:  <input type="text" id="check_out_station"> <br>
	<input type="button" value="Update" id="btnUpdate">
</div>


<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script>

	function editBooking(id){

		console.log(id);
		$("#check_in_station").val('');
		$("#check_out_station").val('');
		$("#btnUpdate").show();

		$("#EditForBooking").show();
		//	document.getElementById('row_value').innerHTML = val_Row;
		$('#row_value').text(id);
		// $("#sqltable").load(location.href + " #sqltable");

		
	}

	$("document").ready(function(){
		var bike_state = true;
		$("#EditForBooking").hide();
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
		 					$(".msg", tbody).text("Bike has been booked");
		 				}
					 });
				}
		});

		
	    $(".btnDelete").click(function(){
				var tbody = $(this).closest('tbody');
				var val_Row = $('.valRow', tbody).val()

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
		



	    $("#btnUpdate").click(function() {

	    	var row_value = document.getElementById('row_value').innerHTML;
	    	var checkInStation = $("#check_in_station").val();
	    	var checkOutStation =$("#check_out_station").val();

	    	$.ajax({
	    		type: "POST",
	    		url: "process.php",
	    		data: {
	    			"save_edit":1,
	    			"check_in_station": checkInStation,
	    			"check_out_station": checkOutStation,
	    			"id": row_value
	    		},
	    		success: function(respond) {
	    			alert(respond);
	    			$("#btnUpdate").hide();
	    			$("#check_in_station").val('');
	    			$("#check_out_station").val('');

	    		}
	    	});
	    });
		
	});

</script>

</body>
</html>