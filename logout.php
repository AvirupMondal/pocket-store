<?php 
require('include/db_connection.php');
require('include/function.php');



   unset ($_SESSION['USER_LOGIN']);
unset    ($_SESSION['User_Id']);
     unset  ($_SESSION['User_Name']);
//unset($_SESSION['cart']);
   header('location:index.php');

die();

?>