<?php
$name='';
$email='';
$continent='';
$comments='';
$major='';
$majors = array
  (
  array("comScience","Computer Science"),
  array("web","Web Design"),
  array("compIT","Computer IT"),
  array("compEng","Computer Engineering")
  );
?>

<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Team Activity Week 3</title>
    <link rel="stylesheet" media="screen" href="style.css" />
  </head>
  <body>
    <header></header>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $continent = $_POST['continent'];
    $comments=htmlspecialchars($_POST['comments']);
    $major=htmlspecialchars($_POST['major']);
}
?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <label>Name</label>
      <input type="text" name="name" value="<?php echo $name; ?>"/><br />
      <label>Email</label>
      <input type="email" name="email" value="<?php $email; ?>"/><br />
      <label>Major</label><br />
      <?php
      foreach ($majors as $value)
        {
            echo '<input type="radio" value="'.$value[0].'" name="major" />'.$value[1].'<br />';
        }
        ?>
      <label>Comments</label><br />
      <textarea rows="4" cols="50" name="comments"></textarea><br />
      <input type="checkbox" name="continent[]" value="NA">North America   <br>
      <input type="checkbox" name="continent[]" value="SA">South America   <br>
      <input type="checkbox" name="continent[]" value="EU">Europe   <br>
      <input type="checkbox" name="continent[]" value="AI">Asia   <br>
      <input type="checkbox" name="continent[]" value="AU">Australia   <br>
      <input type="checkbox" name="continent[]" value="AF">Africa   <br>
      <input type="checkbox" name="continent[]" value="AA">Antartica   <br>
      <input type="submit" /><br />
     </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        echo "<p>Name: $name</p>".
        '<a href="mailto:'.$email.'">'.$name.'</a>'.
        "<p>Major: ".$major."</p>".
        "<p>Comments: ".$comments."</p>";
        foreach ($continent as $value)
        {
            echo '<p>'.$value.'</p>';
        }
    }
        
?>
 </body>
</html>
