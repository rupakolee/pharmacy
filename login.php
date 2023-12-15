<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="login">
        <h2>Pharmaceuticals Management Portal</h2>
        <form action="#" method="post">
            <label for="user-id">Enter your userID or ____</label><br>
            <input type="text" id="user-id">
            <label for="password">Enter passcode or Pin</label><br>
            <input type="password" id="passcode">
            <input type="submit" value="Login" id="submit">
            <span>Forgot your password?</span>
            <span>Register now!</span>
        </form>
    </div>

    <?php
        if(isset($_POST["user-id"]) && isset($_POST["passcode"])) {
            $userId = $_POST["user-id"];
            $passcode = $_POST["passcode"];
            if(empty($userId)) {
                $error = "Please enter your userID";
            }
            if(empty($passcode)) {
                $error = "Please enter your passcode";
        }
        if($userId == "1234" && $passcode == "1234") {
            Header("Location: index.html");
        }
    }
    ?>
</body>
</html>