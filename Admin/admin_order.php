<!--Starting Of Php Block -->
<?php
    require('admin_header.php'); //Include Of Header File
isAdmin();
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
                $update_sql="Update userinfo set Status='$Status' where User_Id='$Id'";
                mysqli_query($con,$update_sql);
            }
            if($type=='delete')
            {
                $Id=get_safe_data($con,$_GET['Id']);
                $delete_sql="Delete from userinfo where User_Id='$Id'";
                mysqli_query($con,$delete_sql);
            }
           
        }

   $sqli="Select * from userinfo order by User_Id desc";
   $res=mysqli_query($con,$sqli);
  
?>
<!--Ending Of Php Block -->

         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Order Manager </h4>
                            
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 
                                        <thead>
                                            <tr>
                                                <th class="product-remove"><span class="nobr">Order Id</span></th>
                                                <th class="product-thumbnail">Date</th>
                                                <th class="product-name"><span class="nobr">Address</span></th>
                                                <th class="product-price"><span class="nobr"> Payment Mode </span></th>
                                                <th class="product-stock-stauts"><span class="nobr"> Payment Status </span></th>
                                                <th class="product-add-to-cart"><span class="nobr">Order Status</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           
                                                 $insert_sql="Select orders.*, order_status.Status from orders, order_status where order_status.Status_Id=orders.Order_Status";
                                                  $res=mysqli_query($con,$insert_sql);
                                            while($row=mysqli_fetch_assoc($res)){
                                                
                                            
                                            ?>
                                            <tr>
                                                <td class="product-add-to-cart"><a href="admin_order_detail.php?order_id=<?php echo $row['Order_Id']?>">Order Id <?php echo $row['Order_Id']?>  Details</a></td>
                                                <td class="product-remove"><?php echo $row['Date']?> </td>
                                                <td class="product-thumbnail"><?php echo $row['User_Address']?> ,
                                                <?php echo $row['User_City']?> ,
                                                        <?php echo $row['User_State']?> ,
                                                        <?php echo $row['User_Pincode']?> 
                                                </td>
                                                <td class="product-name">    <?php echo $row['Payment_Type']?> </td>
                                                <td class="product-price">    <?php echo $row['Payment_Status']?> </td>
                                                <td class="product-stock-status">    <?php echo $row['Status']?> </td>
                                                
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