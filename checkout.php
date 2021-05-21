<?php
require('include/header.php');
if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0){
    ?>
<script>
    window.location.href='index.php';
</script>
<?php
    
}
    $cart_total=0;
    foreach($_SESSION['cart'] as $key=>$val) 
        {
            $productArray=get_product($con,'','',$key);
            $sp=$productArray[0]['Product_Sp'];
            $qty=$val['qty'];
    $cart_total=$cart_total+($sp*$qty);
    }

if(isset($_POST['submit'])){
   $street=get_safe_data($con,$_POST['street']);
    $house=get_safe_data($con,$_POST['house']);
    $state=get_safe_data($con,$_POST['state']);
    $city=get_safe_data($con,$_POST['city']);
    $pincode=get_safe_data($con,$_POST['pincode']);
    $payment_mode=get_safe_data($con,$_POST['payment_type']);
    $user_id=$_SESSION['User_Id'];
     $user_contact= $_SESSION['User_Contact'];
    $total_price=$cart_total;
     $payment_status='pending';
    
    if($payment_mode=='COD'){
    $payment_status='success';
    }
    $order_status=1;
    $date=date('Y-m-d h:i:s');
    $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
    
    if(isset($_SESSION['COUPON_ID'])){
        $coupon_id=$_SESSION['COUPON_ID'];
         $coupon_name=$_SESSION['COUPON_NAME'];
         $coupon_value=$_SESSION['COUPON_VALUE'];
        $total_price=$total_price-$coupon_value;
        unset($_SESSION['COUPON_ID']);
        unset($_SESSION['COUPON_NAME']);
        unset($_SESSION['COUPON_VALUE']);
    }
    else{
        $coupon_id='';
        $coupon_name='';
        $coupon_value='';
    }
    
      $insert_sql="Insert into orders(User_Id,User_Address,User_Contact,User_Pincode,User_City,User_State,Payment_Type,Total_Price,Payment_Status,Order_Status,Date,Transaction_Id,coupon_id,coupon_name,coupon_value) values('$user_id','$street','$user_contact','$pincode','$city','$state','$payment_mode','$total_price','$payment_status','$order_status','$date','$txnid','$coupon_id','$coupon_name','$coupon_value')";
                mysqli_query($con,$insert_sql);
    $order_id=mysqli_insert_id($con);
   
    foreach($_SESSION['cart'] as $key=>$val) 
                                                {
                                            $productArray=get_product($con,'','',$key);
                                            
                                            $sp=$productArray[0]['Product_Sp'];
                                            
                                            $qty=$val['qty'];
    
    $insert_sql="Insert into order_detail(Order_Id,Product_Id,Qty,Price_Per_Piece) values('$order_id','$key','$qty','$sp')";
                mysqli_query($con,$insert_sql);
    }
        unset($_SESSION['cart']);
    
    if($payment_mode=='PAY_U'){
        $MERCHANT_KEY = "gtKFFx"; 
$SALT = "eCwWELxi";
$hash_string = '';
//$PAYU_BASE_URL = "https://secure.payu.in";
$PAYU_BASE_URL = "https://test.payu.in";
$action = '';
$posted = array();
if(!empty($_POST)) {
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
  }
}
        $user_arr_sql="select * from userinfo where User_Id='$user_id'";
        $user_arr=mysqli_query($con,$user_arr_sql);
        $user_arr_fetch=mysqli_fetch_assoc($user_arr);
        
$formError = 0;

$posted['txnid']=$txnid;
$posted['amount']=$total_price;
$posted['firstname']=$user_arr_fetch['User_Name'];
$posted['email']=$user_arr_fetch['User_Email'];
$posted['phone']=$user_arr_fetch['User_Contact'];
$posted['productinfo']="productinfo";
$posted['key']=$MERCHANT_KEY ;
$hash = '';
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
         
  ) {
    $formError = 1;
  } else {    
	$hashVarsSeq = explode('|', $hashSequence);
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }
    $hash_string .= $SALT;
    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}


$formHtml ='<form method="post" name="payuForm" id="payuForm" action="'.$action.'"><input type="hidden" name="key" value="'.$MERCHANT_KEY.'" /><input type="hidden" name="hash" value="'.$hash.'"/><input type="hidden" name="txnid" value="'.$posted['txnid'].'" /><input name="amount" type="hidden" value="'.$posted['amount'].'" /><input type="hidden" name="firstname" id="firstname" value="'.$posted['firstname'].'" /><input type="hidden" name="email" id="email" value="'.$posted['email'].'" /><input type="hidden" name="phone" value="'.$posted['phone'].'" /><textarea name="productinfo" style="display:none;">'.$posted['productinfo'].'</textarea><input type="hidden" name="surl" value="http://localhost/ecommerce/payment_complete.php" /><input type="hidden" name="furl" value="http://localhost/ecommerce/payment_fail.php"/><input type="submit" style="display:none;"/></form>';
echo $formHtml;
echo '<script>document.getElementById("payuForm").submit();</script>';
    }
    else{
        sentInvoice($con,$order_id);
    
          ?>
<script>
    window.location.href='thankyou.php';
</script>
<?php
    }
}
?>

<!doctype html>


<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper">
        
        <div class="body__overlay"></div>
       
        <!-- End Offset Wrapper -->
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">checkout</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="checkout-wrap ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="checkout__inner">
                            <div class="accordion-list">
                                <div class="accordion">
                                    <?php
                                    $accordian_class='accordion__title'; 
                                            if(!isset($_SESSION['USER_LOGIN'])){ 
                                      $accordian_class='accordion__hide'; 
                                    ?>
                                    <div class="accordion__title">
                                        Checkout Method
                                    </div>
                                    
                                    <div class="accordion__body">
                                        <div class="accordion__body__form">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="checkout-method__login">
                                                       <form id="Login-form" method="post">
                                                            <h5 class="checkout-method__title">Login</h5>
                                                            <div class="single-input">
                                                                <label for="user-email">Email Address</label>
                                                                <input type="email" name="login_email" id="login_email" placeholder="Your Email*" style="width:100%">
                                                            </div>
                                                             <span class="field_error" id="login_email_error"></span>
                                                            <div class="single-input">
                                                                <label for="user-pass">Password</label>
                                                                <input type="password" name="login_password" id="login_password" placeholder="Your Password*" style="width:100%">
                                                            </div>
                                                           <span class="field_error" id="login_password_error"></span>
                                                            <p class="require">* Required fields</p>
                                                            <div class="dark-btn">
                                                              <button type="button" onclick="login_submit()" class="fv-btn">Login</button>
                                                            </div>
                                                           <div class="form-output login_msg">
									<p class="form-messege field_error"></p>
								</div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="checkout-method__login">
                                                        	<form id="Register-form" method="post">
                                                            <h5 class="checkout-method__title">Register</h5>
                                                            <div class="single-input">
                                                                <label for="user-email">Name</label>
                                                               <input type="text" name="name" id="name" placeholder="Your Name*" style="width:100%">
                                                            </div>
                                                                  <span class="field_error" id="name_error"></span>
															<div class="single-input">
                                                                <label for="user-email">Email Address</label>
                                                               <input type="email" name="email" id="email" placeholder="Your email*" style="width:100%">
                                                            </div>
															<span class="field_error" id="email_error"></span>
                                                            <div class="single-input">
                                                                <label for="user-pass">Password</label>
                                                                <input type="password" name="password" id="password" placeholder="Your password*" style="width:100%">
                                                            </div>
                                                                <span class="field_error" id="password_error"></span>
                                                                 <div class="single-input">
                                                                <label for="user-pass">Mobile</label>
                                                                <input type="text" name="mobile" id="mobile" placeholder="Your mobile*" style="width:100%">
                                                            </div>
                                                                <span class="field_error" id="mobile_error"></span>
                                                            <div class="dark-btn">
                                                            <button type="button" onclick="register_submit()" class="fv-btn">Register</button>
                                                            </div>
                                                                <div class="form-output register_msg">
									<p class="form-messege field_error"></p>
								</div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                    
                                    <div class="<?php echo $accordian_class?>">
                                        Address Information
                                    </div>
                                    <form method="post"> 
                                    <div class="accordion__body">
                                        <div class="bilinfo">
                                          
                                                <div class="row">
                                                    
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="text" name="street" placeholder="Street Address" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="text" name="house" placeholder="Apartment/Block/House" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="text" name="state" placeholder="State" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="text" name="city" placeholder="City" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="text" name="pincode" placeholder="Post code/ zip" required>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                           
                                        </div>
                                    </div>
                                    <div class="<?php echo $accordian_class?>">
                                        payment information
                                    </div>
                                    <div class="accordion__body">
                                        <div class="paymentinfo">
                                            <div class="single-method">
                                                <input type="radio" name="payment_type" value="COD" required> Cash On Delivery
                                                <input type="radio" name="payment_type" value="PAY_U" required> Pay U
                                            </div>
                                            <div class="single-method">
                                               
                                            </div>
                                        </div>
                                    </div>
                                        <input class="btn-primary" type="submit" name="submit" value="SUBMIT">
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="order-details">
                            <h5 class="order-details__title">Your Order</h5>
                            <div class="order-details__item">
                                    <?php
                                $cart_total=0;
                                foreach($_SESSION['cart'] as $key=>$val) 
                                                {
                                            $productArray=get_product($con,'','',$key);
                                            $name=$productArray[0]['Product_Name'];
                                            $mrp=$productArray[0]['Product_Mrp'];
                                            $sp=$productArray[0]['Product_Sp'];
                                            $image=$productArray[0]['Product_Image'];
                                            $qty=$val['qty'];
    $cart_total=$cart_total+($sp*$qty);
                                                                                ?>
                                <div class="single-item">
                                    <div class="single-item__thumb">
                                        <img src="media/Product/<?php echo $image ?>" alt="product img" />
                                    </div>
                                    <div class="single-item__content">
                                        <a href="#"><?php echo $name ?></a>
                                        <span class="price"><?php echo $qty*$sp ?></span>
                                    </div>
                                    <div class="single-item__remove">
                                       <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key ?>', 'remove')"><i class="icon-trash icons"></i></a>
                                    </div>
                                </div>
                              <?php } ?>
                            </div>
                           
                          
                           
                            <div class="ordre-details__total">
                                <h5>Order total</h5>
                                <span class="price" id="order_total_price"><?php echo $cart_total?></span>
                            </div>
                             <div class="ordre-details__total" id="coupon_box" style="display:none;">
                                <h5>Coupon Value</h5>
                                <span class="price" id="coupon_price">
                                
                                </span>
                               
                                </div>
                            <div class="ordre-details__total">
                              
                                <input type="text" name="couponname" placeholder="Enter Coupon Name" id="coup_name" class="form-control" value="">
                                <input type="button" class="btn-primary" value="Apply Coupon" style="margin-left:10px;" onclick="coupon_submit()">
                                
                                
                            </div>
                           <div id="coupon_result"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->
        
        <script>
function coupon_submit(){
    
     
    var coup_name=jQuery('#coup_name').val();
    if(coup_name!=''){
         $('#coupon_result').html('');
          jQuery.ajax({
                url:'get_coup_submit.php',
                type:'post',
                data:'coup_name='+coup_name,
                success:function(result){
                  var data=jQuery.parseJSON(result);
							if(data.is_error=='yes'){
								jQuery('#coupon_box').hide();
								jQuery('#coupon_result').html(data.dd);
								jQuery('#order_total_price').html(data.result);
							}
							if(data.is_error=='no'){
								jQuery('#coupon_box').show();
								jQuery('#coupon_price').html(data.dd);
								jQuery('#order_total_price').html(data.result);
							}
                   
                }
            });
    }
              
}

</script>
         <?php 
        if(isset($_SESSION['COUPON_ID'])){
	unset($_SESSION['COUPON_ID']);
	unset($_SESSION['COUPON_NAME']);
	unset($_SESSION['COUPON_VALUE']);
}
require('include/footer.php');
        ?>
    </div>
    <!-- Body main wrapper end -->

    <!-- Placed js at the end of the document so the pages load faster -->

  
</body>

</html>