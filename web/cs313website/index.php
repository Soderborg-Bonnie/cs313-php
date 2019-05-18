<?php
        date_default_timezone_set('America/Denver');
        
        $timestamp = time();
        $date_time = date("d-m-Y (D) H:i:s", $timestamp);
        echo "Current date and local time on this server is $date_time";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>CS 313</title>
    <link rel="stylesheet" media="screen" href="style.css" />
  </head>
  <body>
    <header>
      <div id="topOfPage">
        <img src="images/bon.jpg" alt="photo of self" />
        <div>
          <h1>Bonnie Soderborg</h1>
          <br />
          <h3>Web Design and Development student at BYU-I</h3>
          <br /><br />
          <h3 id="cs313">CS 313</h3>
        </div>
      </div>
      <nav>
        <ul id="mainNav">
          <li><a href="index.php" class="current">Home</a></li>
          <li><a href="assignments.php">Assignments</a></li>
        </ul>
      </nav>
    </header>
    <main id="homeMain">
      <div id="fourPack">
        <!-- <p>CS 313</p> -->
        <img
          class="color"
          onclick="change"
          id="fam"
          src="images/family.jpg"
          alt="family on boat"
        />
        <img
          class="color"
          onclick="change"
          id="dolphins"
          src="images/dolphins.jpg"
          alt="dolphins jumping in ocean"
        />
        <img
          class="color"
          onclick="change"
          id="jetty"
          src="images/jetty.jpg"
          alt="seagull on keepoff jetty"
        />
        <img
          class="color"
          onclick="change"
          id="sunset"
          src="images/sunset.jpg"
          alt="sunset over ocean"
        />
      </div>
    </main>
    <!-- <footer><p>&copy;2019 Bonnie Soderborg</p></footer> -->
    <footer>
      <p>&copy;2019 All rights reserved. Bonnie Soderborg</p>
      <p>background pattern from Toptal Subtal Patterns</p>
      <span id="currentDate">Placeholder</span>
    </footer>
    <script src="main.js"></script>
    <script src="currentDate.js"></script>
  </body>
</html>
