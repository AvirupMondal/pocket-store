<?php
require('include/db_connection.php');
require('include/function.php');
echo '<b>Transaction In Process, Please do not reload</b>';
$payment_mode=$_POST['mode'];
$pay_id=$_POST['mihpayid'];
$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$MERCHANT_KEY = "gtKFFx"; 
$SALT = "eCwWELxi";
$udf5='';
$keyString 	= $MERCHANT_KEY .'|'.$txnid.'|'.$amount.'|'.$productinfo.'|'.$firstname.'|'.$email.'|||||'.$udf5.'|||||';
$keyArray 	= explode("|",$keyString);
$reverseKeyArray = array_reverse($keyArray);
$reverseKeyString =	implode("|",$reverseKeyArray);
$saltString     = $SALT.'|'.$status.'|'.$reverseKeyString;
$sentHashString = strtolower(hash('sha512', $saltString));


if($sentHashString != $posted_hash){
   
	mysqli_query($con,"update orders set Payment_Status='$status', mihpayid='$pay_id' where Transaction_Id='$txnid'");	
    ?>
<script>
    window.location.href='payment_fail.php';
</script>
<?php
}else{
    
	mysqli_query($con,"update orders set Payment_Status='$status', mihpayid='$pay_id' where Transaction_Id='$txnid'");	
    $order_detail=mysqli_fetch_assoc(mysqli_query($con,"select Order_Id from orders where Transaction_Id='$txnid'"));
	
	sentInvoice($con,$order_detail['Order_Id']);
	?>
<script>
    window.location.href='thankyou.php';
</script>
<?php
}
?>