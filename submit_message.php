<?php 
require('include/db_connection.php');
require('include/function.php');
$name=get_safe_data($con,$_POST['name']);
$email=get_safe_data($con,$_POST['email']);
$mobile=get_safe_data($con,$_POST['mobile']);
$comment=get_safe_data($con,$_POST['message']);
$addedon=date('Y-m-d h:i:s');
$insert_sql="Insert into contact_us(User_Name,User_Email,User_Mobile,User_Message,Date) values('$name','$email','$mobile','$comment','$addedon')";
                mysqli_query($con,$insert_sql);
echo "Thank You. Our CustomerCare Service Provider will contact with you soon";

?>