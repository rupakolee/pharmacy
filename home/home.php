<?php
include "../includes/database.php";
$sql = "SELECT * FROM register";
$result = mysqli_query($conn, $sql);

if ($result == false) {
    mysqli_connect_error();
} else {
    $details = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../styles/home.css">
</head>

<body>
    <div class="container">

        <!-- creating nav menu  -->
        
        <nav id="navbar">
            <img src="../images/logo.png" alt="logo" style="width: 80px;">

            <div class="user-info">
                <span>Welcome, <span id="user" style="font-style: italic; font-weight: 700;"><?= $details['fullName']; ?></span></span>
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

        <div class="main">

            <!-- dashboard -->

            <div class="dashboard">
                <h3>Total sales</h3>
            </div>

            <!-- mails and notifications -->
            <div class="inbox">

            </div>
        </div>

    </div>

    <script src="../scripts/home.js"></script>

</body>

</html>