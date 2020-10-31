<?php 
  session_start();
  $is_loggedIn;
  $user_id = '';
  $role =''; 
  $name = '';
  //todo define cookie

  if (! empty($_SESSION["id"]) && ! empty($_SESSION["username"]) ) {
    $is_loggedIn = true;
    $user_id = $_SESSION["id"];
    $role = $_SESSION["role"]; 
    $name = $_SESSION["username"];
  }

  if(!$is_loggedIn && $role!='admin') {
      header("Location: login.php");
  }
  
?>