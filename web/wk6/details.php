<?php 
//Get the database connection file  
include 'connections.php';  
session_start(); 
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
    <script
		<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
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
              <li><a href="../index.php/index.php">Home</a></li>
              <li><a href="../details.php/details.php" class="current">Details</a></li>
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

      // echo '<form action="../successfulDelete.php/successfulDelete.php?book_number='.$row['book_number'].'" method="POST">';
    echo '<form action="../successfulModify.php/successfulModify.php?book_number='.$row['book_number'].'" method="POST">';

    // ?book_number='.$row['book_number']
    echo '<h2>Details</h2><br />';
    echo '<label>Title:  </label>';
    echo '<input type="text" name="title" id="title" value="'.$row['book_title'].'"/><br />';
    echo '<label>Author:  </label>';
    echo '<input type="text" name="author" id="author" value="'.$row2['author_name'].'"/><br />';
    echo '<label>Description:  </label>';
    echo '<textarea rows="4" cols="50" name="words" id="words">'.$row3['words'].'</textarea><br />';                          

    // echo '<input type="text" name="title" id="words" value="'.$row3['words'].'"/><br />';
    echo '<label>Media type:  </label>';
    echo '<input type="text" name="media" id="media" value="'.$row4['media'].'"/><br />';
    echo '<label>Genre:  </label>';
    echo '<input type="text" name="genre" id="genre" value="'.$row5['genre'].'"/><br />';
    echo '<label>Tags:  </label>';
    echo '<input type="text" name="tags" id="tags" value="'.$row6['tags'].'"/><br />';
    
    echo '<br><br>';
    echo '<input type="submit" class="btn btn-primary" value="Save" id="save">';
    echo '<br><br>';

    echo '<input type="submit" class="btn btn-danger" value="Delete" id="delete">';
    echo '<h1>DELETE REALLY MEANS DELETE. NO GOING BACK.</h1>';
  
    echo '</form>';
  }}}}}}
    ?> 
      
<?php

// $book_number = $_GET['book_number'];
//     foreach ($db->query("SELECT * FROM isbn WHERE book_number='$book_number'") as $row){
//     foreach ($db->query("SELECT * FROM author WHERE book_number='$book_number'") as $row2){
//     foreach ($db->query("SELECT * FROM words WHERE book_number='$book_number'") as $row3){
//     foreach ($db->query("SELECT * FROM media WHERE book_number='$book_number'") as $row4){
//     foreach ($db->query("SELECT * FROM genre WHERE book_number='$book_number'") as $row5){
//     foreach ($db->query("SELECT * FROM tags WHERE book_number='$book_number'") as $row6){

//     echo '<h3>Title: '.$row['book_title'].'</h3>';
//     echo '<h3>Author: '.$row2['author_name'].'</h3>';
//     echo '<h3>Description: '.$row3['words'].'</h3>';
//     echo '<h3>Media Type: '.$row4['media'].'</h3>';
//     echo '<h3>Genre: '.$row5['genre'].'</h3>';
//     echo '<h3>Tags: '.$row6['tags'].'</h3>';
    // }}}}}}
?> 
<br><br>

<!-- <input type="button" class="btn btn-danger" value="Delete" id="delete"> -->
</main>

</html>