<?php
    include "database.php";
    if($_SERVER['REQUEST_METHOD']=="POST") {
        $yes = $_POST['yes'];
        $cancel = $_POST['cancel'];

        $sql = "delete from medicine where id = ".$_GET['id'];
        if (isset($yes)) {
            $result=mysqli_query($conn, $sql);
            if ($result==false) {
                echo mysqli_error($conn);
            }
            else{
                header("Location: ../home/inventory.php");
            }
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
    <link rel="stylesheet" href="../styles/login.css">
</head>
<body>

    <div class="login">
        <form action="" method="post">
            <h2>Are you sure?</h2>
            <input type="submit" name="yes" value="Yes" id="yes">
            <input type="button" name="cancel" value="Cancel" id="no" onclick="window.location.href = '../home/inventory.php'">
        </form>
    </div>

</body>
</html>