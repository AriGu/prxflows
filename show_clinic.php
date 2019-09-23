<?php
    include 'includes/header.php';

    if(isset($_GET)){
        $id = $_GET['id'];

        $result = mysqli_query($conn,

            "SELECT 
            clinics.clinic_id,
            clinics.clinic_name,
            clinics.clinic_phone,
            clinics.clinic_street,
            clinics.clinic_city,
            clinics.clinic_state,
            clinics.clinic_zip            
            FROM clinics WHERE clinics.clinic_id = '$id'");

            $row = mysqli_fetch_array($result);

    }

    
if(isset($_POST['search-clinic'])){  
    $clinic = $_POST['clinic'];  
        
    
        $result = mysqli_query($conn,

            "SELECT 
            clinics.clinic_id,
            clinics.clinic_name,
            clinics.clinic_phone,
            clinics.clinic_street,
            clinics.clinic_city,
            clinics.clinic_state,
            clinics.clinic_zip            
            FROM clinics WHERE clinics.clinic_name = '$clinic'");

            $row = mysqli_fetch_array($result);
    
}
?>
 

<div class="container" style="width: 700px;">
    <div class="jumbotron text-left">

     <div style="color:blue;">     
        <h3><?php echo $row['clinic_name']  ?></h3>  
        <h3><?php echo $row['clinic_phone']  ?></h3>      
        <h3><?php echo $row['clinic_street']  ?></h3>
        <h3><?php echo $row['clinic_city']?>,        
            <?php echo $row['clinic_state'] ?>        
            <?php echo $row['clinic_zip']  ?> </h3>            
    </div>
       

            <div class="edit-cloud-box">
                <a href="list_clinics.php" class="btn btn-secondary btn-lg" style="margin-right: 5px;" >BACK</a>

                <a href="admin_edit_clinic.php?id=<?php echo $row['clinic_id']?>" class="btn btn-primary btn-lg">EDIT</a>



            </div>
    </div>
</div>

<?php
  include 'includes/footer.php'; 
?>