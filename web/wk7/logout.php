<?php
/**********************************************************
log out
***********************************************************/
    session_start();
    unset($_SESSION['username']);
    header("Location: ../login.php/login.php");
    die(); 
?>