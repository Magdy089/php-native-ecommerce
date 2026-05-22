<?php
session_start();
session_unset();
session_destroy();

    if(isset($_COOKIE['token_Name'])){
    setcookie('token_Name', '', time() - 3600, '/');
    
}

header("location: ../login.php");
exit;
?>