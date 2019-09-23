<?php
require 'phpmailer/PHPMailerAutoload.php';



$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';

    $mail->SMTPOptions = array(
    'ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true
    )
    );

$mail->Username = 'ariel.guatta@praxisemr.com';
$mail->Password = '';

$mail->setFrom('ariel.guatta@praxisemr.com', 'Ariel Guatta');
$mail->addAddress('arielguatta@gmail.com', 'Ariel Home');
$mail->addReplyTo('ariel.guatta@praxisemr.com', 'Ariel Guatta');

$mail->isHTML(true);


$mail->Subject = 'Cloud: '. $clinic . ' #' . $cloudId . ' / Action: '. $status . ' / ' . $changeNum . ' users';
$mail->Body = '<h1 align=center> Test Email</h1><br><h4 align=center>Test Email</h4>';

if(!$mail->send()){
    echo "Message could not be sent";
}
 else{
     echo "Message has been sent";
 }




?>
