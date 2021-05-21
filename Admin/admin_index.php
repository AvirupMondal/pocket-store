<!--Starting Of Php Block -->
<?php
    require('admin_header.php'); //Include Of Header File
isAdmin();
        if(isset($_GET['type']) && $_GET['type']!='')
        {
            $type=get_safe_data($con,$_GET['type']);
            if($type=='status')
            {
                $operation=get_safe_data($con,$_GET['operation']);
                $Id=get_safe_data($con,$_GET['Id']);
                    if($operation=='active')
                    {
                        $Status='1';
                    }
                    else{
                        $Status='0';
                    }
                $update_sql="Update categories set Status='$Status' where Category_Id='$Id'";
                mysqli_query($con,$update_sql);
            }
            if($type=='delete')
            {
                $Id=get_safe_data($con,$_GET['Id']);
                $delete_sql="Delete from categories where Category_Id='$Id'";
                mysqli_query($con,$delete_sql);
            }
           
        }

   $sqli="Select * from categories order by Category asc";
   $res=mysqli_query($con,$sqli);
  
?>
<!--Ending Of Php Block -->

         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Categories </h4>
                            <h4 class="box-title"><a href="categoryedit.php"><i class="fa fa-plus-square">Add Category</i> </a></h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">Serial No.</th>
                                       <th>Categories</th>
                                      
                                       <th>Status</th>
                                    </tr>
                                 </thead>

                                 <tbody>
                                    
                                     <?php 
                                      $i='1';
                                     while($row=mysqli_fetch_assoc($res)){
                                   
                                     ?>
                                    <tr>
                                       <td class="serial"><?php echo $i ?></td>
                                       <td><?php echo $row['Category'] ?></td>
                                      
                                       <td><?php 
                                            if($row['Status']==1){
                                              echo "<a href='?type=status&operation=deactive&Id=".$row['Category_Id']."'>Active</a>";  
                                            }
                                            else{
                                            echo "<a href='?type=status&operation=active&Id=".$row['Category_Id']."'>Deactive</a>";  
                                            }
                                          echo "&nbsp<a href='categoryedit.php?Id=".$row['Category_Id']."'>Edit</a>&nbsp";
                                        echo "<a href='?type=delete&Id=".$row['Category_Id']."'>Delete</a>";  
                                           
                                           
                                           ?></td>
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
<?php require('admin_footer.php'); //Include Of Footer File
?>