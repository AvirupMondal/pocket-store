<?php 
require('../include/db_connection.php');
require('../include/function.php');
   if(isset($_SESSION['admin_login']) && $_SESSION['admin_username']!=''){
   
   }
 
else{
     header('location:login.php');
   die();

}

?>


<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Dashboard Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="assets/css/normalize.css">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/themify-icons.css">
      <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
      <link rel="stylesheet" href="assets/css/flag-icon.min.css">
      <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
   </head>
   <body>
      <aside id="left-panel" class="left-panel">
         <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
         <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">

               <ul class="nav navbar-nav">
                  <li class="menu-title">Menu</li>
                   <li class="menu-item-has-children dropdown">
                     <a href="admin_product.php" > Product Master</a>
                  </li>
                   <li class="menu-item-has-children dropdown">
                        <?php 
					 if($_SESSION['admin_role']==1){
						echo '<a href="vendor_order.php" > Order Master</a>';
					 }else{
						echo '<a href="admin_order.php" > Order Master</a>';
					 }
					 ?>
                  </li>
                   <?php
                   if($_SESSION['admin_role']!=1){
                   ?>
                    <li class="menu-item-has-children dropdown">
                     <a href="vendor_management.php" > Vendor Management</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="admin_index.php" > Categories Master</a>
                  </li>
                   <li class="menu-item-has-children dropdown">
                     <a href="sub_category.php"> Sub Categories Master</a>
                  </li>
                  
				  <li class="menu-item-has-children dropdown">
                     <a href="userinfo.php" > User Master</a>
                  </li>
                    
                   <li class="menu-item-has-children dropdown">
                     <a href="coupon.php" > Coupon Master</a>
                  </li>
                    <li class="menu-item-has-children dropdown">
                     <a href="admin_contact.php" > Contact Us</a>
                  </li>
                    <?php }?>
               </ul>
            </div>
         </nav>
      </aside>
      <div id="right-panel" class="right-panel">
         <header id="header" class="header">
            <div class="top-left">
               <div class="navbar-header">
                <h2 style="padding-left: 50px; padding-bottom: 10px">My Store</h2>
               </div>
            </div>
            <div class="top-right">
               <div class="header-menu">
                  <div class="user-area dropdown float-right">
                     <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Welcome <?php echo  $_SESSION['admin_username']; ?></a>
                     <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i>Logout</a>
                     </div>
                  </div>
               </div>
            </div>
         </header>
