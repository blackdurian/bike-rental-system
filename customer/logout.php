<?php


  $_SESSION["id"] = "";
    $_SESSION["username"] = "";
    $_SESSION["role"] = "";
    $_SESSION["email"] = "";
    session_destroy();
    header("Location: ../");

 ?>