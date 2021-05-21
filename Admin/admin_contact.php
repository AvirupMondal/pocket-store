<!--Starting Of Php Block -->
<?php
    require('admin_header.php'); //Include Of Header File
isAdmin();
       
if(isset($_GET['type']) && $_GET['type']!='')
        {
            $type=get_safe_data($con,$_GET['type']);
            
            if($type=='delete')
            {
                $Id=get_safe_data($con,$_GET['Id']);
                $delete_sql="Delete from contact_us where Contact_Id='$Id'";
                mysqli_query($con,$delete_sql);
            }
           
        }

   $sqli="Select * from contact_us order by Contact_Id desc";
   $res=mysqli_query($con,$sqli);
  
?>
<!--Ending Of Php Block -->

         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">User Query Table</h4>
                         
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">Contact_Id</th>
                                       <th>User Name</th>
                                       <th>User Email</th>
                                        <th>User Mobile</th>
                                        <th>User Query</th>
                                        <th>Added On</th>
                                        <th>Status</th>
                                       
                                    </tr>
                                 </thead>

                                 <tbody>
                                    
                                     <?php 
                                      
                                     while($row=mysqli_fetch_assoc($res)){
                                   
                                     ?>
                                    <tr>
                                        <td><?php echo $row['Contact_Id'] ?></td>
                                       <td><?php echo $row['User_Name'] ?></td>
                                       <td><?php echo $row['User_Email'] ?></td>
                                         <td><?php echo $row['User_Mobile'] ?></td>
                                         <td><?php echo $row['User_Message'] ?></td>
                                         <td><?php echo $row['Date'] ?></td>
                                      <td><?php 
                                            
                                        echo "<a href='?type=delete&Id=".$row['Contact_Id']."'>Delete</a>";  
                                           
                                           
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