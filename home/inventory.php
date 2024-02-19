<?php
    include '../includes/database.php';
    $records = select($conn, 'medicine');
    $status = '';
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
            <?php if(!empty($records)): ?>
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