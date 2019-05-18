<?php
        date_default_timezone_set('America/Denver');
        
        $timestamp = time();
        $date_time = date("d-m-Y (D) H:i:s", $timestamp);
        echo "Current date and local time on this server is $date_time";
?>

<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Assignments</title>
    <link rel="stylesheet" media="screen" href="style.css" />
  </head>
  <body>
    <header>
      <div>
        <!-- pic -->
        <img src="images/bon.jpg" />
        <h1>Bonnie Soderborg</h1>
      </div>
      <nav>
        <ul id="mainNav">
          <li><a href="index.php">Home</a></li>
          <li><a href="assignments.php" class="current">Assignments</a></li>
        </ul>
      </nav>
    </header>
    <main id="assignments">
      <h1>Assignments</h1>
      <ul>
        <li><a href="../wk3/index.php">Week 3 Team Activity</a></li>
        <li><a href="../shoppingCart/index.php">Week 3 Shopping Cart</a></li>
        <li>
          <a href="../wk4/wk4Team.txt">Week 4 Team Activity</a>
        </li>
        <li>
          <a href="../wk4/tableCreation.sql"
            >Week 4 Creation of Database Tables</a
          >
        </li>
      </ul>
    </main>
    <footer><p>&copy;2019 All rights reserved. Bonnie Soderborg</p></footer>
  </body>
</html>