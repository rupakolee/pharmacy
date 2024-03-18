<?php
include "../includes/database.php";
$email = $_POST['email'];
$token = bin2hex(random_bytes(16));
$token_hash = hash('sha256', $token);
$expiry = date("Y-m-d H:i:s", time() +60*30);

$sql = "UPDATE register
        set token = ?, token_expiry = ?
        where email = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 'sss', $token_hash, $expiry, $email);
mysqli_stmt_execute($stmt);

$mail = require "mailer.php";
$mail->setFrom("noreply@example.com");
$mail->addAddress($email);
$mail->Subject = "Password Reset";
$mail->Body = <<<END

Click <a href="http://example.com/reset-password.php?token=$token">here</a> to reset your password.

END;

$mail->send();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Verification</title>
    <link rel="stylesheet" href="../styles/login.css">
</head>
<body>

    <div class="login">
        <div class="wrapper">
        <img src="../images/logo.png" alt="">
        <h2>Pharmaceuticals Management Portal</h2>
        <form action="" method="post">
            <p>We've sent a verification code to your email -</p>
            <input type="text" id="code" name="code" placeholder="Enter verification code"><br>
            <button type="submit" id="login-btn" name="button">Submit</button>
            <button type="button" id="cancel-btn" name="button" onclick="window.location.href='login.php'">Cancel</button>

        </form>
        </div>
    </div>
    <script src="/scripts/login.js"></script>

</body>
</html>