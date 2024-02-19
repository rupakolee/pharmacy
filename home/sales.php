<?php
include "../includes/database.php";
$records = select($conn, 'invoice');

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

<?php include '../includes/menu.php'; ?>

    <div class="wrapper">
        <h2>Sales</h2>
        <table>
            <tr>
                <th>S.N.</th>
                <th>Medicine Name</th>
                <th>Quantity</th>
                <th>Rate</th>
                <th>Total</th>
                <th>Date</th>
            </tr>
            <?php if(!empty($records)): ?>
                <?php foreach($records as $record): ?>
                    <tr>
                <td><?= $record['id']; ?></td>
                <td><?= $record['medicine_name']; ?></td>
                <td><?= $record['quantity']; ?></td>
                <td><?= $record['rate']; ?></td>
                <td><?= $record['total']; ?></td>
                <td><?= $record['date']; ?></td>
                    </tr>
                <?php endforeach; ?>
                <?php endif; ?>
        </table>
    </div>

    <script src="../scripts/home.js"></script>

</body>
</html>