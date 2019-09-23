<?php
include 'sendmail.php';

$clinics = mysqli_query($conn, "SELECT * from clinics ORDER by clinic_name ASC");
$clinics = mysqli_fetch_all($clinics, MYSQLI_ASSOC);

?>