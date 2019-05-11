<?php
session_start();
?>
<?php
$name='';
$email='';
$phone='';
$streetAddress='';
$city='';
$state='';
$zipCode='';
?>

<html lang="en-US">
  <head>
    <title>shopping cart</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
  </head>

  <body>
    <header>
      <div class="logo">
        <a href="index.php" id="logoText">
          <h1>custom cookies</h1>
        </a>
      </div>
      <nav>
        <button onclick="toggleMenu()">&#9776;</button>
        <ul id="mainNav" class="hide">
          <li><a href="index.php" class="current">Home</a></li>
          <li><a href="cart.php">Cart</a></li>
        </ul>
      </nav>
    </header>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        $streetAddress = $_POST['streetAddress'];
        $city=htmlspecialchars($_POST['city']);
        $state=htmlspecialchars($_POST['state']);
        $zipCode=htmlspecialchars($_POST['zipCode']);
    }
    ?>

    <main>
        <!-- <h2>Here's what we have lined up for you so far:</h2><br /> -->
        <h2>Pleaese fill out the following: </h2><br />
    <!-- <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> -->
    <form method="post" action="confirmation.php">
            <label>Full name: </label>
            <input type="text" name="name" value="<?php echo $name; ?>"/><br /><br />
            <label>Email: </label>
            <input type="email" name="email" value="<?php echo $email; ?>"/><br /><br />
            <label>Phone: </label>
            <input type="tel" name="phone" value="<?php echo $phone; ?>"/><br /><br />
            <label>Street address: </label>
            <input type="text" name="streetAddress" value="<?php echo $streetAddress; ?>"/><br /><br />          
            <label>City: </label>
            <input type="text" name="city" value="<?php echo $city; ?>"/><br /><br />
            <label>State: </label>
            <input type="text" name="state" value="<?php echo $state; ?>"/><br /><br />          
            <label>Zip code: </label>
            <input type="text" name="zipCode" value="<?php echo $zipCode; ?>"/><br /><br />
            <a href="cart.php">
                <input type="button" class="pageBtn" value="Browse">
            </a>
                <input type="submit" name="submit" value="order" class="pageBtn">
    </form>

</main>
  </body>
</html>
