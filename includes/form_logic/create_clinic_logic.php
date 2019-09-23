<?php
include 'sendmail.php';

$states = mysqli_query($conn, "SELECT state_abbreviations.abbreviation FROM state_abbreviations WHERE id > 0 ORDER by id ASC");

$states = mysqli_fetch_all($states, MYSQLI_ASSOC);


//errors
$errors = [];
$fieldEmpty = "This field cannot be empty";

//form validation-submit
if(isset($_POST['create-clinic'])){

      if (empty($_POST['new-clinic'])){
			array_push($errors, $fieldEmpty);
		} if (empty($_POST['new-clinic-street']))	{
			array_push($errors, $fieldEmpty);
		} if (empty($_POST['new-clinic-city'])) {
			array_push($errors, $fieldEmpty);
		} if (empty($_POST['new-clinic-zip'])) {
			array_push($errors, $fieldEmpty);
		} if (empty($_POST['new-clinic-phone'])){
            array_push($errors, $fieldEmpty);
               	
        	}else{

        if(empty($errors)){

        
    $clinic = strip_tags($_POST['new-clinic']);    
    $street = strip_tags($_POST['new-clinic-street']); 
    $city = strip_tags($_POST['new-clinic-city']);
    $state = $_POST['new-clinic-state'];
    $zip = strip_tags($_POST['new-clinic-zip']);
    $phone = strip_tags($_POST['new-clinic-phone']);
    

    $query = mysqli_query($conn, "INSERT INTO clinics (clinic_id, clinic_name, clinic_street, clinic_city, clinic_state, clinic_zip, clinic_phone, created_at, updated_at)

     VALUES('NULL', '$clinic', '$street', '$city', '$state', '$zip', '$phone','$timestamp','$timestamp' )");

   
            }
     
        }
        
       
    }


//         //send email to admin
//         $mail->Subject = 'NEW CLOUD ORDERED: '. ' #' . $cloudId. ', '. $clinic . ', ' . $user_count . ' users';
//         $mail->Body = 
//         '<h1 align=left>New Cloud Order</h1>
//         <br>
//         <h3 align=left>Please set up a recurring profile for a:<br>' .$user_count. '-user cloud for '.$clinic. '</h3>';


// if(!$mail->send()){    

//      header('Location: err_create_cloud.php');
// }
//  else{     

//      header('Location: succ_create_cloud.php');
//  }







?>