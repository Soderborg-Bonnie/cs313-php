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
                        echo "'$title' has been added.<br>";
                        echo "It's ISBN number is: $isbn";
      ?>

</body>
</html>