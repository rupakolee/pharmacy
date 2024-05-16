<?php
include "../includes/database.php";

$sql = "SELECT * FROM register";
$result = mysqli_query($conn, $sql);

if($result == false) {
    mysqli_connect_error();
}
else {
    $details = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
        foreach ($details as $detail) {            
            if($_POST['userId'] == $detail['email'] && $_POST['passcode'] == $detail['pass']) {
                session_start();
                $_SESSION['email'] = "{$detail['email']}";
                $_SESSION['pass'] = "{$detail['pass']}";
                header("Location: ../home/home.php?email='{$_SESSION['email']}");
            }
            else {
                $message = "Invalid userID/passcode";
            }
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
            <input type="text" id="email" name="userId" placeholder="Email"><br>
            <?php if($error == 2): ?>
            <span style="color: red;"><?= $errors ?></span><br><?php endif; ?>
            <input type="password" id="password" name="passcode" placeholder="Password"><br>
            <?php if($error == 3): ?>
            <span style="color: red;"><?= $errors ?></span>
            <?php endif; ?>
            <?php if(!empty($message)): ?>
            <span id="error" style="color:red";><?= $message ?></span>
            <?php endif; ?>
            <?php if($error == 1): ?>
            <span style="color: red;"><?= $errors ?></span><br><?php endif; ?><br>
            <span><a href="forgot.php">Forgot your password?</a></span><br>
            <button type="submit" id="login-btn" name="button">Login</button>
            <span><a href="register.php">Register now!</a></span><br>
            <!-- <a href="subscription.php"><h4>Renew your subscription!</h4></a> -->
        </form>
        </div>
    </div>
    <script src="/scripts/login.js"></script>

</body>
</html>