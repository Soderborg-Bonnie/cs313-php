<?php
session_start();
 
if (isset($_GET['name'])){

  function doCase($item) {
    if(isset($_GET['inc'])) { 
        echo ++$_SESSION[$item]; 
    }
    if(isset($_GET['dec'])) { 

        echo --$_SESSION[$item]; 
    }  } 
    switch ($_GET['name']) {
      case 'aveStrong':
          doCase('aveStrong');           
          break;
      case 'elmo':
          doCase('elmo');     
          break;
      case 'mickieBirthday':
          doCase('mickieBirthday');     
          break;
      case 'momFlowers':
          doCase('momFlowers');     
          break;
      case 'sesameStreet':
          doCase('sesameStreet');     
          break;
      case 'sunburst':
          doCase('sunburst');     
          break;
      case 'teacher':
          doCase('teacher');     
          break;
      case 'sushi':
          doCase('sushi');     
          break;
      case 'dolphins':
          doCase('dolphins');     
          break;
      case 'drSeuss':
          doCase('drSeuss');     
          break;
      case 'thankYou':
          doCase('thankYou');     
          break;
          case 'missingIntern':
          doCase('missingIntern');     
          break;
      default:{
        if (!isset($_SESSION['aveStrong'])){ $_SESSION['aveStrong'] = 0;}
        if (!isset($_SESSION['elmo'])){ $_SESSION['elmo'] = 0;}
        if (!isset($_SESSION['mickieBirthday'])){ $_SESSION['mickieBirthday'] = 0;}
        if (!isset($_SESSION['momFlowers'])){ $_SESSION['momFlowers'] = 0;}
        if (!isset($_SESSION['sesameStreet'])){ $_SESSION['sesameStreet'] = 0;}
        if (!isset($_SESSION['sunburst'])){ $_SESSION['sunburst'] = 0;}
        if (!isset($_SESSION['teacher'])){ $_SESSION['teacher'] = 0;}
        if (!isset($_SESSION['sushi'])){ $_SESSION['sushi'] = 0;}
        if (!isset($_SESSION['dolphins'])){ $_SESSION['dolphins'] = 0;}
        if (!isset($_SESSION['drSeuss'])){ $_SESSION['drSeuss'] = 0;}
        if (!isset($_SESSION['thankYou'])){ $_SESSION['thankYou'] = 0;}
        if (! isset($_SESSION['missingIntern'])){ $_SESSION['missingIntern'] = 0;}
      }
}
  
} else{
  $_SESSION['aveStrong'] = 0;
  $_SESSION['elmo'] = 0;
  $_SESSION['mickieBirthday'] = 0;
  $_SESSION['momFlowers'] = 0;
  $_SESSION['sesameStreet'] = 0;
  $_SESSION['sunburst'] = 0;
  $_SESSION['teacher'] = 0;
  $_SESSION['sushi'] = 0;
  $_SESSION['dolphins'] = 0;
  $_SESSION['drSeuss'] = 0;
  $_SESSION['thankYou'] = 0;
  $_SESSION['missingIntern'] = 0;
}

$aveStrong='';
$elmo='';
$mickieBirthday='';
$momFlowers='';
$sesameStreet='';
$sunburst='';
$sushi='';
$dolphins='';
$drSeuss='';
$sunburst='';
$thankYou='';
$missingIntern='';
// $aveStrong = $aveStrong + 1;
// $_SESSION["aveStrong"] = $aveStrong + 2;

$cookies = array 
    (
        array(
            'itemId' => "1",
            'name' => "aveStrong",
            'price' => "5.00",
            'itemCount' => ""
        ),
        array(
            'itemId' => "2",
            'name' => "elmo",
            'price' => "2.50",
            'itemCount' => ""
        ),
        array(
            'itemId' => "3",
            'name' => "mickieBirthday",
            'price' => "20.00",
            'itemCount' => ""
        ),
        array(
            'itemId' => "4",
            'name' => "momFlowers",
            'price' => "5.00",
            'itemCount' => ""
        ),
        array(
            'itemId' => "5",
            'name' => "sesameStreet",
            'price' => "60.00",
            'itemCount' => ""
        ),
        array(
            'itemId' => "6",
            'name' => "sunburst",
            'price' => "2.50",
            'itemCount' => ""
        ),
        array(
            'itemId' => "7",
            'name' => "teacherg",
            'price' => "5.00",
            'itemCount' => ""
        ),
        array(
            'itemId' => "8",
            'name' => "sushi",
            'price' => "3.00",
            'itemCount' => ""
        ),
        array(
            'itemId' => "9",
            'name' => "dolphins",
            'price' => "3.50",
            'itemCount' => ""
        ),
        array(
            'itemId' => "10",
            'name' => "aveStrong",
            'price' => "7.50",
            'itemCount' => ""
        ),
        array(
            'itemId' => "11",
            'name' => "thankYou",
            'price' => "2.50",
            'itemCount' => ""
        ),
        array(
            'itemId' => "12",
            'name' => "missingIntern",
            'price' => "3.00",
            'itemCount' => ""
        )   
    );
?>

<html lang="en-US">
  <head>
    <title>shopping cart</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
  </head>

  <body>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          
        }
        ?>
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
    <main class="mainHome">
      <section class="cookies">
        <h1>Designs</h1>
        <form method="POST" action="index.php?action=add&itemId=<?php echo $cookies[$key]["itemId"];?>">
        <div id="designs">
          <div class="designLayers">
            <img
              src="images/aveStrong.jpg"
              alt="#aveStrong"
              class="customDesign"
            />
            <div class="designText">
              <p>#AveStrong</p>
              <input 
              type="button" 
              class="addBtn" 
              value=" + " 
              id="aveStrong"
              name="aveStrong"
              onclick="window.location.href='index.php?inc=TRUE&name=aveStrong'"
              />
            </div>
          </div>
          <div class="designLayers">
            <img src="images/elmo.jpg" alt="elmo" class="customDesign" />
            <div class="designText">
              <p>Elmo</p>
              <input 
              type="button" 
              class="addBtn" 
              value=" + " 
              id="elmo"
              name="elmo"
              onclick="window.location.href='index.php?inc=TRUE&name=elmo'"
              />            </div>
          </div>
          <div class="designLayers">
            <img
              src="images/mickieBirthday.jpg"
              alt="mickie mouse birthday"
              class="customDesign"
            />
            <div class="designText">
              <p>Mickie Mouse Birthday</p>
              <input 
              type="button" 
              class="addBtn" 
              value=" + " 
              id="mickieBirthday"
              name="mickieBirthday"
              onclick="window.location.href='index.php?inc=TRUE&name=mickieBirthday'"
              />
            </div>
          </div>
          <div class="designLayers">
            <img
              src="images/momFlowers.jpg"
              alt="mom flowers"
              class="customDesign"
            />
            <div class="designText">
              <p>Vase of Flowers</p>
              <input 
              type="button" 
              class="addBtn" 
              value=" + " 
              id="momFlowers"
              name="momFlowers"
              onclick="window.location.href='index.php?inc=TRUE&name=momFlowers'"
              />
            </div>
          </div>
          <div class="designLayers">
            <img
              src="images/sesameStreet.jpg"
              alt="sesame street"
              class="customDesign"
            />
            <div class="designText">
              <p>Sesame Street</p>
              <input 
              type="button" 
              class="addBtn" 
              value=" + " 
              id="sesameStreet"
              name="sesameStreet"
              onclick="window.location.href='index.php?inc=TRUE&name=sesameStreet'"
              />
            </div>
          </div>
          <div class="designLayers">
            <img
              src="images/sunburst.jpg"
              alt="sunburst"
              class="customDesign"
            />
            <div class="designText">
              <p>Sunburst</p>
              <input 
              type="button" 
              class="addBtn" 
              value=" + " 
              id="sunburst"
              name="sunburst"
              onclick="window.location.href='index.php?inc=TRUE&name=sunburst'"
              />
            </div>
          </div>
          <div class="designLayers">
            <img src="images/teacher.jpg" alt="teacher" class="customDesign" />
            <div class="designText">
              <p>Teacher</p>
              <input 
              type="button" 
              class="addBtn" 
              value=" + " 
              id="teacher"
              name="teacher"
              onclick="window.location.href='index.php?inc=TRUE&name=teacher'"
              />
            </div>
          </div>
          <div class="designLayers">
            <img src="images/sushi2.jpg" alt="sushi" class="customDesign" />
            <div class="designText">
              <p>Sushi</p>
              <input 
              type="button" 
              class="addBtn" 
              value=" + " 
              id="sushi"
              name="sushi"
              onclick="window.location.href='index.php?inc=TRUE&name=sushi'"
              />
            </div>
          </div>
          <div class="designLayers">
            <img
              src="images/dolphins.jpg"
              alt="dolphins"
              class="customDesign"
            />
            <div class="designText">
              <p>Dolphins</p>
              <input 
              type="button" 
              class="addBtn" 
              value=" + " 
              id="dolphins"
              name="dolphins"
              onclick="window.location.href='index.php?inc=TRUE&name=dolphins'"
              />
            </div>
          </div>
          <div class="designLayers">
            <img src="images/drSeuss.jpg" alt="dr seuss" class="customDesign" />
            <div class="designText">
              <p>Dr. Seuss</p>
              <input 
              type="button" 
              class="addBtn" 
              value=" + " 
              id="drSeuss"
              name="drSeuss"
              onclick="window.location.href='index.php?inc=TRUE&name=drSeuss'"
              />
            </div>
          </div>
          <div class="designLayers">
            <img
              src="images/thankYou.jpg"
              alt="thank you"
              class="customDesign"
            />
            <div class="designText">
              <p>Thank You</p>
              <input 
              type="button" 
              class="addBtn" 
              value=" + " 
              id="thankYou"
              name="thankYou"
              onclick="window.location.href='index.php?inc=TRUE&name=thankYou'"
              />
            </div>
          </div>
          <div class="designLayers">
            <img
              src="images/internMissing.jpg"
              alt="missing intern"
              class="customDesign"
            />
            <div class="designText">
              <p>404 Missing Intern</p>
              <input 
              type="button" 
              class="addBtn" 
              value=" + " 
              id="missingIntern"
              name="missingIntern"
              onclick="window.location.href='index.php?inc=TRUE&name=missingIntern'"
              />
            </div>
          </div>
        </div>
    </form>
      </section>
      <a href="cart.php"> <button class="pageBtn">Cart</button></a>
    </main>
    <footer>
      <div>
        <p>&copy;2018 custom cookies</p>
      </div>
    </footer>
    <script src="main.js"></script>
  </body>
</html>
