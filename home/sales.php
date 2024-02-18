<?php
include "../includes/database.php";
$sql = "select * from invoice";
$result = mysqli_query($conn, $sql);
if($result) {
    $records = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
            <li>My information</li>
            <li>Settings</li>
            <li>Change Password</li>
            <li>Log out<button id="logout-btn" onclick="window.location.href='../login/login.php'"><img src="../images/logout.png" alt="logout"></button></li>
        </ul>
    </div>
</nav>

<!-- interface -->

<!-- left navigation panel -->

<div class="menu">
    <button id="menu-btn"><img src="../images/menu.png" alt="menu" style="width: 36px;"></button>
    <ul id="menu-list">
        <li><a href="#">Dashboard</a></li>
        <li><a href="purchase.php">Purchase</a></li>
        <li><a href="invoice.php">Invoice</a></li>
        <li><a href="sales.php">Sales</a></li>
        <li><a href="inventory.php">Medicines</a></li>
        <li><a href="customers.php">Customers</a></li>
        <li><a href="vendor.php">Vendors</a></li>
    </ul>
</div>

    <div class="wrapper">
        <h2>Sales</h2>
        <table>
            <tr>
                <th>S.N.</th>
                <th>Medicine Name</th>
                <th>Quantity</th>
                <th>Rate</th>
                <th>Total</th>
                <th>Date</th>
            </tr>
            <tr>
                <?php if(!empty($records)): ?>
                <?php foreach($records as $record): ?>
                <td><?= $record['id']; ?></td>
                <td><?= $record['medicine_name']; ?></td>
                <td><?= $record['quantity']; ?></td>
                <td><?= $record['rate']; ?></td>
                <td><?= $record['total']; ?></td>
                <td><?= $record['date']; ?></td>
                <?php endforeach; ?>
                <?php endif; ?>
            </tr>
        </table>
    </div>

    <script src="../scripts/home.js"></script>

</body>
</html>