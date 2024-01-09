<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <div class="login">
        <h2>Pharmaceuticals Management Portal</h2>
        <form action="#" method="post">
            <label for="name">Full Name</label><br>
            <input type="text" name="name" id="name"><br>

            <label for="pharmacy-name">Pharmacy Name</label><br>
            <input type="text" id="pharmacy-name" name="pharmacyName"><br>

            <label for="passcode">Passcode</label><br>
            <input type="password" id="passcode" name="passcode"><br>

            <label for="retype">Retype Passcode</label><br>
            <input type="password" id="retype" name="retype"><br>

            <label for="email">Email</label><br>
            <input type="text" id="email" name="email"><br>

            <label for="phone">Phone</label><br>
            <input type="text" id="phone" name="phone"><br>

            <button type="submit" id="register-btn" name="button">Register</button><br>
            <span>Have an account? <a href="login.php">Login</a></span><br>
        </form>

    </div>
    <script src="/scripts/register.js"></script>

    <?php
        if(isset($_POST['button'])) {

            if(is_numeric($_POST['name'])) {
                $error = 1;
                $errors = "Name cannot contain numbers.";
            }   
            else {
                $fullName = $_POST['name'];
                $error = 0;
            }
            $pharmacyName = $_POST['pharmacyName'];
            $pass = $_POST['passcode'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            
            include "../includes/database.php";
            $sql = "INSERT INTO register (fullName, pharmacyName, pass, email, phone) VALUES (?,?,?,?,?)";
            $stmt = mysqli_prepare($conn, $sql);

            if($stmt==false) {
                echo mysqli_error($conn);
            }
            else {
                mysqli_stmt_bind_param($stmt, "sssss", $fullName, $pharmacyName, $pass, $email, $phone);
                    if(mysqli_stmt_execute($stmt)){
                        $success = "Contact added successfully!";
                    }
            }
        }
    ?>
 
</body>

</html>