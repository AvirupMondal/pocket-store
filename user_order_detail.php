<?php
require('include/header.php');

$order_id=get_safe_data($con,$_GET['order_id']);
$coupon_details=mysqli_fetch_assoc(mysqli_query($con,"select coupon_value from orders where Order_Id='$order_id'"));
$coupon_value=$coupon_details['coupon_value'];

?>
            <!-- End Search Popap -->
          
        <!-- End Offset Wrapper -->
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">checkout</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="checkout-wrap ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                          <div class="wishlist-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="wishlist-content">
                            <form action="#">
                                <div class="wishlist-table table-responsive">
                                    <table>
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
                                            $uid=$_SESSION['User_Id'];
                                           $total_price=0;
                                               $insert_sql="Select DISTINCT(order_detail.Detail_Id),order_detail.*,product.Product_Name,product.Product_Image from order_detail, product, orders where order_detail.Order_Id='$order_id' and orders.User_Id='$uid' and order_detail.Product_Id=product.Product_Id";
                                                $res=mysqli_query($con,$insert_sql);
                                            while($row=mysqli_fetch_assoc($res)){
                                                $total_price=$total_price+($row['Qty']*$row['Price_Per_Piece']);
                                            
                                            ?>
                                            <tr>
                                                <td class="product-add-to-cart">Order Id <?php echo $row['Order_Id']?>  Details</td>
                                                 <td class="product-remove"><img src="media/Product/<?php echo $row['Product_Image'] ?>" alt="product img" /> </td>
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
                                </div>  
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
        <!-- cart-main-area end -->
        <!-- Start Footer Area -->
      <?php
require('include/footer.php');