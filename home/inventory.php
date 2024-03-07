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
    <link rel="stylesheet" href="../styles/style.css">

</head>

<body>

    <div class="container">

        <?php include '../includes/nav.php'; ?>
        <div class="main">
            <?php include '../includes/menu.php'; ?>
            <div class="content-wrapper">
                <h2 style="text-align: center;">Inventory</h2>
                <div class="records">
                    <table class="table">
                        <tr>
                            <th>S.N.</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Purchase Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        <?php if (!empty($records)) : ?>
                            <?php foreach ($records as $key => $record) : ?>
                                <tr>
                                    <td><?= $key+1; ?></td>
                                    <td><?= $record['name']; ?></td>
                                    <td><?= $record['category']; ?></td>
                                    <td><?= $record['quantity']; ?></td>
                                    <td><?= $record['price']; ?></td>
                                    <td><?= $record['date']; ?></td>
                                    <?php if ($record['expiry'] < $record['date']) {
                                        $status = "Expired";
                                    } else {
                                        $one = date_create($record['expiry']);
                                        $two = date_create(date("Y-m-d"));
                                        $diff = date_diff($one, $two);
                                        $status = $diff->format("%a days to go");
                                    } ?>
                                    <td><?= $status; ?></td>
                                    <td><a href="../includes/edit.php?id=<?= $record['id']; ?>"><img src="../images/edit-icon.png" alt="edit" style="width: 15px;" class="action-btn"></a><a href="../includes/delete.php?id= <?= $record['id']; ?>"><img src="../images/delete-icon.png" alt="delete" style="width: 14px;" class="action-btn"></a></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="../scripts/menu.js"></script>

</body>

</html>