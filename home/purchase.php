<?php
    include '../includes/database.php';
    
    $error = 0;
    $records = [];
    if($_SERVER['REQUEST_METHOD']=="POST") {
        $name = $_POST['name'];
        $category = $_POST['category'];
        $vendor = $_POST['vendor'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $date = $_POST['date'];
        $total = $quantity*$price;

        if($category == " ") {
            $error = 1;
            $errMsg = "Select a category";
        }
        if($vendor == " ") {
            $error = 2;
            $errMsg = "Select a Supplier";
        }
        if($price<1) {
            $error = 3;
            $errMsg = "Price must be greater than 0";
        }
        if($quantity<1) {
            $error = 4;
            $errMsg = "Quantity must be greater than 0";
        }
        if(isset($_POST['submit'])) {
            $sql = "INSERT INTO medicine (name, category, quantity, price, total, expiry, date) VALUES (?,?,?,?,?,?, CURRENT_DATE())";
            $stmt = mysqli_prepare($conn, $sql); 
            mysqli_stmt_bind_param($stmt, "ssssss", $name, $category, $quantity, $price, $total, $date);
            if(mysqli_stmt_execute($stmt)){
                $message = "Entry added successfully!";
            }
        }
    }

    $records = descSelect($conn, 'medicine', 'id');
    $suppliers = select($conn, "vendor");
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
                <div class="input-fields">
                    <div class="inputs">
                        <label for="name">Medicine Name:</label><br>
                        <input type="text" name="name" id="name" required><br>
                    </div>
                    <div class="inputs">
                        <label for="rate">Rate:</label><br>
                        <?php if($error == 3) {
                            echo "<span>{$errMsg}</span><br>";
                        } ?>
                        <input type="number" name="price" id="rate" required><br>
                    </div>
                    <div class="inputs">
                        <label for="quantity">Quantity:</label><br>
                        <?php if($error == 4) {
                            echo "<span>{$errMsg}</span><br>";
                        } ?>
                        <input type="number" name="quantity" id="quantity" required><br>
                    </div>
                </div>
                <div class="input-fields">
                    
                    <div class="inputs">
                        <label for="category">Category</label><br>
                        <?php if($error == 1) {
                            echo "<span>{$errMsg}</span>";
                        } ?>
                        <select name="category" id="category" required>
                            <option value=" "> </option>
                            <option value="Tablet">Tablet</option>
                            <option value="Syrup">Syrup</option>
                        </select><br>
                    </div>
                    <div class="inputs alter">
                        <label for="vendor">Supplier</label><br>
                        <?php if($error == 2) {
                            echo "<span>{$errMsg}</span>";
                        } ?>
                        <select name="vendor" id="vendor" required>
                            <option value=" "> </option>
                            <?php if(!empty($suppliers)): ?>
                                <?php foreach($suppliers as $supplier): ?>
                                    <option value="<?= $supplier['name']; ?>"><?= $supplier['name']; ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select><br>
                    </div>
                    <div class="inputs alter">
                        <label for="date">Expiry Date:</label><br>
                        <input type="date" name="date" id="date" required>
                    </div>
            </div>
                <input type="submit" value="Submit" name="submit">
            </form>
        </div><hr>

        <div class="records">
            <h3>Recent Purchase:</h3>
        <table class="table">
            <tr>
                <th>S.N.</th>
                <th>Name</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Rate</th>
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