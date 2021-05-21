<?php 
require('include/db_connection.php');
require('include/function.php');

if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}  

$current_password=get_safe_data($con,$_POST['current_password']);

$new_password=get_safe_data($con,$_POST['new_password']);
$uid= $_SESSION['User_Id'];

$check_query="Select User_Password from userinfo where User_Id='$uid'";
$res1=mysqli_query($con,$check_query);
$check_row=mysqli_fetch_assoc($res1);

if($check_row['User_Password']!=$current_password){
    echo 'Please Enter Your Current Valid Password';
}else{
    $update_query="Update userinfo set User_Password='$new_password' where User_Id='$uid'";
$res=mysqli_query($con,$update_query);
 echo 'Your Password is Updated';
}



?>