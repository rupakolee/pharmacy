<?php
include '../includes/database.php';
session_start();
$_SESSION['table'] = 'vendor';
$_SESSION['location'] = '../home/vendor';
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
        <h3>Vendors list:</h3>
        <table class="table">
            <tr>
                <th>S.N.</th>
                <th>Name</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Action</th>
            </tr>
            <?php if(!empty($records)): ?>
                <?php foreach($records as $key => $record): ?>
                    <tr>
                    <td><?= $key+1; ?></td>
                    <td><?= $record['name']; ?></td>
                    <td><?= $record['address']; ?></td>
                    <td><?= $record['contact']; ?></td>
                    <td><a href="../includes/edit.php?id=<?= $record['id']; ?>"><img src="../images/edit-icon.png" alt="edit" style="width: 15px;" class="action-btn"></a><a href="../includes/delete.php?id= <?= $record['id']; ?>"><img src="../images/delete-icon.png" alt="delete" style="width: 14px;" class="action-btn"></a></td>
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