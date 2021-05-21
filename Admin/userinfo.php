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
                $update_sql="Update userinfo set Status='$Status' where User_Id='$Id'";
                mysqli_query($con,$update_sql);
            }
            if($type=='delete')
            {
                $Id=get_safe_data($con,$_GET['Id']);
                $delete_sql="Delete from userinfo where User_Id='$Id'";
                mysqli_query($con,$delete_sql);
            }
           
        }

   $sqli="Select * from userinfo order by User_Id desc";
   $res=mysqli_query($con,$sqli);
  
?>
<!--Ending Of Php Block -->

         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">User Info </h4>
                            
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">Serial No.</th>
                                       <th>User Name</th>
                                       <th>User Email</th>
                                        
                                       <th>User Address</th>
                                       <th>User Contact</th>
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
                                       <td><?php echo $row['User_Name'] ?></td>
                                       <td><?php echo $row['User_Email'] ?></td>
                                        <td><?php echo $row['User_Address'] ?></td>
                                        <td><?php echo $row['User_Contact'] ?></td>
                                       <td><?php 
                                            if($row['Status']==1){
                                              echo "<a href='?type=status&operation=deactive&Id=".$row['User_Id']."'>Active</a>";  
                                            }
                                            else{
                                            echo "<a href='?type=status&operation=active&Id=".$row['User_Id']."'>Deactive</a>";  
                                            }
                                          
                                        echo "&nbsp<a href='?type=delete&Id=".$row['User_Id']."'>Delete</a>";  
                                           
                                           
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