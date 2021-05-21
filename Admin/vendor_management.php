<?php
 require('admin_header.php'); //Include Of Header File
isAdmin();
if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_data($con,$_GET['type']);
	if($type=='status'){
		$operation=get_safe_data($con,$_GET['operation']);
		$id=get_safe_data($con,$_GET['Id']);
		if($operation=='active'){
			$status='1';
		}else{
			$status='0';
		}
		$update_status_sql="update admin set Admin_Status='$status' where Admin_Id='$id'";
		mysqli_query($con,$update_status_sql);
	}
	
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from admin where Admin_Id='$id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql="select * from admin where Admin_Role=1 order by Admin_Id desc";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Vendor Management </h4>
				   <h4 class="box-link"><a href="manage_vendor_management.php">Add Vendor</a> </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th class="serial">#</th>
							   <th width="2%">ID</th>
							   <th width="20%">Username</th>
							   <th width="20%">Password</th>
							   <th width="20%">Email</th>
							   <th width="10%">Mobile</th>
							   <th width="26%"></th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							   <td class="serial"><?php echo $i?></td>
							   <td><?php echo $row['Admin_Id']?></td>
							   <td><?php echo $row['Admin_Username']?></td>
							   <td><?php echo $row['Admin_Password']?></td>
							   <td><?php echo $row['Admin_Email']?></td>
							   <td><?php echo $row['Admin_Contact']?></td>
							  
							   <td>
								<?php
								if($row['Admin_Status']==1){
									 echo "<a href='?type=status&operation=deactive&Id=".$row['Admin_Id']."'>Active</a>";  
                                }else{
									echo "<span class='badge badge-pending'><a href='?type=status&operation=active&Id=".$row['Admin_Id']."'>Deactive</a></span>&nbsp;";
								}
								echo "<span class='badge badge-edit'><a href='manage_vendor_management.php?Id=".$row['Admin_Id']."'>Edit</a></span>&nbsp;";
								
								echo "<span class='badge badge-delete'><a href='?type=delete&Id=".$row['Admin_Id']."'>Delete</a></span>";
								
								?>
							   </td>
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