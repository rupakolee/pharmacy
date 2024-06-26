<?php
session_start();
include "../includes/database.php";
$error = 0;
$errMsg='';
if($_SERVER['REQUEST_METHOD']=="POST") {
    $name = $_POST["name"];
    $parts = explode(" ", $name);
    $fName = $parts[0];
    $lName = $parts[1];

    if(isset($_POST['sex'])) {
        $sex = $_POST["sex"];
    }
    $address = $_POST["address"];
    $contact = $_POST["contact"];

    if(is_numeric($name)) {
        $error = 1;
        $errMsg = "Invalid Name";
    }
    if(!is_numeric($contact)||strlen($contact)!=10) {
        $error = 2;
        $errMsg = "Invalid contact";
    }
   
    if(isset($_POST['submit'])) {
        if($error == 0) {
            $sql = "insert into customer (f_ame, l_name, sex, address, contact) values (?,?,?,?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, 'sssss', $fName, $lName, $sex, $address, $contact);  
            mysqli_stmt_execute($stmt);
        }
    }
}
$sql = "select * from customer group by f_name";
$result = mysqli_query($conn, $sql);
$records = mysqli_fetch_all($result, MYSQLI_ASSOC);
include '../includes/expired.php';

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
                <span>Sex:</span><br>
                <input type="radio" name="sex" value="M" required>M
                <input type="radio" name="sex" value="F" required>F
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
</div><hr>

    <!-- customers list -->
    <div class="records">
        <h3>Recent Customers list:</h3>
    <table class="table">
        <tr>
            <th>S.N.</th>
            <th>Name</th>
            <th>Sex</th>
            <th>Address</th>
            <th>Contact</th>
            <th>Action</th>
        </tr>
        <?php if(!empty($records)): ?>
            <?php foreach($records as $key => $record): ?>
                <tr>
                    <td><?= $key+1; ?></td>
                    <td><?= $record['f_name']." ".$record['l_name']; ?></td>
                    <td><?= $record['sex']; ?></td>
                    <td><?= $record['address']; ?></td>
                    <td><?= $record['contact']; ?></td>
                    <td><a href="../includes/delete.php?id= <?= $record['customer_id']; ?>&table=customer&location=customers"><img src="../images/delete-icon.png" alt="delete" style="width: 14px;" class="action-btn"></a></td>
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