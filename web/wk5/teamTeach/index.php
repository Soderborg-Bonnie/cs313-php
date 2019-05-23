<?php
$GLOBALS['search_page']='index.php';
$GLOBALS['details_page']='details.php';
    //Get the database connection file
include '../../connections.php';
session_start(); 
?>

<HTML>
	<HEAD>
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
        <link rel="stylesheet" href="main.css">


        <script class="init" language="javascript" type="text/javascript">		 
            function showResult(str) {
            if (str.length==0) { 
                document.getElementById("livesearch").innerHTML="";
                document.getElementById("livesearch").style.border="0px";
                return;
            }
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
            } else {  // code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function() {
                if (this.readyState==4 && this.status==200) {
                document.getElementById("livesearch").innerHTML=this.responseText;
                document.getElementById("livesearch").style.border="1px solid #A5ACB2";
                }
            }
            xmlhttp.open("GET","<?php echo $GLOBALS['search_page']; ?>?q="+str+"&CleanDisplay",true);
            xmlhttp.send();
            }
                    
                
        </script>

    </HEAD>
    <BODY>
    <?php /*
            <h1>Scripture Resources</h1>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Book</th>
                    <th>Chapter</th>
                    <th>Verse</th>
                    <th>Content</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach ($db->query('SELECT scriptures_book, scriptures_chapter, scriptures_verse, scriptures_content FROM scriptures') as $row)
                {
                    echo '<tr>';
                    
                    echo '<td>'.$row['scriptures_book'].'</td>';
                    echo '<td>'.$row['scriptures_chapter'].'</td>';
                    echo '<td>'.$row['scriptures_verse'].'</td>';
                    echo '<td>'.$row['scriptures_content'].'</td>';
                    echo '</tr>';
                  //echo "<strong>" . $row['scriptures_book'] ." ". $row['scriptures_chapter'] . ':' . $row['scriptures_verse'] . '</strong> - <q>' . $row['scriptures_content'] . '</q>';
                  //echo $row['scripures_chapter'] . $row['password'];
                  //echo '<br/>';
                }
            ?>
            
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
*/ ?>

    <?php
    // Live Search
    //if (!isset($_GET['q']))
    //{
    ?>
    <div>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="get">
                <input type="text" size="10" maxlength="64" class="form-control livesearch showHide"  placeholder="Search Nodes..." onkeyup="showResult(this.value)"  name="q" <?php if (isset($_GET['q'])) { echo 'value="'.$_GET['q'].'"'; } ?> >
            <button class="btn btn-default livesearch" type="submit">
                <i class="fa fa-search"></i>
            </button>
            

            <div id="livesearch" class="minisearch"></div>
        </form>
    </div>
    <?php
    //}
    ?>


<?php
if (isset($_GET['q']))
{
	$q=$_GET["q"];
	// Cleanup	
	$q == trim($q);
	
	//lookup all links from the results if length of q>0
	if (strlen($q)>0){
		$html='';
		
		// connect to the PostgreSQL database
		//$pdo = Connection::get()->connect();
		
            foreach ($db->query("SELECT scriptures_id,scriptures_book,scriptures_chapter,scriptures_verse FROM scriptures WHERE scriptures_book like '%".$q."%' ORDER BY scriptures_book") as $row)
            {
                $item='<p><a href="'.$GLOBALS['details_page'].'?bc='.htmlspecialchars($row['scriptures_id']).'">' . htmlspecialchars($row['scriptures_book']) . ' ' . htmlspecialchars($row['scriptures_chapter']) . ':' . htmlspecialchars($row['scriptures_verse']) . '</a><</p>'.PHP_EOL;
                
				echo '<HR />'.$item.'<br />';
				if ($hint==''){
					$hint=$item;
				}
				else
				{
					$hint=$hint . $item;
				}
            }
			
			// Set output to "no suggestion" if no hint were found
			// or to the correct values
			if ($hint=='')
			{
				$response=$section.'No Results';
			}
			else
			{
				$response=$section.$hint;
			}
			//output the response
			$html=$html.$response;
		
        
    }
	else
	{
        echo 'Too few characters';
    }
	
	echo 'Search for:';
	echo $html;
}
else
{
	echo 'Error';
}
 ?>
    </BODY>
</HTML>