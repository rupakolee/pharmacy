  <!-- creating nav -->
        
  <nav id="navbar">
            <a href="home.php"><img src="../images/logo.png" alt="logo" style="width: 60px;"></a>
            
            <div class="user-info">
                <button id="user-btn"><img src="../images/user.png" alt=""></button>
                <ul class="user-panel">
                <li><a href="../menu/myInfo.php?email=<?= $_SESSION['email']; ?>">My information</a></li>
                <li><a href="../menu/settings.php">Settings</a></li>
                <li><a href="../menu/password.php">Change Password</a></li>
                    <li>Log out<form method="post">
                        <button type="submit" name="log-out" id="logout-btn"><img src="../images/logout.png" alt="logout"></button>
                    </form>    
                    </li>
                    <?php 
                        if(isset($_POST['log-out'])) {
                            session_destroy();
                            header("Location: ../login/login.php");
                        }
                    ?>
                </ul>
            </div>
        </nav>
        <hr style="color: #fff;">