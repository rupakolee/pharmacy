<?php
include "../includes/database.php";

session_start();

$error=0;
if($_SERVER['REQUEST_METHOD']=="POST") {
    $invoiceNo = rand(100, 999999);
    $_SESSION['invoice-no'] = $invoiceNo;
    if(is_numeric($_POST['customer'])) {
        $error = 1;
        $errMsg = "Invalid Name";
    }
    else {
        $customer = $_POST['customer'];
        $_SESSION['customer-name'] = $customer;
    }


    // Insert the invoice only if the medicine is available in the medicine table 
    // check the quantity

    if(1){

    }

// deleting medicine entry from the medicine table after issuing an invoice

$medicines = select($conn, 'medicine');

// if(isset($_POST['submit'])) {
// foreach ($medicines as $medicine) {
//     if(str_contains($medicine['name'], $medicineName)) {
//         if($medicine['quantity']>=$quantity) {
//             $sql = "insert into invoice (customer_name, medicine_name, quantity, rate, total, date) 
//             values (?,?,?,?,?,CURRENT_DATE())";
//             $stmt = mysqli_prepare($conn, $sql);
//             mysqli_stmt_bind_param($stmt, 'sssss', $customer, $medicineName, $quantity, $rate, $total);
//             mysqli_stmt_execute($stmt);

//             $remQuan = $medicine['quantity']-$quantity;
//             $sql = "update medicine set quantity = '$remQuan' where name = '$medicineName'";
//             mysqli_query($conn, $sql);

//             if($medicine['quantity']==0) {
//                 $sql = "delete from medicine where name = '$medicineName'";
//                 mysqli_query($conn, $sql);
//             }
//         }
//     }
//     else {
//         $message = "No medicine found";
//     }
// }
// }

if(isset($_POST['enter'])) {
    header("Location: new-invoice.php");
}

}

$records = groupAndSort($conn, 'invoice', 'invoice_no', 'date');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
<div class="container">
<?php include '../includes/nav.php'; ?>
<div class="main">
        <?php include '../includes/menu.php'; ?>
        <div class="content-wrapper">
            <div class="entries"> 
                <h2>Invoice</h2>
                <button class="btn" id="new-invoice-btn">Create new invoice + </button>
                <form action="" method="post">
                <div class="inputs" id="customer-field">
                            <label for="customer">Customer Name:</label><br>
                            <?php if($error==1) {
                                echo "<span>{$errMsg}</span><br>";
                            }
                            ?>
                            <input type="text" name="customer" id="customer" required>
                            <input type="submit" value="Enter" name="enter" id="enter">
                        </div><hr>
                </form>
            </div>
    <div class="records">
        <h3>Invoice History</h3>
        <table class="table">
            <tr>
                <th>S.N.</th>
                <th>Customer Name</th>
                <th>Date</th>
                <th>Info</th>
            </tr>
            <?php if(!empty($records)): ?>
                <?php foreach($records as $key => $record): ?>
                    <tr>
                <td><?= $key+1; ?></td>
                <td><?= $record['customer_name']; ?></td>
                <td><?= $record['date']; ?></td>
                <td><a href="bill.php?invoice_no=<?= $record['invoice_no']; ?>"><img src="../images/info.png" alt="info" style="width: 24px; display: block; margin: auto;"></a></td>
                    </tr>
                <?php endforeach; ?>
                <?php endif; ?>
        </table>
        </div>
        </div>
    </div>
    </div>
<script src="../scripts/menu.js"></script>
<script>
    let btn = document.getElementById('new-invoice-btn');
    let customerField = document.getElementById('customer-field');
    customerField.style.display = 'none';

    btn.addEventListener('click', () => {
        customerField.style.display = 'block';  
    })
</script>
</body>

</html>