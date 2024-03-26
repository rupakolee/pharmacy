<?php
include "../includes/database.php";
$error=0;

session_start();
$customerName = $_SESSION['customer-name'];
$invoiceNo =  $_SESSION['invoice-no'];

if($_SERVER['REQUEST_METHOD']=="POST") {
    $medicineName = $_POST['medicine'];
    $quantity = $_POST['quantity'];
    $rate = $_POST['rate'];
    $total = $quantity*$rate;

// deleting medicine entry from the medicine table after issuing an invoice

$medicines = select($conn, 'medicine');

if(isset($_POST['add'])) {
foreach ($medicines as $medicine) {
    if(str_contains($medicine['name'], $medicineName)) {
        if($medicine['quantity']>=$quantity) {
            $category = $medicine['category'];
            $expiry = $medicine['expiry'];
            $date = $medicine['date'];
            $sql = "insert into billing (id, customer_name, medicine_name, category, qty, rate, total, expiry, date) 
            values (?,?,?,?,?,?,?,?,?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, 'sssssssss', $medicine['id'], $customerName, $medicineName, $category, $quantity, $rate, $total, $expiry, $date);
            mysqli_stmt_execute($stmt);

            $remQuan = $medicine['quantity']-$quantity;
            $sql = "update medicine set quantity = '$remQuan' where name = '$medicineName'";
            mysqli_query($conn, $sql);

        }
        if($medicine['quantity']==0) {
            $sql = "DELETE FROM medicine where name = '$medicineName'";
            mysqli_query($conn, $sql);
        }
    }
}
}

$records = descSelect($conn, 'billing', 'id');

if(isset($_POST['submit'])) {
    $records = select($conn, 'billing');
    foreach ($records as $record) {
        $sql = "INSERT INTO invoice (invoice_no, customer_name, medicine_name, quantity, rate, total, date) 
        VALUES (?,?,?,?,?,?, CURRENT_DATE())";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssssss", $invoiceNo, $record['customer_name'], $record['medicine_name'], $record['qty'], $record['rate'], $record['total']);
        mysqli_stmt_execute($stmt);
    }

    $sql = "DELETE FROM billing";
    mysqli_query($conn, $sql);
    header("Location: invoice.php");
}

if(isset($_POST['cancel'])){
    $billedRecords = select($conn, 'billing');

    foreach($billedRecords as $record) {
        $reinsert = "INSERT INTO medicine (id, name, category, quantity, price, total, expiry, date) values (?,?,?,?,?,?,?,?)";
        $stmt = mysqli_prepare($conn, $reinsert);
        mysqli_stmt_bind_param($stmt, 'ssssssss', $record['id'], $record['medicine_name'], $record['category'], $record['qty'], $record['rate'], $record['total'], $record['expiry'], $record['date']);
        mysqli_stmt_execute($stmt);
    }
    
    $sql = "DELETE FROM billing";
    mysqli_query($conn, $sql);
    header("Location: invoice.php");
}
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create new Invoice</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
<div class="container">
<?php include '../includes/nav.php'; ?>
<div class="main">
        <?php include '../includes/menu.php'; ?>
        <div class="content-wrapper">
            <div class="entries"> 
                <h3>Create new invoice:</h3>
                <hr>
                <form action="" method="POST">
                        <div id="medicine-inputs">
                            <div class="inputs medicine-entries">
                                <label for="medicine">Medicine:</label><br>
                                <input type="text" name="medicine" id="medicine" required class="clear">
                            </div>
                            <div class="inputs medicine-entries">
                                <label for="quantity">Qty:</label><br>
                                <input type="number" name="quantity" id="quantity" required class="clear">
                            </div>
                            <div class="inputs medicine-entries">
                                <label for="rate">Rate:</label><br>
                                <input type="number" name="rate" id="rate" required class="clear">
                            </div>
                            <div class="inputs medicine-entries">
                                <label for="total">Total:</label><br>
                                <input type="number" name="total" id="total" required class="clear">
                            </div>
                            <input type="submit" name="add" id="add" value="Add medicine"><br>   
                        </div>
                    </form>
                    <form action="" method="post">
                        <input type="submit" name="submit" id="submit" value="Submit">        
                        <input type="submit" value="Cancel" name="cancel" id="cancel">  
                    </form>
                </div><hr>   
            <div class="records">
            <table class="table">
            <tr>
                <th>S.N.</th>
                <th>Medicine Name</th>
                <th>Quantity</th>
                <th>Rate</th>
                <th>Total</th>
            </tr>
            <?php if(!empty($records)): ?>
                <?php foreach($records as $key => $record): ?>
                    <tr>
                <td><?= $key+1; ?></td>
                <td><?= $record['medicine_name']; ?></td>
                <td><?= $record['qty']; ?></td>
                <td><?= $record['rate']; ?></td>
                <td><?= $record['total']; ?></td>
                    </tr>
                <?php endforeach; ?>
                <?php endif; ?>
        </table>           
     </div>
     </div>

        </div>
    </div>
    </div>
<script src="../scripts/invoice.js"></script>
<script src="../scripts/menu.js"></script>

</body>

</html>