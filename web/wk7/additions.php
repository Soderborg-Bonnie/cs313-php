<?php 
  $GLOBALS['book_number']='book_number';
  //Get the database connection file  
  require 'connections.php';  
  session_start();
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
  <!-- <head>
    <meta charset="utf-8" />
    <title>Add a book</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"
    />
    <link rel="stylesheet" media="screen" href="../style.css" />
  </head> -->
  <?php
  include '../common/head.php/head.php';
  ?>
  <body>
    <header>
      <div class="topOfPage">
        <img src="../images/sparklyBookSm.jpg" alt="sparkly books" />
          <div class="mainHeader">
            <h1>Finding Books</h1>
            <nav>
              <ul class="mainNav">
                <li><a href="/wk7/home.php/home.php" class="current">Home</a></li>
              </ul>
            </nav>
          </div>
      </div>
    </header>
    <main>

      <?php
        $title=$author=$words=$description=$media=$genre=$tags=$isbn='';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $title = test_input($_POST['title']);
          $author = test_input($_POST['author']);
          $words = test_input($_POST['words']);
          $description = test_input($_POST['description']);
          $media = test_input($_POST['media']);
          $genre = test_input ($_POST['tags']);
          $tags = test_input($_POST['tags']);
          $isbn = test_input ($_POST['isbn']);
        }
          if (isset($_SESSION['book'])){
            echo '<h3 class="error">Your book was not added because that ISBN number is already taken by another book in here.</h3>';
            echo '<h3 class="error">Check the ISBN number and try again.</h3>';
          }                    
      ?>
      <form action="../successfulAdd.php/successfulAdd.php" method="POST">
        <h2>Add a book</h2><br /> 
        <div id="inputForm">                           
          <label>Title:  </label>
          <input type="text" name="title" id="title" value="<?php echo $title; ?>"/><br />
          <label>Author:  </label>
          <input type="text" name="author" id="author"  value="<?php echo $author; ?>"/><br />
          <label>Description:  </label>
          <textarea rows="4" cols="50" name="words" id="words">  <?php echo $words; ?> </textarea><br />
          <label>Media type:  </label>
          <input type="text" name="media" id="media"  value="<?php echo $media; ?>"/>
          <br />                            
          <label>Genre:  </label>
          <input type="text" name="genre" id="genre"  value="<?php echo $genre; ?>"/><br />
          <label>Tags:  </label>
          <input type="text" name="tags" id="tags"  value="<?php echo $tags; ?>"/><br />
          <label>ISBN:  </label>
          <input type="text" name="isbn" id="isbn"  value="<?php echo $isbn; ?>"/><br /><br /><br />
        </div><br /><br />
        <input type="submit" class="btn btn-info btn-space" value="Submit" id="update">
      </form>
    </main>
    <footer>&copy 2019 Bonnie Soderborg All rights reserved.</footer>
  </body>
</html>