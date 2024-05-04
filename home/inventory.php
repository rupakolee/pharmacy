<?php
include '../includes/database.php';

$records = select($conn, 'medicine');
$status = '';

session_start();

include '../includes/expired.php';
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
            <div class="records">
                    <h2>Inventory</h2>
                    <form action="" method="post" class="search">
                        <input type="search" name="search">
                        <input type="submit" name="submit" value="Search">
                    </form>
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
                        
                    <?php
                        if(isset($_POST['submit'])) {
                            $searchStr = $_POST['search'];

                            $sql = "SELECT * from medicine where name = '$searchStr'";
                            $result = mysqli_query($conn, $sql);
                            $searchRecords = mysqli_fetch_all($result, MYSQLI_ASSOC);                  
                        }
                    ?>

                    <?php if(isset($_POST['submit'])): ?>
                        <?php if(!empty($searchRecords)): ?>
                            <?php foreach ($searchRecords as $key => $record) : ?>
                               
                                <tr>
                                    <td><?= $key+1; ?></td>
                                    <td><?= $record['name']; ?></td>
                                    <td><?= $record['category']; ?></td>
                                    <td><?= $record['medicine_quantity']; ?></td>
                                    <td><?= $record['medicine_price']; ?></td>
                                    <td><?= $record['purchase_date']; ?></td>
                                    <?php if ($record['expiry']) {                                    
                                        $one = date_create($record['expiry']);
                                        $two = date_create(date("Y-m-d"));
                                        $diff = date_diff($one, $two);
                                        $status = $diff->format("%a days to go");
                                        $dateInt = (int)$diff->format("%R%a");
                                        if($dateInt>=0) {
                                            $status = "Expired!";
                                        }
                                      } ?>
                                    <td><?= $status; ?></td>
                                    <td><a href="../includes/delete.php?id=<?= $record['medicine_id']; ?>&location=inventory&table=medicine"><img src="../images/delete-icon.png" alt="delete" style="width: 14px;" class="action-btn"></a></td>
                                </tr>
                                <?php endforeach; ?>
                                    <?php endif; ?>

                                    <?php else: ?>

                        <?php if (!empty($records)) : ?>
                            <?php foreach ($records as $key => $record) : ?>
                               
                                <tr>
                                    <td><?= $key+1; ?></td>
                                    <td><?= $record['name']; ?></td>
                                    <td><?= $record['category']; ?></td>
                                    <td><?= $record['medicine_quantity']; ?></td>
                                    <td><?= $record['medicine_price']; ?></td>
                                    <td><?= $record['purchase_date']; ?></td>
                                    <?php if ($record['expiry']) {                                    
                                        $one = date_create($record['expiry']);
                                        $two = date_create(date("Y-m-d"));
                                        $diff = date_diff($one, $two);
                                        $status = $diff->format("%a days to go");
                                        $dateInt = (int)$diff->format("%R%a");
                                        if($dateInt>=0) {
                                            $status = "Expired!";
                                        }
                                      } ?>
                                    <td><?= $status; ?></td>
                                    <td><a href="../includes/delete.php?id=<?= $record['medicine_id']; ?>&location=inventory&table=medicine"><img src="../images/delete-icon.png" alt="delete" style="width: 14px;" class="action-btn"></a></td>
                                </tr>
                                <?php endforeach; ?>
                                    <?php endif; ?>
                                    <?php endif; ?>

                    </table>
            </div>
            </div>
        </div>
    </div>
    <script src="../scripts/menu.js"></script>

</body>

</html>