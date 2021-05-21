<?php 
require('include/db_connection.php');
require('include/function.php');
require('add_to_cart.php');

$pid=get_safe_data($con,$_POST['pid']);

$type=get_safe_data($con,$_POST['type']);

if(isset($_SESSION['USER_LOGIN'])){
      $user_id= $_SESSION['User_Id'];
   
    $sqli="Select * from wishlist where User_Id='$user_id' and Product_Id='$pid'";
    $result1= mysqli_query($con,$sqli);
    
    
    if(mysqli_num_rows($result1)>0){
       // echo "Produuct alreasy exists in your wishlist";
    }
    else{
        
    // $insert_sql="Insert into wishlist(User_Id,Product_Id,Added_On) values('$user_id','$pid','$added_on')";
           //     mysqli_query($con,$insert_sql);
        wishlist($con,$uid,$pid);
    }
  $total_record_sql="Select * from wishlist where User_Id='$user_id'";
      $result2= mysqli_query($con,$total_record_sql);
    $total_record=mysqli_num_rows($result2);
    echo $total_record;
}
else{
    $_SESSION['Wishlist_pid']=$pid;
    echo "not_login";
}

?>