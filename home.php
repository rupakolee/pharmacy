<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">

        <!-- creating nav menu  -->
        <nav>
            <img src="#" alt="logo">
           
            <div class="user-info">
                <span>Welcome, <span id="user-num"></span></span>
                <button id="logout-btn" onclick="window.location.href='login/login.php'">Logout</button>
            </div>
        </nav>

        <!-- interface -->
        <div class="main">

           <div class="menu">
                <ul>
                    <li>Dashboard</li>
                    <li>Purchase</li>
                    <li>Sales</li>
                    <li>Medicines</li>
                    <li>Category</li>
                    <li>Customers</li>
                    <li>Vendors</li>
                </ul>
           </div>

            <!-- mails and chats -->
            <div class="inbox">
                
            </div>
        </div>

    </div>
    <script src="/scripts/script.js"></script>

    <?php


    ?>
</body>
</html>