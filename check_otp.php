<?php 
require('include/db_connection.php');
require('include/function.php');



$type=get_safe_data($con,$_POST['type']);
$otp=get_safe_data($con,$_POST['otp']);

if($type=='email'){
    if($otp==$_SESSION['EMAIL_OTP']){
    echo 'done';
}
else{
    echo 'no';
}
}



?>