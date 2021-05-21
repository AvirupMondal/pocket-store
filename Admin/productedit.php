<?php
require('admin_header.php');
$condition='';
$condition1='';
if( $_SESSION['admin_role']==1){
    $condition=" and product.Vendor_Id='".$_SESSION['admin_id']."'";
    $condition1=" and Vendor_Id='".$_SESSION['admin_id']."'";
}
$categories='';
$msg='';
$sub_categories='';
$names='';

$quantities='';
$mrps='';
$sps='';
$shortdeses='';
$longdeses='';
$titles='';
$deses='';
$keywords='';
$best_seller='';
$image_required='required';

if(isset($_GET['Id']) && $_GET['Id']!=''){
    $image_required='';
    $Id=get_safe_data($con,$_GET['Id']);
    
   $sqli="Select * from product where Product_Id='$Id' $condition1";
   $res=mysqli_query($con,$sqli);
    $check=mysqli_num_rows($res);
    if($check >0){
    $row=mysqli_fetch_assoc($res);
    $categories=$row['Id_Category'];
    $sub_categories=$row['Id_Subcategory'];
        $names=$row['Product_Name'];
        
        $quantities=$row['Product_Quantity'];
        $mrps=$row['Product_Mrp'];
        
        $sps=$row['Product_Sp'];
        $shortdeses=$row['Short_Description'];
        $longdeses=$row['Long_Description'];
        $titles=$row['Meta_Title'];
        $deses=$row['Meta_Description'];
        $keywords=$row['Meta_keywords'];
        $best_seller=$row['Best_Seller'];
  }
    else{
        header('location:admin_product.php');
    }
}
 if(isset($_POST['submit']))
 {
     $category=get_safe_data($con,$_POST['editcategory']);
      $sub_category=get_safe_data($con,$_POST['editsubcategory']);
     $name=get_safe_data($con,$_POST['editname']);
     
     $quantity=get_safe_data($con,$_POST['editquantity']);
     $mrp=get_safe_data($con,$_POST['editmrp']);
     $sp=get_safe_data($con,$_POST['editsp']);
     $shortdes=get_safe_data($con,$_POST['editshortdes']);
     $longdes=get_safe_data($con,$_POST['editlongdes']);
     $title=get_safe_data($con,$_POST['edittitle']);
     $des=get_safe_data($con,$_POST['editdes']);
     $keyword=get_safe_data($con,$_POST['editkeyword']);
$best_seller=get_safe_data($con,$_POST['editbestseller']);
     $sqli="Select * from product where Product_Name='$name' $condition1";
     $res=mysqli_query($con,$sqli);
     $check=mysqli_num_rows($res);
     
if($check>0){
		if(isset($_GET['Id']) && $_GET['Id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['Id']){
			
			}else{
				$msg="Product already exist";
			}
		}
        else{
			$msg="Product already exist";
		}
	}
        
    if($msg==''){
        if(isset($_GET['Id']) && $_GET['Id']!='')
        {
            if($_FILES['editimage']['name']!='')
                {
                    $image=rand(111111111,999999999).'_'.$_FILES['editimage']['name'];
                    move_uploaded_file($_FILES['editimage']['tmp_name'],'../media/Product/'.$image);
                    $update_sql="Update product set Id_Category='$category',Id_Subcategory='$sub_category',Product_Name='$name',Product_Image='$image',Product_Quantity='$quantity',Product_Mrp='$mrp',Product_Sp='$sp',Short_Description='$shortdes',Long_Description='$longdes',Meta_Title='$title',Best_Seller='$best_seller', Meta_Description='$des', Meta_keywords='$keyword',Status='1' where Product_Id='$Id' ";
                    mysqli_query($con,$update_sql);  
                    header('location:admin_product.php');
                }
            else
                {
                    $update_sql="Update product set Id_Category='$category',Id_Subcategory='$sub_category',Product_Name='$name',Product_Quantity='$quantity',Product_Mrp='$mrp',Product_Sp='$sp',Short_Description='$shortdes',Long_Description='$longdes',Meta_Title='$title',Best_Seller='$best_seller',Meta_Description='$des', Meta_keywords='$keyword',Status='1' where Product_Id='$Id' ";
                    mysqli_query($con,$update_sql);  
                header('location:admin_product.php');
            }
        }
        else
        {
            $image=rand(111111111,999999999).'_'.$_FILES['editimage']['name'];
            move_uploaded_file($_FILES['editimage']['tmp_name'],'../media/Product/'.$image);
            $insert_sql="Insert into product(Id_Category,Id_Subcategory,Product_Name,Product_Image,Product_Quantity,Product_Mrp,Product_Sp,Short_Description, Long_Description,Meta_Title,Best_Seller,Meta_Description,Meta_keywords,Status,Vendor_Id) values('$category','$sub_category','$name','$image','$quantity','$mrp','$sp','$shortdes','$longdes','$title','$best_seller','$des','$keyword','1','".$_SESSION['admin_id']."')";
            mysqli_query($con,$insert_sql);
           header('location:admin_product.php');
        }
    }
       
 }
?>

<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Product Form</strong></div>
                          <form method="post" enctype="multipart/form-data">
                        <div class="card-body card-block">
                            <div class="form-group">
                               <label for="category" class=" form-control-label">Category</label>
                                
                                <select type="text" id="category" name="editcategory"  class="form-control" value="editcategory" required onchange="get_sub_cat('')"><option>Select category</option>
                                    <?php 
                                    $sqli="Select Category_Id,Category from categories order by Category desc";
                                        $res=mysqli_query($con,$sqli);
                                    while($row=mysqli_fetch_assoc($res)){
                                     if($row['Category_Id'] == $categories){
                                            echo "<option selected value=".$row['Category_Id'].">".$row['Category']."</option>"; } 
                                        
                                        else{ 
                                            echo "<option value=".$row['Category_Id'].">".$row['Category']."</option>"; } }?>
                                    
                                  

                                </select>
                            </div>

                            
                            <div class="form-group">
                               <label for="sub_category" class=" form-control-label">Sub Category</label>
                                
                                <select id="subcategory" name="editsubcategory"  class="form-control" value="editsubcategory" required><option>Select Subcategory</option>
                                    

                                </select>
                            </div>
                           

                            <div class="form-group">
                               <label for="category" class=" form-control-label">Product Name</label>
                                
                                <input type="text" id="company" name="editname" placeholder="Add New Product Name" class="form-control" value="<?php echo $names ?>" required>
                            </div>
                            <div class="form-group">
                               <label for="category" class=" form-control-label">Product Image</label>
                                
                                <input type="file" id="company" name="editimage" class="form-control"  >
                            </div>
                            <div class="form-group">
                               <label for="category" class=" form-control-label">Quantity</label>
                                
                                <input type="text" id="company" name="editquantity" placeholder="Add Quantity" class="form-control" value="<?php echo $quantities ?>" required>
                            </div>
                            <div class="form-group">
                               <label for="category" class=" form-control-label">MRP</label>
                                
                                <input type="text" id="company" name="editmrp" placeholder="Add MRP" class="form-control" value="<?php echo $mrps ?>" required>
                            </div>
                            <div class="form-group">
                               <label for="category" class=" form-control-label">SP</label>
                                
                                <input type="text" id="company" name="editsp" placeholder="Add SP" class="form-control" value="<?php echo $sps ?>" required>
                            </div>
                             <div class="form-group">
                               <label for="category" class=" form-control-label">Best Selller</label>
                                
                                <select type="text" id="company" name="editbestseller"  class="form-control"  required>
                                    <option value="">Select</option>
                                    <?php if($best_seller=='1'){
                                   echo '<option value="1" selected>Yes</option>
                                    <option value="0">No</option>';
                                    }
                                    elseif($best_seller=='0'){
                                         echo '<option value="1">Yes</option>
                                    <option value="0" selected>No</option>';
                                    }
                                       else{
                                          echo '<option value="1">Yes</option>
                                    <option value="0">No</option>';
                                       }
                                    ?>
                                    
                                </select>
                            </div>
                            
                            <div class="form-group">
                               <label for="category" class=" form-control-label">Short Description</label>
                                
                                <input type="text" id="company" name="editshortdes" placeholder="Add Short Description" class="form-control" value="<?php echo $shortdeses ?>" required>
                            </div>
                            <div class="form-group">
                               <label for="category" class=" form-control-label">Long Description</label>
                                
                                <input type="text" id="company" name="editlongdes" placeholder="Add Long Description" class="form-control" value="<?php echo $longdeses ?>" required>
                            </div>
                            <div class="form-group">
                               <label for="category" class=" form-control-label">Meta Tilte</label>
                                
                                <input type="text" id="company" name="edittitle" placeholder="Add Meta Title" class="form-control" value="<?php echo $titles ?>" >
                            </div>
                            <div class="form-group">
                               <label for="category" class=" form-control-label">Meta Description</label>
                                
                                <input type="text" id="company" name="editdes" placeholder="Add Meta Description " class="form-control" value="<?php echo $deses ?>" >
                            </div>
                            <div class="form-group">
                               <label for="category" class=" form-control-label">Meta Keywords</label>
                                
                                <input type="text" id="company" name="editkeyword" placeholder="Add Meta Keywords " class="form-control" value="<?php echo $keywords ?>" >
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

<script>
function get_sub_cat(sub_cat_id){
    var category=jQuery('#category').val();
                jQuery.ajax({
                url:'get_sub_cat.php',
                type:'post',
                data:'category='+category+'&sub_cat_id='+sub_cat_id,
                success:function(result){
                     jQuery('#subcategory').html(result);
                }
            });
}

</script>



<?php require('admin_footer.php');
?>

<script>

    <?php
    if(isset($_GET['Id'])){
        ?>
    get_sub_cat('<?php echo $sub_categories?>');
    <?php
    }
    ?>
</script>