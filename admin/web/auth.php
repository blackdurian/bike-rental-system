<?php
session_start();
require_once "../dao/UserDao.php";
require_once "../util/UUID.php";
require_once "../util/DateUtil.php";
 
 


if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];
    $dao = new UserDao();
    $user = $dao->findByUsername($username);
    $respond['status'] = "error";
    $respond['message'] = "Invalid Username!";

    if (!empty($user)) {
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
 //   header('Content-type: application/json');
    echo json_encode($respond);
}

if (isset($_POST["logout"])) {
    //Clear Session
    $_SESSION["id"] = "";
    $_SESSION["username"] = "";
    $_SESSION["role"] = "";
    $_SESSION["email"] = "";
    session_destroy();
    header("Location: login.php");
    // todo clear cookies
    /*if (isset($_COOKIE["user_login"])) {
        setcookie("user_login", "");
    }
    */

}

if (isset($_POST["register"])) {
    if (isset($_FILES['profile-photo'])) {
        if (is_uploaded_file($_FILES['profile-photo']['tmp_name'])) {
            $profilePhoto = addslashes(file_get_contents($_FILES['profile-photo']['tmp_name']));
            $id = UUID::v4();
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $role = $_POST['role'];
            $email = $_POST['email'];
            //todo: validation
           // $dob = DateUtil::stringToDate("yyyy-mm-dd", $_POST['birthday']);
            $dob = $_POST['birthday'];
            $dao = new UserDao();
            $dao->add($id,$username,$password,$role,$email,$dob,$profilePhoto);
            $respond["status"] = "success";
            $respond["message"] = "Register Success!";
        }  

    }else{
        $respond["status"] = "error";
        $respond["message"] = "File cannot be empty.";
    }
  //  header('Content-type: application/json');
  echo json_encode($respond);
}



?>