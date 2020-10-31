<!-- This webpage is to view all the available bikes, the user should be able to book whichever one they want -->

<!DOCTYPE html>
<html>
<head>
	<title>Book a Bike</title>
</head>
<body>
<h1>BOOK A BIKE</h1>


<?php

include("conn.php");

$result = mysqli_query($db,"SELECT * FROM bike");
?>



	<table width="90%"> 
		<tr> 
			<td>ID</td>
			<td>Vendor ID</td>
			<td>Photo</td> 
			<td>Category</td>
			<td>Unit Price</td>
			<td>Description</td>
			<td>Book</td> 
		</tr> 



		<?php
		while($row = mysqli_fetch_array($result)) 
		{ 
			echo "<tr>";
				echo "<td>"; 
				echo $row['id'];
				echo "</td>";

				echo "<td>";
				echo $row['vendor_id'];
				echo "</td>";

				echo "<td>"; 
				echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['photo'] ).'"/>'; 
				echo "</td>";

				echo "<td>"; 
				echo $row['category']; 
				echo "</td>";

				echo "<td>"; 
				echo $row['unit_price']; 
				echo "</td>";

				echo "<td>"; 
				echo $row['description']; 
				echo "</td>";

				echo "<td>";
				echo '
						<div id="msg"></div>
						<input type="text" id="val_Row" value="'.$row['id'].'" hidden>
						<input type="button" value="Book" id="btnSubmit">
						<div id="error_msg"></div>
					';
				echo "</td>";
			echo "</tr>";
		} 
			mysqli_close($db); //to close the database connection 
		?> 

	</table>

<br>


<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script>

	$("document").ready(function(){
		var bike_state = true;
		$("#btnSubmit").click(function(){
			var val_Row = $("#val_Row").val();
			if (bike_state == false) {
				$("#error_msg").text("Fix the errors in the form first");
			}else{
				$("#error_msg").text("");
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
		 					$("#msg").text("Bike has been booked");
		 				}
					 });
}
});
	});

</script>

</body>
</html>