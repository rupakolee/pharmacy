<?php
include '../includes/database.php';
session_start();
$pharmacyName = $_SESSION['pharmacyName'];
$phone = $_SESSION['phone'];
$address = $_SESSION['address'];

$query = "SELECT * FROM invoice WHERE invoice_no =".$_GET['invoice_no'];
$result = mysqli_query($conn, $query);
$records = mysqli_fetch_all($result, MYSQLI_ASSOC);
$count = 0;

$sumQuery = "SELECT SUM(total) from invoice WHERE invoice_no =".$_GET['invoice_no'];
$result = mysqli_query($conn, $sumQuery);
$totalAmount = mysqli_fetch_array($result);
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
                <span class="date">Date: <?= $records[0]['date']; ?></span> 
                <span class="customer-name">Invoice No: <?= $records[0]['invoice_no']; ?></span><br>
                <span class="customer-name">Name: <?= $records[0]['customer_name']; ?></span><br>
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
                    <?php foreach($records as $record): ?>
                        <tr>                        
                            <td><?= $count+1; ?></td>
                            <td><?= $record['medicine_name']; ?></td>
                            <td><?= $record['quantity']; ?></td>
                            <td><?= $record['rate']; ?></td>
                            <td><?= $record['total']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    <tr>
                        <td colspan="4">TOTAL</td>
                        <td><?= $totalAmount[0]; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>