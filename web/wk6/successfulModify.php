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
    <h2>Your modification was successful!</h2><br><br>
    <?php
        $book_number = $_GET['book_number'];

                        $title = ($_POST['title']);
                        echo $title;
                        $isbn = ($_POST['isbn']);
                        $author = ($_POST['author']);
                        $words = ($_POST['words']);
                        $media = ($_POST['media']);
                        $genre = ($_POST['genre']);
                        $tags = ($_POST['tags']);
                        $author_id =  ($_POST['author_id']);
                        // echo "'$title' has been added."."<br>";
                        // echo "It's ISBN number is: $isbn";

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                          $statement = $db->prepare("UPDATE isbn SET book_title = :title WHERE book_number = '$book_number'");
                          $statement->bindValue(':title', $title);
                          $statement->execute();

                          $statement = $db->prepare("UPDATE author SET author_name = :author WHERE book_number = '$book_number'");
                          $statement->bindValue(':author', $author);
                          $statement->execute();

                          $statement = $db->prepare("UPDATE words SET words = :words WHERE book_number = '$book_number'");
                          $statement->bindValue(':words', $words);
                          $statement->execute();

                          $statement = $db->prepare("UPDATE media SET media = :media WHERE book_number = '$book_number'");
                          $statement->bindValue(':media', $media);
                          $statement->execute();

                          $statement = $db->prepare("UPDATE genre SET genre = :genre WHERE book_number = '$book_number'");
                          $statement->bindValue(':genre', $genre);
                          $statement->execute();

                          $statement = $db->prepare("UPDATE tags SET book_title = :title WHERE book_number = '$book_number'");
                          $statement->bindValue(':title', $title);
                          $statement->execute();

//                           $statement = $db->prepare("INSERT INTO author (book_number, author_name) VALUES (:isbn, :author)");
//                           $statement->bindValue(':isbn', $isbn);
//                           $statement->bindValue(':author', $author);
//                           $statement->execute();
// // echo 'before description';
//                           $statement = $db->prepare("INSERT INTO words (book_number, words) VALUES (:isbn, :words)");
//                           $statement->bindValue(':isbn', $isbn);
//                           $statement->bindValue(':words', $words);
//                           $statement->execute();
// // echo 'before media';
//                           $statement = $db->prepare("INSERT INTO media (book_number, media) VALUES (:isbn, :media)");
//                           $statement->bindValue(':isbn', $isbn);
//                           $statement->bindValue(':media', $media);
//                           $statement->execute();
//                           // echo 'after media';
//                           $statement = $db->prepare("INSERT INTO genre (book_number, genre) VALUES (:isbn, :genre)");
//                           $statement->bindValue(':isbn', $isbn);
//                           $statement->bindValue(':genre', $genre);
//                           $statement->execute();

//                           $statement = $db->prepare("INSERT INTO tags (book_number, tags) VALUES (:isbn, :tags)");
//                           $statement->bindValue(':isbn', $isbn);
//                           $statement->bindValue(':tags', $tags);
//                           $statement->execute();

                        }

      ?>

</body>
</html>