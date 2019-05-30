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
  <body>
    <header>
      <div class="topOfPage">
        <img src="../images/booksLeft.png" alt="photo of books" />
        <div class="mainHeader">
          <h1>Finding Books</h1>
          <nav>
            <ul class="mainNav">
              <li><a href="/wk5/index.php/index.php" class="current">Home</a></li>
              <li><a href="/wk5/details.php/details.php">Details</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </header>
    <main>

    <?php
                        $title=$author=$description=$media=$genre=$tags=$isbn='';
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $title = test_input($_POST['title']);
                            $author = test_input($_POST['author']);
                            $description = test_input($_POST['description']);
                            $media = test_input($_POST['media']);
                            $genre = $_POST['genre'];
                            $tags = $_POST['tags'];
                            $isbn = $_POST['isbn'];
                        }

?>

      <form action="index.php" method="POST">
                            <h2>Add a book</h2><br />                            
                            <label>Title:  </label>
                            <!-- <br /> -->
                            <input type="text" name="title" id="title" value="<?php echo $title; ?>"/><br />
                            <!-- <br /> -->
                            <label>Author:  </label>
                            <!-- <br /> -->
                            <input type="text" name="author" id="author"  value="<?php echo $author; ?>"/><br />
                            <label>Description:  </label>
                            <!-- <br /> -->
                            <textarea rows="4" cols="50" name="description" id="description">  <?php echo $description; ?> </textarea><br />                          
                            <label>Media type:  </label>
                            <!-- <br /> -->
                            <input type="text" name="media" id="media"  value="<?php echo $media; ?>"/>
                            <br />                            
                            <label>Genre:  </label>
                            <!-- <br /> -->
                            <input type="text" name="genre" id="genre"  value="<?php echo $genre; ?>"/><br />
                            <label>Tags:  </label>
                            <!-- <br /> -->
                            <input type="text" name="tags" id="tags"  value="<?php echo $tags; ?>"/><br />
                            <label>ISBN:  </label>
                            <!-- <br /> -->
                            <input type="text" name="isbn" id="isbn"  value="<?php echo $isbn; ?>"/><br />
                            <br /><br />

                            <?php
                                // $sql = "SELECT id, name FROM topic";
                                // //echo $sql.'<hr />';
                                // $statement = $db->prepare($sql);
                                // $statement->execute();
                                // // Go through each result
                                // while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                                // {
                                //     $topic_id = $row['id'];
                                //     $topic_name = $row['name'];
                                //     echo '<input type="checkbox" name="topic_id[]" value="'.$topic_id.'"';
                                //     foreach ($topics as $topic)
                                //     {
                                //         if ($row['id']==$topic)
                                //         {
                                //             echo ' checked ';
                                //         }
                                //     }
                                //     echo ' >'.$topic_name . '<br />';
                                // }
                                
                                // echo '<input type="checkbox" name="topic_id[]" value="Other">Other - ';
                                // echo '<input type="text" name="Other" ><br />';
                                
                                
                                // print_r($topics);
                            ?>
                            <br /><br />
                            <hr />
                            <input type="submit" class="btn btn-info" value="Submit Button" id="update">
                        </form>

                        <?php
                        
//                         if ($_SERVER["REQUEST_METHOD"] == "POST") {
//                             echo 'POSTING!<br />';        
//                             $statement = $db->prepare("INSERT INTO scripture (book, chapter, verse, content) VALUES (:book, :chapter, :verse, :content)");
                        
//                             echo 'After Statement!<br />';

//                             $statement->bindValue(':book', $book);
//                             $statement->bindValue(':chapter', $chapter);
//                             $statement->bindValue(':verse', $verse);
//                             $statement->bindValue(':content', $content);
                            
//                             echo 'After Bind!<br />';

//                             $statement->execute();
// /*
//                             echo 'After Execute!<br />';
//                             $newId = $pdo->lastInsertId('scripture_id_seq');

//                             $sql = 'INSERT INTO lookup(scripture,topic) VALUES(:script_id, :topic_id)';
//                             echo $sql;
//                             foreach ($topics as $topic_id)
//                             {
//                                 echo 'Adding ' . $topic_id . ' for '. $newid . '<br />';
//                                 $statement = $db->prepare($sql);
                                
//                                 //Bind
//                                 $statement->bindValue(':script_id',$newId);
//                                 $statement->bindValue(':topic_id',$topic_id);

//                                 $statement->execute();

//                             }

// */

//                         // get the new id
//                         $scriptureId = $db->lastInsertId("scripture_id_seq");
//                         // Now go through each topic id in the list from the user's checkboxes
//                         foreach ($topics as $topicId)
//                         {
//                             if ($topic=='Other')
//                             {
//                                 // Again, first prepare the statement
//                                 $statement = $db->prepare('INSERT INTO topic(name) VALUES(:name)');
//                                 // Then, bind the values
//                                 $statement->bindValue(':name', $other_topic);
//                                 $statement->execute();
//                                 $topicId = $db->lastInsertId("topic_id_seq");
//                             }


//                             echo "ScriptureId: $scriptureId, topicId: $topicId";
//                                 // Again, first prepare the statement
//                                 $statement = $db->prepare('INSERT INTO lookup(scripture, topic) VALUES(:scripture_id, :topic_id)');
//                                 // Then, bind the values
//                                 $statement->bindValue(':scripture_id', $scriptureId);
//                                 $statement->bindValue(':topic_id', $topicId);
//                                 $statement->execute();
                            
//                         }


//                         }
                        
                        ?>
    </main>
  </body>
</html>