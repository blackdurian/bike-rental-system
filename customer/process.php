<?php 
   include("conn.php");
 
 //to book new bike // for booking page (book.php)
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

// to delete a rental // for view_bookings.php page
if (isset($_POST['del'])) {
	$stmt = $db -> prepare("DELETE FROM rental WHERE id = ?");
	$stmt->bind_param("s",$id);
	
	$id = $_POST['id'];
	
	$stmt->execute();
	$stmt->close();
	mysqli_close($db);
	echo "Deleted Successfully!";
  	exit();
}	

//modify booking details // for view_bookings.php page
if (isset($_POST['save_edit'])) {
	$stmt = $db -> prepare("UPDATE rental set check_in_station=?,check_out_station=? where id =?");

	$stmt->bind_param("sss",$check_in_station,$check_out_station,$id);
	
	$check_in_station = $_POST['check_in_station'];
	$check_out_station = $_POST['check_out_station'];	
	$id = $_POST['id'];

	$stmt->execute();
	$stmt->close();
	mysqli_close($db);
	echo "Updated Successfully!";
  	exit();
}


?>