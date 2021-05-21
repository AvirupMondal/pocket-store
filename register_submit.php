<?php 
require('include/db_connection.php');
require('include/function.php');
$name=get_safe_data($con,$_POST['name']);
$email=get_safe_data($con,$_POST['email']);
$mobile=get_safe_data($con,$_POST['mobile']);
$password=get_safe_data($con,$_POST['password']);

$check_sql="Select * from userinfo where User_Email='$email'";
$res=mysqli_query($con,$check_sql);
$check=mysqli_num_rows($res);
if($check>0){
    echo "email_present";
}
else{
  $insert_sql="Insert into userinfo(User_Name,User_Email,User_Contact,User_Password,Status) values('$name','$email','$mobile','$password','1')";
                mysqli_query($con,$insert_sql);
echo "email_insert";  
}



?>