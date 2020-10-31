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
						<div id="msg"></div>
						<input type="text" id="valRow" value="'.$row['id'].'" hidden>
						<input type="button" value="Edit" id="btnEdit">
						<div id="error_msg"></div>
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

<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script>


	$("document").ready(function(){
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
		

		
	});

</script>

</body>
</html>