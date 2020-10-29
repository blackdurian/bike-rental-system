<?php
session_start();
require_once "../dao/UserDao.php";
$dao = new UserDao();



if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];
    $user = $dao->findByUsername($username);
    $respond["status"] = "fail";
    $respond["message"] = "Invalid Username!";

    if (count($user) > 0) {
        if (password_verify($password, $user[0]["password"])) {
            $_SESSION["id"] = $user[0]["id"];
            $_SESSION["username"] = $user[0]["username"];
            $_SESSION["role"] = $user[0]["role"];
            $_SESSION["email"] = $user[0]["email"];
            //TODO  Set COOKIE

            $respond["status"] = "success";
            $respond["message"] = "Login Success!";
        } else {
            $respond["message"] = "Incorrect password!";
        }
    }
    $myJSON = json_encode($respond);
    echo $myJSON;
}
