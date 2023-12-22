<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="login">
        <h2>Pharmaceuticals Management Portal</h2>
        <form action="#" method="post">
            <label for="name">Full Name</label><br>
            <input type="text" name="name" id="name"><br>

            <label for="user-id">Username</label><br>
            <input type="text" id="user-id" name="userId"><br>

            <label for="passcode">Passcode</label><br>
            <input type="password" id="passcode" name="passcode"><br>

            <label for="retype">Retype Passcode</label><br>
            <input type="password" id="retype" name="retype"><br>
            
            <label for="email">Email</label><br>
            <input type="text" id="email" name="email"><br>

            <label for="phone">Phone</label><br>
            <input type="text" id="phone" name="phone"><br>

            <button type="submit" id="login-btn" name="button">Register</button><br>
            <span>Have an account? <a href="login.php">Login</a></span><br>
        </form>
    </div>
    <script src="/scripts/register.js"></script>

    <?php
        
    ?>
</body>
</html>