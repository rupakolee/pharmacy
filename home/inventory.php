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
    <title>Inventory</title>
    <link rel="stylesheet" href="../styles/others.css">

</head>
<body>

<div class="container">

<?php include '../includes/nav.php'; ?>
<div class="main">
    <?php include '../includes/menu.php'; ?>
    <div class="content-wrapper">
        <div class="records">
        <h2 style="text-align: center;">Inventory</h2>
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
                    <td><?= $record['date']; ?></td>
                    <?php if($record['expiry']<$record['date']) {
                        $status = "Expired";
                    }
                    else {
                        $one = date_create($record['expiry']);
                        $two = date_create($record['date']);
                        $diff = date_diff($one, $two);  
                        $status = $diff->format("%a days to go");
                    } ?>
                    <td><?= $status; ?></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
        </table>
        </div>
    </div>
</div>
</div>
    <script src="../scripts/home.js"></script>

</body>
</html>