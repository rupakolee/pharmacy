<?php
    include '../includes/database.php';
    $error=0;
    $records = [];
    $status = "";
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
        <h2>Inventory</h2>
        <table>
            <tr>
                <th>S.N.</th>
                <th>Name</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Purchase Date</th>
                <th>Status</th>
            </tr>
            <?php if($error=='0'): ?>
            <?php foreach($records as $record): ?>
                <tr>
                    <td><?= $record['id']; ?></td>
                    <td><?= $record['name']; ?></td>
                    <td><?= $record['category']; ?></td>
                    <td><?= $record['quantity']; ?></td>
                    <td><?= $record['price']; ?></td>
                    <td>N/A</td>
                    <td><?= $status; ?></td>
                </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
        </table>
    </div>


    <script src="../scripts/home.js"></script>

</body>
</html>