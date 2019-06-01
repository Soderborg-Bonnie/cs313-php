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
              <li><a href="/wk6/index.php/index.php" class="current">Home</a></li>
              <li><a href="/wk6/details.php/details.php">Details</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </header>
    <h2>Your addition of a new book was successful!</h2><br><br>
    <?php
                        $title = ($_POST['title']);
                        $isbn = ($_POST['isbn']);
                        $author = ($_POST['author']);
                        $words = ($_POST['words']);
                        $media = ($_POST['media']);
                        $genre = ($_POST['genre']);
                            
                        echo "'$title' has been added."."<br>";
                        echo "It's ISBN number is: $isbn";

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                          // echo 'POSTING!<br />';        
                          $statement = $db->prepare("INSERT INTO isbn (book_number, book_title) VALUES (:isbn, :title)");
                      
                          // echo 'After Statement!<br />';

                          $statement->bindValue(':isbn', $isbn);
                          $statement->bindValue(':title', $title);
                          
                          // echo 'After Bind!<br />';
                          $statement->execute();

                          $statement = $db->prepare("INSERT INTO author (book_number, author_name) VALUES (:isbn, :author)");
                          $statement->bindValue(':isbn', $isbn);
                          $statement->bindValue(':author', $author);
                          $statement->execute();
echo 'before description';
                          $statement = $db->prepare("INSERT INTO words (book_number, words) VALUES (:isbn, :words)");
                          $statement->bindValue(':isbn', $isbn);
                          $statement->bindValue(':words', $words);
                          $statement->execute();
echo 'after description';
                          $statement = $db->prepare("INSERT INTO book_media_type (book_id, media_type) VALUES (:isbn, :media)");
                          $statement->bindValue(':isbn', $isbn);
                          $statement->bindValue(':media', $media);
                          $statement->execute();


                      }

      ?>

</body>
</html>