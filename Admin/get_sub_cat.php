<?php 
require('../include/db_connection.php');
require('../include/function.php');
   if(isset($_SESSION['admin_login']) && $_SESSION['admin_username']!=''){
   
   }
 
else{
     header('location:login.php');
   die();

}
$category=get_safe_data($con,$_POST['category']);
$sub_cat_id=get_safe_data($con,$_POST['sub_cat_id']);
$sub_sql="Select * from sub_categories where Category_Id='$category' and Status='1'";
$res=mysqli_query($con,$sub_sql);

if(mysqli_num_rows($res)>0){
    $html='';
    while($row=mysqli_fetch_assoc($res)){
        if($sub_cat_id==$row['Sub_Category_Id']){
            $html.="<option value=".$row['Sub_Category_Id']." selected>".$row['Sub_Category']."</option>";
       
        }else{
            $html.="<option value=".$row['Sub_Category_Id'].">".$row['Sub_Category']."</option>";
            
        }
         }
    echo $html;
}else{
    echo "<option value=''>No Sub Category Found</option>";
}
?>