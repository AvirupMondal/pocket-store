<!--Starting Of Php Block -->
<?php
    require('admin_header.php'); //Include Of Header File
$condition='';
$condition1='';
if( $_SESSION['admin_role']==1){
    $condition=" and product.Vendor_Id='".$_SESSION['admin_id']."'";
    $condition1=" and Vendor_Id='".$_SESSION['admin_id']."'";
}
        if(isset($_GET['type']) && $_GET['type']!='')
        {
            $type=get_safe_data($con,$_GET['type']);
            if($type=='status')
            {
                $operation=get_safe_data($con,$_GET['operation']);
                $Id=get_safe_data($con,$_GET['Id']);
                    if($operation=='active')
                    {
                        $Status='1';
                    }
                    else{
                        $Status='0';
                    }
                $update_sql="Update product set Status='$Status' where Product_Id='$Id' $condition1";
                mysqli_query($con,$update_sql);
            }
            if($type=='delete')
            {
                $Id=get_safe_data($con,$_GET['Id']);
                $delete_sql="Delete from product where Product_Id='$Id' $condition1";
                mysqli_query($con,$delete_sql);
            }
           
        }


   $sqli="Select product.*, categories.Category from product, categories where product.Id_Category=Category_Id $condition order by Product_Id desc";
   $res=mysqli_query($con,$sqli);
  
?>
<!--Ending Of Php Block -->

         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Products </h4>
                            <h4 class="box-title"><a href="productedit.php"><i class="fa fa-plus-square">Add Product</i> </a></h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       
                                       <th>Categories</th>
                                       
                                        <th>Product Name</th>
                                        <th>Image</th>
                                        <th>Quantity</th>
                                        <th>MRP</th>
                                        <th>Selling Price</th>
                                        <th>Short Desc</th>
                                        <th>Long Desc</th>
                                            <th>Best Seller</th>
                                       <th>Status</th>
                                    </tr>
                                 </thead>

                                 <tbody>
                                    
                                     <?php 
                                     
                                     while($row=mysqli_fetch_assoc($res)){
                                 						
                                     ?>
                                    <tr>
                                       <td><?php echo $row['Category'] ?></td>
                                       
                                       <td><?php echo $row['Product_Name'] ?></td>
                                        <td><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['Product_Image']?>"/></td>
                                        <td><?php echo $row['Product_Quantity'] ?>
                                        <br>
                                            <?php
							   $productSoldQtyByProductId=productSoldQtyByProductId($con,$row['Product_Id']);
							   $pneding_qty=$row['Product_Quantity']-$productSoldQtyByProductId;
							   
							   ?>
							   Qty Left <?php echo $pneding_qty?>
							   
                                        </td>
                                        <td><?php echo $row['Product_Mrp'] ?></td>
                                        <td><?php echo $row['Product_Sp'] ?></td>
                                        <td><?php echo $row['Short_Description'] ?></td>
                                        <td><?php echo $row['Long_Description'] ?></td>
                                        <td><?php echo $row['Best_Seller'] ?></td>
                                       <td><?php 
                                            if($row['Status']==1){
                                              echo "<a href='?type=status&operation=deactive&Id=".$row['Product_Id']."'>Active</a>";  
                                            }
                                            else{
                                            echo "<a href='?type=status&operation=active&Id=".$row['Product_Id']."'>Deactive</a>";  
                                            }
                                          echo "&nbsp<a href='productedit.php?Id=".$row['Product_Id']."'>Edit</a>&nbsp";
                                        echo "<a href='?type=delete&Id=".$row['Product_Id']."'>Delete</a>";  
                                           
                                           
                                           ?></td>
                                    </tr>
                                     <?php } ?>
                                 </tbody>

                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
<?php require('admin_footer.php'); //Include Of Footer File
?>