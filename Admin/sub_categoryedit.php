<?php
require('admin_header.php');
isAdmin();
 $categories='';
$msg='';
$subcategories='';
if(isset($_GET['Id']) && $_GET['Id']!=''){
    $Id=get_safe_data($con,$_GET['Id']);
    
   $sqli="Select * from sub_categories where Sub_Category_Id='$Id'";
   $res=mysqli_query($con,$sqli);
    $check=mysqli_num_rows($res);
    if($check >0){
    $row=mysqli_fetch_assoc($res);
    $categories=$row['Category_Id'];
     $subcategories=$row['Sub_Category'];
  }
    else{
        header('location:sub_category.php');
    }
}
 if(isset($_POST['submit2']))
 {
     $category=get_safe_data($con,$_POST['editcategory']);
     $subcategory=get_safe_data($con,$_POST['editsubcategory']);
     $sqli="Select * from sub_categories where Category_Id='$category' and Sub_Category='$subcategory'";
     $res=mysqli_query($con,$sqli);
     $check=mysqli_num_rows($res);
     $row=mysqli_fetch_assoc($res);
     if($check >0)
     {
         if(isset($_GET['Id']) && $_GET['Id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['Id']){
			
			}else{
				$msg="Sub Categories already exist";
			}
		}else{
			$msg="Sub Categories already exist";
		}
    }     
    	if($msg==''){
		if(isset($_GET['Id']) && $_GET['Id']!=''){
			mysqli_query($con,"update sub_categories set Category_Id='$category',Sub_Category='$subcategory' where Sub_Category_Id='$Id'");
		}else{
			
			mysqli_query($con,"insert into sub_categories(Category_Id,Sub_Category,Status) values('$category','$subcategory','1')");
		}
		header('location:sub_category.php');
		die();
	}
       
 }
?>

<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Sub Category</strong></div>
                          <form method="post">
                        <div class="card-body card-block">
                            <div class="form-group">
                               <label for="category" class=" form-control-label">Category</label>
                                
                                <select name="editcategory" class="form-control" required>
                                
                                    <option value="">Select Category</option>
                                  <?php 
                                    $sqli="Select * from categories where Status='1' order by Category desc";
                                        $res=mysqli_query($con,$sqli);
                                    while($row=mysqli_fetch_assoc($res)){
                                     if($row['Category_Id'] == $categories){
                                            echo "<option selected value=".$row['Category_Id'].">".$row['Category']."</option>"; } 
                                        
                                        else{ 
                                            echo "<option value=".$row['Category_Id'].">".$row['Category']."</option>"; } }?>
                                    
                                  
                                </select>
                                
                                
                            </div>
                            
                           <div class="form-group">
                               <label for="vat" class=" form-control-label">Enter Subcategory</label>
                             
                               <input type="text" id="vat" name="editsubcategory" class="form-control" placeholder="Add New Sub Category" value="<?php echo $subcategories ?>" required>
                            </div>
                            
                           <button id="payment-button" type="submit" name="submit2" class="btn btn-lg btn-info btn-block">
                           <span id="payment-button-amount">Submit</span>
                               
                           </button>
                            <span style="color:red"><?php echo $msg;?></span>
                              </div>
                               </form>
                      
                     </div>
                  </div>
               </div>
            </div>
         </div>
<?php require('admin_footer.php');
?>