<?php
require('include/header.php');?>
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
                                                <th class="product-thumbnail">Date</th>
                                                <th class="product-name"><span class="nobr">Address</span></th>
                                                <th class="product-price"><span class="nobr"> Payment Mode </span></th>
                                                <th class="product-stock-stauts"><span class="nobr"> Payment Status </span></th>
                                                <th class="product-add-to-cart"><span class="nobr">Order Status</span></th>
                                                <th class="product-add-to-cart"><span class="nobr">Invoice Download</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $uid=$_SESSION['User_Id'];
                                                 $insert_sql="Select orders.*, order_status.Status from orders, order_status where orders.User_Id='$uid' and order_status.Status_Id=orders.Order_Status";
                                                  $res=mysqli_query($con,$insert_sql);
                                            while($row=mysqli_fetch_assoc($res)){
                                                
                                            
                                            ?>
                                            <tr>
                                                <td class="product-add-to-cart"><a href="user_order_detail.php?order_id=<?php echo $row['Order_Id']?>">Order Id <?php echo $row['Order_Id']?>  Details</a></td>
                                                <td class="product-remove"><?php echo $row['Date']?> </td>
                                                <td class="product-thumbnail"><?php echo $row['User_Address']?> ,
                                                <?php echo $row['User_City']?> ,
                                                        <?php echo $row['User_State']?> ,
                                                        <?php echo $row['User_Pincode']?> 
                                                </td>
                                                <td class="product-name">    <?php echo $row['Payment_Type']?> </td>
                                                <td class="product-price">    <?php echo $row['Payment_Status']?> </td>
                                                <td class="product-stock-status">    <?php echo $row['Status']?> </td>
                                                <td class="product-stock-status"> <a href="order_pdf.php?Id=<?php echo $row['Order_Id']?>"><img style="width:75px; height:75px;" src="media/pdf%20logo.png"></a> </td>
                                                
                                            </tr>
                                            <?php } ?>
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