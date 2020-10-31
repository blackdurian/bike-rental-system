<?php

// to hash password
function hashPassword($myPassword)
{ // string
    return password_hash($myPassword, PASSWORD_DEFAULT); //string 
}



// encode password
function verifyPassword($myPassword, $hashed_password)
{
    $result = false;
    $result = password_verify($myPassword, $hashed_password);
    return $result;
}
