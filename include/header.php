<?php  
require('include/db_connection.php');
require('include/function.php');
require('add_to_cart.php');
$sqli="Select * from categories where Status='1'";
   $res=mysqli_query($con,$sqli);
$cat_arr=array();
while($row=mysqli_fetch_assoc($res)){
    $cat_arr[]=$row;
    
}
$obj = new add_to_cart();
$totalProduct= $obj->totalProduct();


if(isset($_SESSION['USER_LOGIN'])){
	$uid=$_SESSION['User_Id'];
    if(isset($_GET['wishlist_id'])){
    $wid=$_GET['wishlist_id'];
    $delete_query="Delete from wishlist where Wishlist_Id='$wid' and User_Id='$uid'";
    $res=mysqli_query($con,$delete_query);
}
        $res=mysqli_query($con,"select product.Product_Name,product.Product_Image,product.Product_Sp,product.Product_Mrp,wishlist.Wishlist_Id from product,wishlist where wishlist.Product_Id=product.Product_Id and wishlist.User_Id='$uid'");
    $wishlist_count=mysqli_num_rows($res);
    
}


$script_name=$_SERVER['SCRIPT_NAME'];
$script_name_arr=explode('/',$script_name);
$mypage=$script_name_arr[count($script_name_arr)-1];

$meta_title="Pocket Store";
$meta_description="Pocket Store";
    $meta_keywords="Pocket Store";
if($mypage=='product-details.php'){

    $product_id=get_safe_data($con,$_GET['Id']);
$product__meta=mysqli_fetch_assoc(mysqli_query($con,"Select * from product where Product_Id = '$product_id'"));

$meta_title=$product__meta['Meta_Title'];
$meta_description=$product__meta['Meta_Description'];
$meta_keywords=$product__meta['Meta_keywords'];


}

?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $meta_title?></title>
    <meta name="description" content="$meta_description">
    <meta name="keywords" content="$meta_keywords">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
  
    

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Owl Carousel min css -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="css/custom.css">


    <!-- Modernizr JS -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    
    <style>
        @font-face {
  font-family: myFirstFont;
  src: url('../fonts/coolvetica-rg.ttf');
}
body{
    font-family: myFirstFont;
}
        .htc__shopping__cart a span.htc__wishlist {
    background: #c43b68;
    border-radius: 100%;
    color: #fff;
    font-size: 9px;
    height: 17px;
    line-height: 19px;
    position: absolute;
    right: 17px;
    text-align: center;
    top: -4px;
    width: 17px;
        }
    </style>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- Start Header Style -->
        <header id="htc__header" class="htc__header__area header--one">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="menumenu__container clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5"> 
                                <div class="logo">
                                     <a href="index.php"><h2>Pocket Store</h2></a>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-6 col-sm-5 col-xs-3">
                                <nav class="main__menu__nav hidden-xs hidden-sm">
                                    <ul class="main__menu">
                                        <li class="drop"><a href="index.php">Home</a></li>
                                        <?php
                                            foreach($cat_arr as $list){?>
                                        
                                        <li class="drop"><a href="categories.php?Id=<?php echo $list['Category_Id']?>"><?php echo $list['Category']?></a>
                                            <?php
                                                $cat_id=$list['Category_Id'];
                                                $sub_cat_sql="Select * from sub_categories where Status='1' and Category_Id='$cat_id'";
                                                $res=mysqli_query($con,$sub_cat_sql);
                                                if(mysqli_num_rows($res)>0){
                                                    
                                            ?>
                                            <ul class="dropdown">
                                            
                                                    <?php
                                                    while($sub_cat_rows=mysqli_fetch_assoc($res)){
                                                    ?>
                                                    <li><a href="categories.php?Id=<?php echo $list['Category_Id']?>&sub_category=<?php echo $sub_cat_rows['Sub_Category_Id']?>"><?php echo $sub_cat_rows['Sub_Category']?></a>
                                                </li>
                                                <?php }?>
                                            </ul>
                                        <?php 
                                                } ?>
                                        </li>
                                                <?php
                                            }
                                        
                                        ?>
                                        <li><a href="contact.php">contact</a></li>
                                    </ul>
                                </nav>

                                <div class="mobile-menu clearfix visible-xs visible-sm">
                                    <nav id="mobile_dropdown">
                                        <ul>
                                            <li><a href="index.php">Home</a></li>
                                            <?php
                                            foreach($cat_arr as $list){?>
                                        
                                        <li><a href="categories.php?Id=<?php echo $list['Category_Id']?>"><?php echo $list['Category']?></a></li>
                                                <?php
                                            }
                                        
                                        ?>
                                            <li><a href="contact.php">contact</a></li>
                                        </ul>
                                    </nav>
                                </div>  
                            </div>
                            <div class="col-md-3 col-lg-4 col-sm-4 col-xs-4">
                                <div class="header__right">
                                  <div class="header__search search search__open">
                                      <a href="#"><i class="icon-magnifier icons"></i></a></div>
                                    <div class="header__account">
                                        <?php
                                            if(isset($_SESSION['USER_LOGIN'])){
                                                ?>
											<nav class="navbar navbar-expand-lg navbar-light">
											   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
												<span class="navbar-toggler-icon"></span>
											  </button>

											  <div class="collapse navbar-collapse" id="navbarSupportedContent">
												<ul class="navbar-nav mr-auto">
												  <li class="nav-item dropdown">
													<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													  Account
													</a>
													<div class="dropdown-menu" aria-labelledby="navbarDropdown">
													  <a class="dropdown-item" href="myorder.php">Order</a>
													  <a class="dropdown-item" href="profile.php">Profile</a>
													  <div class="dropdown-divider"></div>
													  <a class="dropdown-item" href="logout.php">Logout</a>
													</div>
												  </li>
												  
												</ul>
											  </div>
											</nav>
											<?php
                                            }
                                        else{
                                            echo '<a href="login.php">&nbsp;Login/Register</a>';
                                        }
                                        ?>
                                        
                                    </div>
                                     <div class="htc__shopping__cart">
										<?php
										if(isset($_SESSION['User_Id'])){
										?>
										<a href="wishlist.php" class="mr15"><i class="icon-heart icons"></i></a>
                                        <a href="wishlist.php"><span class="htc__wishlist"><?php echo $wishlist_count?></span></a>
										 
                                        <a href="cart.php"><i class="icon-handbag icons"></i></a>
                                        <a href="cart.php"><span class="htc__qua"><?php echo $totalProduct?></span></a>
                                        <?php } ?>
                                    </div>
                                        
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
            <!-- End Mainmenu Area -->
        </header>
        <!-- End Header Area -->
         <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            <div class="search__area">
                <div class="container" >
                    <div class="row" >
                        <div class="col-md-12" >
                            <div class="search__inner">
                                <form action="search.php" method="get">
                                    <input placeholder="Search here... " type="text" name="str">
                                    <button type="submit"></button>
                                </form>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div></div>