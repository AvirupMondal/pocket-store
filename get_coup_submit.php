<?php
require('include/db_connection.php');
require('include/function.php');
$coup_name=get_safe_data($con,$_POST['coup_name']);
$res=mysqli_query($con,"select * from coupon where Coupon_Name='$coup_name' and Status='1'");
$count=mysqli_num_rows($res);
$jsonArr=array();

if(isset($_SESSION['COUPON_ID'])){
	unset($_SESSION['COUPON_ID']);
	unset($_SESSION['COUPON_NAME']);
	unset($_SESSION['COUPON_VALUE']);
}
 $cart_total=0;
foreach($_SESSION['cart'] as $key=>$val) 
{
$productArray=get_product($con,'','',$key);
$sp=$productArray[0]['Product_Sp'];
$qty=$val['qty'];
$cart_total=$cart_total+($sp*$qty);
}

if($count>0){
	$coupon_details=mysqli_fetch_assoc($res);
	$coupon_value=$coupon_details['Coupon_Value'];
	$coupon_type=$coupon_details['Coupon_Type'];
	$cart_min_value=$coupon_details['Cart_Min_Value'];
    $id=$coupon_details['Coupon_Id'];
	
	if($cart_min_value>$cart_total){
		$jsonArr=array('is_error'=>'yes','result'=>$cart_total,'dd'=>'Cart total value must be '.$cart_min_value);
	}else{
		if($coupon_type=='Rupee'){
			$final_price=$cart_total-$coupon_value;
		}else{
			$final_price=$cart_total-(($cart_total*$coupon_value)/100);
		}
		$dd=$cart_total-$final_price;
		$_SESSION['COUPON_ID']=$id;
		$_SESSION['FINAL_PRICE']=$final_price;
		$_SESSION['COUPON_VALUE']=$dd;
		$_SESSION['COUPON_NAME']=$coup_name;
		$jsonArr=array('is_error'=>'no','result'=>$final_price,'dd'=>$dd);
	}
	
}else{
	$jsonArr=array('is_error'=>'yes','result'=>$cart_total,'dd'=>'Coupon code not found');
}
echo json_encode($jsonArr);
?>