<?php 
    $order_no = rand(1000, 9999);
    session_start();
    $_SESSION['order-no'] = $order_no;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="main">
            <div class="entries">
                <form action="order.php" method="get">
                    <input type="text" id="customer-name" name="name" placeholder="Enter your name">
                    <input type="submit" value="Next">
                </form>
            </div>
        </div>
    </div>

</body>
</html>