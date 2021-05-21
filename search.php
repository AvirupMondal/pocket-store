<?php
require('include/header.php');
$str=mysqli_real_escape_string($con,$_GET['str']);
if($str!=''){
 $get_pro=get_product($con,'','','',$str);}
else
{
    ?><script>
window.location.href='index.php';
</script><?php
}


?>


       

        <div class="body__overlay"></div>
      
        <!-- Start Product Grid -->
        <section class="htc__product__grid bg__white ptb--100">
            <div class="container">
                <div class="row">
                    <?php if(count($get_pro)>0){?>
                    <div class="col-lg-9 col-lg-push-3 col-md-9 col-md-push-3 col-sm-12 col-xs-12">
                        <div class="htc__product__rightidebar">
                       
                            <!-- Start Product View -->
                            <div class="row">
                                <div class="shop__grid__view__wrap">
                                    <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                                        <!-- Start Single Product -->
                                        <?php
                               
                                foreach($get_pro as $list){
                                    
                                
                            ?>
                            
                            <!-- Start Single Category -->
                            <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                <div class="category">
                                    <div class="ht__cat__thumb">
                                        <a href="product-details.php?Id=<?php echo $list['Product_Id']?>">
                                            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['Product_Image']?>" alt="product images">
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
                                            <li class="old__prize"><?php echo $list['Product_Mrp']?></li>
                                            <li><?php echo $list['Product_Sp']?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                                        <!-- End Single Product -->
                                      
                                    </div>
                                   
                                </div>
                            </div>
                            <!-- End Product View -->
                        </div>
                        
                    </div><?php
}else{
    echo "Category doesn't exist anymore";
    
}
                    ?>
                   
                </div>
            </div>
        </section>
        <!-- End Product Grid -->
        <!-- Start Brand Area -->
   <!--     <div class="htc__brand__area bg__cat--4">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ht__brand__inner">
                            <ul class="brand__list owl-carousel clearfix">
                                <li><a href="#"><img src="images/brand/1.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/2.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/3.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/4.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/5.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/5.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/1.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/2.png" alt="brand images"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- End Brand Area -->
        <!-- Start Banner Area -->
      <!--  <div class="htc__banner__area">
            <ul class="banner__list owl-carousel owl-theme clearfix">
                <li><a href="product-details.html"><img src="images/banner/bn-3/1.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/2.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/3.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/4.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/5.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/6.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/1.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/2.jpg" alt="banner images"></a></li>
            </ul>
        </div> -->
        
        <?php
   require('include/footer.php');?>
    </div>
   

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