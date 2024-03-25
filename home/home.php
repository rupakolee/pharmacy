<?php
include "../includes/database.php";
$sql = "SELECT * FROM register";
$result = mysqli_query($conn, $sql);

if ($result == false) {
    mysqli_connect_error();
} else {
    $details = mysqli_fetch_assoc($result);
}

session_start();
$_SESSION['pharmacyName'] = $details['pharmacyName'];
$_SESSION['phone'] = $details['phone'];
$_SESSION['address'] = $details['address'];

$count1 = "SELECT SUM(total) from medicine where date = CURRENT_DATE()";
$count2 = "SELECT SUM(total) from invoice where date = CURRENT_DATE()";
     
$purchaseCount = mysqli_fetch_array(mysqli_query($conn, $count1));
$salesCount = mysqli_fetch_array(mysqli_query($conn, $count2));

$customerCountQuery = "SELECT COUNT(id) from customer";
$customerCount = mysqli_fetch_array(mysqli_query($conn, $customerCountQuery));

$expmedCountQuery = "SELECT COUNT(id) from medicine where expiry < date";
$expmedCount = mysqli_fetch_array(mysqli_query($conn, $expmedCountQuery));

$invoiceCountQuery = "SELECT COUNT(id) from invoice";
$invoiceCount = mysqli_fetch_array(mysqli_query($conn, $invoiceCountQuery));

$supplierCountQuery = "SELECT COUNT(id) from vendor";
$supplierCount = mysqli_fetch_array(mysqli_query($conn, $supplierCountQuery));

$medCountQuery = "SELECT COUNT(id) from medicine";
$medCount = mysqli_fetch_array(mysqli_query($conn, $medCountQuery));
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
                        <div class="box">Total Customer<br><br><?= $customerCount[0]; ?></div>
                        <div class="box">Medicines Expired<br><br><?= $expmedCount[0]; ?></div>
                        <div class="box">Total Invoice<br><br><?= $invoiceCount[0]; ?></div>
                        <div class="box">No. of Suppliers<br><br><?= $supplierCount[0]; ?></div>
                        <div class="box">Total medicine<br><br><?= $medCount[0]; ?></div>
                        <div class="box">Out of stock<br><br><?= "NaN" ?></div>
                    </div>
                        <div class="sales-chart">
                            <h3>Today's Report</h3>
                            <div class="chart-container">
                                <?php if(empty($purchaseCount[0]) && empty($salesCount[0])): ?>
                                  <?= "<h3 style='text-align: center;'>No records found!</h3>"; ?>
                                  <?php else: ?>
                                <canvas class="my-chart"></canvas>
                                <?php endif; ?>
                            </div>
                            
                        </div>
                    </div><hr>
                    <div class="tabs">
                        <a href="invoice.php"><div class="tab-boxes"><img src="../images/add-invoice.png" alt="">Create new Invoice</div></a>
                        <a href="purchase.php"><div class="tab-boxes"><img src="../images/add-medicine.png" alt="">Add Medicines</div></a>
                        <a href="customers.php"><div class="tab-boxes"><img src="../images/add-customer.png" alt="">Add Customer</div></a>
                        <a href="supplier.php"><div class="tab-boxes"><img src="../images/add-supplier.png" alt="">Add Supplier</div></a>
                    </div><hr>
                </div>
                
                <!-- mails and notifications -->
                <div class="inbox">
                    
                </div>
            </div>
        </div>
        
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../scripts/menu.js"></script>
    <!-- <script src="../scripts/chart.js"></script> -->
    <script>
        let boxes = document.querySelectorAll('.tab-boxes');
        boxes[0].style.backgroundColor = "#37b1aa";
        boxes[1].style.backgroundColor = "#7e57cf";
        boxes[2].style.backgroundColor = "#fac76e";
        boxes[3].style.backgroundColor = "#f1958f";

        <?php if(!empty($salesCount) || !empty($purchaseCount)): ?>
          
        const myChart = document.querySelector('.my-chart');
        const chartData = {
            labels: ["Purchases", "Sales"],
            data: [<?= $purchaseCount[0]; ?>, <?= $salesCount[0]; ?>],
        };

        <?php endif; ?>
        

new Chart(myChart, {
    type: "doughnut",
    data: {
        labels: chartData.labels,
        datasets: [
            {
                label: "Amount",
                data: chartData.data,
            }
        ]
    }
});

    </script>

</body>

</html>