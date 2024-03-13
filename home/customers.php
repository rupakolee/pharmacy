<?php
include "../includes/database.php";
session_start();
$_SESSION['table'] = 'customer';
$_SESSION['location'] = '../home/customers';
if($_SERVER['REQUEST_METHOD']=="POST") {
    $name = $_POST["name"];
    $dob = $_POST["dob"];
    $sex = $_POST["sex"];
    $address = $_POST["address"];
    $contact = $_POST["contact"];
    if(isset($_POST['submit'])) {
        $sql = "insert into customer (name, dob, sex, address, contact) values (?,?,?,?,?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'sssss', $name, $dob, $sex, $address, $contact);  
        mysqli_stmt_execute($stmt);
    }
}
$records = select($conn, 'customer');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>
    <link rel="stylesheet" href="../styles/style.css">

</head>
<body>


<div class="container">
    <?php include '../includes/nav.php'; ?>
    <div class="main">
        <?php include '../includes/menu.php'; ?>
        
        <!-- searching existing customer's record
        
<form action="" method="get">
    <input type="text" name="search" id="search" placeholder="Enter the name">
    <input type="button" name="searchBtn" value="button">
</form>

<?php
    if(isset($_GET['searchBtn'])) {
        
    }
    
    
    ?> -->

<!-- adding a new customer to the database -->
<div class="content-wrapper">
<div class="entries">
    <h2>Customers</h2>
    <h3>Add a new customer:</h3>
    <form action="" method="post">
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        <label for="dob">Date of Birth</label>
        <input type="date" name="dob" id="dob">
        <span>Sex</span>
        <input type="radio" name="sex" value="M">M
        <input type="radio" name="sex" value="F">F
        <label for="address">Address</label>
        <input type="text" name="address" id="address">
        <label for="contact">Contact</label>
        <input type="text" name="contact" id="contact">
        <input type="submit" name="submit" value="Submit">
    </form>
</div>

    <!-- customers list -->
    <div class="records">
        <h2>Customers list:</h2>
    <table class="table">
        <tr>
            <th>S.N.</th>
            <th>Name</th>
            <th>DoB</th>
            <th>Sex</th>
            <th>Address</th>
            <th>Contact</th>
            <th>Action</th>
        </tr>
        <?php if(!empty($records)): ?>
            <?php foreach($records as $key => $record): ?>
                <tr>
                    <td><?= $key+1; ?></td>
                    <td><?= $record['name']; ?></td>
                    <td><?= $record['dob']; ?></td>
                    <td><?= $record['sex']; ?></td>
                    <td><?= $record['address']; ?></td>
                    <td><?= $record['contact']; ?></td>
                    <td><a href="../includes/edit.php?id=<?= $record['id']; ?>"><img src="../images/edit-icon.png" alt="edit" style="width: 15px;" class="action-btn"></a>
                    <a href="../includes/delete.php?id= <?= $record['id']; ?>"><img src="../images/delete-icon.png" alt="delete" style="width: 14px;" class="action-btn"></a></td>
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