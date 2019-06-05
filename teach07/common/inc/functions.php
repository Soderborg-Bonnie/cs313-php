<?php



/*******************************************************
 * Function: db_statement
 * Runs Database Query
 *******************************************************
 * @param int $conn    		Connection for DB
 * Returns results (Can be looped through)
 *******************************************************/
function db_statement($conn,$sql) {
	$statement = $conn->query($sql);
	$results = $statement->fetchAll(PDO::FETCH_ASSOC);
	
	return $results;
}


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

/*******************************************
 *        Generic Founctions
 *******************************************/

function html_header()
{
    ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title><?php echo $GLOBALS['title_simple']; ?></title>
            
            <!-- Bootstrap 4 and Data Tables CSS  -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
            
            <!-- Awesome Fonts  -->
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

            <!-- Template CSS -->
            <link href="layout/css/freelancer.min.css" rel="stylesheet">

            <!-- Local Web App CSS  -->
            <link href="<?php echo $GLOBALS['path_layout']; ?>css/style.css" rel="stylesheet">

        </head>
        <body>
    <?php
}


function html_footer()
{
    ?>
            <!-- JS Bootstrap 4  -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

            <!-- JS Datatables  -->
            <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
            <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
            <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

            <!-- Local Web App JS  -->
            <script src="<?php echo $GLOBALS['path_layout']; ?>js/javascript.js"></script>

        </body>
        </html> 
    <?php
}



?>