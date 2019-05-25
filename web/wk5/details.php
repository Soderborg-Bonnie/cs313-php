<?php 
//Get the database connection file  
include 'connections.php';  
session_start(); 
?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Books</title>
    <link rel="stylesheet" media="screen" href="../style.css" />
</head>
<body>
    <header>
      <div id="topOfPage">
        <img src="../images/booksLeft.png" alt="photo of books" />
        <div id="mainHeader">
          <h1>Finding Books</h1>
          <nav>
            <ul id="mainNav">
              <li><a href="../index.php/index.php">Home</a></li>
              <li><a href="../details.php/details.php" class="current">Details</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </header>

</html>