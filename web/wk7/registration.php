<?php 
$GLOBALS['book_number']='book_number';
//Get the database connection file  
require 'connections.php';  
session_start();

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password_clearText = filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_STRING);
$usernameError = $pwdError = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo 'YES!';
        if (strlen($password_clearText)>=8
            && preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $password_clearText)
            && isset($password_clearText)
            && isset($username))
        {
            echo 'PASSED!';
            $rows = regUser($username, $password_clearText);
            echo 'rows'.$rows;
            // if ($rows > 0)
            {
                header('Location: ../login.php/login.php');
                die();
            }
            // else
            // {
            //     echo '<p class="error">***Error, try again!</p>';
            // }
        }
        else
        {
            if (strlen($password_clearText)<8)
            {
                $pwdError = 'Check Password Length!';
            } else {
                $pwdError = 'Password Error!';
            }

        }
    }
    function regUser($username, $password_clearText) {
        echo $username, $password_clearText;
        // $sql = 'INSERT INTO users (username, password) VALUES (:username, :password)';
        // $username = test_input($username);
        // $password_clearText = test_input($password_clearText);
        $password = password_hash($password_clearText, PASSWORD_DEFAULT);
        echo 'hashed'.$password;

        // $statement = $db->prepare("UPDATE isbn SET book_title = :title WHERE book_number = '$book_number'");
        // $statement->bindValue(':title', $title);
        // $statement->execute();

        $stmt = $db->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':password', $password);
        $stmt->execute();
        // $rowsChanged = $stmt->rowCount();
        // $stmt->closeCursor();
        // return $rowsChanged;
    }
    // function test_input($data) {
    //     $data = trim($data);
    //     $data = stripslashes($data);
    //     $data = htmlspecialchars($data);
    //     return $data;
    //     }
    
?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>registration</title>
    <link rel="stylesheet" media="screen" href="../style.css" />
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
  </head>
  <body id ="registrationBody">
    <main>
    <h1 id="registrationTitle">Finding Books</h1><br><br>
        <!-- <img src="../images/sparklyBook.jpg" alt="sparkly book" id="loginPic"/> -->
    <!-- Can Stock Photography by Jag_cz https://www.canstockphoto.com/old-book-on-wooden-table-22417225.html -->
      <form action="registration.php" method="POST">
        <div id="registrationInput">
            <h2>Welcome! Please <a href="../login.php/login.php">login</a> or register.</h2><br><br>
            <label>Username: <span class="error">* <?php echo $userError; ?></span></label>
            <input type="text" name="username" placeholder="username" required><br>
            <label>Password:  <span class="error">* <?php echo $pwdError; ?></span></label>
            <input type="password" name="pwd" id="password"  placeholder="password" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$"><br>  
            <h6>Password should be at least 8 characters long and include at least 1 number.</h6> <br><br>    
            <button type="submit" class="btn btn-success">register</button>
        </div>
      </form>
    </main>
    <script src="../main.js"></script>
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
  </body>
</html>
