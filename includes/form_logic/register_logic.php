<?php

$fname = "";
$lname = "";
$email = "";
$password = "";
$access = "Admin";

// $password2 = "";
// $date = date("Y-m-d H:i:s");
$errors = [];

$errorFirstNameLength = "First name must be between 2 and 50 characters<br>";
$errorLastNameLength = "Last name must be between 2 and 50 characters<br>";
$errorInvalidEmail = "Invalid email format<br>";
$errorEmailMismatch = "Emails don't match<br>";
$errorEmailTaken = "Email already in use<br>";
$errorPwRules = "Password must contain at least, 8 characters with 1 capital letter, 1 lowercase letter, 1 number, 1 special character<br>";
$errorPwMismatch = "Passwords don't match<br>";
$success = "<span style='color:green;'>Success! Go ahead and log in.</span><br>";


if(isset($_POST['reg_button'])){

    $fname = strip_tags($_POST['reg_fname']);
    $fname = str_replace(' ', '', $fname);
    $fname = ucfirst(strtolower($fname));
    $fname = trim($fname);  
    $_SESSION['reg_fname'] = $fname;

    $lname = strip_tags($_POST['reg_lname']);
    $lname = str_replace(' ', '', $lname);
    $lname = ucfirst(strtolower($lname));
    $lname = trim($lname);  
    $_SESSION['reg_lname'] = $lname;     

    $email = strip_tags($_POST['reg_email']);
    $email = str_replace(' ', '', $email);
    $_SESSION['reg_email'] = $email;

    $password = ($_POST['reg_password']);
    

    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        $email_check = mysqli_query($conn, "SELECT email from users WHERE email = '$email'");       
        if(mysqli_num_rows($email_check) > 0)
        {
            array_push($errors, $errorEmailTaken);
        }

        }else{
            array_push($errors, $errorInvalidEmail);
        }

        if(strlen($fname) > 50 || strlen($fname) < 2)
        {
            array_push($errors, $errorFirstNameLength);
        }

        if(strlen($lname) > 50 || strlen($lname) < 2)
        {
            array_push($errors, $errorLastNameLength);
        }

        // if($password != $password2)
        // {
        //     array_push($errors, $errorPwMismatch);
        // }
        else if(strlen($password) < 8 || strlen($password) > 50 || !preg_match("#[0-9]+#", $password) || !preg_match("/[A-Z]/", $password) || !preg_match("/[a-z]/", $password) || !preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $password))
        {            
            array_push($errors, $errorPwRules);
        }

        if(empty($errors))
        {
            $password = md5($password);

               $query = mysqli_query($conn, "INSERT INTO users (id, first_name, last_name, email, password, access, created_at, updated_at) 
            
            VALUES('NULL', '$fname', '$lname', '$email', '$password', 'Admin', '$timestamp', '$timestamp')");

            

            array_push($errors, $success);
            
            // $_SESSION['reg_name'] = "";
            // $_SESSION['reg_email'] = "";

            header("Location: login.php");
            exit();
        }

}

 ?>
