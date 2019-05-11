<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>shopping cart</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="/web/shoppingCart/style.css" />
  </head>

  <body>
    <header>
      <div class="logo">
        <a href="/web/shoppingCart/index.php" id="logoText">
          <h1>custom cookies</h1>
        </a>
      </div>
      <nav>
        <button onclick="toggleMenu()">&#9776;</button>
        <ul id="mainNav" class="hide">
          <li><a href="/web/shoppingCart/index.php" class="current">Home</a></li>
          <li><a href="/web/shoppingCart/cart.php">Cart</a></li>
        </ul>
      </nav>
    </header>
    <main>
      <h3>Thanks for shopping with custom cookies!</h3><br /><br />
      <h3>Your order: </h3><br />
      <?php if ($_SESSION['aveStrong'] > 0){
        echo "#AveStrong: ".$_SESSION['aveStrong']."<br>";
        }
        ?>
        <?php if ($_SESSION['elmo'] > 0){
        echo "Elmo: ".$_SESSION['elmo']."<br>";
        }
        ?>
        <?php if ($_SESSION['mickieBirthday'] > 0){
        echo "Mickie Mouse birthday: ".$_SESSION['mickieBirthday']."<br>";
        }
        ?>
        <?php if ($_SESSION['momFlowers'] > 0){
        echo "Vase of Flowers: ".$_SESSION['momFlowers']."<br>";
        }
        ?>
        <?php if ($_SESSION['sesameStreet'] > 0){
        echo "Sesame Street: ".$_SESSION['sesameStreet']."<br>";
        }
        ?>
        <?php if ($_SESSION['sunburst'] > 0){
        echo "Sunburst: ".$_SESSION['sunburst']."<br>";
        }
        ?>
        <?php if ($_SESSION['teacher'] > 0){
        echo "Teacher: ".$_SESSION['teacher']."<br>";
        }
        ?>
        <?php if ($_SESSION['sushi'] > 0){
        echo "Sushi: ".$_SESSION['sushi']."<br>";
        }
        ?>
        <?php if ($_SESSION['dolphins'] > 0){
        echo "Dolphins: ".$_SESSION['dolphins']."<br>";
        }
        ?>
        <?php if ($_SESSION['drSeuss'] > 0){
        echo "Dr. Seuss: ".$_SESSION['drSeuss']."<br>";
        }
        ?>
        <?php if ($_SESSION['thankYou'] > 0){
        echo "Thank you: ".$_SESSION['thankYou']."<br>";
        }
        ?>
        <?php if ($_SESSION['missingIntern'] > 0){
        echo "404 Missing Intern: ".$_SESSION['missingIntern']."<br>";
        }
        ?><br /><br />

      <h3>Here's where it's going: </h3><br />
      <?php if (isset($_POST['submit'])){
        echo $_POST['streetAddress']."<br>";
        echo $_POST['city']."<br>";
        echo $_POST['state']."<br>";
        echo $_POST['zipCode']."<br>";
      }else {
        echo "Your order was lost! Oh no!";
      }
       ?>    
    </main>
  </body>
</html>
