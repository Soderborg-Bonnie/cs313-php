<?php 

//Get the database connection file  
include 'connections.php';  
session_start();
?> 

<!DOCTYPE html>
<html lang="en">
  <head>
  </head>
<body>
<header></header>
<main>
    <form>
        <label>Book: 
            <input type="text">
        </label>
        <label>Chapter: 
            <input type="text">
        </label>
        <label>Verse: 
            <input type="text">
        </label>
        <label>Content: 
            <input type="text">
        </label>
    </form>
</main>


</body>
</html>
