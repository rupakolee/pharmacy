<?php
include "../includes/database.php";
$sql = "select * from invoice";
$result = mysqli_query($conn, $sql);
if($result) {
    $records = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
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
            <tr>
                <?php if(!empty($records)): ?>
                <?php foreach($records as $record): ?>
                <td><?= $record['id']; ?></td>
                <td><?= $record['name']; ?></td>
                <td><?= $record['quantity']; ?></td>
                <td><?= $record['rate']; ?></td>
                <td><?= $record['total']; ?></td>
                <td><?= $record['date']; ?></td>
                <?php endforeach; ?>
                <?php endif; ?>
            </tr>
        </table>
    </div>
</body>
</html>