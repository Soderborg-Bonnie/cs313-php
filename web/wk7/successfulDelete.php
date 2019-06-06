<?php 

$GLOBALS['book_number']='book_number';

//Get the database connection file  
require 'connections.php';  
session_start();
?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Success!</title>
    <link rel="stylesheet" media="screen" href="../style.css" />
    <script
      src="../main.js"
    ></script>
  </head>
  <body>
    <header>
      <div class="topOfPage">
        <img src="../images/booksLeft.png" alt="photo of books" />
        <div class="mainHeader">
          <h1>Finding Books</h1>
          <nav>
            <ul class="mainNav">
            <li><a href="../home.php/home.php">Home</a></li>
              <!-- <li><a href="../details.php/details.php" class="current">Details</a></li> -->
            </ul>
          </nav>
        </div>
      </div>
    </header>
    <h2>Your deletion of a book was successful :(</h2><br><br>
    <?php
    $book_number = $_GET['book_number'];

                        $title = ($_POST['title']);
                        $isbn = ($_POST['isbn']);
                        $author = ($_POST['author']);
                        $words = ($_POST['words']);
                        $media = ($_POST['media']);
                        $genre = ($_POST['genre']);
                        $tags = ($_POST['tags']);
                        $author_id =  ($_POST['author_id']);
                        //     echo '<h3>Title: '.$row['book_title'].'</h3>';

                        // echo $book_number;

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                          // echo 'POSTING!<br />';        
                          $statement = $db->prepare("DELETE FROM tags WHERE book_number = '$book_number'");
                          $statement->execute();
                          
                          $statement = $db->prepare("DELETE FROM genre WHERE book_number = '$book_number'");
                          $statement->execute();

                          $statement = $db->prepare("DELETE FROM media WHERE book_number = '$book_number'");
                          $statement->execute();

                          $statement = $db->prepare("DELETE FROM words WHERE book_number = '$book_number'");
                          $statement->execute();

                          $statement = $db->prepare("DELETE FROM author WHERE book_number = '$book_number'");
                          $statement->execute();

                          $statement = $db->prepare("DELETE FROM isbn WHERE book_number = '$book_number'");
                          $statement->execute();


                        }

      ?>

</body>
</html>