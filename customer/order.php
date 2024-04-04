<?php
include "../includes/database.php";
$customer = $_GET['name'];

session_start();
$order_no = $_SESSION['order-no'];

    if($_SERVER['REQUEST_METHOD']=="POST") {
        if(isset($_POST['add'])) {
            $medicine = $_POST['medicine'];
            $quantity = $_POST['quantity'];

            $sql = "INSERT INTO receipt (order_no, customer_name, medicine_name, quantity, date)
            VALUES (?,?,?,?, CURRENT_DATE())";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, 'ssss', $order_no, $customer, $medicine, $quantity);
            mysqli_stmt_execute($stmt);

            $records = select($conn, 'receipt');
        }
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
        <div class="main">
            <div class="entries">
                <form action="" method="post">
                    <input type="text" id="medicine-name" name="medicine" placeholder="medicine name">
                    <input type="text" id="quantity" name="quantity" placeholder="quantity">
                    <input type="submit" value="add" name="add" id="add-btn">
                    <input type="submit" name="submit" value="Submit">
                </form>
            </div>

            <div class="records">
                <table class="table">
                    <tr>
                    <th>S.N</th>
                    <th>Medicines</th>
                    <th>Quantity</th>
                    <th>Modify</th>
                    </tr>
                    <?php if(!empty($records)): ?>
                    <?php foreach($records as $record => $val): ?>
                        <form action="" method="post">
                        <tr>
                            <td><?= $record+1; ?></td>
                            <td><?= $val['medicine_name']; ?></td>
                            <td><?= $val['quantity']; ?></td>
                            <td><input type="checkbox" name="check" id="check"></td>
                        </tr>
                        </form>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </table>
            </div>
        </div>
    </div>

</body>
</html>