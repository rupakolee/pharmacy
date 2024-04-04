<?php
include '../includes/database.php';
session_start();
$_SESSION['table'] = 'vendor';
$_SESSION['location'] = '../home/vendor';
$error = 0;
$errMsg='';
if($_SERVER['REQUEST_METHOD']==="POST") {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];

    if(is_numeric($name)) {
        $error = 1;
        $errMsg = "Invalid Name";
    }
    if(!is_numeric($contact)||strlen($contact)!=10) {
        $error = 2;
        $errMsg = "Invalid contact";
    }
    if($error==0) {
        $sql = "insert into vendor (name, address, contact) values (?,?,?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'sss', $name, $address, $contact);
        mysqli_stmt_execute($stmt);
    }
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
            <h2>Supplier</h2>
            <h3>Add a new supplier:</h3>
            <form action="" method="post">
                <div class="input-fields">
                <div class="inputs">
                    <label for="name">Name</label><br>
                    <?php if($error==1) {
                            echo "<span>{$errMsg}</span><br>";
                          }
                    ?>
                    <input type="text" name="name" id="name" required>
                </div>
                <div class="inputs">
                    <label for="address">Address</label><br>
                    <input type="text" name="address" id="address" required>
                </div>
                <div class="inputs">
                    <label for="contact">Contact</label><br>
                    <?php if($error==2) {
                            echo "<span>{$errMsg}</span><br>";
                          }
                    ?>
                    <input type="text" name="contact" id="contact" required>
                </div>
                </div>
            <input type="submit" name="submit" value="Submit">
        </form>
        </div>
        <hr>

        <div class="records">
        <h3>Suppliers list:</h3>
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
                    <td><a href="../includes/delete.php?id= <?= $record['id']; ?>"><img src="../images/delete-icon.png" alt="delete" style="width: 14px;" class="action-btn"></a></td>
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