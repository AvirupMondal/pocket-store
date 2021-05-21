<?php
require('admin_header.php');
isAdmin();
$coupon_names='';
$msg='';
$coupon_values='';
$coupon_types='';
$cart_min_values='';

if(isset($_GET['Id']) && $_GET['Id']!=''){
    $image_required='';
    $Id=get_safe_data($con,$_GET['Id']);
    
   $sqli="Select * from coupon where Coupon_Id='$Id'";
   $res=mysqli_query($con,$sqli);
    $check=mysqli_num_rows($res);
    if($check >0){
    $row=mysqli_fetch_assoc($res);
    $coupon_names=$row['Coupon_Name'];
    $coupon_values=$row['Coupon_Value'];
    $coupon_types=$row['Coupon_Type'];
    $cart_min_values=$row['Cart_Min_Value'];
      
  }
    else{
        header('location:coupon.php');
        die();
    }
}
 if(isset($_POST['submit']))
 {
     $coupon_name=get_safe_data($con,$_POST['editcouponname']);
      $coupon_value=get_safe_data($con,$_POST['editcouponvalue']);
     $coupon_type=get_safe_data($con,$_POST['editcoupontype']);
     
     $cart_min_value=get_safe_data($con,$_POST['editcartminvalue']);
    
     $sqli="Select * from coupon where Coupon_Name='$coupon_name'";
     $res=mysqli_query($con,$sqli);
     $check=mysqli_num_rows($res);
     
if($check>0){
		if(isset($_GET['Id']) && $_GET['Id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['Id']){
			
			}else{
				$msg="Coupon already exist";
			}
		}
        else{
			$msg="Coupon already exist";
		}
	}
        
    if($msg==''){
        if(isset($_GET['Id']) && $_GET['Id']!='')
        {
                    $update_sql="Update coupon set Coupon_Name='$coupon_name',Coupon_Value='$coupon_value',Coupon_Type='$coupon_type',Cart_Min_Value='$cart_min_value',Status='1' where Coupon_Id='$Id' ";
                    mysqli_query($con,$update_sql);  
                header('location:coupon.php');
            
        }
        else
        {
            $insert_sql="Insert into coupon(Coupon_Name,Coupon_Value,Coupon_Type,Cart_Min_Value,Status) values('$coupon_name','$coupon_value','$coupon_type','$cart_min_value','1')";
            mysqli_query($con,$insert_sql);
           header('location:coupon.php');
        }
    }
       
 }
?>

<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Coupon Form</strong></div>
                          <form method="post" enctype="multipart/form-data">
                        <div class="card-body card-block">
                       

                            <div class="form-group">
                               <label for="category" class=" form-control-label">Coupon Name</label>
                                
                                <input type="text" id="company" name="editcouponname" placeholder="Enter Coupon Name" class="form-control" value="<?php echo $coupon_names ?>" required>
                            </div>
                          
                            <div class="form-group">
                               <label for="category" class=" form-control-label">Coupon Value</label>
                                
                                <input type="text" id="company" name="editcouponvalue" placeholder="Add Coupon Value" class="form-control" value="<?php echo $coupon_values ?>" required>
                            </div>
                            
                             <div class="form-group">
                               <label for="category" class=" form-control-label">Coupon Type</label>
                                
                                <select type="text" id="company" name="editcoupontype"  class="form-control"  required>
                                    <option value="">Select</option>
                                    <?php if($coupon_types=='Percentage'){
                                   echo '<option value="Percentage" selected>Percentage</option>
                                    <option value="Rupee">Rupee</option>';
                                    }
                                    elseif($coupon_types=='Rupee'){
                                         echo '<option value="Percentage">Percentage</option>
                                    <option value="Rupee" selected>Rupee</option>';
                                    }
                                       else{
                                          echo '<option value="Percentage">Percentage</option>
                                    <option value="Rupee">Rupee</option>';
                                       }
                                    ?>
                                    
                                </select>
                            </div>
                            
                            <div class="form-group">
                               <label for="category" class=" form-control-label">Min Cart Value</label>
                                
                                <input type="text" id="company" name="editcartminvalue" placeholder="Minimum Cart Value Required" class="form-control" value="<?php echo $cart_min_values ?>" required>
                            </div>
                          
                            
                            
                           <button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                           <span id="payment-button-amount">Submit</span>
                           </button>
                              </div>
                               </form>
                      
                     </div>
                  </div>
               </div>  
            </div>
         </div>




<?php require('admin_footer.php');
?>

