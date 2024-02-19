<?php
include '../includes/database.php';
$records = select($conn, 'register');
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
    <?php foreach($records as $record): ?>
    <p>User Name: <?= $record['fullName']; ?></p>
    <p>Pharmacy's Name: <?= $record['pharmacyName']; ?></p>
    <p>Email: <?= $record['email']; ?></p>
    <p>Phone: <?= $record['phone']; ?></p>
    <?php endforeach; ?>
</body>
</html>