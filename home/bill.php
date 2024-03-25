<?php
include '../includes/database.php';
session_start();
$pharmacyName = $_SESSION['pharmacyName'];
$phone = $_SESSION['phone'];
$address = $_SESSION['address'];

$query = "SELECT * FROM invoice WHERE id =".$_GET['id'];
$result = mysqli_query($conn, $query);
$record = mysqli_fetch_array($result);
$count = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>  
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <div class="invoice-container">
        <div class="pharmacy-info">
            <h2><?php echo $pharmacyName; ?></h2><br>
            <i><?php echo $address; ?></i><br>
            <?php echo $phone; ?>
        </div><hr>
        <div class="invoice-info">
            <div class="customer-info">
                <span class="date">Date: <?= $record['date']; ?></span> 
                <span class="customer-name">Invoice No: <?= $record['invoice_no']; ?></span><br>
                <span class="customer-name">Name: <?= $record['customer_name']; ?></span><br>
            </div><br>
            <div class="medicine-info">
                <table class="bill-table">
                    <tr>
                        <th>S.N</th>
                        <th>Name</th>
                        <th>Qty</th>
                        <th>Rate</th>
                        <th>Amount</th>
                    </tr>
                    <tr>
                        <td><?= $count+1; ?></td>
                        <td><?= $record['medicine_name']; ?></td>
                        <td><?= $record['quantity']; ?></td>
                        <td><?= $record['rate']; ?></td>
                        <td><?= $record['total']; ?></td>
                    </tr>
                    <tr>
                        <td colspan="4">TOTAL</td>
                        <td>Amount</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>