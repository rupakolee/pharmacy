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
                        <div class="sales-chart">
                            <h3>Today's Report</h3>
                            <div class="chart-container">
                                <canvas class="my-chart"></canvas>
                            </div>
                            
                        </div>
                    </div><hr>
                    <div class="tabs">
                        <a href="invoice.php"><div class="tab-boxes"><img src="../images/add-invoice.png" alt="">Create new Invoice</div></a>
                        <a href="purchase.php"><div class="tab-boxes"><img src="../images/add-medicine.png" alt="">Add Medicines</div></a>
                        <a href="customers.php"><div class="tab-boxes"><img src="../images/add-customer.png" alt="">Add Customer</div></a>
                        <a href="supplier.php"><div class="tab-boxes"><img src="../images/add-supplier.png" alt="">Add Vendor</div></a>
                    </div><hr>
                </div>
                
                <!-- mails and notifications -->
                <div class="inbox">
                    
                </div>
            </div>
        </div>

        <?php
            $count1 = "SELECT * from medicine";
            $count2 = "SELECT * from invoice";
            $count3 = "SELECT * from vendor";

            $purchaseCount =mysqli_num_rows(mysqli_query($conn, $count1));
            $salesCount =mysqli_num_rows(mysqli_query($conn, $count2));
            $supplierCount =mysqli_num_rows(mysqli_query($conn, $count3));
        ?>
        
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../scripts/menu.js"></script>
    <!-- <script src="../scripts/chart.js"></script> -->
    <script>
        let boxes = document.querySelectorAll('.tab-boxes');
        boxes[0].style.backgroundColor = "#37b1aa";
        boxes[1].style.backgroundColor = "#7e57cf";
        boxes[2].style.backgroundColor = "#fac76e";
        boxes[3].style.backgroundColor = "#f1958f";

        const myChart = document.querySelector('.my-chart');
const chartData = {
    labels: ["Purchases", "Sales", "Suppliers"],
    data: [<?= $purchaseCount; ?>, <?= $salesCount; ?>, <?= $supplierCount; ?>],
};


new Chart(myChart, {
    type: "doughnut",
    data: {
        labels: chartData.labels,
        datasets: [
            {
                label: "Count",
                data: chartData.data,
            }
        ]
    }
});

    </script>

</body>

</html>