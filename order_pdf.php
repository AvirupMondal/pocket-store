<?php
require('include/db_connection.php');
require('include/function.php');
require('vendor/autoload.php');

if(!isset($_SESSION['User_Id'])){
    die();
}
$order_id=get_safe_data($con,$_GET['Id']);
$mpdf = new \Mpdf\Mpdf();
$html='
 <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
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
                                        <tbody>';
 $uid=$_SESSION['User_Id'];
                                           $total_price=0;
                                               $insert_sql="Select DISTINCT(order_detail.Detail_Id),order_detail.*,product.Product_Name,product.Product_Image from order_detail, product, orders where order_detail.Order_Id='$order_id' and orders.User_Id='$uid' and order_detail.Product_Id=product.Product_Id";
                                                $res=mysqli_query($con,$insert_sql);
                                                if(mysqli_num_rows($res)==0){
                                                    die();
                                                }
                                            while($row=mysqli_fetch_assoc($res)){
                                                $total_price=$total_price+($row['Qty']*$row['Price_Per_Piece']);
                                     $html.=' <tr>
                                                 <td class="product-add-to-cart">Order Id '.$row['Order_Id'].' Details</td>
                                                 <td class="product-remove"><img src="media/Product/'.$row['Product_Image'].'" alt="product img" /> </td>
                                                <td class="product-remove">'.$row['Product_Name'].' </td>
                                                <td class="product-thumbnail">'.$row['Qty'].'</td>
                                                <td class="product-name">'.$row['Price_Per_Piece'].' </td>
                                                <td class="product-price"> '.$row['Qty']*$row['Price_Per_Piece'].'</td>
                                              
                                            </tr>';
                                                }

                                           $html.='  <tr>
                                                
                                                <td colspan="4"></td>
                                                <th class="product-name">   Total Price</th>
                                                <td class="product-price">'.$total_price.'
                                                </td>
                                              </tr>';
                                    $html.=' </tbody>
                                    
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
        </div>';
$mpdf->WriteHTML($html);
$mpdf->Output();
?>