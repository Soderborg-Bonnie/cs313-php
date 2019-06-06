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
  <body id="homeBody">
    <header>
      <div class="topOfPage">
        <img src="../images/sparklyBookSm.jpg" alt="sparkly books" />
        <div class="mainHeader">
          <h1>Finding Books</h1>
          <nav>
            <ul class="mainNav">
            <li><a href="../home.php/home.php">Home</a></li>
              <li><a href="../details.php/details.php" class="current">Details</a></li>            </ul>
          </nav>
        </div>
      </div>
    </header>
    <main>

      <h2>Table o' Books</h2>
      <a href="/wk7/additions.php/additions.php"><h3 id="newBook">Add new book</h3></a>
      <table
        id="bookTable"
        class="table table-striped table-bordered"
      >
        <thead>
          <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Description</th>
            <th>Media Type</th>
            <th>Genre</th>
            <th>Tags</th>
            <th>ISBN</th>
          </tr>
        </thead>
        <tbody>
        <?php 

          foreach ($db->query('SELECT * FROM isbn, author, words, media, genre, tags WHERE isbn.book_number = author.book_number AND isbn.book_number = words.book_number AND isbn.book_number = media.book_number AND isbn.book_number = genre.book_number AND isbn.book_number = tags.book_number') as $row)
            // foreach ($db->query("SELECT * FROM isbn, words WHERE book_number='$book_number'") as $row2){
            // foreach ($db->query("SELECT * FROM isbn, media WHERE book_number='$book_number'") as $row3){
            // foreach ($db->query("SELECT * FROM isbn, genre WHERE book_number='$book_number'") as $row4){
            // foreach ($db->query("SELECT * FROM isbn, tags WHERE book_number='$book_number'") as $row5){

            { 
              echo '<tr>';  
              echo '<td><a href="../details.php/details.php?book_number='.$row['book_number'].'">'.$row['book_title'].'</a></td>';
              echo '<td>'.$row['author_name'].'</td>';
              echo '<td>'.$row['words'].'</td>';
              echo '<td>'.$row['media'].'</td>';
              echo '<td>'.$row['genre'].'</td>';
              echo '<td>'.$row['tags'].'</td>';
              echo '<td>'.$row['book_number'].'</td>';
              echo '</tr>';
            }
        // }}}}
            $_SESSION['book_number']=$row['book_number'];
        ?> 
        </tbody>
      </table>
    </main>
    <footer></footer>
  </body>
</html>

                
                
                    
