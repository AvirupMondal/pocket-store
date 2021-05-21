<?php 
require('../include/db_connection.php');
require('../include/function.php');
$msg='';
if(isset($_POST['submit'])){
   $username=get_safe_data($con,$_POST['username']);
   $password=get_safe_data($con,$_POST['password']);
   $sqli="Select * from admin where Admin_Username='$username' and Admin_Password='$password'";
   $res=mysqli_query($con,$sqli);
   $count=mysqli_num_rows($res);
   if($count>0){
       $row=mysqli_fetch_assoc($res);
       if($row['Admin_Status']=='0'){
			$msg="Account deactivated";	
		}else{
   $_SESSION['admin_login']='yes';
   $_SESSION['admin_username']=$username;
       $_SESSION['admin_role']=$row['Admin_Role'];
       $_SESSION['admin_id']=$row['Admin_Id'];
   header('location:admin_index.php');
   die();
       }
}
else{
   $msg="Please enter a valid Username or Password";
}
}
?>

<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Login Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="assets/css/normalize.css">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/themify-icons.css">
      <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
      <link rel="stylesheet" href="assets/css/flag-icon.min.css">
      <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
   </head>
   <body style="background-image:url('images/login.jpg');background-size:cover; background-repeat: no-repeat, repeat;  background-position: center;">
      <div class="sufee-login d-flex align-content-center flex-wrap">
         <div class="container">
            <div class="login-content">
               <div class="login-form mt-150">

                  <form method="post" id="login_form">
                      <div class="form-group">
                        <h5 style="text-align: center; font-weight:900; font-size:20px">ADMIN LOGIN</h5>
                       
                     </div>
                     <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="username" class="form-control" placeholder="Email" required="true">
                     </div>
                     <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required="true">
                     </div>
                     <button type="submit" name="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                     <div><?php echo $msg ?></div>

                     <div>
                        <a class="for1" href="">Foreget Password?</a><br>
                        <a class="reg2" href="vendor_register.php">Not a user? Register</a>
                     </div>
					</form>

               </div>
            </div>
         </div>
      </div>
      <script src="assets/js/vendor/jquery-2.1.4.min.js" type="text/javascript"></script>
      <script src="assets/js/popper.min.js" type="text/javascript"></script>
      <script src="assets/js/plugins.js" type="text/javascript"></script>
      <script src="assets/js/main.js" type="text/javascript"></script>
   </body>
</html>