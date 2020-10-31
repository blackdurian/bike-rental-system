<?php 
   include("conn.php");
 
 //to book new bike
  if (isset($_POST['save'])) {
	$stmt = $db -> prepare("INSERT INTO rental(bike_id) VALUES (?) ");
	$stmt->bind_param("s",$bike_id);
	
	//set parameters
	$bike_id = $_POST['bike_id'];
	
	//execute sql & close connection
	$stmt->execute();
	$stmt->close();
	mysqli_close($db);

	//return success message to AJAX call
  	echo "Registered Successfully!";
  	exit();
  }



?>