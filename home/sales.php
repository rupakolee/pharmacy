<?php
include "../includes/database.php";

$sql = "select * from invoice inner join medicine on invoice.medicine_id = medicine.medicine_id order by selling_date DESC";
$result = mysqli_query($conn, $sql);
$records = mysqli_fetch_all($result, MYSQLI_ASSOC);session_start();

include '../includes/expired.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>

<div class="container">
<?php include '../includes/nav.php'; ?>
<div class="main">
    <?php include '../includes/menu.php'; ?>
    <div class="content-wrapper">
        <div class="records sales">
        <h2>Sales</h2>
        <table class="table">
            <tr>
                <th>S.N.</th>
                <th>Medicine Name</th>
                <th>Quantity</th>
                <th>Rate</th>
                <th>Total</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            <?php if(!empty($records)): ?>
                <?php foreach($records as $key => $record): ?>
                    <tr>
                        <td><?= $key+1; ?></td>
                        <td><?= $record['name']; ?></td>
                        <td><?= $record['selling_quantity']; ?></td>
                        <td><?= $record['selling_rate']; ?></td>
                        <td><?= $record['selling_total']; ?></td>
                        <td><?= $record['selling_date']; ?></td>
                        <td><a href="../includes/delete.php?id=<?= $record['invoice_id']; ?>&location=sales&table=invoice"><img src="../images/delete-icon.png" alt="delete" style="width: 14px;" class="action-btn"></a></td>
                    </tr>
                <?php endforeach; ?>
                <?php endif; ?>
        </table>
        </div>
    </div>
</div>
    <script src="../scripts/menu.js"></script>
    
</body>
</html>