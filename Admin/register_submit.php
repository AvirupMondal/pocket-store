<?php 
require('../include/db_connection.php');
require('../include/function.php');
$name=get_safe_data($con,$_POST['name']);
$email=get_safe_data($con,$_POST['email']);
$mobile=get_safe_data($con,$_POST['mobile']);
$password=get_safe_data($con,$_POST['password']);

$check_sql="Select * from admin where Admin_Email='$email'";
$res=mysqli_query($con,$check_sql);
$check=mysqli_num_rows($res);
if($check>0){
    echo "email_present";
}
else{
  $insert_sql="Insert into admin(Admin_Username,Admin_Email,Admin_Contact,Admin_Password,Admin_Role,Admin_Status) values('$name','$email','$mobile','$password','1','1')";
    echo $insert_sql;
                mysqli_query($con,$insert_sql);
echo "email_insert";  
}



?>