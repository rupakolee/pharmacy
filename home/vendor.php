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
                <li><a href="../menu/profile.php">My information</a></li>
                <li><a href="../menu/settings.php">Settings</a></li>
                <li><a href="../menu/password.php">Change Password</a></li>
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
        <h2>Vendor</h2>
        <form action="" method="post">
            <label for="name">Name</label>
            <input type="text" name="name" id="name"><br>
            <label for="address">Address</label>
            <input type="text" name="address" id="address"><br>
            <label for="contact">Contact</label>
            <input type="text" name="contact" id="contact"><br>
            <input type="submit" name="submit" value="Submit">
        </form>

        <table>
            <tr>
                <th>S.N.</th>
                <th>Name</th>
                <th>Address</th>
                <th>Contact</th>
            </tr>
        </table>
    </div>

    <script src="../scripts/home.js"></script>

</body>
</html>