<?php
    include 'includes/header.php';   


    $clouds = mysqli_query($conn, "SELECT clouds.id, clinics.clinic_name, clinics.clinic_phone, clouds.user_count, users.last_name, clouds.vendor_fk, payment_status.pay_status, server_status.serv_status FROM clouds INNER JOIN clinics ON clinics.clinic_id = clouds.clinic_fk INNER JOIN users ON users.id = clouds.vendor_fk INNER JOIN payment_status ON payment_status.id = clouds.payment_status_fk INNER JOIN server_status ON server_status.id = clouds.server_status_fk ORDER BY payment_status.priority ASC");
    $clouds = mysqli_fetch_all($clouds, MYSQLI_ASSOC);

?>


<div class="tableFixHead">
  <table class="table table-hover">
      
        <thead class="thead-dark">
            <div class="sort-nav">
                
                <a href="create_cloud.php" class="new-cloud-link">                    
                    <h3 class="new-cloud">New Cloud</h3>
                    <i class="material-icons" style="font-size: 40px; color: #f5f5bc; position: absolute; left: 14.5%; top: 8px;">add</i>
                </a>
                
              <form action="show_cloud.php" method="POST">

                <input type="search" class="form-control" name="clinic" id="search-clinic" placeholder="QUICKSEARCH" style="width: 20%;  position: absolute; top: 9px; right: 7%;"
                list="datalist1"
                >
                

               <datalist id="datalist1">                   
                  
                    <?php  foreach($clouds as $cloud) :  ?>
                    
                        <option value="(# <?php echo 
                        $cloud['id'] . ') ' .
                        $cloud['clinic_name'];
                         ?>"></option>
                    	
			        <?php endforeach; ?>

                </datalist>  

                <input type="submit" class="btn btn-md" style="position: absolute; right: 2.2%; top: 8px; height: 40px; background: #CC003B; color: white;" value="FIND" name="search-cloud">  

                </form>

                <?php if(isset($_POST['search-cloud'])){
                    header('Location:show_cloud.php');
                } ?>

            </div>
            <?php
                  
            ?>
        <tr>
            <th style="padding-top: 130px;">Vendor</th>
            <th>#</th>            
            <th>Clinic</th>            
            <th>User Count</th>
            <th>Payment Status</th>           
            <th>Server Status</th>
            <th>Phone</th>            
        </tr>
        </thead>
       
    <tbody>
       <?php foreach($clouds as $cloud) :  ?>
                    <tr class="<?php echo $cloud['pay_status']?>">
                        
                        <td>
                            <?php echo $cloud['last_name']?>
                        </td>
                        <td>
                        <?php echo $cloud['id']?>
                        </td>                        
                        <td style="font-weight: bold; font-size: 17px;">
                            <a href="show_cloud.php?id=<?php echo $cloud['id']?>"> <?php echo $cloud['clinic_name']?> </a>
                        </td>
                        
                        <td>
                            <?php echo $cloud['user_count']?>
                        </td>
                        
                        <td>
                            <a href="admin_show_status.php?id=<?php echo $cloud['id']?>">
                            <?php echo $cloud['pay_status']?>
                            </a>
                        </td>
                        
                        <td>
                            <?php echo $cloud['serv_status']?>
                        </td>
                        <td>
                            <?php echo $cloud['clinic_phone']?>
                        </td>                       
                    </tr>

                <?php endforeach; ?>
    </tbody>
  </table>
</div>



<?php
  include 'includes/footer.php'; 
?>