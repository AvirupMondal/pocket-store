<?php 
        
require('include/header.php');
if(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']='yes'){
   ?>
<script>
window.location.href='myorder.php';
</script>
<?php
}
        ?>
        <!-- End Bradcaump area -->
        <!-- Start Contact Area -->


        <section class="htc__contact__area ptb--100 bg__white">
            <div class="container">
                <div class="row">
					<div class="col-md-6">
						<div class="contact-form-wrap mt--60">
                            <div class="col-xs-12">
								<div class="contact-title">
									<h2 class="title__line--6"><a href="Admin/login.php">Click Here For Admin Login</a></h2>
								</div>
							</div>
                             
							<div class="col-xs-12">
								<div class="contact-title">
									<h2 class="title__line--6">Login</h2>
								</div>
							</div>
							<div class="col-xs-12">
								<form id="Login-form" method="post">
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="email" name="login_email" id="login_email" placeholder="Your Email*" style="width:100%">
										</div>
                                        <span class="field_error" id="login_email_error"></span>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="password" name="login_password" id="login_password" placeholder="Your Password*" style="width:100%">
										</div>
                                        <span class="field_error" id="login_password_error"></span>
									</div><br>
									
                                   <a href="forget_password.php" class="title__line--5">Forget Password</a>
									<div class="contact-btn">
										<button type="button" onclick="login_submit()" class="fv-btn">Login</button>
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
									<h5 class="title__line--6"><a href="Admin/vendor_register.php">Click Here To Register as Vendor</a></h5>
								</div>
                            </div>
							<div class="col-xs-12">
								<div class="contact-title">
									<h2 class="title__line--6">Register</h2>
								</div>
							</div>
							<div class="col-xs-12">
								<form id="Register-form" method="post">
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="name" id="name" placeholder="Your Name*" style="width:100%">
										</div>
                                        <span class="field_error" id="name_error"></span>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="email" name="email" id="email" placeholder="Your Email*" style="width:45%">
                                            <button class="fv-btn email_sent_otp" type="button" onclick="email_sent_otp()" >Send OTP</button>
                                            
                                            <input class="email_verify_otp" type="text" id="email_otp" placeholder="ENTER OTP" style="45%">
                                            <button class="email_verify_otp fv-btn" type="button" onclick="email_verify_otp()" >Verify OTP</button>
                                            
                                            <span class="field_error" id="email_otp_result"></span>
                                            
										</div>
                                        <span class="field_error" id="email_error"></span>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="mobile" id="mobile" placeholder="Your Mobile*" style="width:100%">
                                           
										</div>
                                        <span class="field_error" id="mobile_error"></span>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="password" name="password" id="password" placeholder="Your Password*" style="width:100%">
										</div>
                                        <span class="field_error" id="password_error"></span>
									</div>
									
									<div class="contact-btn">
										<button type="button" onclick="register_submit()" class="fv-btn">Register</button>
									</div>
								</form>
								<div class="form-output register_msg">
									<p class="form-messege field_error"></p>
								</div>
							</div>
						</div> 
                
				</div>
					
            </div>
                   </div>
        </section>

<script>
    function email_sent_otp(){
        jQuery("#email_error").html(''); 
        var email=jQuery('#email').val();
        if(email==''){
            jQuery("#email_error").html('Please Enter a Email Id');           
        }
        else{
            jQuery(".email_sent_otp").html('Please Wait..');     
            jQuery(".email_sent_otp").attr('disabled',true);
            jQuery.ajax({
                url:'send_otp.php',
                type:'post',
                data:'email='+email+'&type=email',
                success:function(result){
            if(result=='done'){
                jQuery("#email").attr('disabled',true);
                jQuery(".email_verify_otp").show();
                jQuery(".email_sent_otp").hide();
                        }
            else{
                jQuery(".email_sent_otp").html('Send Otp');     
                jQuery(".email_sent_otp").attr('disabled',false);
                jQuery("#email_error").html('Please Try After Sometime');  
                }
            }
                
        });
   
    }
}
    function email_verify_otp(){
  jQuery("#email_error").html(''); 
            var email_otp=jQuery('#email_otp').val();
        if(email_otp==''){
            jQuery("#email_error").html('Please Enter valid OTP'); 
        }
        else{jQuery.ajax({
                url:'check_otp.php',
                type:'post',
                data:'otp='+email_otp+'&type=email',
                success:function(result){
                    if(result=='done'){
       jQuery(".email_verify_otp").hide();
        jQuery("#email_otp_result").html("Email Sucessfully Verify");
                    }
                    else{
                        jQuery("#email_error").html('Please Enter a Valid OTP');  
                    }
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