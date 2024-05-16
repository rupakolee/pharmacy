<?php 
if(empty($_SESSION['email'])) {
    die("Session expired");
}

try {
    if(!empty($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $errMsg = "No session started";
    }
} catch(Exception $e) {
    echo $errMsg;
}
?>