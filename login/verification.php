<?php
include "../includes/database.php";
$sql = "SELECT * FROM register";
$result = mysqli_query($conn, $sql);

if($result == false) {
    mysqli_connect_error();
}
else {
    $details = mysqli_fetch_assoc($result);
}

// validation included

$errors = "";
$error = '';
if(isset($_POST['button'])) {
    if(empty($_POST['userId']) && empty($_POST['passcode'])) {
        $errors = "Invalid userID/passcode";
        $error = 1;
    }
    else if(empty($_POST['userId'])) {
        $errors = "Please enter your userId";
        $error = 2;
    }
    else if(empty($_POST['passcode'])) {
        $errors = "Please enter your passcode";
        $error = 3;
    }

    if($error < 1) {
        $message = '';
        if($_POST['userId'] == $details['email'] && $_POST['passcode'] == $details['pass']) {
            header("Location: ../home/home.php");
        }
        else {
            $message = "Invalid userID/passcode";
        }
    }
    }
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
        <form action="#" method="post">
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