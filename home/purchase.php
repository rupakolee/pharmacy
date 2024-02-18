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

        // display records

        $sql = "select * from medicine";
        $result = mysqli_query($conn, $sql);

        if($result) {
            $error = 0;
            $records = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        else {
            $error = 1;
        }
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

<!-- creating nav menu  -->

<nav id="navbar">
<a href="home.php"><img src="../images/logo.png" alt="logo" style="width: 80px;"></a>

    <div class="user-info">
        <button id="user-btn"><img src="../images/user.png" alt=""></button>
        <ul class="user-panel">
            <li><a href="profile.php">My information</a></li>
            <li><a href="settings.php">Settings</a></li>
            <li><a href="password.php">Change Password</a></li>
            <li>Log out<button id="logout-btn" onclick="window.location.href='../login/login.php'"><img src="../images/logout.png" alt="logout"></button></li>
        </ul>
    </div>
</nav>

<!-- interface -->

<!-- left navigation panel -->

<div class="menu">
    <button id="menu-btn"><img src="../images/menu.png" alt="menu" style="width: 36px;"></button>
    <ul id="menu-list">
        <li><a href="home.php">Dashboard</a></li>
        <li><a href="purchase.php">Purchase</a></li>
        <li><a href="invoice.php">Invoice</a></li>
        <li><a href="sales.php">Sales</a></li>
        <li><a href="inventory.php">Medicines</a></li>
        <li><a href="customers.php">Customers</a></li>
        <li><a href="vendor.php">Vendors</a></li>
    </ul>
</div>

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
                </select><br>
                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" id="quantity">
                <label for="rate">Rate:</label>
                <input type="number" name="price" id="rate">
                <label for="vendor">Vendor</label>
                <input type="text" name="vendor" id="vendor">
                <label for="date">Expiry Date:</label>
                <input type="date" name="date" id="date"><br>
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
            <?php if($error=='0'): ?>
            <?php foreach($records as $record): ?>
                <tr>
                    <td><?= $record['id']; ?></td>
                    <td><?= $record['name']; ?></td>
                    <td><?= $record['quantity']; ?></td>
                    <td><?= $record['category']; ?></td>
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