<?php 
require('include/db_connection.php');
require('include/function.php');

$email=get_safe_data($con,$_POST['email']);

$password=get_safe_data($con,$_POST['password']);

$check_sql="Select * from userinfo where User_Email='$email' and User_Password='$password'";
$res=mysqli_query($con,$check_sql);
$check=mysqli_num_rows($res);
if($check>0){
    $row=mysqli_fetch_assoc($res);
    $_SESSION['USER_LOGIN']='yes';
    $_SESSION['User_Id']=$row['User_Id'];
       $_SESSION['User_Name']=$row['User_Name'];
    $_SESSION['User_Contact']=$row['User_Contact'];
    
    
    if(isset($_SESSION['Wishlist_pid']) &&  $_SESSION['Wishlist_pid']!=''){
        wishlist($con, $_SESSION['User_Id'],$_SESSION['Wishlist_pid']);
        unset($_SESSION['Wishlist_pid']);
    }
    
    echo "valid";
}
else{
 
echo "wrong";  
}



?>