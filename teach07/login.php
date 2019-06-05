<?php
    require_once 'common/common.php';
    
    html_header();

    // Based on example at https://www.tutorialrepublic.com/codelab.php?topic=bootstrap&file=simple-login-form
    

    $usrErr = $pwdErr = '';
    
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password_clearText = filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_STRING);
    

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (
            isset($password_clearText)
            && isset($username)
            )
        {
            checkUser($username, $password_clearText);

        }
    }
    function checkUser($username, $password) {
        //$db = dbConnect();
        
        $sql = 'SELECT username, password FROM teach07_users WHERE username = :username LIMIT 1';
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        
        echo 'Executed<br />';
        //$matchUser = $stmt->fetch(PDO::FETCH_NUM);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        
        echo 'SQL Results Fetched <br />';
        if (!is_array($results)) {
            echo 'Nothing Set<br />';
            
          return 0;
          //echo 'Nothing found';
          //exit;
        } else {
          //echo 'Match found';
          //exit;
            echo 'Array Set <br />';
            print_r($results);
            $username = $results[0]['username'];
            $db_password =  $results[0]['password'];
            if (password_verify($password, $db_password) )
            {
                $_SESSION['username'] = $username;
                $_SESSION['loggedin'] = TRUE;

                header('Location: welcome.php');
                die();
                
            } else {
                echo '<p class="err">Error, login failed!</p>';

            }

            return 1;
        }
      }
    
    
?>



<div class="login-form">
    <form action="login.php" method="post">
        <h2 class="text-center">Log in to <?php echo $GLOBALS['title']; ?></h2>       
        <div class="form-group">
            
            <label>Username<span class="err">* <?php echo $usrErr; ?></span></label>
            <input type="text" class="form-control" name="username" placeholder="Username" required="required">
        </div>
        <div class="form-group">
            <label>Password<span class="err">* <?php echo $pwdErr; ?></span></label>
            <input type="password" class="form-control" name="pwd" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Log in</button>
        </div>
        <?php /*
        <div class="clearfix">
            <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
            <a href="#" class="pull-right">Forgot Password?</a>
        </div> 
        */ ?>      
    </form>
    <p class="text-center"><a href="signup.php">Create an Account</a></p>
</div>

<?php
    html_footer();
?>