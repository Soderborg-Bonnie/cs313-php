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
      <div class="topOfPage">
        <img src="../images/booksLeft.png" alt="photo of books" />
        <div class="mainHeader">
          <h1>Finding Books</h1>
          <nav>
            <ul class="mainNav">
              <li><a href="../index.php/index.php">Home</a></li>
              <li><a href="../details.php/details.php" class="current">Details</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </header>
    <main id="detailsMain">
      
<?php

$book_number = $_GET['book_number'];
    foreach ($db->query("SELECT * FROM isbn WHERE book_number='$book_number'") as $row){
        foreach ($db->query("SELECT * FROM author WHERE book_number='$book_number'") as $row2){
    echo '<h3>Title: '.$row['book_title'].'</h3>';
    echo '<h3>Author: '.$row2['author_name'].'</h3>';
    echo '<h3>Description: </h3>';
    echo '<h3>Media Type: </h3>';
    echo '<h3>Genre: </h3>';
    echo '<h3>Tags: </h3>';
}}
// ?> 
    </main>

</html>