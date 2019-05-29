<?php 

//Get the database connection file  
include 'connections.php';  
session_start();
?> 

<!DOCTYPE html>
<html lang="en">
  <head>
  </head>
<body>
<header></header>
<main>
    <form>
        <label>Book: 
            <input type="text">
        </label><br>
        <label>Chapter: 
            <input type="text">
        </label><br>
        <label>Verse: 
            <input type="text">
        </label><br>
        <label>Content: 
            <input type="text">
        </label><br>
        
        <?php
            foreach ($db->query('SELECT * FROM topic') as $row){
            echo '<input type="checkbox" name="topic" value="topic">'.$row[name];<br>
            }
        ?>
         
        

    </form>
</main>


</body>
</html>
<?php 

          foreach ($db->query('SELECT * FROM isbn, author WHERE isbn.book_number = author.book_number') as $row)
            { 
              echo '<tr>';  
              echo '<td><a href="../details.php/details.php?book_number='.$row['book_number'].'">'.$row['book_title'].'</a></td>';
              echo '<td>'.$row['author_name'].'</td>';
              // echo '<td>'.''.'</td>';
              // echo '<td>'.''.'</td>';
              // echo '<td>'.''.'</td>';
              // echo '<td>'.''.'</td>';
              echo '<td>'.$row['book_number'].'</td>';
              echo '</tr>';
            }
            $_SESSION['book_number']=$row['book_number'];
        ?>