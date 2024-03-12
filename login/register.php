<?php
            $errors = '';
            $error = '';
            $success = '';
        // if(isset($_POST['button'])) {
        //     if(empty($_POST['name'])) {
        //         $error = 1;
        //         $errors = "Cannot be empty!";
        //     }   
        //     if(is_numeric($_POST['name'])) {
        //         $error = 2;
        //         $errors = "Name cannot contain numbers.";
        //     }   
        //     else if(empty($_POST['pharmacyName'])) {
        //         $error = 3;
        //         $errors = "Cannot be empty!";
        //     }
        //     else if(empty($_POST['passcode'])) {
        //         $error = 4;
        //         $errors = "Cannot be empty!";
        //     }
        //     else if($_POST['passcode'] != $_POST['retype']) {
        //         $error = 5;
        //         $errors = "Passwords donot match!";
        //     }
        //     else if(empty($_POST['email'])) {
        //         $error = 6;
        //         $errors = "Cannot be empty!";
        //     }
        //     else if(empty($_POST['phone'])) {
        //         $error = 7;
        //         $errors = "Cannot be empty!";
        //     }

        //     if(empty($errors)) {
        //         $fullName = $_POST['name'];
        //         $pharmacyName = $_POST['pharmacyName'];
        //         $pass = $_POST['passcode'];
        //         $email = $_POST['email'];
        //         $phone = $_POST['phone'];
                
        //         include "../includes/database.php";
        //         $sql = "INSERT INTO register (fullName, pharmacyName, pass, email, phone) VALUES (?,?,?,?,?)";
        //         $stmt = mysqli_prepare($conn, $sql);
                
        //         if($stmt==false) {
        //             echo mysqli_error($conn);
        //         }
        //         else {
        //             mysqli_stmt_bind_param($stmt, "sssss", $fullName, $pharmacyName, $pass, $email, $phone);
        //             if(mysqli_stmt_execute($stmt)){
        //                 $success = "Contact added successfully!";
        //             }
        //         }
        //     }
        // }
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../styles/login.css">
</head>

<body>

    <div class="login"><div class="wrapper">
        <h2>Pharmaceuticals Management Portal</h2>
        <form action="" method="post">
            <input type="text" name="name" id="name" placeholder="Full Name"><br>
            <?php if($error == 1 || $error == 2): ?>
            <span style="color: red;"><?= $errors ?></span><br><?php endif; ?>

            <input type="text" id="pharmacy-name" name="pharmacyName" placeholder="Pharmacy Name"><br>
            <?php if($error == 3): ?>
            <span style="color: red;"><?= $errors ?></span><br><?php endif; ?>

            <input type="password" id="passcode" name="passcode" placeholder="Password"><br>
            <?php if($error == 4): ?>
            <span style="color: red;"><?= $errors ?></span><br><?php endif; ?>

            <input type="password" id="retype" name="retype" placeholder="Retype your password"><br>
            <?php if($error == 5): ?>
            <span style="color: red;"><?= $errors ?></span><br><?php endif; ?>

            <input type="text" id="email" name="email" placeholder="Email"><br>
            <?php if($error == 6): ?>
            <span style="color: red;"><?= $errors ?></span><br><?php endif; ?>

            <input type="text" id="phone" name="phone" placeholder="Phone"><br>
            <?php if($error == 7): ?>
            <span style="color: red;"><?= $errors ?></span><br><?php endif; ?>

            <button type="button" id="register-btn" name="button" onclick="window.location.href='subscription.php'">Next</button><br> 
            <span><?php if(empty($errors)): ?><?= $success; ?><?php endif; ?></span>
            <span>Have an account? <a href="login.php">Login!</a></span><br>
        </form>
        </div>
    </div>
    <script src="/scripts/register.js"></script>
 
</body>

</html>