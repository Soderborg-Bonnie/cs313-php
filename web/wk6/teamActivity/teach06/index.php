<?php 

//Get the database connection file  
require "dbConnect.php";
// $db = get_db();
session_start();

/********************************************** 
* 	FUNCTION: test_input
* 	Argument(s): data (String)
*   PURPOSE: Cleans up posted string
*   REFERENCE: https://www.w3schools.com/php/showphp.asp?filename=demo_form_validation_special
**********************************************/ 
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?> 

<!DOCTYPE html>
<html lang="en">
  <head>

        <?php
		// CSS Bootstrap4 and Datatables
		?>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

		<?php
		// JS Bootstrap 4
		?>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<?php
		// JS Datatables
		?>
		<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>



  </head>
<body>

<H2>Week 06</H2>

		<HR />

            <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Book</th>
                    <th>Chapter</th>
                    <th>Verse</th>
                    <th>Content</th>
                    <th>Topic</th>
                </tr>
            </thead>

          
<?php
            $sql = "SELECT book, chapter, verse, content, name
            FROM scripture
               FULL OUTER JOIN lookup ON scripture=scripture.id
               FULL OUTER JOIN topic ON topic=topic.id";
            //echo $sql.'<hr />';

            
            $statement = $db->prepare($sql);

        //echo 'Before Execute<br />';

            $statement->execute();
            // Go through each result
            //echo 'outside while';
            while ($row = $statement->fetch(PDO::FETCH_ASSOC))
            {
             
            //foreach ($db->query($sql) as $row)
            //{
                //echo 'inside while';
                // The variable "row" now holds the complete record for that
                // row, and we can access the different values based on their
                // name
                $book = $row['book'];
                $chapter = $row['chapter'];
                $verse = $row['verse'];
                $content = $row['content'];
                $topic_name = $row['name'];
                //echo 'Working on row<br />';
                $value .= '<tr>';
                
                echo '<td>'.$book.'</td>';
                echo '<td>'.$chapter.'</td>';
                echo '<td>'.$verse.'</td>';
                echo '<td>'.$content.'</td>';
                echo '<td>'.$topic_name.'</td>';
                echo '</tr>';
                //echo "<p><strong>$book $chapter:$verse</strong> - \"$content\"<p>";
            }
            
            ?>

        </table>
            <script>
                $(document).ready(function() {
                    $('#example').DataTable();
                } );
            </script>




		<div class="card" style="width:90%; margin:auto;">
			<div class="card-header">Teach Assignment</div>
			<div class="card-body">
					
				<!-- Nav tabs -->
				<ul class="nav nav-tabs">
				  <li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#core1">Core #1</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#core2">Core #2</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#core3">Core #3</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#stretch1">Stretch #1</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#stretch2">Stretch #2</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#stretch3">Stretch #3</a>
				  </li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane container active" id="core1">
						core 1 code...
					</div>
					<div class="tab-pane container fade" id="core2">
<?php
                        $book=$chapter=$verse=$content=$topics='';
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $book = test_input($_POST['book']);
                            $chapter = test_input($_POST['chapter']);
                            $verse = test_input($_POST['verse']);
                            $content = test_input($_POST['content']);
                            $topics = $_POST['topic_id'];
                            $other_topic = $_POST['Other'];
                        }

?>

                        <form action="index.php" method="POST">
                            <?php // Core 2 ?>
                            <h3>Insert a new scripture</h3>
                            <hr />
                            <label>Book</label>
                            <br />
                            <input type="text" name="book" id="book" value="<?php echo $book; ?>"/><br />
                            <br />
                            <label>Chapter</label>
                            <br />
                            <input type="text" name="chapter" id="chapter"  value="<?php echo $chapter; ?>"/><br />
                            <label>Verse</label>
                            <br />
                            <input type="text" name="verse" id="verse"  value="<?php echo $verse; ?>"/><br />
                            <hr />
                            <label>Content</label>
                            <br />
                            <textarea rows="4" cols="50" name="content" id="content">
                                <?php echo $content; ?>
                            </textarea>
                            <br /><br />
                            <?php
                                $sql = "SELECT id, name FROM topic";
                                //echo $sql.'<hr />';
                                $statement = $db->prepare($sql);
                                $statement->execute();
                                // Go through each result
                                while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                                {
                                    $topic_id = $row['id'];
                                    $topic_name = $row['name'];
                                    echo '<input type="checkbox" name="topic_id[]" value="'.$topic_id.'"';
                                    foreach ($topics as $topic)
                                    {
                                        if ($row['id']==$topic)
                                        {
                                            echo ' checked ';
                                        }
                                    }
                                    echo ' >'.$topic_name . '<br />';
                                }
                                
                                echo '<input type="checkbox" name="topic_id[]" value="Other">Other - ';
                                echo '<input type="text" name="Other" ><br />';
                                
                                
                                print_r($topics);
                            ?>
                            <br /><br />
                            <hr />
                            <input type="submit" class="btn btn-info" value="Submit Button" id="update">
                        </form>

                        <?php
                        
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            echo 'POSTING!<br />';        
                            $statement = $db->prepare("INSERT INTO scripture (book, chapter, verse, content) VALUES (:book, :chapter, :verse, :content)");
                        
                            echo 'After Statement!<br />';

                            $statement->bindValue(':book', $book);
                            $statement->bindValue(':chapter', $chapter);
                            $statement->bindValue(':verse', $verse);
                            $statement->bindValue(':content', $content);
                            
                            echo 'After Bind!<br />';

                            $statement->execute();
/*
                            echo 'After Execute!<br />';
                            $newId = $pdo->lastInsertId('scripture_id_seq');

                            $sql = 'INSERT INTO lookup(scripture,topic) VALUES(:script_id, :topic_id)';
                            echo $sql;
                            foreach ($topics as $topic_id)
                            {
                                echo 'Adding ' . $topic_id . ' for '. $newid . '<br />';
                                $statement = $db->prepare($sql);
                                
                                //Bind
                                $statement->bindValue(':script_id',$newId);
                                $statement->bindValue(':topic_id',$topic_id);

                                $statement->execute();

                            }

*/

                        // get the new id
                        $scriptureId = $db->lastInsertId("scripture_id_seq");
                        // Now go through each topic id in the list from the user's checkboxes
                        foreach ($topics as $topicId)
                        {
                            if ($topic=='Other')
                            {
                                // Again, first prepare the statement
                                $statement = $db->prepare('INSERT INTO topic(name) VALUES(:name)');
                                // Then, bind the values
                                $statement->bindValue(':name', $other_topic);
                                $statement->execute();
                                $topicId = $db->lastInsertId("topic_id_seq");
                            }


                            echo "ScriptureId: $scriptureId, topicId: $topicId";
                                // Again, first prepare the statement
                                $statement = $db->prepare('INSERT INTO lookup(scripture, topic) VALUES(:scripture_id, :topic_id)');
                                // Then, bind the values
                                $statement->bindValue(':scripture_id', $scriptureId);
                                $statement->bindValue(':topic_id', $topicId);
                                $statement->execute();
                            
                        }


                        }
                        
                        ?>
					</div>
					<div class="tab-pane container fade" id="core3">

                    <?php 

                      //  echo data_table('2');
                    ?>


					</div>
					<div class="tab-pane container fade" id="stretch1">
						stretch 1 code...
					</div>
					<div class="tab-pane container fade" id="stretch2">
						stretch 2 code...
					</div>
					<div class="tab-pane container fade" id="stretch3">
						stretch 3 code...
					</div>
				</div>
			</div> 
		</div>







</body>
</html>