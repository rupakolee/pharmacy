<?php
include "../includes/database.php";
include 'mailer.php';

$otp = rand(100000, 999999);

$sql = "SELECT * from register where email =".$_GET['email'];
$record = mysqli_fetch_array(mysqli_query($conn, $sql));

sendMail($record['email'], $record['fullName'], $otp);
$sql = "UPDATE register SET verification_code = $otp WHERE email=".$_GET['email'];
mysqli_query($conn, $sql);
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
            <?php 
            if(isset($_POST['button'])) {
                if($record['verification_code'] == $_POST['code']) {
                   header("Location: newPass.php?email='{$_record['email']}'");
                }

            }
            ?>

            <button type="button" id="cancel-btn" name="button" onclick="window.location.href='login.php'">Cancel</button>

        </form>
        </div>
    </div>
    <script src="/scripts/login.js"></script>

</body>
</html>