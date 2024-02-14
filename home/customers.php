<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

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
        <input type="text" name="name"><br>
        <label for="address">Address</label><br>
        <input type="text" name="address"><br>
        <label for="phone">Contact</label>
        <input type="text" name=phone><br>
        <input type="submit" name="submit" value="Submit"><br>
    </form>


</body>
</html>