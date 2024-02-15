<?php
    include '../includes/database.php';
    $error=0;
    $records = [];
    $status = "";
    $sql = "select * from medicine";
    $result = mysqli_query($conn, $sql);
    
    if($result) {
        $error = 0;
        $records = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    else {
        $error = 1;
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
            <?php if($error=='0'): ?>
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
</body>
</html>