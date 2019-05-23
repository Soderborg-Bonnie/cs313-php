<?php
 //Get the database connection file
 include '../../connections.php';
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
    <?php
    if (isset($_GET['bc']))
    {
        $scripture = $_GET['bc'];
        $sql = 'SELECT scriptures_book, scriptures_chapter, scriptures_verse, scriptures_content FROM scriptures WHERE scriptures_id='.$scripture;
        //DEBUG -- echo $sql;
        $statement = $db->query($sql);
        while ($row = $statement->fetch(PDO::FETCH_ASSOC))
        {
            echo "<strong>" . $row['scriptures_book'] ." ". $row['scriptures_chapter'] . ':' . $row['scriptures_verse'] . '</strong> - <q>' . $row['scriptures_content'] . '</q>';
        }
    }
    else
    {
        echo 'Select a scripture!';
    }
?>
   </BODY>
</HTML>
