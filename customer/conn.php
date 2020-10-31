<?php 
//mysqli_connect(hostName, username, password, databaseName)
$db=mysqli_connect("localhost","root", "","bike_rental_system");
// Check connection 
if (mysqli_connect_errno()) 
{ 
echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
} 
?>