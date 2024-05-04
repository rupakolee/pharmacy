<?php
include "../includes/database.php";

$error=0;

session_start();
$customerName = $_SESSION['customer-name'];
$names = explode(" ", $customerName);
$fName = $names[0];
$lName = $names[1];

$invoiceNo =  $_SESSION['invoice-no'];

include '../includes/expired.php';

if($_SERVER['REQUEST_METHOD']=="POST") {
        $medicineName = $_POST['medicine'];
        $quantity = $_POST['quantity'];
        $rate = $_POST['rate'];
        $total = $quantity*$rate;
    
    
    if(empty($medicine) || empty($quantity) || empty($rate) || empty($total)) {
        $error = 1;
        $errMsg = "Cannot be empty";
    }
  
// deleting medicine entry from the medicine table after issuing an invoice

$medicines = ascSelect($conn, 'medicine', 'medicine_id');

if(isset($_POST['add'])) {
$sql = "SELECT * from medicine where name = '$medicineName'";
$result = mysqli_query($conn, $sql);
$medicine = mysqli_fetch_array($result);
if($medicine){
if($medicine['medicine_quantity']>=$quantity) {
    $category = $medicine['category'];
    $expiry = $medicine['expiry'];
    $date = $medicine['purchase_date'];
    $sql = "insert into billing (customer_name, medicine_name, category, qty, rate, total, expiry, date, medicine_id) 
    values (?,?,?,?,?,?,?,?,?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'sssssssss', $customerName, $medicineName, $category, $quantity, $rate, $total, $expiry, $date, $medicine['medicine_id']);
    mysqli_stmt_execute($stmt);

    $remQuan = $medicine['medicine_quantity']-$quantity;
    $sql = "update medicine set medicine_quantity = '$remQuan' where name = '$medicineName' && medicine_id = '{$medicine['medicine_id']}'";
    mysqli_query($conn, $sql);

    if($remQuan==0) {
        $alert = "Out of stock";
    }
}
}
else {
    $msg = "No records found!";
}
}

if(isset($_POST['cancel'])){
    $billedRecords = select($conn, 'billing');

    foreach($billedRecords as $billedRecord) {
        $sql = "SELECT SUM(qty) from billing where medicine_id = {$billedRecord['medicine_id']}";
        $result = mysqli_query($conn, $sql);
        $record = mysqli_fetch_array($result);

        $sql = "UPDATE medicine set medicine_quantity = {$record[0]} where medicine_id = {$billedRecord['medicine_id']}";
        mysqli_query($conn, $sql);
    }
    
    $sql = "DELETE FROM billing";
    mysqli_query($conn, $sql);

    header("Location: invoice.php");
}

$records = descSelect($conn, 'billing', 'id');
$customerRecords = select($conn, 'customer');

if(isset($_POST['submit'])) {
    $records = select($conn, 'billing');
    foreach ($records as $record) {            
        $sql = "INSERT INTO customer (f_name, l_name, medicine_id) values (?,?,?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'sss', $fName, $lName, $record['medicine_id']);
        mysqli_stmt_execute($stmt);

        $sql = "SELECT * from customer where f_name = '$fName' && l_name = '$lName'";
        $result = mysqli_query($conn, $sql);
        $customer = mysqli_fetch_array($result);

        $sql = "INSERT INTO invoice (invoice_no, selling_quantity, selling_rate, selling_total, selling_date, customer_id, medicine_id) 
        VALUES (?,?,?,?, CURRENT_DATE(), ?,?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssssss", $invoiceNo, $record['qty'], $record['rate'], $record['total'], $customer['customer_id'], $record['medicine_id']);
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