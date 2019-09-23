<?php
    include 'includes/header.php';      
    
    
    if(isset($_GET['id'])){

        $id = $_GET['id'];

        $result = mysqli_query($conn,

            "SELECT             
           clinics.clinic_phone, 
           clinics.clinic_name, 
           clinics.clinic_street, 
           clinics.clinic_city, 
           clinics.clinic_state, 
           clinics.clinic_zip, 
           clouds.user_count, 
           payment_status.pay_status, 
           server_status.name,
           users.last_name 
           FROM clouds 
           INNER JOIN clinics ON clinics.clinic_id = clouds.clinic_fk 
           INNER JOIN users ON users.id = clouds.vendor_fk 
           INNER JOIN payment_status ON clouds.payment_status_fk = payment_status.id 
           INNER JOIN server_status ON clouds.server_status_fk = server_status.id 
           WHERE clouds.id = '$id'");

            $row = mysqli_fetch_array($result);

    }







?>
<div class="container" >
<form action="">
<div class= "jumbotron" style="padding: 0px; height: 450px;">
    <div class="edit-status-left-div">
            <h3 style="display: inline;"><?php echo $row['clinic_name']  ?></h3>       
            <br>    
            <h3 style="display: inline;"><?php echo $row['clinic_phone'] ?></h3>
        <div class="edit-status-right-div">         
            <a href="" class="btn btn-secondary btn-lg" style="margin-right: 5px;">BACK </a>
            <a href="" class="btn btn-primary btn-lg" style="margin-right: 5px;" >EDIT  </a>        
            <input type="submit" class="btn btn-primary btn-lg" style="margin-right: 20px;" name="edit-status-submit" value="SAVE">
        </div>   
        
        

    </div>
<textarea name="" id="" cols="130" rows="10" class="status-note-input"></textarea>

       
</div>
        
            
        
 </form>
</div> 
<?php
    include 'includes/footer.php';       

?>



