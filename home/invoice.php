<?php
include "../includes/database.php";
if($_SERVER['REQUEST_METHOD']=="POST") {
    $customer = $_POST['customer'];
    $medicineName = $_POST['medicine'];
    $quantity = $_POST['quantity'];
    $rate = $_POST['rate'];
    $total = $quantity*$rate;
    $date = $_POST['date'];

    // Insert the invoice only if the medicine is available in the medicine table 
    // check the quantity

    if(1){

    }

// deleting medicine entry from the medicine table after issuing an invoice

$medicines = select($conn, 'medicine');

if(isset($_POST['submit'])) {
foreach ($medicines as $medicine) {
    if(str_contains($medicine['name'], $medicineName)) {
        if($medicine['quantity']>=$quantity) {
            $sql = "insert into invoice (customer_name, medicine_name, quantity, rate, total, date) 
            values (?,?,?,?,?,?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, 'ssssss', $customer, $medicineName, $quantity, $rate, $total, $date);
            mysqli_stmt_execute($stmt);

            $remQuan = $medicine['quantity']-$quantity;
            $sql = "update medicine set quantity = '$remQuan' where name = '$medicineName'";
            mysqli_query($conn, $sql);

            if($medicine['quantity']==0) {
                $sql = "delete from medicine where name = '$medicineName'";
                mysqli_query($conn, $sql);
            }
        }
    }
    else {
        $message = "No medicine found";
    }
}
}
}

$records = select($conn, 'invoice');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="stylesheet" href="../styles/others.css">
</head>

<body>
<div class="container">
<?php include '../includes/nav.php'; ?>
<div class="main">
        <?php include '../includes/menu.php'; ?>
        <div class="content-wrapper">
            <div class="entries"> 
                <form action="" method="POST">
                    <h2>Create new invoice</h2>
                    
                    <label for="customer">Customer Name:</label>
                    <input type="text" name="customer" id="customer">
                    <label for="medicine">Medicine:</label>
                    <input type="text" name="medicine" id="medicine">
                    <label for="quantity">Qty:</label>
                    <input type="number" name="quantity" id="quantity">
                    <label for="rate">Rate:</label>
                    <input type="number" name="rate" id="rate">
                    <label for="total">Total:</label>
                    <input type="number" name="total" id="total">
                    <label for="date">Date:</label>
                    <input type="date" name="date" id="date">
                    <input type="submit" name="submit" id="submit" value="Submit">        
                </form>
            </div>

    <div class="records">
        <h3>Invoice History</h3>
        <table>
            <tr>
                <th>S.N.</th>
                <th>Customer Name</th>
                <th>Medicine</th>
                <th>Quantity</th>
                <th>Rate</th>
                <th>Total</th>
                <th>Date</th>
            </tr>
            <?php if(!empty($records)): ?>
                <?php foreach($records as $record): ?>
                    <tr>
                <td><?= $record['id']; ?></td>
                <td><?= $record['customer_name']; ?></td>
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
        </div>
    </div>
    </div>
<script src="../scripts/invoice.js"></script>
<script src="../scripts/home.js"></script>

</body>

</html>