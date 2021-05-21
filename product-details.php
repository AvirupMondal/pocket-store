
<?php
require('include/header.php');
$product_id=mysqli_real_escape_string($con,$_GET['Id']);

if($product_id>0){
  $get_pro=get_product($con,'','',$product_id);}
else
{
    ?><script>
window.location.href='index.php';
</script><?php
}

?>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper">
       

        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
       
        <!-- End Offset Wrapper -->
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Product Details Area -->
        <section class="htc__product__details bg__white ptb--100">
            <!-- Start Product Details Top -->
            <div class="htc__product__details__top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                            <div class="htc__product__details__tab__content">
                                <!-- Start Product Big Images -->
                                <div class="product__big__images">
                                    <div class="portfolio-full-image tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$get_pro['0']['Product_Image']?>" alt="full-image">
                                        </div>
                                    </div>
                                </div>
                                <!-- End Product Big Images -->
                                
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                            <div class="ht__product__dtl">
                                <h2><?php echo $get_pro['0']['Product_Name']?></h2>
                                <ul  class="pro__prize">
                                    <li class="old__prize">Rs <?php echo $get_pro['0']['Product_Mrp']?></li>
                                    <li>Discount Price: Rs <?php echo $get_pro['0']['Product_Sp']?></li>
                                </ul>
                                <p class="pro__info"><?php echo $get_pro['0']['Short_Description']?></p>
                                <div class="ht__pro__desc">
                                    <div class="sin__desc">
                                        	<?php
										$productSoldQtyByProductId=productSoldQtyByProductId($con,$get_pro['0']['Product_Id']);
										
										$pending_qty=$get_pro['0']['Product_Quantity']-$productSoldQtyByProductId;
										
										$cart_show='yes';
										if($get_pro['0']['Product_Quantity']>$productSoldQtyByProductId){
											$stock='In Stock';			
										}else{
											$stock='Not in Stock';
											$cart_show='';
										}
										?>
                                        <p><span>Availability:</span> <?php echo $stock?></p>
                                    </div>
                                    <div class="sin__desc">
                                        <?php
										if($cart_show!=''){
										?>
                                        <p><span>Quantity:</span> 
                                        <select id="qty">
                                            <?php
											for($i=1;$i<=$pending_qty;$i++){
												echo "<option>$i</option>";
											}
											?>
                                            </select>
                                        </p>
                                        <?php } ?>
                                    </div>
                                    <div class="sin__desc align--left">
                                        <p><span>Categories:</span></p>
                                        <ul class="pro__cat__list">
                                            <li><?php echo $get_pro['0']['Category']?>
                                                
                                                </li>
                                        </ul>
                                    </div>
                                    
                                    </div>
                                </div>
                            <?php
								if($cart_show!=''){
								?>
                            <a class="btn btn_primary" style="border-color: red; border-width:3px; margin-top:10px;" href="javascript:void(0)" onclick="manage_cart('<?php echo $get_pro['0']['Product_Id'] ?>', 'add')">Add To Cart</a>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
           
            <!-- End Product Details Top -->
        </section>
        <!-- End Product Details Area -->
        <!-- Start Product Description -->
        <section class="htc__produc__decription bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- Start List And Grid View -->
                        <ul class="pro__details__tab" role="tablist">
                            <li role="presentation" class="description active"><a href="#description" role="tab" data-toggle="tab">Description</a></li>
                            <li role="presentation" class="description active"><a href="#feature" role="tab" data-toggle="tab">Features</a></li>
                            <li role="presentation" class="description active"><a href="#reviews" role="tab" data-toggle="tab">Customer Review</a></li>
                        </ul>
                        <!-- End List And Grid View -->
                    </div>
                </div>
                
                
                 <section class="row" id="description">
                    <div class="col-xs-12">
                        <div class="ht__pro__details__content">
                            <!-- Start Single Content -->
                            <div role="tabpanel"  class="pro__single__content tab-pane fade in active">
                                <div class="pro__tab__content__inner">
                                    <p><?php echo $get_pro['0']['Short_Description']?></p>
                                    <h4 class="ht__pro__title">Description</h4>
                                    <p><?php echo $get_pro['0']['Long_Description']?></p>
                                    
                                    
                                </div>
                            </div>
                            <!-- End Single Content -->
                            
                        </div>
                    </div>
                </section>
                
                 <div class="row" id="feature">
                    <div class="col-xs-12">
                        <div class="ht__pro__details__content">
                            <!-- Start Single Content -->
                            <div role="tabpanel" class="pro__single__content tab-pane fade in active">
                                <div class="pro__tab__content__inner">
                                    
                                    <h4 class="ht__pro__title">Standard Featured</h4>
                                    <p>Features of The Product</p>
                                </div>
                            </div>
                            <!-- End Single Content -->
                            
                        </div>
                    </div>
                </div>
                
                 <div class="row" id="reviews">
                    <div class="col-xs-12">
                        <div class="ht__pro__details__content">
                            <!-- Start Single Content -->
                            <div role="tabpanel" class="pro__single__content tab-pane fade in active">
                                <div class="pro__tab__content__inner">
                                   
                                    <h4 class="ht__pro__title">Customer Reviews</h4>
                                    <p>Here we will display customer reviews</p>
                                </div>
                            </div>
                            <!-- End Single Content -->
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Description -->
        <!-- Start Similar Product Area -->
    <!--    <section class="htc__product__area--2 pb--100 product-details-res">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">Similar Products</h2>
                            <p>But I must explain to you how all this mistaken idea</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="product__wrap clearfix">

                        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <a href="product-details.html">
                                        <img src="images/product/1.jpg" alt="product images">
                                    </a>
                                </div>
                                <div class="fr__hover__info">
                                    <ul class="product__action">
                                        <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>

                                        <li><a href="cart.html"><i class="icon-handbag icons"></i></a></li>

                                        <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                                    </ul>
                                </div>
                                <div class="fr__product__inner">
                                    <h4><a href="product-details.html">Product Title Here </a></h4>
                                    <ul class="fr__pro__prize">
                                        <li class="old__prize">$30.3</li>
                                        <li>$25.9</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                      
                        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <a href="product-details.html">
                                        <img src="images/product/2.jpg" alt="product images">
                                    </a>
                                </div>
                                <div class="fr__hover__info">
                                    <ul class="product__action">
                                        <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>

                                        <li><a href="cart.html"><i class="icon-handbag icons"></i></a></li>

                                        <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                                    </ul>
                                </div>
                                <div class="fr__product__inner">
                                    <h4><a href="product-details.html">Product Title Here </a></h4>
                                    <ul class="fr__pro__prize">
                                        <li class="old__prize">$30.3</li>
                                        <li>$25.9</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                      
                        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <a href="product-details.html">
                                        <img src="images/product/3.jpg" alt="product images">
                                    </a>
                                </div>
                                <div class="fr__hover__info">
                                    <ul class="product__action">
                                        <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>

                                        <li><a href="cart.html"><i class="icon-handbag icons"></i></a></li>

                                        <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                                    </ul>
                                </div>
                                <div class="fr__product__inner">
                                    <h4><a href="product-details.html">Product Title Here </a></h4>
                                    <ul class="fr__pro__prize">
                                        <li class="old__prize">$30.3</li>
                                        <li>$25.9</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                      
                        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <a href="product-details.html">
                                        <img src="images/product/4.jpg" alt="product images">
                                    </a>
                                </div>
                                <div class="fr__hover__info">
                                    <ul class="product__action">
                                        <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>

                                        <li><a href="cart.html"><i class="icon-handbag icons"></i></a></li>

                                        <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                                    </ul>
                                </div>
                                <div class="fr__product__inner">
                                    <h4><a href="product-details.html">Product Title Here </a></h4>
                                    <ul class="fr__pro__prize">
                                        <li class="old__prize">$30.3</li>
                                        <li>$25.9</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section> -->
        <!-- End Similar Product Area -->
        <!-- Start Product Area -->
        <section class="ftr__product__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">Best Seller</h2>
                            <p>Best Choice Is The Right Choice For You</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="product__wrap clearfix">
                        <!-- Start Single Category -->
                        
                        
                   <?php
                                $get_pro=get_product($con,4,'','','','','yes');
                                foreach($get_pro as $list){
                                    
                                
                            ?>
                            
                            <!-- Start Single Category -->
                            <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                <div class="category">
                                    <div class="ht__cat__thumb">
                                        <a href="product-details.php?Id=<?php echo $list['Product_Id']?>">
                                            <img style="width:auto; height:200px" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['Product_Image']?>" alt="product images">
                                        </a>
                                    </div>
                                  <div class="fr__hover__info">
                                        <ul class="product__action">
                                            <li><a  href="javascript:void(0)" onclick="manage_wishlist('<?php echo $list['Product_Id'] ?>', 'add')"><i class="icon-heart icons"></i></a></li>

                                            <li><a href="javascript:void(0)" onclick="manage_cart('<?php echo $list['Product_Id'] ?>', 'add')"><i class="icon-handbag icons"></i></a></li>

                                        
                                        </ul>
                                    </div> 
                                    <div class="fr__product__inner">
                                        <h4><a href="product-details.php?Id=<?php echo $list['Product_Id']?>"><?php echo $list['Product_Name']?></a></h4>
                                        <ul class="fr__pro__prize">
                                            <li class="old__prize">Rs <?php echo $list['Product_Mrp']?></li>
                                            <li>Discount: Rs <?php echo $list['Product_Sp']?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        <!-- End Single Category -->
                       
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Area -->
        <!-- End Banner Area -->
         <?php
   require('include/footer.php');?>
    </div>
    <!-- Body main wrapper end -->

    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <script src="js/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap framework js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="js/plugins.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <!-- Waypoints.min.js. -->
    <script src="js/waypoints.min.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="js/main.js"></script>

</body>

</html>