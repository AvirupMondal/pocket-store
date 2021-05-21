<?php 
        
require('include/header.php');
if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}   ?>
        <!-- End Bradcaump area -->
        <!-- Start Contact Area -->
        <section class="htc__contact__area ptb--100 bg__white">
            <div class="container">
                <div class="row">
					<div class="col-md-6">
						<div class="contact-form-wrap mt--60">
							<div class="col-xs-12">
								<div class="contact-title">
									<h2 class="title__line--6">My Profile</h2>
								</div>
							</div>
							<div class="col-xs-12">
								<form id="Login-form" method="post">
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="name" id="name" placeholder="Your Name*" style="width:100%" value="<?php echo  $_SESSION['User_Name']?>">
										</div>
                                        <span class="field_error" id="name_error"></span>
									</div>
								
									
									<div class="contact-btn">
										<button type="button" onclick="update_profile()" class="fv-btn" id="update_profile_btn">Update</button>
									</div>
                                    
                                    
								</form>
								<div class="form-output login_msg">
									<p class="form-messege field_error"></p>
								</div>
							</div>
						</div> 
                
				</div>
				

                    <div class="col-md-6">
						<div class="contact-form-wrap mt--60">
							<div class="col-xs-12">
								<div class="contact-title">
									<h2 class="title__line--6">Change Password</h2>
								</div>
							</div>
							<div class="col-xs-12">
								<form id="password_form" method="post">
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="password" name="current_password" id="current_password" placeholder="Your Current Password*" style="width:100%">
										</div>
                                        <span class="field_error" id="current_password_error"></span>
									</div>
								
                                    	<div class="single-contact-form">
										<div class="contact-box name">
											<input type="password" name="new_password" id="new_password" placeholder="Your New Password*" style="width:100%">
										</div>
                                        <span class="field_error" id="new_password_error"></span>
									</div>
                                    
                                    	<div class="single-contact-form">
										<div class="contact-box name">
											<input type="password" name="new_confirm_password" id="new_confirm_password" placeholder="Confirm New Password*" style="width:100%">
										</div>
                                        <span class="field_error" id="new_confirm_password_error"></span>
									</div>
									
									<div class="contact-btn">
										<button type="button" onclick="update_password()" class="fv-btn" id="update_password_btn">Update</button>
									</div>
                                    <span class="field_error" id="not_current_password"></span>
                                    
								</form>
								<div class="form-output login_msg">
									<p class="form-messege field_error"></p>
								</div>
							</div>
						</div> 
                
				</div>
					
            </div>
                   </div>
        </section>

<script>
    function update_profile(){
     jQuery("#name_error").html(''); 
        var name=jQuery('#name').val();
        if(name==''){
            jQuery("#name_error").html('Please Enter Your Name');           
        }
        else{
            jQuery("#update_profile_btn").html('Please Wait...');
             jQuery("#update_profile_btn").attr('disabled',true);
            jQuery.ajax({
                url:'profile_update.php',
                type:'post',
                data:'name='+name,
                success:function(result){
                     jQuery("#name_error").html(result);
                    jQuery("#forget_password_btn").html('Update');
             jQuery("#forget_password_btn").attr('disabled',false);
                }
            });
        }
}
    
    function update_password(){
     jQuery(".field_error").html(''); 
        var current_password=jQuery('#current_password').val();
        var new_password=jQuery('#new_password').val();
        var new_confirm_password=jQuery('#new_confirm_password').val();
        var iserror='';
        if(current_password==''){
            jQuery("#current_password_error").html('Please Enter Your Current Password');  
            var iserror='yes';
        }
         if(new_password==''){
            jQuery("#new_password_error").html('Please Enter Your New Password');     
            var iserror='yes';
        }
         if(new_confirm_password==''){
            jQuery("#new_confirm_password_error").html('Please Enter Confirm Your New Password');         
            var iserror='yes';
        }
        
        if(new_password!='' && new_confirm_password!='' && new_password!=new_confirm_password){
           jQuery("#new_confirm_password_error").html('Please Provide same password');         
            var iserror='yes';
           }
        if(iserror==''){
            jQuery("#update_password_btn").html('Please Wait...');
             jQuery("#update_password_btn").attr('disabled',true);
            jQuery.ajax({
                url:'password_update.php',
                type:'post',
                data:'current_password='+current_password+'&new_password='+new_password,
                success:function(result){
                     jQuery("#not_current_password").html(result);
                    jQuery("#update_password_btn").html('Update');
             jQuery("#update_password_btn").attr('disabled',false);
                    jQuery('#password_form')[0].reset();
                }
            });
        }
}

</script>

        <!-- End Contact Area -->
        <!-- End Banner Area -->
<?php 
        
require('include/footer.php');
        ?>