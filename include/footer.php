<?php
$msg='';
if(isset($_POST['Subcribe'])){
   $user_name=get_safe_data($con,$_POST['user_name']);
    $user_email=get_safe_data($con,$_POST['user_email']);
    $sqli="Select * from subscription where User_Email='$user_email' and Status='1'";
   $res=mysqli_query($con,$sqli);
    $check=mysqli_num_rows($res);
    if($check >0){
        $msg="You Already Have Your Subscription";
        
    }
    else{
      $insert_sql="Insert into subscription(User_Name,User_Email,Status) values('$user_name','$user_email','1')";
        $res= mysqli_query($con,$insert_sql);
      sentSubscription($con,$user_name,$user_email);
        }
}

?>

<!-- Start Footer Area -->
        <footer id="htc__footer">
            <!-- Start Footer Widget -->
            <div class="footer__container bg__cat--1">
                <div class="container">
                    <div class="row">
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="footer">
                                <h2 class="title__line--2">ABOUT US</h2>
                                <div class="ft__details">
                                    <p>Pocket Store is One of my Project on Ecommerce based on Multivendor concept. Here you will find the concept of payment gateway, searching, filter search, listing of products by subcategories. There is also an admin panel from where you can manage your data.</p>
                                    <div class="ft__social__link">
                                        <ul class="social__link">
                                            <li><a href=""><i class="icon-social-twitter icons"></i></a></li>

                                            <li><a href=""><i class="icon-social-instagram icons"></i></a></li>

                                            <li><a href=""><i class="icon-social-facebook icons"></i></a></li>

                                            <li><a href=""><i class="icon-social-google icons"></i></a></li>

                                            <li><a href=""><i class="icon-social-linkedin icons"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Footer Widget -->
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-2 col-sm-6 col-xs-12 xmt-40">
                            <div class="footer">
                                <h2 class="title__line--2">information</h2>
                                <div class="ft__inner">
                                    <ul class="ft__list">
                                        <li><a href="about.php#aboutus">About us</a></li>
                                        <li><a href="about.php#shipment">Delivery Information</a></li>
                                        <li><a href="about.php#privacypolicy">Privacy & Policy</a></li>
                                        <li><a href="about.php#termscondition">Terms  & Condition</a></li>
                                        <li><a href="about.php#sellers">Sellers</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Footer Widget -->
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-3 col-sm-6 col-xs-12 xmt-40 smt-40">
                            <div class="footer">
                                <h2 class="title__line--2">Top Categories</h2>
                                <div class="ft__inner">
                                    <ul class="ft__list">
                                            <?php
                                            foreach($cat_arr as $list){?>
                                        
                                        <li class="drop"><a href="categories.php?Id=<?php echo $list['Category_Id']?>"><?php echo $list['Category']?></a>
                                            <?php
                                                $cat_id=$list['Category_Id'];
                                               
                                            ?>
                                           
                                        
                                        </li>
                                                <?php
                                            }
                                        
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Footer Widget -->
                        <!-- Start Single Footer Widget -->
                       
                        <!-- End Single Footer Widget -->
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-4 col-sm-6 col-xs-12 xmt-40 smt-40">
                            <div class="footer">
                                <h2 class="title__line--2">NEWSLETTER </h2>
                                <div class="ft__inner">
                                    <div class="news__input">
                                        <form method="post"> 
                                        <input type="text" placeholder="Your Name*" name="user_name" >
                                        <input type="text" placeholder="Your Mail*" name="user_email" >
                                        <div class="send__btn">
                                           
                                            <input class="btn-primary" type="submit" name="Subcribe" value="Subcribe">
                                            <span class="field_error"><?php echo $msg;?></span>
                                            
                                        </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- End Single Footer Widget -->
                    </div>
                </div>
            </div>
            <!-- End Footer Widget -->
            <!-- Start Copyright Area -->
            <div class="htc__copyright bg__cat--5">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="copyright__inner">
                                <p>  Copyright &copy; <?php echo date('Y')?> Avirup Mondal</p>
                                <a href="#"><img src="images/others/shape/paypol.png" alt="payment images"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Copyright Area -->
        </footer>
        <!-- End Footer Style -->
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