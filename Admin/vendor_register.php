<?php 

require('../include/db_connection.php');
require('../include/function.php');
if(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']='yes'){
   ?>
<script>
window.location.href='myorder.php';
</script>
<?php
}
?>
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
                        <h5 style="text-align: center; font-weight:900; font-size:20px">Vendor Register</h5>
                          
                       
                     </div>
                     <div class="form-group">
                        <label>Your Name*</label>
                    
                         <input type="text" name="name" class="form-control" id="name" style="width:100%">
                     </div>
                     <div class="form-group">
                        <label>Your Email</label>
                        <input type="email" name="email" id="email" style="width:45%">
                        <button class="fv-btn email_sent_otp" type="button" onclick="email_sent_otp()" >Send OTP</button>
                        <input class="email_verify_otp" type="text" id="email_otp" placeholder="ENTER OTP" style="45%">
                        <button class="email_verify_otp fv-btn" type="button" onclick="email_verify_otp()" >Verify OTP</button>
                        <span class="field_error" id="email_otp_result"></span>
                                            
                     </div>
                       <div class="form-group">
                        <label>Your Contact*</label>
                    
                         <input type="text" name="mobile" id="mobile"  style="width:100%">
                            <span class="field_error" id="mobile_error"></span>
                     </div>
                       <div class="form-group">
                        <label>Your Password*</label>
                    <input type="password" name="password" id="password" style="width:100%">
                           <span class="field_error" id="password_error"></span>
                     </div>
                      <button type="button" onclick="register_submit()" class="fv-btn">Register</button>
                     

                   
					</form>
                     <div>
                       
                        <a class="reg2" href="login.php">Already an user? Login</a>
                     </div>
                      <div class="form-output register_msg">
									<p class="form-messege field_error"></p>
								</div>
								
               </div>
            </div>
         </div>
      </div>
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
                        
function register_submit(){
    jQuery('.field_error').html('');
        var name= jQuery("#name").val();
     var email= jQuery("#email").val();
     var mobile= jQuery("#mobile").val();
     var password= jQuery("#password").val();
    var is_error='';
     if(name==""){
        jQuery('#name_error').html("Enter your name");
         is_error='yes';
       }
   if(email==""){
       jQuery('#email_error').html("Enter your email");
       is_error='yes';
       }
   if(mobile==""){
         jQuery('#mobile_error').html("Enter your mobile");
       is_error='yes';
       }
   if(password==""){
    jQuery('#password_error').html("Enter your password");
        is_error='yes';
       }
    if(is_error==''){

        jQuery.ajax({
            url: 'register_submit.php',
            type: 'post',
            data: 'name='+name+ '&email='+email+ '&mobile='+mobile+ '&password='+password,
            success:function(result){
            if(result=='email_present'){
                 jQuery('#email_error').html("Email ID Already Present");
            }
                if(result=='email_insert'){
                 jQuery('.register_msg p').html("Successfully Registered");
            }
        }
            
        });
    }
}

</script>	
          <script src="assets/js/vendor/jquery-2.1.4.min.js" type="text/javascript"></script>
      <script src="assets/js/popper.min.js" type="text/javascript"></script>
      <script src="assets/js/plugins.js" type="text/javascript"></script>
      <script src="assets/js/main.js" type="text/javascript"></script>
             

    </body>
</html>