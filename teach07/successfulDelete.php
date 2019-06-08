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
    <h2>Your deletion of a book was successful :(</h2><br><br>
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
// delete specific book-------------------------------------------------------------------------------------
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
    <footer>&copy 2019 Bonnie Soderborg All rights reserved.</footer>
  </body>
</html>