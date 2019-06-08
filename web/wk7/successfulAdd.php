<?php 
  $GLOBALS['book_number']='book_number';
  //Get the database connection file  
  require 'connections.php';  
  session_start();
  $GLOBALS['conn']=$db;
?> 

<!DOCTYPE html>
<html lang="en">
<!-- use own css, bootstrap and datatable libraries------------------------------------------------------ -->
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
      <img src="../images/sparklyBookSm.jpg" alt="sparkly books" />
              <div class="mainHeader">
          <h1>Finding Books</h1>
          <nav>
            <ul class="mainNav">
            <li><a href="../home.php/home.php">Home</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </header>
<!-- get input data--------------------------------------------------------------------------------------- -->
    <?php
      $title = ($_POST['title']);
      $isbn = ($_POST['isbn']);
      $author = ($_POST['author']);
      $words = ($_POST['words']);
      $media = ($_POST['media']);
      $genre = ($_POST['genre']);
      $tags = ($_POST['tags']);

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
// check if book is in database already---------------------------------------------------------------------------
        $books = checkBook($isbn);
        if ($books == 0){
// insert new book------------------------------------------------------------------------------------------------
          $statement = $db->prepare("INSERT INTO isbn (book_number, book_title) VALUES (:isbn, :title)");
          $statement->bindValue(':isbn', $isbn);
          $statement->bindValue(':title', $title);
          $statement->execute();

          $statement = $db->prepare("INSERT INTO author (book_number, author_name) VALUES (:isbn, :author)");
          $statement->bindValue(':isbn', $isbn);
          $statement->bindValue(':author', $author);
          $statement->execute();

          $statement = $db->prepare("INSERT INTO words (book_number, words) VALUES (:isbn, :words)");
          $statement->bindValue(':isbn', $isbn);
          $statement->bindValue(':words', $words);
          $statement->execute();

          $statement = $db->prepare("INSERT INTO media (book_number, media) VALUES (:isbn, :media)");
          $statement->bindValue(':isbn', $isbn);
          $statement->bindValue(':media', $media);
          $statement->execute();

          $statement = $db->prepare("INSERT INTO genre (book_number, genre) VALUES (:isbn, :genre)");
          $statement->bindValue(':isbn', $isbn);
          $statement->bindValue(':genre', $genre);
          $statement->execute();

          $statement = $db->prepare("INSERT INTO tags (book_number, tags) VALUES (:isbn, :tags)");
          $statement->bindValue(':isbn', $isbn);
          $statement->bindValue(':tags', $tags);
          $statement->execute();

        }else{
// add session cookie------------------------------------------------------------------------------------------
          $_SESSION['book']=$isbn;
          header('Location: ../additions.php/additions.php');
          die();
        }}

        function checkBook($isbn) {
          $sql = 'SELECT book_number FROM isbn WHERE book_number  =:isbn ';
          $stmt = $GLOBALS['conn']->prepare($sql);
          $stmt->bindValue(':isbn', $isbn, PDO::PARAM_STR);
          $stmt->execute();
          $results = $stmt->fetch(PDO::FETCH_ASSOC);
          $stmt->closeCursor();
          if (!is_array($results)) {
            echo '<h2>Your addition of a new book was successful!</h2><br><br>';
            return 0;
          } else {
            echo '<h3 class="error">***Oops! That book is already in here.</h3>'; 
            return 1;
          }
        }
      ?>
    <footer class="fixedFooter">&copy 2019 Bonnie Soderborg All rights reserved.</footer>
  </body>
</html>