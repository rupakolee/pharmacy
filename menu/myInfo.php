<?php
include '../includes/database.php';
$sql = "select * from register where email=".$_GET['email'];
$result = mysqli_query($conn, $sql);
$record = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Information</title>
</head>
<body>
    <h2>My Information</h2>
    <p>User Name: <?= $record['fullName']; ?></p>
    <p>Pharmacy's Name: <?= $record['pharmacyName']; ?></p>
    <p>Email: <?= $record['email']; ?></p>
    <p>Phone: <?= $record['phone']; ?></p>
</body>
</html>