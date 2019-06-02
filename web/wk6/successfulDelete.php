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
    <h2>Your deletion of a book was successful :(</h2><br><br>
    <?php
                        $title = ($_POST['title']);
                        $isbn = ($_POST['isbn']);
                        $author = ($_POST['author']);
                        $words = ($_POST['words']);
                        $media = ($_POST['media']);
                        $genre = ($_POST['genre']);
                        $tags = ($_POST['tags']);
                        $author_id =  ($_POST['author_id']);
                        echo "'$title' has been deleted."."<br>";
                        echo "It's ISBN number is: $isbn";

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                          // echo 'POSTING!<br />';        
                          $statement = $db->prepare("DELETE FROM media WHERE book_number = $isbn");
                          // echo 'After Statement!<br />';
                        //   $statement->bindValue(':isbn', $isbn);
                        //   $statement->bindValue(':title', $title);
                          // echo 'After Bind!<br />';
                          $statement->execute();
                          

                        }

      ?>

</body>
</html>