<?php 
require('include/db_connection.php');
require('include/function.php');




    $email=get_safe_data($con,$_POST['forget_password_email']);
    $search_query="select * from userinfo where User_Email='$email'";
    $res=mysqli_query($con,$search_query);
    $check_user=mysqli_num_rows($res);
	if($check_user>0){
		$row=mysqli_fetch_assoc($res);
        $pwd=$row['User_Password'];
    $html="$pwd is your password";
    
    	
	include('smtp/PHPMailerAutoload.php');
	$mail=new PHPMailer(true);
	$mail->isSMTP();
	$mail->Host="smtp.gmail.com";
	$mail->Port=587;
	$mail->SMTPSecure="tls";
	$mail->SMTPAuth=true;
	$mail->Username="phpcode2020@gmail.com";
	$mail->Password="Avirupphpcode@2020";
	$mail->SetFrom("phpcode2020@gmail.com");
	$mail->addAddress($email);
	$mail->IsHTML(true);
	$mail->Subject="New OTP";
	$mail->Body=$html;
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if($mail->send()){
		echo "Please check your Email Id for Password";
	}else{
		//echo "Error occur";
	}
	}
    else{
        echo "Email Id is not registered";
		die();
    }
   





?>