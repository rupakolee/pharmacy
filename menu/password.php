<?php
include "../includes/database.php";
$errors = "";
$error = '';         // flag
if ($_SERVER['REQUEST_METHOD']=="POST") {
$userId = $_POST['userId'];
$newPass = $_POST['newPass'];

// $sql = "SELECT * FROM register where email = $userId";
// $result = mysqli_query($conn, $sql);

// if($result == false) {
//     $errors = "User not found";
//     $error = 1;
// }
// else {
//     $details = mysqli_fetch_assoc($result);
// }

if(isset($_POST['button'])) {
    if(empty($userId)) {
        $errors = "Please enter your userId";
        $error = 2;
    }
    else if(empty($_POST['oldPass']) || empty($newPass)) {
        $errors = "Cannot be empty";
        $error = 3;
    }
    else if(empty($_POST['retypePass'])) {
        $errors = "Please re-enter your passcode";
        $error = 4;
    }
    else if($newPass != $_POST['retypePass']) {
        $errors = "Passwords donot match";
        $error = 5;
    }
    
    if(empty($errors)) {
        $sql = "UPDATE register set pass = $newPass where email = '$userId'";
        $result = mysqli_query($conn, $sql);
        if($result) {
            $message = "Password changed successfully";
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
        <h2>Forgot your password?</h2>  
        <form action="#" method="post">
            <label for="user-id">Enter your User-Id</label><br>
            <input type="text" id="user-id" name="userId"><br>
            <?php if($error == 2): ?>
            <span style="color: red;"><?= $errors ?></span><br><?php endif; ?>

            <label for="old-pass">Enter your old password</label><br>
            <input type="password" id="old-pass" name="oldPass"><br>
            <?php if($error == 3): ?>
            <span style="color: red;"><?= $errors ?></span><br><?php endif; ?>
           
            <label for="new-pass">Enter your new password</label><br>
            <input type="password" id="new-pass" name="newPass"><br>
            <?php if($error == 3): ?>
            <span style="color: red;"><?= $errors ?></span><br><?php endif; ?>
            
            <label for="retype-pass">Retype your new password</label><br>
            <input type="password" id="retype-pass" name="retypePass"><br>
            <?php if($error == 5): ?>
            <span style="color: red;"><?= $errors ?></span><br><?php endif; ?>
           
            <button type="submit" id="change-btn" name="button">Change password</button><br>
            <span><a href="../home/home.php">Back to Home!</a></span><br>
        </form>
    </div>

    <script src="/scripts/login.js"></script>

</body>
</html>

