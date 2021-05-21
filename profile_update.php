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


$name=get_safe_data($con,$_POST['name']);
$uid= $_SESSION['User_Id'];

$update_query="Update userinfo set User_Name='$name' where User_Id='$uid'";
$res=mysqli_query($con,$update_query);
 $_SESSION['User_Name']=$name;
echo 'Your Name is Updated';
?>