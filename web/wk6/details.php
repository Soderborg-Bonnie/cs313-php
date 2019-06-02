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
// $row['author_name'] = '';
// $row2['words'] = '';
// $row3['book_title'] = '';
// $row4['media'] = '';
// $row5['genre'] = '';
// $row6['tags'] = '';
    foreach ($db->query("SELECT * FROM isbn WHERE book_number='$book_number'") as $row){
    foreach ($db->query("SELECT * FROM author WHERE book_number='$book_number'") as $row2){
    foreach ($db->query("SELECT * FROM words WHERE book_number='$book_number'") as $row3){
    foreach ($db->query("SELECT * FROM media WHERE book_number='$book_number'") as $row4){
    foreach ($db->query("SELECT * FROM genre WHERE book_number='$book_number'") as $row5){
    foreach ($db->query("SELECT * FROM tags WHERE book_number='$book_number'") as $row6){

    echo '<h3>Title: '.$row['book_title'].'</h3>';
    echo '<h3>Author: '.$row2['author_name'].'</h3>';
    echo '<h3>Description: '.$row3['words'].'</h3>';
    echo '<h3>Media Type: '.$row4['media'].'</h3>';
    echo '<h3>Genre: '.$row5['genre'].'</h3>';
    echo '<h3>Tags: '.$row6['tags'].'</h3>';
}}
// }}
}}}}
// ?> 
    </main>

</html>