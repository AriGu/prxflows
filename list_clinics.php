<?php
    include 'includes/header.php';   


    $clinics = mysqli_query($conn, "SELECT 
            clinics.clinic_id,
            clinics.clinic_name,
            clinics.clinic_phone,
            clinics.clinic_street,
            clinics.clinic_city,
            clinics.clinic_state,
            clinics.clinic_zip 
            FROM clinics ORDER BY clinics.clinic_name ASC");

    $clinics = mysqli_fetch_all($clinics, MYSQLI_ASSOC);    

?>


<div class="tableFixHead">
  <table class="table table-hover">
      
        <thead class="thead-dark">
            <div class="sort-nav">

            <a href="create_clinic.php" class="new-clinic-link">                    
                    <h3 class="new-clinic">Add Clinic</h3>
                    <i class="material-icons" style="font-size: 40px; color: #f5f5bc; position: absolute; left: 14.5%; top: 8px;">add</i>
                </a>

              <form action="show_clinic.php" method="POST">

                <input type="search" class="form-control" name="clinic" id="search-clinic" placeholder="QUICKSEARCH" style="width: 20%;  position: absolute; top: 9px; right: 7%;"
                list="datalist3"
                >
                

               <datalist id="datalist3">                   
                  
                    <?php  foreach($clinics as $clinic) :  ?>
                    
                        <option value="<?php echo 
                             $clinic['clinic_name'];
                         ?>"></option>
                    	
			        <?php endforeach; ?>

                </datalist>  

                <input type="submit" class="btn btn-md" style="position: absolute; right: 2.2%; top: 8px; height: 40px; background: #CC003B; color: white;" value="FIND" name="search-clinic">  

                </form>

                <?php if(isset($_POST['search-clinic'])){
                    header('Location:show_clinic.php');
                } ?>

            </div>
        <tr>            
            <th style="padding-top: 130px;">Clinic</th>
            <th>Phone</th>
            <th>Street</th>           
            <th>City</th>
            <th>State</th>
            <th>Zip</th>         
        </tr>
        </thead>
       
    <tbody>
       <?php foreach($clinics as $clinic) :  ?>
                    <tr style="font-weight: bold; color: #696969;">
                     
                        <td style="font-weight: bold; font-size: 17px;">
                     <a href="show_clinic.php?id=<?php echo $clinic['clinic_id']    ?>">  <?php echo $clinic['clinic_name']?> </a>
                        </td>
                        <td>
                            <?php echo $clinic['clinic_phone']?>
                        </td>
                        <td>
                            <?php echo $clinic['clinic_street']?>
                        </td>
                        <td>
                            <?php echo $clinic['clinic_city']?>
                        </td>
                        <td>
                            <?php echo $clinic['clinic_state']?>
                        </td>          
                        <td>
                            <?php echo $clinic['clinic_zip']?>
                        </td>                 
                    </tr>

                <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php
  include 'includes/footer.php'; 
?>