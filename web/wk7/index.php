<?php 
  $GLOBALS['book_number']='book_number';
/**********************************************************
Get the database connection file
***********************************************************/
  require 'connections.php';  
  session_start();
  $GLOBALS['conn']=$db;
?> 
<!DOCTYPE html>
<html lang="en">
  <!-- use own css, bootstrap and datatable libraries------------------------------------------------------ -->
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
        <form action="index.php" method="POST">
          <div id="registrationInput">
            <h2>Welcome! Please <a href="../login.php/login.php">login</a> or register.</h2><br><br>
            <label>*Username: </label>
            <input type="text" name="username" placeholder="username" required><br>
            <label>*Password:  </label>
            <input type="password" name="pwd" id="password"  placeholder="password" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$"><br><br> 
            <h6>* required</h6> 
            <h6>Password should be at least 8 characters long and include at least 1 number.</h6> <br><br>    
            <button type="submit" class="btn-rose">register</button>
        </div>
      </form>
    </main>

    <?php
      $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
      $password_clearText = filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_STRING);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $logins = checkUser($username);
          $rows = regUser($username, $password_clearText);
          if ($rows > 0){
            header('Location: ../login.php/login.php');
            die();
          }else{
            echo '<h2 class="error">***Error! Try a different username.</h2>';
          }
        }
        function regUser($username, $password_clearText){
            $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
            $username = test_input($username);
            $password_clearText = test_input($password_clearText);
            $password = password_hash($password_clearText, PASSWORD_DEFAULT);
            $statement = $GLOBALS['conn']->prepare($sql);        
            $statement->bindValue(':username', $username);
            $statement->bindValue(':password', $password);
            $statement->execute();
            $rowsChanged = $statement->rowCount();
            $statement->closeCursor();
            return $rowsChanged;
        }
        function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        function checkUser($username){
          $sql = 'SELECT username FROM users WHERE username = :username';
          $stmt = $GLOBALS['conn']->prepare($sql);
          $stmt->bindValue(':username', $username, PDO::PARAM_STR);
          $stmt->execute();
          $results = $stmt->fetch(PDO::FETCH_ASSOC);
          $stmt->closeCursor();
          if (!is_array($results)) {
              return;
          } else {
              echo '<h3 class="error">***Oops! This username is already taken.</h3>';
              echo '<h3 class="error">***Please choose another username.</h3>';              
              return;
          }
        }
    ?>
  </body>
</html>
