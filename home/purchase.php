<?php
    include '../includes/database.php';
    
    $error = 0;
    $records = [];
    if($_SERVER['REQUEST_METHOD']=="POST") {
        $name = $_POST['name'];
        $category = $_POST['category'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $date = $_POST['date'];
        if(isset($_POST['submit'])) {
            $sql = "INSERT INTO medicine (name, category, quantity, price, expiry, date) VALUES (?,?,?,?,?, CURRENT_DATE())";
            $stmt = mysqli_prepare($conn, $sql); 
            mysqli_stmt_bind_param($stmt, "sssss", $name, $category, $quantity, $price, $date);
            if(mysqli_stmt_execute($stmt)){
                $message = "Entry added successfully!";
            }
        }
    }

    $records = descSelect($conn, 'medicine', 'id');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>

<div class="container">

    <?php include '../includes/nav.php'; ?>
    <div class="main">
        <?php include '../includes/menu.php'; ?>
        <div class="content-wrapper">
        <div class="entries">
            <h2>Purchases</h2>
            <h3>Add items</h3>
            <form action="" method="post" class="form">
                <label for="name">Medicine Name:</label>
                <input type="text" name="name" id="name">
                <label for="category">Category</label>
                <select name="category" id="category">
                    <option value=" "> </option>
                    <option value="Tablet">Tablet</option>
                    <option value="Syrup">Syrup</option>
                </select>
                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" id="quantity">
                <label for="rate">Rate:</label>
                <input type="number" name="price" id="rate">
                <label for="vendor">Vendor</label>
                <input type="text" name="vendor" id="vendor">
                <label for="date">Expiry Date:</label>
                <input type="date" name="date" id="date">
                <input type="submit" value="Submit" name="submit">
            </form>
        </div>

        <div class="records">
            <h3>Recent Purchase:</h3>
        <table class="table">
            <tr>
                <th>S.N.</th>
                <th>Name</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Rate</th>
                <th>Vendor</th>
                <th>Date of Expiration</th>
            </tr>
            <?php if(!empty($records)): ?>
            <?php foreach($records as $key => $record): ?>
                <tr>
                    <td><?= $key+1; ?></td>
                    <td><?= $record['name']; ?></td>
                    <td><?= $record['category']; ?></td>
                    <td><?= $record['quantity']; ?></td>
                    <td><?= $record['price']; ?></td>
                    <td>#</td>
                    <td><?= $record['expiry']; ?></td>
                </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
        </table>
        </div>
        </div>
    </div>
    <!-- <script>
        let form = document.querySelector('form');
        form.addEventListener('submit', (e) => {
            e.preventDefault();
        })
    </script> -->

    <script src="../scripts/menu.js"></script>

</body>
</html>