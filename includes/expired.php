<?php 
if(empty($_SESSION['email']) || empty($_SESSION['pass'])) {
    die("Session expired");
}

try {
    if(!empty($_SESSION['email']) && !empty($_SESSION['pass'])) {
        $email = $_SESSION['email'];
        $pass = $_SESSION['pass'];
        $errMsg = "No session started";
    }
} catch(Exception $e) {
    echo $errMsg;
}
?>