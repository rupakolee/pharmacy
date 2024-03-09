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
        <img src="../images/logo.png" alt="">
        <h2>Pharmaceuticals Management Portal</h2>
        <form action="#" method="post">
            <label for="user-id">Enter your userId</label><br>
            <input type="text" id="user-id" name="userId"><br>
            <?php if($error == 2): ?>
            <span style="color: red;"><?= $errors ?></span><br><?php endif; ?>
            <label for="password">Enter passcode or Pin</label><br>
            <input type="password" id="passcode" name="passcode"><br>
            <?php if($error == 3): ?>
            <span style="color: red;"><?= $errors ?></span>
            <?php endif; ?>
            <?php if(!empty($message)): ?>
            <span id="error" style="color:red";><?= $message ?></span>
            <?php endif; ?>
            <?php if($error == 1): ?>
            <span style="color: red;"><?= $errors ?></span><br><?php endif; ?><br>
            <span><a href="forgot.php">Forgot your password?</a></span>
            <button type="submit" id="login-btn" name="button">Login</button>
            <span><a href="register.php">Register now!</a></span><br>
        </form>
    </div>
    <script src="/scripts/login.js"></script>


</body>
</html>