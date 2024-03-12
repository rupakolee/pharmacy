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
    <title>Login</title>
    <link rel="stylesheet" href="../styles/login.css">
</head>
<body>

    <div class="login">
        <div class="wrapper">
        <img src="../images/logo.png" alt="">
        <h2>Pharmaceuticals Management Portal</h2>
        <form action="#" method="post">
                <select name="payment" id="payment">
                    <option value="subscription">Pick a subscription plan</option>
                    <option value="one">One Month -Rs300</option>
                    <option value="three">Three Months -Rs800</option>
                    <option value="six">Six Months -Rs1400</option>
                </select>
            <button type="button" id="pay-btn" name="button">Pay</button>
            <button type="button" id="home-btn" name="button" onclick="window.location.href='login.php'">Back to Login</button>
        </form>
        </div>
    </div>
    <script src="/scripts/login.js"></script>

</body>
</html>
    