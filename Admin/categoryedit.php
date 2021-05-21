<?php
require('admin_header.php');
isAdmin();
 $categories='';
$msg='';
$subcategories='';
if(isset($_GET['Id']) && $_GET['Id']!=''){
    $Id=get_safe_data($con,$_GET['Id']);
    
   $sqli="Select * from categories where Category_Id='$Id'";
   $res=mysqli_query($con,$sqli);
    $check=mysqli_num_rows($res);
    if($check >0){
    $row=mysqli_fetch_assoc($res);
    $categories=$row['Category'];
     $subcategories=$row['Subcategory'];
  }
    else{
        header('location:admin_index.php');
    }
}
 if(isset($_POST['submit2']))
 {
     $category=get_safe_data($con,$_POST['editcategory']);
     $subcategory=get_safe_data($con,$_POST['editsubcategory']);
     $sqli="Select * from categories where Category='$category' ";
     $res=mysqli_query($con,$sqli);
     $check=mysqli_num_rows($res);
     $row=mysqli_fetch_assoc($res);
     if($check >0)
     {
         if($row['Category']== $category && $row['Subcategory'] != $subcategory)
         {
             if(isset($_GET['Id']) && $_GET['Id']!='')
                {
                    $update_sql="Update categories set Category='$category' ,Subcategory='$subcategory', Status='1' where Category_Id='$Id' ";
                    mysqli_query($con,$update_sql);  
                   header('location:admin_index.php');
                }
            else
            {
                $insert_sql="Insert into categories(Category,Subcategory,Status) values('$category','$subcategory','1')";
                mysqli_query($con,$insert_sql);
               header('location:admin_index.php');
            }
             
         }
         else
         {
             if(isset($_GET['Id']) && $_GET['Id']!='')
             {
                 $checkId=mysqli_fetch_assoc($res);
                 if($Id==$checkId)
                 {

                 }
                 else{
                     echo $msg='Category or subcategory already exsits';
                 }
             
             }
             else
             {
                echo $msg='Category or subcategory already exsits';
             }
        }
    }     
    else
     {
        if(isset($_GET['Id']) && $_GET['Id']!='')
        {
            $update_sql="Update categories set Category='$category' ,Subcategory='$subcategory', Status='1' where Category_Id='$Id' ";
            mysqli_query($con,$update_sql);  
           header('location:admin_index.php');
        }
        else
        {
            $insert_sql="Insert into categories(Category,Subcategory,Status) values('$category','$subcategory','1')";
            mysqli_query($con,$insert_sql);
           header('location:admin_index.php');
        }
    }
       
 }
?>

<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Category Edit Form</strong></div>
                          <form method="post">
                        <div class="card-body card-block">
                            <div class="form-group">
                               <label for="category" class=" form-control-label">Category</label>
                                
                                <input type="text" id="company" name="editcategory" placeholder="Add New Category" class="form-control" value="<?php echo $categories ?>" required>
                            </div>
                            
                         
                            
                           <button id="payment-button" type="submit" name="submit2" class="btn btn-lg btn-info btn-block">
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