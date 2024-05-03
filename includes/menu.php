        <div class="menu">
                <ul id="menu-list">
                <a href="home.php?email='<?= $_SESSION['email']; ?>'&&password='<?= $_SESSION['pass']; ?>'"><li>Dashboard</li></a>
                <a href="purchase.php?email='<?= $_SESSION['email']; ?>'&&password='<?= $_SESSION['pass']; ?>'"><li>Purchase</li></a>
                <a href="invoice.php?email='<?= $_SESSION['email']; ?>'&&password='<?= $_SESSION['pass']; ?>'"><li>Invoice</li></a>
                <a href="sales.php?email='<?= $_SESSION['email']; ?>'&&password='<?= $_SESSION['pass']; ?>'"><li>Sales</li></a>
                <a href="inventory.php?email='<?= $_SESSION['email']; ?>'&&password='<?= $_SESSION['pass']; ?>'"><li>Medicines</li></a>
                <a href="customers.php?email='<?= $_SESSION['email']; ?>'&&password='<?= $_SESSION['pass']; ?>'"><li>Customers</li></a>
                <a href="supplier.php?email='<?= $_SESSION['email']; ?>'&&password='<?= $_SESSION['pass']; ?>'"><li>Suppliers</li></a>
                </ul>
            </div>