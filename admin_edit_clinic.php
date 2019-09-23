<?php
    include 'includes/header.php';
    

    
if(isset($_POST['edit-clinic'])){  
    $id = $_POST['edit-clinic-id'];  
        
    
        $result = mysqli_query($conn,

            "SELECT 
            clinics.clinic_name,
            clinics.clinic_phone,
            clinics.clinic_street,
            clinics.clinic_city,
            clinics.clinic_state,
            clinics.clinic_zip            
            FROM clinics WHERE clinics.clinic_id = '$id'");

            $row = mysqli_fetch_array($result);
}

?>

<div class="container" style="width: 800px; padding: 0px 50px 0px">
    <form action="create_clinic.php" method="POST">
        <div class="jumbotron" style="margin-top: 70px; padding-top: 10px;">

        
                <label for="edit-clinic" style="text-align:left;" class="edit-clinic-label" >Clinic: </label>                
                <input type="text" class="form-control" name="edit-clinic" id="edit-clinic" style="height: 45px; margin-bottom: 0px; border: 1px solid #dee2e6;" value="<?php echo $row['clinic_name']?>" >

                
                <br>  
                
                <!-- ****************** -->

                <label for="edit-clinic-street" style="text-align:left;" class="edit-clinic-label">Street: </label>
                <input type="text" class="form-control" name="edit-clinic-street" id="edit-clinic-street"             
                style="height: 45px; margin-bottom: 0px; border: 1px solid #dee2e6;" value="<?php echo $row['clinic_street']?>" >

                
                <br>    

                <label for="edit-clinic-city" style="text-align:left;" class="edit-clinic-label">City: </label>
                <input type="text" class="form-control" name="edit-clinic-city" id="edit-clinic-city"              
                style="height: 45px; margin-bottom: 0px; border: 1px solid #dee2e6;" value="<?php echo $row['clinic_city']?>" >

                
                <br>    

                <label for="state" class="edit-clinic-label">State: </label>
                <select id="select_state" class="form-control" style="height: 40px; width: 100px; display: inline; border: 1px solid #dee2e6; margin-right: 20px;" name="edit-clinic-state"> 

                <?php  foreach($states as $state) :  ?>	
			            <option name="state"><?php echo $state['abbreviation'] ?></option>
			    <?php endforeach; ?>

                </select> 

                <label for="new-clinic-zip" style="text-align:left;" class="edit-clinic-label">ZIP: </label>
                <input type="text" class="form-control" name="edit-clinic-zip" id="edit-clinic-zip"                
                style="height: 40px; width: 150px; display: inline; border: 1px solid #dee2e6; margin-right: 20px;" name="edit-clinic-zip" value="<?php echo $row['clinic_zip']?>" >
                
                


                <label for="edit-clinic-phone" style="text-align:left;" class="edit-clinic-label">Phone: </label>
                <input type="text" class="form-control" name="edit-clinic-phone" id="edit-clinic-phone"                
                style="height: 40px; width: 160px; display: inline; border: 1px solid #dee2e6;" name="edit-clinic-phone" value="<?php echo $row['clinic_phone']?>" >  
                
                
    
        
            <br>
            <div style="text-align: center;">
                    <input type="submit" class=" btn btn-lg btn-primary" style="background: #ff3d00; margin-top: 30px; border: none;" name="create-clinic" value="ENTER"> 
                    
                    
                    <?php
                        echo $row['clinic_id'];
                    ?>
            </div>
                
        
    </form>
</div>

<?php
  include 'includes/footer.php'; 
?>