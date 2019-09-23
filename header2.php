<?php
    require 'config/config.php';          


    if(isset($_SESSION['email'])){
        $loggedUser_email = $_SESSION['email'];
        $userQuery = mysqli_query($conn, "SELECT * from users WHERE email = '$loggedUser_email' ");
         
        while($row = mysqli_fetch_array($userQuery)){
        $loggedUser_id = $row['id'];
        $loggedUser_fname = $row['first_name'];
        $loggedUser_lname = $row['last_name'];        
        }

          }else{
            header('Location:home.php');
          }
    
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Praxis Cloud Portal</title>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato|Poppins" rel="stylesheet">
    
    
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/header_styles.css">
    <link rel="stylesheet" href="assets/css/index_styles.css">
    <link rel="stylesheet" href="assets/css/session_styles.css">
    <link rel="stylesheet" href="assets/css/onsite_styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
          
        <div class="container">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" style="font-size: 20px;" href="#">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="font-size: 20px;" href="#">Clinics</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="font-size: 20px;" href="#">Clouds</a>
                            </li>
                            <li class="nav-item dropdown" style="margin-left: 600px;">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 20px;">
                        <?php echo $loggedUser_email; ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="includes/handlers/logout.php">Logout</a>
                        
                        </li>
                    </ul>
        </div>
        </div>
</nav>

          
             
       

   </body>
</html>

