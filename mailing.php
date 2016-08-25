
<?php
$to      = 'astroadityachauhan@gmail.com';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: aditya@cgvigyansabha.in' . "\r\n" .
    'Reply-To: aditya@cgvigyansabha.in' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message);
?>
