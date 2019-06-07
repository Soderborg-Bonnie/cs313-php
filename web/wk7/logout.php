<?php
/**********************************************************
log out
***********************************************************/

// require("password.php"); // used for password hashing.
session_start();
unset($_SESSION['username']);

header("Location: ../login.php/login.php");
die(); // we always include a die after redirects.