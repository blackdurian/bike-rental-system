<?php 
   include("conn.php");
   include ("../core/util/UUID.php");

   ;
 
 //to book new bike // for booking page (rent.php)
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

// to delete a rental // for current_bookings.php page
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

// to mark rental as complete // for current_bookings.php page
if (isset($_POST['mark_done'])) {
	$stmt = $db -> prepare("UPDATE rental set is_complete=? WHERE id = ?");
	$stmt->bind_param("ss",$is_complete,$id);
	
	$is_complete = $_POST['is_complete'];
	$id = $_POST['id'];
	
	$stmt->execute();
	$stmt->close();
	mysqli_close($db);
	echo "Deleted Successfully!";
  	exit();
}		

//modify booking details // for current_bookings.php page
if (isset($_POST['save_edit'])) {
	$stmt = $db -> prepare("UPDATE rental set check_in_time=?, check_out_time=?, check_in_station=?, check_out_station=? where id =?");

	$stmt->bind_param("sssss",$check_in_time,$check_out_time,$check_in_station,$check_out_station,$id);
	
	$check_in_time = $_POST['check_in_time'];
	$check_out_time = $_POST['check_out_time'];
	$check_in_station = $_POST['check_in_station'];
	$check_out_station = $_POST['check_out_station'];	
	$id = $_POST['id'];

	$stmt->execute();
	$stmt->close();
	mysqli_close($db);
	echo "Updated Successfully!";
  	exit();
}


//submiting feedback details // for feedback.php
 if (isset($_POST['save_feedback'])) {
	$stmt = $db -> prepare("INSERT INTO feedback(id,rating,description) VALUES (?,?,?) ");
	$stmt->bind_param("sis",$id,$rating,$description);
	
	//set parameters
	$id = UUID::v4();
	$idfeedback = $_POST['feedback_id'];
	$rating = (int)$_POST['rating'];
	$description = $_POST['description'];
	
	//execute sql & close connection
	$stmt->execute();
	$stmt->close();
///////////////////////////
	$idfeedback = $_POST['chosenOpt'];

	$stmt2 = $db -> prepare("UPDATE rental set feedback_id=? WHERE id=".$idfeedback."");
	$stmt2->bind_param("s",$id);

	//execute sql & close connection
	$stmt2->execute();
	$stmt2->close();
	mysqli_close($db);

	//return success message to AJAX call
  	echo "Registered Successfully!";
  	exit();
  }


?>