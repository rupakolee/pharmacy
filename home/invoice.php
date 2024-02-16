<?php
include "../includes/database.php";
if($_SERVER['REQUEST_METHOD']=="POST") {
    $customer = $_POST['customer'];
    $medicine = $_POST['medicine'];
    $quantity = $_POST['quantity'];
    $rate = $_POST['rate'];
    $total = $quantity*$rate;
    $date = $_POST['date'];
    $sql = "insert into invoice (customer_name, medicine_name, quantity, rate, total, date) 
    values (?,?,?,?,?,?)";
    if(isset($_POST['submit'])) {
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'ssssss', $customer, $medicine, $quantity, $rate, $total, $date);
        mysqli_stmt_execute($stmt);
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
</head>

<body>
    <div class="invoice-wrapper">
        <h2>Create new invoice</h2>

        <form action="" method="POST">

            <label for="customer">Customer Name:</label>
            <input type="text" name="customer" id="customer">
            <label for="medicine">Medicine:</label>
            <input type="text" name="medicine" id="medicine">
            <label for="quantity">Qty:</label>
            <input type="number" name="quantity" id="quantity">
            <label for="rate">Rate:</label>
            <input type="number" name="rate" id="rate">
            <label for="date">Date:</label>
            <input type="date" name="date" id="date">
            <input type="submit" name="submit" id="submit">

        </form>

    </div>
</body>

</html>