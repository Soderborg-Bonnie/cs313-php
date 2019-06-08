<?php 
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
  <head>
    <meta charset="utf-8" />
    <title>Books</title>
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
    <main id="detailsMain">
    <?php
      $book_number = $_GET['book_number'];
      foreach ($db->query("SELECT * FROM isbn WHERE book_number='$book_number'") as $row){
        foreach ($db->query("SELECT * FROM author WHERE book_number='$book_number'") as $row2){
          foreach ($db->query("SELECT * FROM words WHERE book_number='$book_number'") as $row3){
            foreach ($db->query("SELECT * FROM media WHERE book_number='$book_number'") as $row4){
              foreach ($db->query("SELECT * FROM genre WHERE book_number='$book_number'") as $row5){
                foreach ($db->query("SELECT * FROM tags WHERE book_number='$book_number'") as $row6){
                  echo '<form action="../successfulModify.php/successfulModify.php?book_number='.$row['book_number'].'" method="POST">';
                  echo '<h2>Details</h2><br />';
                  echo '<label>Title:  </label>';
                  echo '<input type="text" name="title" id="title" value="'.$row['book_title'].'"/><br />';
                  echo '<label>Author:  </label>';
                  echo '<input type="text" name="author" id="author" value="'.$row2['author_name'].'"/><br />';
                  echo '<label>Description:  </label>';
                  echo '<textarea rows="4" cols="50" name="words" id="words">'.$row3['words'].'</textarea><br />';                          
                  echo '<label>Media type:  </label>';
                  echo '<input type="text" name="media" id="media" value="'.$row4['media'].'"/><br />';
                  echo '<label>Genre:  </label>';
                  echo '<input type="text" name="genre" id="genre" value="'.$row5['genre'].'"/><br />';
                  echo '<label>Tags:  </label>';
                  echo '<input type="text" name="tags" id="tags" value="'.$row6['tags'].'"/><br />';
                  echo '<br><br>';
                  echo '<input type="submit" class="btn btn-primary" name="save" value="Save" id="save">';
                  echo '<br><br>';
                  echo '<input type="submit" class="btn btn-danger" name="delete" value="Delete" id="delete">';
                  echo '<h1>DELETE REALLY MEANS DELETE. NO GOING BACK.</h1>';
                  echo '</form>';
      }}}}}}
    ?> 
    <br><br>
    </main>
    <footer>&copy 2019 Bonnie Soderborg All rights reserved.</footer>
  </body>
</html>