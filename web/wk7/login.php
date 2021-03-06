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
    <title>login</title>
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
  <body id ="loginBody">
  <main>
    <h1 id="loginTitle">Finding Books</h1><br><br>
    <form action="login.php" method="post">
      <div id="loginInput">
        <h2>Login</h2><br><br>
        <label>Username<span class="error">* <?php echo $usrErr; ?></span></label>
        <input type="text" name="username" placeholder="username" required>   <br>        
        <label>Password<span class="error">* <?php echo $pwdErr; ?></span></label>
        <input type="password" name="pwd" placeholder="Password" required><br><br>
        <button type="submit" class="btn-rose">login</button>
      </div>
    </form>
  </main>
  </body>

  <?php
    $userError = $pwdError = '';
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password_clearText = filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_STRING);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (
        isset($password_clearText)
        && isset($username)
      ) {
        checkUser($username, $password_clearText);
        }
    }
    function checkUser($username, $password) {
      $sql = 'SELECT username, password FROM users WHERE username = :username LIMIT 1';
      $statement = $GLOBALS['conn']->prepare($sql);
      $statement->bindValue(':username', $username, PDO::PARAM_STR);
      $statement->execute();
      $results = $statement->fetchAll(PDO::FETCH_ASSOC);
      $statement->closeCursor();
      if (!is_array($results)) {       
        return 0;
      } else {
          $username = $results[0]['username'];
          $db_password =  $results[0]['password'];
          if (password_verify($password, $db_password)){
            $_SESSION['username'] = $username;
            $_SESSION['loggedin'] = TRUE;
            header('Location: ../home.php/home.php');
            die();
          } else {
              echo '<p class="error">Error, login failed!</p>';
          }
          return 1;
      }
    }
  ?>
</html>
