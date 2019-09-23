<?php

  ob_start();
  session_start();
  $timezone = date_default_timezone_set('America/New_York');
  $date = date('m-d-Y');
  $timestamp = date('Y-m-d h:i:s');
  $conn = mysqli_connect('localhost', 'root', '', 'cloudportal');




  if(mysqli_connect_errno())
  {
    echo 'Failed to connect: '. mysqli_connect_errno();
  } 

?>


