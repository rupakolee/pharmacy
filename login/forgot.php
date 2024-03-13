<?php
include "../includes/database.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../styles/login.css">
</head>
<body>

    <div class="login">
        <div class="wrapper">
        <img src="../images/logo.png" alt="">
        <h2>Pharmaceuticals Management Portal</h2>
        <h3>Forgot your password?</h3>  
        <form action="#" method="post">
            <input type="text" id="email" name="email" placeholder="Enter your email"><br>           
            <button type="submit" id="change-btn" name="button">Send Code!</button><br>
            <?php 
                if(isset($_POST['button'])) {
                    header("Location: verification.php");
                }
            ?>
            <span><a href="login.php">Back to Login!</a></span><br>
        </form>
        </div>
    </div>

    <script src="/scripts/login.js"></script>

</body>
</html>

