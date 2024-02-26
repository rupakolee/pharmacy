<?php
include "../includes/database.php";
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
    <link rel="stylesheet" href="../styles/others.css">

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
    <h2>Add a new Customer</h2>
    <form action="" method="post">
        <label for="name">Name</label><br>
        <input type="text" name="name" id="name"><br>
        <label for="dob">Date of Birth</label><br>
        <input type="date" name="dob" id="dob"><br>
        <span>Sex</span><br>
        <input type="radio" name="sex" value="M">M
        <input type="radio" name="sex" value="F">F<br>
        <label for="address">Address</label><br>
        <input type="text" name="address" id="address"><br>
        <label for="contact">Contact</label>
        <input type="text" name="contact" id="contact"><br>
        <input type="submit" name="submit" value="Submit"><br>
    </form>
</div>
    <!-- customers list -->
    <div class="records">
    <table>
        <tr>
            <th>S.N.</th>
            <th>Name</th>
            <th>DoB</th>
            <th>Sex</th>
            <th>Address</th>
            <th>Contact</th>
        </tr>
        <tr>
            <?php if(!empty($records)): ?>
                <?php foreach($records as $record): ?>
                    <td><?= $record['id']; ?></td>
                    <td><?= $record['name']; ?></td>
                    <td><?= $record['dob']; ?></td>
                    <td><?= $record['sex']; ?></td>
                    <td><?= $record['address']; ?></td>
                    <td><?= $record['contact']; ?></td>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tr>
            </table>
            </div>
            </div>
        </div>
        <script src="../scripts/home.js"></script>
</body>
</html>