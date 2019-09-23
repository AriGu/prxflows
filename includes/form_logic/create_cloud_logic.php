<?php

include 'sendmail.php';


//gets clinics for dropdown select
$clinics = mysqli_query($conn, "SELECT clinic_name from clinics ORDER by clinic_name ASC");
$clinics = mysqli_fetch_all($clinics, MYSQLI_ASSOC);
//gets vendors for dropdown select
$vendors = mysqli_query($conn, "SELECT last_name from users WHERE access = 'Cloud Vendor' ORDER by last_name ASC");
$vendors = mysqli_fetch_all($vendors, MYSQLI_ASSOC);

//errors
$errors = [];
$clinicEmpty = "This field cannot be empty";

//form validation-submit

// if (empty($_POST['create_cloud'])){
//     array_push($errors, $clinicEmpty);
// } else{

  if(isset($_POST['create_cloud'])){

    var_dump($_POST);

        $clinic = $_POST['clinic'];
        $clinic = strip_tags($clinic);
        $clinic_id = mysqli_query($conn, "SELECT clinics.clinic_id FROM clinics WHERE clinics.clinic_name = '$clinic'");
        $clinic_id = mysqli_fetch_array($clinic_id, MYSQLI_ASSOC);

        $clinic_id = $clinic_id['$clinic_id'];

        $user_count = $_POST['user_count'];
        $user_cost = $_POST['user_cost'];
        $vendor = $_POST['vendor'];
        $vendor_id = mysqli_query($conn, "SELECT users.user_id FROM users WHERE user.last_name = '$vendor'");
        $vendor_id = mysqli_fetch_all($vendor_id, MYSQLI_ASSOC);
        $vendor_id = $vendor_id['$vendor_id'];

        $payment_staus = mysqli_query("SELECT id FROM payment_status WHERE payment_status.pay_status = 'unfunded'");
        $payment_status = mysqli_fetch_all($payment_status, MYSQLI_ASSOC);
        $payment_status = $payment_status['pay_status'];

        $server_staus = mysqli_query("SELECT id FROM server_status WHERE server_status.serv_status = 'pre-live'");
        $server_status = mysqli_fetch_all($server_status, MYSQLI_ASSOC);
        $server_status = $server_status['serv_status'];

        $cloud = mysqli_query($conn, "INSERT INTO clouds
        (id, clinic_fk, vendor_fk, user_count, monthly_cost, monthly_price, payment_status_fk, server_status_fk, software_version, server_type, created_at, updated_at)
        VALUES(
        'NULL', '$clinic_id', '$vendor_id', '$user_count', '$user_cost', '','$payment_status', '$server_status', 'pending', 'pending', '$timestamp', '$timestamp'");

        $newCloud = mysqli_query($conn, "SELECT clouds.id FROM clouds WHERE clouds.clinic_fk = '$clinic_id' ");
        $newCloud = mysqli_fetch_all($newCloud, MYSQLI_ASSOC);
        $newCloudId = $newCloud['id'];
        $newCloudClinic = $newCloud['clinic_name'];
        $newCloudUserCount = $newCloud['user_count'];



        //send email to admin
        $mail->Subject = '<prx-cl> NEW CLOUD ORDERED: '. ' #' . $clinic. ', '. $clinic . ', ' . $clinic . ' users';
        $mail->Body =
        '<h1 align=left>New Cloud Order</h1>
        <br>
        <h3 align=left>Please set up a recurring profile for a:<br>' .. '-user cloud for '.. '</h3>';

}
if(!$mail->send()){

     header('Location: err_create_cloud.php');
}
 else{

     header('Location: succ_create_cloud.php');
 }







?>
