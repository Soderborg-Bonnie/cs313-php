<?php 
//Get the database connection file  
include 'connections.php';  
session_start(); 
// $author_id ='author_id';

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
    <main>
      
<?php


// $book_number = $_GET['book_number'];
// $sql = 'SELECT * FROM isbn WHERE book_number='."'".$book_number."'";
// echo $sql;
// $statement = $db->query($sql);
// echo $statement;

// while ($row = $statement->fetch(PDO::FETCH_ASSOC))
// {
//     echo '<p>Author:</p>';
//     echo '<p>'.$row['book_number'].'</p>';
// }
// echo '<p>ugh</p>';

$book_number = $_GET['book_number'];
// echo $book_number;
// foreach ($db->query('SELECT book_title FROM isbn WHERE book_number='.$book_number) as $row){
    // foreach ($db->query('SELECT book_title FROM isbn WHERE book_number="B008TT5Q1M"') as $row){
    foreach ($db->query("SELECT * FROM isbn, author WHERE book_number='$book_number'") as $row){

// $db->query('SELECT * FROM isbn WHERE book_number='.$book_number) as $row;
    echo '<p>Author: '.$row['book_title'].'</p>';
    // echo '<p>'.$row['book_title'].'</p>';
    // echo $book_number;
}
// ?> 
    </main>

</html>