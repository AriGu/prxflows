<?php
    include 'includes/header.php';
    include 'includes/form_logic/create_clinic_logic.php';  

    

?>



<div class="container" style="width: 800px; padding: 0px 50px 0px">
    <form action="create_clinic.php" method="POST">
        <div class="jumbotron" style="margin-top: 70px; padding-top: 10px;">

        
                <label for="new-clinic" style="text-align:left;" class="new-clinic-label" >Clinic: </label>                
                <input type="text" class="form-control" name="new-clinic" id="new-clinic" placeholder="CLINIC NAME"                
                style="height: 45px; margin-bottom: 0px; border: 1px solid #dee2e6;">
                <br>  
                
                <label for="new-clinic-street" style="text-align:left;" class="new-clinic-label">Street: </label>
                <input type="text" class="form-control" name="new-clinic-street" id="new-clinic-street" placeholder="STREET ADDRESS"             
                style="height: 45px; margin-bottom: 0px; border: 1px solid #dee2e6;">
                <br>    

                <label for="new-clinic-city" style="text-align:left;" class="new-clinic-label">City: </label>
                <input type="text" class="form-control" name="new-clinic-city" id="new-clinic-city" placeholder="CITY"                
                style="height: 45px; margin-bottom: 0px; border: 1px solid #dee2e6;">
                <br>    

                <label for="state" class="new-clinic-label">State: </label>
                <select id="select_state" class="form-control" style="height: 40px; width: 100px; display: inline; border: 1px solid #dee2e6; margin-right: 20px;" name="new-clinic-state"> 

                <?php  foreach($states as $state) :  ?>	
			            <option name="state"><?php echo $state['abbreviation'] ?></option>
			    <?php endforeach; ?>

                </select> 

                <label for="new-clinic-zip" style="text-align:left;" class="new-clinic-label">ZIP: </label>
                <input type="text" class="form-control" name="new-clinic-zip" id="new-clinic-zip" placeholder="ZIP CODE"                
                style="height: 40px; width: 150px; display: inline; border: 1px solid #dee2e6; margin-right: 20px;" name="new-clinic-zip"> 

                <label for="new-clinic-phone" style="text-align:left;" class="new-clinic-label">Phone: </label>
                <input type="text" class="form-control" name="new-clinic-phone" id="new-clinic-phone" placeholder="PHONE"                
                style="height: 40px; width: 160px; display: inline; border: 1px solid #dee2e6;" name="new-clinic-phone">         
    
        
            <br>
            <div style="text-align: center;">
                    <input type="submit" class=" btn btn-lg btn-primary" style="background: #ff3d00; margin-top: 30px; border: none;" name="create-clinic" value="ENTER">  
            </div>
                
        
    </form>
</div>

<?php
  include 'includes/footer.php'; 
?>
