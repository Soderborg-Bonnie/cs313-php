<?php
// <!-- $GLOBALS['search_page']='index.php';
// $GLOBALS['details_page']='details.php'; -->
//Get the database connection file 
// include 'connections.php'; 
// session_start();
?>

<!-- <!DOCTYPE html> -->
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Books</title>
    <link rel="stylesheet" media="screen" href="style.css" />

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
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
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
  </head>
  <body>
    <header>
      <div id="topOfPage">
        <img src="images/booksLeft.png" alt="photo of books" />
        <div id="mainHeader">
          <h1>Finding Books</h1>
          <nav>
            <ul id="mainNav">
              <li><a href="index.html" class="current">Home</a></li>
              <li><a href="#">Other</a></li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- <nav>
        <ul id="mainNav">
          <li><a href="index.html" class="current">Home</a></li>
          <li><a href="#">Other</a></li>
        </ul>
      </nav> -->
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
            <th>Description</th>
            <th>Type</th>
            <th>Genre</th>
            <th>Type</th>
            <th>Tags</th>
            <th>ISBN</th>
          </tr>
        </thead>
        <tbody>
          <?php
          //   foreach ($db->query('SELECT book_title FROM isbn') as $row) 
          //   { echo '<tr>'; 
          //     echo '<td>'.$row['book_title'].'</td>
          // </tr>';
          ?>
        </tbody>
      </table>
    </main>
    <footer></footer>
  </body>
</html>
