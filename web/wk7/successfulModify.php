<?php 
  $GLOBALS['book_number']='book_number';
/**********************************************************
Get the database connection file
***********************************************************/
  require 'connections.php';  
  session_start();
/**********************************************************
user must be logged in
***********************************************************/
  if (isset($_SESSION['username'])){
    $username = $_SESSION['username'];
  }
  else{
    header("Location: ../login.php/login.php");
    die(); 
  }
?> 

<!DOCTYPE html>
<html lang="en">
  <!-- use own css, bootstrap and datatable libraries------------------------------------------------------ -->
  <head>
    <meta charset="utf-8" />
    <title>Success!</title>
    <link rel="stylesheet" media="screen" href="../style.css" />
    <script src="../main.js"></script>
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
<!-- get book data from details page---------------------------------------------------------------------- -->
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
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          if (isset($_POST['save'])) {
            echo '<h2>Your modification was successful!</h2><br><br>';
            echo $title.' was modified.';
// update database with new info-----------------------------------------------------------------------------------
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
            $statement = $db->prepare("UPDATE tags SET tags = :tags WHERE book_number = '$book_number'");
            $statement->bindValue(':tags', $tags);
            $statement->execute();
          } elseif (isset($_POST['delete'])){
              echo '<h2>Your deletion was successful :(</h2><br><br>';
              echo $title.' was deleted.';
// delete book from database------------------------------------------------------------------------------------------
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
        }
    ?>
    <footer>&copy 2019 Bonnie Soderborg All rights reserved.</footer>
  </body>
</html>