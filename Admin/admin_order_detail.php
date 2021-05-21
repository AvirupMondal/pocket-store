<!--Starting Of Php Block -->
<?php
    require('admin_header.php'); //Include Of Header File
isAdmin();
 $order_id=get_safe_data($con,$_GET['order_id']);
$coupon_details=mysqli_fetch_assoc(mysqli_query($con,"select coupon_value from orders where Order_Id='$order_id'"));
$coupon_value=$coupon_details['coupon_value'];
       if(isset($_POST['submit'])){
           $order_status_update=$_POST['editstatus'];
           $update="update orders set Order_Status='$order_status_update' where Order_Id='$order_id'";
           $res1=mysqli_query($con,$update);
           
       }
  
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
                                                <th class="product-name"><span class="nobr">Product Image</span></th>
                                                <th class="product-thumbnail">Product Name</th>
                                                <th class="product-name"><span class="nobr">Quantity</span></th>
                                                <th class="product-price"><span class="nobr"> Price per Piece </span></th>
                                                <th class="product-stock-stauts"><span class="nobr"> Total Price</span></th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           
                                            
                                           $total_price=0;
                                               $insert_sql="Select DISTINCT(order_detail.Detail_Id),order_detail.*,product.Product_Name,product.Product_Image,orders.User_Address,orders.User_City,orders.User_State,orders.User_Pincode from order_detail, product, orders where order_detail.Order_Id='$order_id'  and order_detail.Product_Id=product.Product_Id GROUP by order_detail.Detail_Id";
                                            
                                                $res=mysqli_query($con,$insert_sql);
                                            while($row=mysqli_fetch_assoc($res)){
                                                $total_price=$total_price+($row['Qty']*$row['Price_Per_Piece']);
                                                $address=$row['User_Address'];
                                                    $city=$row['User_City'];
                                                    $state=$row['User_State'];
                                                    $pincode=$row['User_Pincode'];
                                            ?>
                                            <tr>
                                                <td class="product-add-to-cart">Order Id <?php echo $row['Order_Id']?>  Details</td>
                                                 <td class="product-remove"><img src="../media/Product/<?php echo $row['Product_Image'] ?>" alt="product img" /> </td>
                                                <td class="product-remove"><?php echo $row['Product_Name']?> </td>
                                                <td class="product-thumbnail"><?php echo $row['Qty']?></td>
                                                <td class="product-name">    <?php echo $row['Price_Per_Piece']?> </td>
                                                <td class="product-price">    <?php echo $row['Qty']*$row['Price_Per_Piece']?> </td>
                                              
                                                
                                            </tr>
                                            <?php } 
                                            if($coupon_value!=''){?>
                                            
                                             <tr>
                                                
                                                <td colspan="4"></td>
                                                <th class="product-name">   Coupon Price</th>
                                                <td class="product-price">  <?php echo $coupon_value?> </td>
                                              
                                                
                                            </tr>
                                            <?php }?>
                                                <tr>
                                                
                                                <td colspan="4"></td>
                                                <th class="product-name">   Total Price</th>
                                                <td class="product-price">  <?php
                                                    echo $total_price-$coupon_value; 
                                                    ?> </td>
                                              
                                                
                                            </tr>
                                        </tbody>
                                    
                                    </table>
                               <div>
                                <strong>Delivery Address</strong>
                                   <?php echo $address ?> ,
                                   <?php echo $state?> ,
                                                <?php echo $city ?> ,
                                                        
                                                        <?php echo  $pincode?> <br><br>
                                   
                                   <strong>Order Status</strong>
                                   <?php
                                    $sqli="select order_status.* from order_status, orders where orders.Order_Id='$order_id' and orders.Order_Status=order_status.Status_Id";
                                                    $res=mysqli_query($con,$sqli);
                                                    $row=mysqli_fetch_assoc($res);
                                                    echo $row['Status'];
                                   ?>
                                   
                                   <div>
                                    <form method="post">
                                        <select type="text" id="company" name="editstatus"  class="form-control" value="editstatus" required><option>Select category</option>
                                    <?php 
                                    $sqli="Select * from order_status order by Status_Id desc";
                                        $res=mysqli_query($con,$sqli);
                                    while($row=mysqli_fetch_assoc($res)){
                                     if($row['Category_Id'] == $categories){
                                            echo "<option selected value=".$row['Status_Id'].">".$row['Status']."</option>"; } 
                                        
                                        else{ 
                                            echo "<option value=".$row['Status_Id'].">".$row['Status']."</option>"; } }?>
                                    
                                  

                                </select>  
                                        <input type="submit" name="submit" class="form-control">
                                    </form>
                                   </div>
                               </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
<?php require('admin_footer.php'); //Include Of Footer File
?>