<?php
    include '../includes/database.php';

    if($_SERVER['REQUEST_METHOD']=="POST") {
        $name = $_POST['name'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $date = $_POST['date'];
        if(isset($_POST['submit'])) {
            $sql = "INSERT INTO medicine (name, category, price, date) VALUES (?,?,?,?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ssss", $name, $category, $price, $date);
            if(mysqli_stmt_execute($stmt)){
                $message = "Entry added successfully!";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="purchase">
            <h2>Purchases</h2>
            <form action="" method="post">
                <h3>Add items</h3>
                <label for="name">Medicine:</label>
                <input type="text" name="name" id="name">
                <label for="category">Category</label>
                <input type="text" name="category" id="category"><br>
                <label for="price">Price:</label>
                <input type="number" name="price" id="price">
                <label for="date">Date:</label>
                <input type="date" name="date" id="date"><br>
                <input type="submit" value="Submit" name="submit">
            </form>
        </div>

        <div class="purchase-list">
        <table>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </table>
        </div>
    </div>
</body>
</html>