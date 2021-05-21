<?php
require('include/header.php');
if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
$uid=$_SESSION['User_Id'];


$res=mysqli_query($con,"select product.Product_Name,product.Product_Image,product.Product_Sp,product.Product_Mrp,wishlist.Wishlist_Id from product,wishlist where wishlist.Product_Id=product.Product_Id and wishlist.User_Id='$uid'");

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
                                            
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                          <?php 
                                      while($row=mysqli_fetch_assoc($res)){
                                          
                                                    ?>
                                        <tr>
                                            <td class="product-thumbnail"><a href="#"><img src="media/Product/<?php echo $row['Product_Image'] ?>" alt="product img" /></a></td>
                                            <td class="product-name"><a href="#"><?php echo  $row['Product_Name'] ?></a>
                                                <ul  class="pro__prize">
                                                    <li class="old__prize"><?php echo  $row['Product_Mrp'] ?></li>
                                                    <li><?php echo  $row['Product_Sp'] ?></li>
                                                </ul>
                                            </td>
                                            
                                            
                                            <td class="product-remove"><a href="wishlist.php?wishlist_id=<?php echo $row['Wishlist_Id']?>"><i class="icon-trash icons"></i></a></td>
                                        </tr>
                                       <?php } ?>
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