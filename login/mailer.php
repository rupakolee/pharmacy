<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';

function sendMail($email, $fullName, $otp) {
$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
$mail->Username = "rupak.edzon11@gmail.com";
$mail->Password = "iqiu wlje xsme zqie";

$mail->setFrom("rupak.edzon11@gmail.com", "Nature PMS");
$mail->addAddress($email);

$mail->isHTML(true);
$mail->Subject="Your verification code";
$mail->Body="<p> Dear {$fullName}, </p> <h3> Your verification code is {$otp} <br></h3>
<p>Use this code to verify your account</p><br><br>
<p>With regards,</p>
<p>Nature PMS</p>";

$mail->send();
}
?>