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
$sql = "select * from customer";
$result = mysqli_query($conn, $sql);
    if($result) {
        $records = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/home.css">

</head>
<body>


<div class="container">

<!-- creating nav menu  -->

<nav id="navbar">
<a href="home.php"><img src="../images/logo.png" alt="logo" style="width: 80px;"></a>

    <div class="user-info">
        <button id="user-btn"><img src="../images/user.png" alt=""></button>
        <ul class="user-panel">
            <li><a href="profile.php">My information</a></li>
            <li><a href="settings.php">Settings</a></li>
            <li><a href="password.php">Change Password</a></li>
            <li>Log out<button id="logout-btn" onclick="window.location.href='../login/login.php'"><img src="../images/logout.png" alt="logout"></button></li>
        </ul>
    </div>
</nav>

<!-- interface -->

<!-- left navigation panel -->

<div class="menu">
    <button id="menu-btn"><img src="../images/menu.png" alt="menu" style="width: 36px;"></button>
    <ul id="menu-list">
        <li><a href="home.php">Dashboard</a></li>
        <li><a href="purchase.php">Purchase</a></li>
        <li><a href="invoice.php">Invoice</a></li>
        <li><a href="sales.php">Sales</a></li>
        <li><a href="inventory.php">Medicines</a></li>
        <li><a href="customers.php">Customers</a></li>
        <li><a href="vendor.php">Vendors</a></li>
    </ul>
</div>

<!-- searching existing customer's record -->

<form action="" method="get">
    <input type="text" name="search" id="search" placeholder="Enter the name">
    <input type="button" name="searchBtn" value="button">
</form>

<?php
    if(isset($_GET['searchBtn'])) {
        
    }


?>

<!-- adding a new customer to the database -->

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

    <!-- customers list -->

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

    <script src="../scripts/home.js"></script>

</body>
</html>