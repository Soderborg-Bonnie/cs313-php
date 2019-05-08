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



  $continents = array
  (
  array("NA","North America"),
  array("SA","South Americ"),
  array("EU","Europe"),
  array("AI","Asia"),
  array("AU","Australia"),
  array("AF","Africa"),
  array("AA","Antartica")
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
            echo '<input type="radio" value="'.$value[0].'" name="major" ';
            if ($major==$value[0]) { echo 'checked '; }
            echo ' />'.$value[1].'<br />';
        }
        ?>
      <label>Comments</label><br />
      <textarea rows="4" cols="50" name="comments"></textarea><br /><?php
      foreach ($continents as $value)
        {
            echo '<input type="checkbox" value="'.$value[0].'" name="continent[]" ';
            foreach ($continent as $x)
            {
                if ($x==$value[0])
                {
                    echo 'checked ';
                }
            }
            echo ' />'.$value[1].'<br />';
        }
        ?>
      <input type="submit" /><br />
     </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        echo "<p>Name: $name</p>";
        if ($email !='')
        {
            echo '<a href="mailto:'.$email.'">'.$email.'</a>';
        }
        echo"<p>Major: ".$major."</p>".
        "<p>Comments: ".$comments."</p>";
        foreach ($continent as $value)
        {
            echo '<p>'.$value.'</p>';
        }

        foreach ($continent as $x)
            {
                foreach ($continents as $value)
                {
                    if ($x==$value[0])
                    {
                        echo '<p>'.$value[1].'</p>';
                    }
                }
            }

    }
        
?>
 </body>
</html>
