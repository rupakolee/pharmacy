<?php
use  PHPMailer\PHPMailer\PHPMailer;
use  PHPMailer\PHPMailer\SMTP;
use  PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

$mail = new PHPMAILER(true);

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.example.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;
$mail->Username = "your-email@example.com";
$mail->Password = "your-password";

$mail->isHTML(true);

return $mail;
?>