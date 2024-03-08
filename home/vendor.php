<?php
include '../includes/database.php';
if($_SERVER['REQUEST_METHOD']==="POST") {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $sql = "insert into vendor (name, address, contact) values (?,?,?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'sss', $name, $address, $contact);
    mysqli_stmt_execute($stmt);
}

$records = select($conn, 'vendor');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor</title>
    <link rel="stylesheet" href="../styles/style.css">

</head>
<body>
<div class="container">
<?php include '../includes/nav.php'; ?>

<div class="main">
<?php include '../includes/menu.php'; ?>
    <div class="content-wrapper">
        <div class="entries">
            <h2>Vendor</h2>
            <h3>Add a new vendor:</h3>
            <form action="" method="post">
            <label for="name">Name</label>
            <input type="text" name="name" id="name">
            <label for="address">Address</label>
            <input type="text" name="address" id="address">
            <label for="contact">Contact</label>
            <input type="text" name="contact" id="contact">
            <input type="submit" name="submit" value="Submit">
        </form>
        </div>

        <div class="records">
        <h2>Vendors list:</h2>
        <table class="table">
            <tr>
                <th>S.N.</th>
                <th>Name</th>
                <th>Address</th>
                <th>Contact</th>
            </tr>
            <?php if(!empty($records)): ?>
                <?php foreach($records as $key => $record): ?>
                    <tr>
                    <td><?= $key+1; ?></td>
                    <td><?= $record['name']; ?></td>
                    <td><?= $record['address']; ?></td>
                    <td><?= $record['contact']; ?></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
        </table>
        </div>
    </div>
    </div>
    <script src="../scripts/menu.js"></script>

</body>
</html>