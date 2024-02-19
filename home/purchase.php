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
            $sql = "INSERT INTO medicine (name, category, quantity, price, date) VALUES (?,?,?,?,?)";
            $stmt = mysqli_prepare($conn, $sql); 
            mysqli_stmt_bind_param($stmt, "sssss", $name, $category, $quantity, $price, $date);
            if(mysqli_stmt_execute($stmt)){
                $message = "Entry added successfully!";
            }
        }
    }

    $records = select($conn, 'medicine');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/home.css">
</head>
<body>

<div class="container">

<?php include '../includes/menu.php'; ?>

    <div class="wrapper">
        <div class="purchase">
            <h2>Purchases</h2>
            <form action="" method="post">
                <h3>Add items</h3>
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

        <div class="purchase-list">
        <table>
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
            <?php foreach($records as $record): ?>
                <tr>
                    <td><?= $record['id']; ?></td>
                    <td><?= $record['name']; ?></td>
                    <td><?= $record['category']; ?></td>
                    <td><?= $record['quantity']; ?></td>
                    <td><?= $record['price']; ?></td>
                    <td>#</td>
                    <td><?= $record['date']; ?></td>
                </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
        </table>
        </div>
    </div>
    <!-- <script>
        let form = document.querySelector('form');
        form.addEventListener('submit', (e) => {
            e.preventDefault();
        })
    </script> -->

    <script src="../scripts/home.js"></script>

</body>
</html>