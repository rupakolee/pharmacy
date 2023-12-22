<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="login">
        <h2>Pharmaceuticals Management Portal</h2>
        <form action="#" method="post">
            <label for="user-id">Enter your userID or ____</label><br>
            <input type="text" id="user-id" name="userId"><br>
            <label for="password">Enter passcode or Pin</label><br>
            <input type="password" id="passcode" name="passcode"><br>
            <button type="submit" id="login-btn" name="button">Login</button><br>
            <span><a href="#">Forgot your password?</a></span>
            <span><a href="register.php">Register now!</a></span><br>
        </form>
    </div>
    <script src="/scripts/login.js"></script>

    <?php
        if(isset($_POST['button'])) {
            $userId = $_POST['userId'];
            $passcode = $_POST['passcode'];
            if($userId == 'admin' && $passcode == 'admin') {
                header('Location: home.php');
        }
    }
    ?>
</body>
</html>