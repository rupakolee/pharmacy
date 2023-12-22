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
            <ul>
                <a href="">

                    <li>Home</li>
                </a>
                <a href="">

                    <li>Transactions</li>
                </a>
                <a href="">

                    <li>Stocks</li>
                </a>
                <a href="">

                    <li>contact</li>
                </a>
            </ul>
            <div class="user-info">
                <span>Welcome, <span id="user-num"></span></span>
                <button id="logout-btn" onclick="window.location.href='login.php'">Logout</button>
            </div>
        </nav>

        <!-- interface -->
        <div class="main">

            <!-- billing -->
            <div class="billing">
                <h3>Billing</h3>
                <form action="" method="post">
                    <input type="text">
                    <input type="submit" value="Submit">
                </form>
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