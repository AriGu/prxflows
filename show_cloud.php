<?php
    include 'includes/header.php';

   
if (isset($_GET['id'])){

    $id = $_GET['id'];

$result = mysqli_query($conn,

            "SELECT 
           clouds.id, 
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

}else if(isset($_POST['search-cloud'])){

  
    $cloud = $_POST['clinic'];
    $cloud = explode(')', $cloud);
    $id = (int)str_replace('(# ','',$cloud[0]);    

    
    
        $result = mysqli_query($conn,

           "SELECT 
           clouds.id, 
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
 

<div class="container" style="width: 700px;">
    <div class="jumbotron text-left">

     <div style="color:blue;">   
        

        <h3><?php echo $row['clinic_name']  ?></h3>        
        <h3><?php echo $row['clinic_street']  ?></h3>
        <h3><?php echo $row['clinic_city']?>,        
            <?php echo $row['clinic_state'] ?>        
            <?php echo $row['clinic_zip']  ?> </h3>
            <br>
            <h3><?php echo $row['clinic_phone']  ?></h3>
    </div>
        <br>
            <h3>Cloud Users: <?php echo $row['user_count']  ?></h3>
            <h3>Payment Status: <?php echo $row['pay_status']  ?></h3>
            <h3>Server Status: <?php echo $row['name']  ?></h3>
            <h3>Vendor: <?php echo $row['last_name']  ?></h3>

            <div class="edit-cloud-box">
                <a href="list_clouds.php" class="btn btn-secondary btn-lg" style="margin-right: 5px;">BACK</a>

                <a href="cloud_order.php?id=<?php echo $id?>" class="btn btn-primary btn-lg" style="margin-right: 5px;">ORDER</a>

                <a href="admin_edit_cloud.php?id=<?php echo $id ?>" class="btn btn-primary btn-lg">EDIT</a>                            
            </div>
 </div>



</div>

<?php
  include 'includes/footer.php'; 
?>