<?php
   require('include/header.php');?>

        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            <!-- Start Search Popap -->
        <!--    <div class="search__area">
                <div class="container" >
                    <div class="row" >
                        <div class="col-md-12" >
                            <div class="search__inner">
                                <form action="#" method="get">
                                    <input placeholder="Search here... " type="text">
                                    <button type="submit"></button>
                                </form>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- End Search Popap -->
            <!-- Start Cart Panel -->
         <!--   <div class="shopping__cart">
                <div class="shopping__cart__inner">
                    <div class="offsetmenu__close__btn">
                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                    </div>
                    <div class="shp__cart__wrap">
                        <div class="shp__single__product">
                            <div class="shp__pro__thumb">
                                <a href="#">
                                    <img src="images/product-2/sm-smg/1.jpg" alt="product images">
                                </a>
                            </div>
                            <div class="shp__pro__details">
                                <h2><a href="product-details.html">BO&Play Wireless Speaker</a></h2>
                                <span class="quantity">QTY: 1</span>
                                <span class="shp__price">$105.00</span>
                            </div>
                            <div class="remove__btn">
                                <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                            </div>
                        </div>
                        <div class="shp__single__product">
                            <div class="shp__pro__thumb">
                                <a href="#">
                                    <img src="images/product-2/sm-smg/2.jpg" alt="product images">
                                </a>
                            </div>
                            <div class="shp__pro__details">
                                <h2><a href="product-details.html">Brone Candle</a></h2>
                                <span class="quantity">QTY: 1</span>
                                <span class="shp__price">$25.00</span>
                            </div>
                            <div class="remove__btn">
                                <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                            </div>
                        </div>
                    </div>
                    <ul class="shoping__total">
                        <li class="subtotal">Subtotal:</li>
                        <li class="total__price">$130.00</li>
                    </ul>
                    <ul class="shopping__btn">
                        <li><a href="cart.html">View Cart</a></li>
                        <li class="shp__checkout"><a href="checkout.html">Checkout</a></li>
                    </ul>
                </div>
            </div> -->
            <!-- End Cart Panel -->
        </div>
        <!-- End Offset Wrapper -->
        <!-- Start Slider Area -->
        <div class="slider__container slider--one bg__cat--3">
            <div class="slide__container slider__activation__wrap owl-carousel">
                <!-- Start Single Slide -->
                <div class="single__slide animation__style01 slider__fixed--height">
                    <div class="container">
                        <div class="row align-items__center">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                                <div class="slide">
                                    <div class="slider__inner">
                                        <h2>Collection 2020</h2>
                                        <h1>NICE CHAIR</h1>
                                        <div class="cr__btn">
                                            <h5>Shop Now</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                                <div class="slide__thumb">
                                    <img src="media/Product/chair1.jpg" alt="slider images">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slide -->
                <!-- Start Single Slide -->
                <div class="single__slide animation__style01 slider__fixed--height">
                    <div class="container">
                        <div class="row align-items__center">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                                <div class="slide">
                                    <div class="slider__inner">
                                        <h2>Collection 2020</h2>
                                        <h1>BRAND NEW</h1>
                                        <div class="cr__btn">
                                            <h5>Shop Now</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                                <div class="slide__thumb">
                                    <img src="media/Product/276587035_mentrouser3.jpg" alt="slider images">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slide -->
            </div>
        </div>
        <!-- Start Slider Area -->
        <!-- Start Category Area -->
        <section class="htc__category__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">New Arrivals</h2>
                            <p>New Look Always Keeps You New</p>
                        </div>
                    </div>
                </div>
                <div class="htc__product__container">
                    <div class="row">
                        <div class="product__list clearfix mt--30">
                            <?php
                                $get_pro=get_product($con,4);
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
                                      <!--  <ul class="product__action">
                                            <li><a  href="javascript:void(0)" onclick="manage_wishlist('<?php echo $list['Product_Id'] ?>', 'add')"><i class="icon-heart icons"></i></a></li>

                                            <li><a href="javascript:void(0)" onclick="manage_cart('<?php echo $list['Product_Id'] ?>', 'add')"><i class="icon-handbag icons"></i></a></li>

                                        
                                        </ul> -->
                                    </div> 
                                    <div class="fr__product__inner">
                                        <h4><a href="product-details.php?Id=<?php echo $list['Product_Id']?>"><?php echo $list['Product_Name']?></a></h4>
                                        <ul class="fr__pro__prize">
                                            <li class="old__prize">Rs <?php echo $list['Product_Mrp']?></li>
                                           <li >Discount: Rs <?php echo $list['Product_Sp']?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <!-- End Single Category -->
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Category Area -->
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
                                   <!--     <ul class="product__action">
                                            <li><a  href="javascript:void(0)" onclick="manage_wishlist('<?php echo $list['Product_Id'] ?>', 'add')"><i class="icon-heart icons"></i></a></li>

                                            <li><a href="javascript:void(0)" onclick="manage_cart('<?php echo $list['Product_Id'] ?>', 'add')"><i class="icon-handbag icons"></i></a></li>

                                        
                                        </ul> -->
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
<?php
   require('include/footer.php');?>
        