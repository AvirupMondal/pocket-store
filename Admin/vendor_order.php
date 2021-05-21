<?php
 require('admin_header.php'); 
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Order</h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table">
							<thead>
								<tr>
									<th class="product-thumbnail">Order ID</th>
									<th class="product-name"><span class="nobr">Product/Qty</span></th>
									<th class="product-price"><span class="nobr"> Address </span></th>
									<th class="product-stock-stauts"><span class="nobr"> Payment Type </span></th>
									<th class="product-stock-stauts"><span class="nobr"> Payment Status </span></th>
									<th class="product-stock-stauts"><span class="nobr"> Order Status </span></th>
								</tr>
							</thead>
							<tbody>
								<?php
								$res=mysqli_query($con,"select order_detail.Qty,product.Product_Name,orders.*,order_status.Status as order_status_str from order_detail,product,orders,order_status where order_status.Status_Id=orders.Order_Status and product.Product_Id=order_detail.Product_Id and orders.Order_Id=order_detail.Order_Id and product.Vendor_Id='".$_SESSION['admin_id']."' order by orders.Order_Id desc");
								while($row=mysqli_fetch_assoc($res)){
								?>
								<tr>
									<td class="product-add-to-cart"><?php echo $row['Order_Id']?><br/>
									</td>
									<td class="product-name">
									<?php echo $row['Product_Name']?><br/>
									<?php echo $row['Qty']?>
									</td>
									<td class="product-name">
									<?php echo $row['User_Address']?><br/>
									<?php echo $row['User_City']?><br/>
									<?php echo $row['User_Pincode']?>
									</td>
									<td class="product-name"><?php echo $row['Payment_Type']?></td>
									<td class="product-name"><?php echo $row['Payment_Status']?></td>
									<td class="product-name"><?php echo $row['order_status_str']?></td>
									
									
								</tr>
								<?php } ?>
							</tbody>
							
						</table>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
<?php
 require('admin_footer.php');
?>