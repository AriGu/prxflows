<?php
 require 'config/config.php';
 require 'includes/form_logic/register_logic.php';
 
 ?>
 

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Praxis Cloud Portal</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/register_styles.css">
  </head>
  <body>
      <div class="container">
          <div class="reg_box">
   <div class="page-header text-center">
  <span><img src="assets/img/Logo_Praxis_The_Template-Free_EMR_Big.png" class="reg_logo"></span>
</div>  

            
    <form action="register.php" method="POST" style="text-align: left;">

        <span style="color:red;">
        <?php if(in_array($errorFirstNameLength, $errors)){echo $errorFirstNameLength;}?> 
        </span>
                <input type="text" name="reg_fname" class="form-control" placeholder="First Name" value="<?php 
                if(isset($_SESSION['reg_fname'])){
                    echo $_SESSION['reg_fname'];
                } ?>">
                <br>



        <span style="color:red;">
        <?php if(in_array($errorLastNameLength, $errors)){echo $errorLastNameLength;} ?>
        </span>            
                <input type="text" name="reg_lname" class="form-control" placeholder="Last Name" value="<?php 
                if(isset($_SESSION['reg_lname'])){
                    echo $_SESSION['reg_lname'];
                } ?>">
                <br>        
        

        
        <span style="color:red;">     
        <?php if(in_array($errorInvalidEmail, $errors)){echo $errorInvalidEmail;}
        if(in_array($errorEmailMismatch, $errors)){echo $errorEmailMismatch;} 
        if(in_array($errorEmailTaken, $errors)){echo $errorEmailTaken;} ?>              
        </span> 
                <input type="email" name="reg_email" class="form-control" placeholder="Email" value="<?php
                if(isset($_SESSION['reg_email'])){
                    echo $_SESSION['reg_email'];
                } ?>">
                <br>

                <input type="email" name="reg_email2" class="form-control" placeholder="Confirm Email" value="<?php
                if(isset($_SESSION['reg_email2'])){
                    echo $_SESSION['reg_email2'];
                } ?>">
                <br>



        <span style="color:red;">     
        <?php if(in_array($errorPwRules, $errors)){echo $errorPwRules;}
        if(in_array($errorPwMismatch, $errors)){echo $errorPwMismatch;} 
        ?>              
        </span>       
                <input type="password" name="reg_password" class="form-control" placeholder="Password">
                <br>   

                <input type="password" name="reg_password2" class="form-control" placeholder="Confirm Password">
                <br>  
        
      
           
        
       
        <div style="text-align: center;">
        <input type="submit" name="reg_button" value="Register" class=" btn btn-lg btn-primary" style="background: #ff3d00; margin-top: 10px;">
        </div>
        <br>     

               
    </form>

    </div>    
</div>

  </body>
</html>