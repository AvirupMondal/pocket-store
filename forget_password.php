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
									<h2 class="title__line--6">Forget Password</h2>
								</div>
							</div>
							<div class="col-xs-12">
								<form id="Login-form" method="post">
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="email" name="forget_password_email" id="forget_password_email" placeholder="Your Email*" style="width:100%">
										</div>
                                        <span class="field_error" id="forget_password_email_error"></span>
									</div>
								
									
									<div class="contact-btn">
										<button type="button" onclick="forget_password()" class="fv-btn" id="forget_password_btn">Submit</button><a href="login.php" class="title__line--5" style="margin-left:15px; font-size:20px;">Login</a>
									</div>
                                    
                                   
                                   
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
    function forget_password(){
     jQuery("#forget_password_email_error").html(''); 
        var forget_password_email=jQuery('#forget_password_email').val();
        if(forget_password_email==''){
            jQuery("#forget_password_email_error").html('Please Enter a Email Id');           
        }
        else{
            jQuery("#forget_password_btn").html('Please Wait...');
             jQuery("#forget_password_btn").attr('disabled',true);
            jQuery.ajax({
                url:'forget_password_submit.php',
                type:'post',
                data:'forget_password_email='+forget_password_email,
                success:function(result){
                     jQuery("#forget_password_btn").html('results');
                    jQuery("#forget_password_btn").html('Submit');
             jQuery("#forget_password_btn").attr('disabled',false);
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