<?php
include "../includes/database.php";

$sql = "SELECT * from register where email =".$_GET['email'];
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
            <p>Enter new password</p>
            <input type="password" id="new-pass" name="new-pass" placeholder="Enter new password"><br>
            <input type="password" id="retype-pass" name="retype-pass" placeholder="Retype new password"><br>
            <button type="submit" id="login-btn" name="button">Submit</button>
            <?php 
            if(isset($_POST['button'])) {
                if($_POST['new-pass'] == $_POST['retype-pass']) {
                    $sql = "UPDATE register SET pass = {$_POST['new-pass']} WHERE email=".$_GET['email'];
                    mysqli_query($conn, $sql);
                    header("Location: login.php");
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