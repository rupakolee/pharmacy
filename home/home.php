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
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
    <div class="container">

  <!-- creating nav menu  -->
        
  <nav id="navbar">
            <a href="home.php"><img src="../images/logo.png" alt="logo" style="width: 60px;"></a>

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
            <?php include "../includes/menu.php"; ?>

            <!-- dashboard -->

            <div class="dashboard">
                <h2>Dashboard</h2>
                <div class="grid">
                    <div class="linear-box">
                        <div class="box">Total Customer</div>
                        <div class="box">Medicines Expired</div>
                        <div class="box">Total Invoice</div>
                        <div class="box">No. of Vendors</div>
                        <div class="box">Total medicine</div>
                        <div class="box">Out of stock</div>
                    </div>
                        <div class="sales-table">
                            <p>Today's Report</p>
                            <table class="table">
                                <tr>
                                    <th>Total Sales</th>
                                    <td>23</td>
                                </tr>
                                <tr>
                                    <th>Total Purchase</th>
                                    <td>43</td>
                                </tr>
                            </table>
                        </div>
                    </div><hr>
                    <div class="tabs">
                        <div class="tab-boxes">Create new Invoice</div>
                        <div class="tab-boxes">Add Medicines</div>
                        <div class="tab-boxes">Add Customer</div>
                        <div class="tab-boxes">Add Vendor</div>
                    </div><hr>
                </div>
                
                <!-- mails and notifications -->
                <div class="inbox">
                    
                </div>
            </div>
        </div>

    <script src="../scripts/menu.js"></script>
    <script>
        let boxes = document.querySelectorAll('.tab-boxes');
        boxes[0].style.backgroundColor = "#37b1aa";
        boxes[1].style.backgroundColor = "#7e57cf";
        boxes[2].style.backgroundColor = "#fac76e";
        boxes[3].style.backgroundColor = "#f1958f";
    </script>

</body>

</html>