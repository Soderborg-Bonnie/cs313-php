<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>CS 313</title>
    <link rel="stylesheet" media="screen" href="style.css" />
  </head>
  <body>
    <header>
      <div>
        <img src="images/bon.jpg" alt="photo of self" />
        <h1>Bonnie Soderborg</h1>
      </div>
      <nav>
        <?php include $_SERVER['DOCUMENT_ROOT'].'/CS313Website/modules/nav.php';?>
        <!-- <ul id="mainNav">
          <li><a href="index.html" class="current">Home</a></li>
          <li><a href="assignments.html">Assignments</a></li>
        </ul> -->
      </nav>
    </header>
    <main>
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
      <span id="currentDate">Placeholder</span>
    </footer>
    <script src="main.js"></script>
    <script src="currentDate.js"></script>
  </body>
</html>
