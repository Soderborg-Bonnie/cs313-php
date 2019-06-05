<?php 
$GLOBALS['book_number']='book_number';
//Get the database connection file  
require 'connections.php';  
session_start();
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $password_clearText = filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_STRING);
            $userError = $pwdError = '';

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (strlen($password_clearText)>=8
                    && preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $password_clearText)
                    && isset($password_clearText)
                    && isset($username))
                {
                    $rows = regUser($username, $password_clearText);
                    if ($rows > 0)
                    {
                        header('Location: login.php');
                        die();
                    }
                    else
                    {
                        echo '<p class="error">***Error, try again!</p>';
                    }
                }
                else
                {
                    if (strlen($password_clearText)<7)
                    {
                        $pwdError = 'Check Password Length!';
                    } elseif ($password_clearText!=$password2) {
                        $pwdError = 'Password Mismatch!';
                    } else {
                        $pwdError = 'Undefined Error!';
                    }

                }
            }
            function regUser($username, $password_clearText) {
                $sql = 'INSERT INTO users (username, password)
                        VALUES (:username, :password)';
                $username = test_input($username);
                $password_clearText = test_input($password_clearText);
                $password = password_hash($password_clearText, PASSWORD_DEFAULT);
                $stmt = $db->prepare($sql);
                $stmt->bindValue(':username', $username, PDO::PARAM_STR);
                $stmt->bindValue(':password', $password, PDO::PARAM_STR);
                $stmt->execute();
                $rowsChanged = $stmt->rowCount();
                $stmt->closeCursor();
                return $rowsChanged;
            }
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
    <meta charset="utf-8" />
    <title>registration</title>
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
  <body id ="registrationBody">
    <main>
    <h1 id="registrationTitle">Finding Books</h1><br><br>
        <!-- <img src="../images/sparklyBook.jpg" alt="sparkly book" id="loginPic"/> -->
    <!-- Can Stock Photography by Jag_cz https://www.canstockphoto.com/old-book-on-wooden-table-22417225.html -->
      <!-- <h2>Table o' Books</h2> -->
      <form action="registration.php" method="post">
        <div id="registrationInput">
            <h2>Welcome! Please <a href="../login.php/login.php">login</a> or register.</h2><br><br>
            
            <label>User name: 
                <input type="text">
            </label><br>
            <label>Password: 
                <input type="password">
            </label><br>
            <h6>Password should be at least 8 characters long and include at least one number.</h6>
            <br>
            <input type="submit" class="btn btn-success" name="register" value="register" id="register">
        </div>
      </form>
    </main>
  </body>
</html>