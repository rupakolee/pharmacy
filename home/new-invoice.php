<?php
include "../includes/database.php";
$error=0;
if($_SERVER['REQUEST_METHOD']=="POST") {
    if(is_numeric($_POST['customer'])) {
        $error = 1;
        $errMsg = "Invalid Name";
    }
    else {
        $customer = $_POST['customer'];
    }
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
            $sql = "insert into billing (name, qty, rate, total) 
            values (?,?,?,?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, 'ssss', $medicineName, $quantity, $rate, $total);
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
        echo "No medicines found!";
    }
}
}

if(isset($_POST['cancel'])) {
    $sql = "ROLLBACK";
    $result = mysqli_query($conn, $sql);
}

if(isset($_POST['submit'])) {
    $sql = "insert into invoice (customer_name, medicine_name, quantity, rate, total, date) 
    values (?,?,?,?,?,CURRENT_DATE())";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'sssss', $customer, $medicineName, $quantity, $rate, $total);
    mysqli_stmt_execute($stmt);

    $delete = $sql = "delete from billing";
    mysqli_query($conn, $delete);
    $commit = "COMMIT";
    mysqli_query($conn, $commit);
}
}

$records = descSelect($conn, 'billing', 'id');

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
                <form action="" method="POST">
                    <div class="invoice">
                        <div class="inputs" id="customer-field">
                            <label for="customer">Customer Name:</label><br>
                            <?php if($error==1) {
                                echo "<span>{$errMsg}</span><br>";
                            }
                            ?>
                            <input type="text" name="customer" id="customer" required>
                            <button id="enter">Enter</button>
                        </div><br><br>
                        <div class="inputs"></div>
                        <div id="medicine-inputs" style="display: none;">
                        <div class="inputs medicine-entries">
                            <label for="medicine">Medicines:</label><br>
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
                        <input type="submit" name="submit" id="submit" value="Submit">        
                        <input type="button" value="cancel" name="cancel" id="cancel">  
                    </div>
                    </div>      
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
                <td><?= $record['name']; ?></td>
                <td><?= $record['qty']; ?></td>
                <td><?= $record['rate']; ?></td>
                <td><?= $record['total']; ?></td>
                    </tr>
                <?php endforeach; ?>
                <?php endif; ?>
        </table>            </div>
        </div>
    </div>
    </div>
<script src="../scripts/invoice.js"></script>
<script src="../scripts/menu.js"></script>
<script>
    const cancel = document.getElementById('cancel');
    cancel.onclick = function() {
        <?php 
        $result = mysqli_query($conn, $sql);
        $delete = $sql = "delete from billing";
        mysqli_query($conn, $delete);
        ?>
        window.location.href = "home.php";
    }

    let medInp = document.getElementById('medicine-inputs');
    let customerName = document.getElementById('customer');
    let enter = document.getElementById('enter');

    enter.addEventListener('click', () => {
        medInp.style.display = "block";
    })

</script>
</body>

</html>