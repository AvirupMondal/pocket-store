<?php
 require('admin_header.php');
isAdmin();
$username='';
$password='';
$email='';
$mobile='';

$msg='';
if(isset($_GET['Id']) && $_GET['Id']!=''){
	$image_required='';
	$id=get_safe_value($con,$_GET['Id']);
	$res=mysqli_query($con,"select * from admin where Admin_Id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$username=$row['Admin_Username'];
		$email=$row['Admin_Email'];
		$mobile=$row['Admin_Contact'];
		$password=$row['Admin_Password'];
	}else{
		header('location:vendor_management.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$username=get_safe_value($con,$_POST['Admin_Username']);
	$email=get_safe_value($con,$_POST['Admin_Email']);
	$mobile=get_safe_value($con,$_POST['Admin_Contact']);
	$password=get_safe_value($con,$_POST['Admin_Password']);
	
	$res=mysqli_query($con,"select * from admin where Admin_Username='$username'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['Id']) && $_GET['Id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['Id']){
			
			}else{
				$msg="Username already exist";
			}
		}else{
			$msg="Username already exist";
		}
	}
	
	
	if($msg==''){
		if(isset($_GET['Id']) && $_GET['Id']!=''){
			$update_sql="update admin set Admin_Username='$username',Admin_Password='$password',Admin_Email='$email',Admin_Contact='$mobile' where Admin_Id='$id'";
			mysqli_query($con,$update_sql);
		}else{
			mysqli_query($con,"insert into admin(Admin_Username,Admin_Password,Admin_Email,Admin_Contact,Admin_Role,Admin_Status) values('$username','$password','$email','$mobile',1,1)");
		}
		header('location:vendor_management.php');
		die();
	}
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Vendor Management</strong><small> Form</small></div>
                        <form method="post" enctype="multipart/form-data">
							<div class="card-body card-block">
							   
								
								<div class="form-group">
									<label for="username" class=" form-control-label">Username</label>
									<input type="text" name="username" placeholder="Enter username" class="form-control" required value="<?php echo $username?>">
								</div>
								<div class="form-group">
									<label for="password" class=" form-control-label">Password</label>
									<input type="text" name="password" placeholder="Enter password" class="form-control" required value="<?php echo $password?>">
								</div>
								
								<div class="form-group">
									<label for="password" class=" form-control-label">Email</label>
									<input type="email" name="email" placeholder="Enter email" class="form-control" required value="<?php echo $email?>">
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">Mobile</label>
									<input type="text" name="mobile" placeholder="Enter mobile" class="form-control" required value="<?php echo $mobile?>">
								</div>
								
								
							   <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							   <div class="field_error"><?php echo $msg?></div>
							</div>
						</form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
		 
		 
         
<?php
require('admin_footer.php');
?>