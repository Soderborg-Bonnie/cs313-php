<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Team Activity Week 3</title>
    <link rel="stylesheet" media="screen" href="style.css" />
  </head>
  <body>
    <header></header>
    <!-- <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> -->
    <form action="POST" action="index.php">
      <label>Name</label>
      <input type="text" name="name" /><br />
      <label>Email</label>
      <input type="email" name="email" /><br />
      <label>Major</label><br />
      <input type="radio" name="major" value="comScience" />Computer Science
      <input type="radio" name="major" value="web" />Web Design and Development
      <input type="radio" name="major" value="compIT" />Computer information
      Technology <input type="radio" name="major" value="compEng" />Computer
      Engineering<br />
      <label>Comments</label><br />
      <textarea rows="4" cols="50" name="comments"></textarea><br />
      <input type="checkbox" name="continent[]" value="NA">North America   <br>
      <input type="checkbox" name="continent[]" value="SA">South America   <br>
      <input type="checkbox" name="continent[]" value="EU">Europe   <br>
      <input type="checkbox" name="continent[]" value="AI">Asia   <br>
      <input type="checkbox" name="continent[]" value="AU">Australia   <br>
      <input type="checkbox" name="continent[]" value="AF">Africa   <br>
      <input type="checkbox" name="continent[]" value="AA">Antartica   <br>
     </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<p>Name: ".$_POST['name']."</p>".
        '<a href="mailto:'.$_POST['email'].'">'.$_POST['name'].'</a>'.
        "<p>Major: ".$_POST['major']."</p>".
        "<p>Comments: ".$_POST['comments']."</p>";
        if (isset($_POST['continent'])) {
            echo "<p>Continent(s): ";
            print_r($_POST['continent']);
            echo "</p>";
        }
    }
?>
  </body>
</html>
