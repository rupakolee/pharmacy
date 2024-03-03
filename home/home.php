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
            <a href="home.php"><img src="../images/logo.png" alt="logo" style="width: 76px;"></a>

            <div class="user-info">
                <span>Welcome, <span id="user" style="font-style: italic; font-weight: 700;"><?= $details['fullName']; ?></span></span>
                <button id="user-btn"><img src="../images/user.png" alt=""></button>
                <ul class="user-panel">
                <li><a href="../menu/profile.php">My information</a></li>
                <li><a href="../menu/settings.php">Settings</a></li>
                <li><a href="../menu/password.php">Change Password</a></li>
                    <li>Log out<button id="logout-btn" onclick="window.location.href='../login/login.php'"><img src="../images/logout.png" alt="logout"></button></li>
                </ul>
            </div>
        </nav>

        <hr style="color: #fff;">
        <!-- interface -->

        <!-- left navigation panel -->

        
        <div class="main">
            
            <div class="menu">
                <div id="menu-btn">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </div>
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
            <!-- dashboard -->

            <div class="dashboard">
                <h2>Dashboard</h2>
                <div class="grid">
                    <div class="box">Total Customer</div>
                    <div class="box">Medicines Expired</div>
                    <div class="box">Total Invoice</div>
                    <div class="box">No. of Vendors</div>
                    <div class="sales-panel">Total Sales</div>
                </div>
                
                <!-- mails and notifications -->
                <div class="inbox">
                    
                </div>
            </div>
        </div>

    </div>

    <script src="../scripts/home.js"></script>

</body>

</html>