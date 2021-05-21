<?php
require('include/header.php');
?>


<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper">
      
       
        <!-- cart-main-area start -->
        <div class="cart-main-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form action="#">               
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                      
                                        <tr>
                                            <th class="product-thumbnail">Product Image</th>
                                            <th class="product-name">Name of Products</th>
                                            
                                            <th class="product-price">Product Selling Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                          <?php 
                                        if(isset($_SESSION['cart'])){
                                        foreach($_SESSION['cart'] as $key=>$val) 
                                                {
                                            $productArray=get_product($con,'','',$key);
                                            $name=$productArray[0]['Product_Name'];
                                            $mrp=$productArray[0]['Product_Mrp'];
                                            $sp=$productArray[0]['Product_Sp'];
                                            $image=$productArray[0]['Product_Image'];
                                            $qty=$val['qty'];
                                                                                ?>
                                        <tr>
                                            <td class="product-thumbnail"><a href="#"><img src="media/Product/<?php echo $image ?>" alt="product img" /></a></td>
                                            <td class="product-name"><a href="#"><?php echo $name ?></a>
                                                <ul  class="pro__prize">
                                                    <li class="old__prize"><?php echo $mrp ?></li>
                                                    <li><?php echo $sp ?></li>
                                                </ul>
                                            </td>
                                            <td class="product-price"><span class="amount"><?php echo $sp ?></span></td>
                                            <td class="product-quantity"><input type="number" id="<?php echo $key?>qty" value="<?php echo $qty?>" />
                                            <br><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key ?>', 'update')">Update</a>
                                            </td>
                                            <td class="product-subtotal"><?php echo $qty*$sp ?></td>
                                            <td class="product-remove"><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key ?>', 'remove')"><i class="icon-trash icons"></i></a></td>
                                        </tr>
                                       <?php }} ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="buttons-cart--inner">
                                        <div class="buttons-cart">
                                            <a href="<?php echo SITE_PATH ?>">Continue Shopping</a>
                                        </div>
                                        <div class="buttons-cart checkout--btn">
                                            
                                            <a href="<?php echo SITE_PATH ?>checkout.php">checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->
        <!-- End Banner Area -->
        <?php 
        
require('include/footer.php');
        ?>
    </div>
    

</body>

</html>