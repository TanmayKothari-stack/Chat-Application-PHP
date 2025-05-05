<?php
$to = "sushmakotnalatanmaykothari@gmail.com";
$subject = "Test Mail";
$message = "Hello this is a test mail";
$headers = 'From: kotharijitendra960@gmail.com';

// Setting SMTP parameters
ini_set('SMTP', 'smtp.example.com');
ini_set('smtp_port', 25);
ini_set('sendmail_from', 'kotharijitendra960@gmail.com');

// Sending the email
mail($to, $subject, $message, $headers);
?>
