<?php 

$GLOBALS['book_number']='book_number';

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
      <div id="topOfPage">
        <img src="../images/booksLeft.png" alt="photo of books" />
        <div id="mainHeader">
          <h1>Finding Books</h1>
          <nav>
            <ul id="mainNav">
              <li><a href="/wk5/index.php/index.php" class="current">Home</a></li>
              <li><a href="/wk5/details.php/details.php">Details</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </header>
    <main>
      <h2>Table o' Books</h2>
      <table
        id="bookTable"
        class="table table-striped table-bordered"
        style="width:100%"
      >
        <thead>
          <tr>
            <th>Title</th>
            <th>Author</th>
            <!-- <th>Description</th>
            <th>Media Type</th>
            <th>Genre</th>
            <th>Tags</th> -->
            <th>ISBN</th>
          </tr>
        </thead>
        <tbody>
        <?php 

          // foreach ($db->query('SELECT book_title, author_id, book_number FROM isbn INNER JOIN author WHERE isbn.book_number = author.book_number LIMIT 10') as $row)
          foreach ($db->query('SELECT * FROM isbn, author WHERE isbn.book_number = author.book_number LIMIT 10') as $row)
          // book_title, author_id, book_number
          // INNER JOIN author WHERE isbn.book_number = author.book_number
            { 
              echo '<tr>';  
              echo '<td><a href="../details.php/details.php">'.$row['book_title'].'</a></td>';
              echo '<td><a href="../details.php/details.php?book_number= '.$row['book_number'].'">'.$row['book_title'].'</a></td>';

              $_SESSION['book_number']=$row['book_number'];

              echo '<td>'.$row['author_name'].'</td>';
              // echo '<td>'.''.'</td>';
              // echo '<td>'.''.'</td>';
              // echo '<td>'.''.'</td>';
              // echo '<td>'.''.'</td>';
              echo '<td>'.$row['book_number'].'</td>';
              echo '</tr>';
            }

        ?> 
        </tbody>
      </table>
    </main>
    <footer></footer>
  </body>
</html>

                
                
                    
