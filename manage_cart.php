<?php 
require('include/db_connection.php');
require('include/function.php');
require('add_to_cart.php');

$pid=get_safe_data($con,$_POST['pid']);
$qty=get_safe_data($con,$_POST['qty']);
$type=get_safe_data($con,$_POST['type']);

$productSoldQtyByProductId=productSoldQtyByProductId($con,$pid);
$productQty=productQty($con,$pid);

$pending_qty=$productQty-$productSoldQtyByProductId;

if(isset($_SESSION['USER_LOGIN'])){
      $user_id= $_SESSION['User_Id'];
    if($qty<1){
        echo "less than 1";
    }else{
        
    
if($qty>$pending_qty){
	echo "not_avaliable";
	die();
}
$obj = new add_to_cart();

if($type=='add'){
    $obj-> addProduct($pid,$qty);
    
}
if($type=='remove'){
    $obj-> removeProduct($pid);
}
if($type=='update'){
    $obj-> updateProduct($pid,$qty);
}

echo  $obj-> totalProduct();
}
}
else{
    $_SESSION['Wishlist_pid']=$pid;
    echo "not_login";
}
   
?>