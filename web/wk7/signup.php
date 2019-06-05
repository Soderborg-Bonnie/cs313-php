<?php
    require_once 'common.php';
    
    // Client Side
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password_clearText = filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_STRING);
    $password2 = filter_input(INPUT_POST, 'pwd2', FILTER_SANITIZE_STRING);

    $usrErr = $pwdErr = '';

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        if (strlen($password_clearText)>=7
            && $password_clearText==$password2
            && preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $password_clearText)
            && isset($password_clearText)
            && isset($username)
        )
        {

            $rows = regClient($username, $password_clearText);

            if ($rows > 0)
            {
                header('Location: login.php');
                die();
            }
            else
            {
                echo '<p class="err"><span class="err">***</span>Error, try again!</p>';
            }

        }
        else
        {
            if (strlen($password_clearText)<7)
            {
                $pwdErr = 'Check Password Length!';
            } elseif ($password_clearText!=$password2) {

                $pwdErr = 'Password Mismatch!';

            } else {


                $pwdErr = 'Undefined Error!';

            }

        }
    }


    function regClient($username, $password_clearText) {
    $sql = 'INSERT INTO users (username, password)
            VALUES (:username, :password)';
    
    // Server Side
    $username = test_input($username);
    $password_clearText = test_input($password_clearText);
    
    $password = password_hash($password_clearText, PASSWORD_DEFAULT);

    $stmt = $GLOBALS['conn']->prepare($sql);
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);

    $stmt->execute();

    // See if the rows changed
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}


?>

<div class="login-form">
    <form action="signup.php" method="post">
        <h2 class="text-center">Sign Up for <?php echo $GLOBALS['title']; ?></h2>       
        <div class="form-group">
            <label>Username<span class="err">* <?php echo $usrErr; ?></span></label>
            <input type="text" class="form-control" name="username" placeholder="Username" required="required">
        </div>
        <div class="form-group">
            <label>Password<span class="err">* <?php echo $pwdErr; ?></span></label>
            <p>Password needs to be at least 7 characters and include 1 number</p>
            <input type="password" class="form-control" name="pwd" id="password"  placeholder="Password" required="required" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{7,}$">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="pwd2" id="confirm_password" placeholder="Confirm Password" required="required" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{7,}$">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
        </div>    
    </form>
</div>



<div id="message">
				  <h3>Password must contain the following:</h3>
				  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
				  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
				  <p id="number" class="invalid">A <b>number</b></p>
				  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
				</div>
				<script>
                    var password = document.getElementById("password")
                    , confirm_password = document.getElementById("confirm_password");

                    function validatePassword(){
                    if(password.value != confirm_password.value) {
                        confirm_password.setCustomValidity("Passwords Don't Match");
                    } else {
                        confirm_password.setCustomValidity('');
                    }
                    }

                    password.onchange = validatePassword;
                    confirm_password.onkeyup = validatePassword;
                    
                    
				var myInput = document.getElementById("password");
				var letter = document.getElementById("letter");
				var capital = document.getElementById("capital");
				var number = document.getElementById("number");
				var length = document.getElementById("length");

				// When the user clicks on the password field, show the message box
				myInput.onfocus = function() {
				  document.getElementById("message").style.display = "block";
				}

				// When the user clicks outside of the password field, hide the message box
				myInput.onblur = function() {
				  document.getElementById("message").style.display = "none";
				}

				// When the user starts to type something inside the password field
				myInput.onkeyup = function() {
                    var err = false;
				  // Validate lowercase letters
				  var lowerCaseLetters = /[a-z]/g;
				  if(myInput.value.match(lowerCaseLetters)) {  
					letter.classList.remove("invalid");
					letter.classList.add("valid");
				  } else {
					letter.classList.remove("valid");
					letter.classList.add("invalid");
				  }
				  
				  // Validate capital letters
				  var upperCaseLetters = /[A-Z]/g;
				  if(myInput.value.match(upperCaseLetters)) {  
					capital.classList.remove("invalid");
					capital.classList.add("valid");
				  } else {
					capital.classList.remove("valid");
					capital.classList.add("invalid");
				  }

				  // Validate numbers
				  var numbers = /[0-9]/g;
				  if(myInput.value.match(numbers)) {  
					number.classList.remove("invalid");
					number.classList.add("valid");
				  } else {
					number.classList.remove("valid");
					number.classList.add("invalid");
				  }
				  
				  // Validate length
				  if(myInput.value.length >= 8) {
					length.classList.remove("invalid");
					length.classList.add("valid");
				  } else {
					length.classList.remove("valid");
                    length.classList.add("invalid");
                    err = true;
                  }
                  if (err == true) {
                  $(document).on('submit', 'form', function(e){
                        e.preventDefault();
                        //your code goes here
                        //100% works
                    });
                  }
                }
                

				</script>




<?php
    html_footer();
?>


