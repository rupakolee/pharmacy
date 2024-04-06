<?php
include "../includes/database.php";
include 'mailer.php';

$sql = "SELECT verification_code from register where email =".$_GET['email'];
$record = mysqli_fetch_array(mysqli_query($conn, $sql));

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
                if($_POST['code'] == $record['verification_code']) {
                    $sql = "UPDATE register set status = 1 where email =".$_GET['email'];
                    mysqli_query($conn, $sql);
                    header("Location: registrationSuccess.php");
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