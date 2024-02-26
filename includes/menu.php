  <!-- creating nav menu  -->
        
  <nav id="navbar">
            <a href="home.php"><img src="../images/logo.png" alt="logo" style="width: 80px;"></a>

            <div class="user-info">
                <button id="user-btn"><img src="../images/user.png" alt=""></button>
                <ul class="user-panel">
                <li><a href="../menu/myInfo.php">My information</a></li>
                <li><a href="../menu/settings.php">Settings</a></li>
                <li><a href="../menu/password.php">Change Password</a></li>
                    <li>Log out<button id="logout-btn" onclick="window.location.href='../login/login.php'"><img src="../images/logout.png" alt="logout"></button></li>
                </ul>
            </div>
        </nav>
        <hr style="color: #fff;">


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