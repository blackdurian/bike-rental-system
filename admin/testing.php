<?php
/*Create a mock registration page as follow. Invalid input should be returned to the user indicating the problems with the submitted data. The form is required to gather: 

    Username –max 15 characters, letters and numbers only –required 
    
    Password –confirmed via password text boxes, minimum length of four characters –required. 
    
    E-mail –valid e-mail structure 
    
    Date of Birth –required. 
    
    Name –Maximum Length of 50 characters –required. 
    
    Their choice regarding e-mail promotions to be received if an e-mail address was given – user can choose Yes or No 
    
     
    
    If the inputs are correct, the data shall be passed to registered.php. On the page, display “Thank you for registering” if  age is above 18. Otherwise display “Sorry, you can’t use our website’. 
    
    **HINT: You are required to use library functions to calculate age of the user based on the input and current date of  the system(computer). */
  //  require_once '../core/util/UUID.php';
/* require_once 'util/Autoloader.php';
   // echo   UUID::v4();
  
   $b = new BikeDao();
   $b->printx(); */

   


   require_once '../core/util/UUID.php';
   require_once "dao/UserDao.php";
$dao = new UserDao();
$dao->add(UUID::v4(),"username", password_hash("asdasd", PASSWORD_DEFAULT),"customer","asd@mail.com","",""); 

?>
 