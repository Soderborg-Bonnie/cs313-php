<?php
session_start();
// echo $_SESSION["aveStrong"] ;

if (isset($_GET['name'])){

  function doCase($item) {
    if(isset($_GET['inc'])) { // increasing
        echo ++$_SESSION[$item]; // no need for extra variable (preincrement to echo immediately)
    }
    if(isset($_GET['dec'])) { // decreasing

        echo --$_SESSION[$item]; // no need for extra variable (predecrement to echo immediately)
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
      }
}
  
}



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
      </div>      <nav>
        <button onclick="toggleMenu()">&#9776;</button>
        <ul id="mainNav" class="hide">
          <li><a href="index.php" class="current">Home</a></li>
          <li><a href="cart.php">Cart</a></li>
        </ul>
      </nav>
    </header>
    <main>
      <h1>CART</h1>
  
<?php if($_SESSION['aveStrong']>0) : ?>    
  <div class="designLayers">
    <img
      src="images/aveStrong.jpg"
      alt="#aveStrong"
      class="customDesign"
    />
    <div class='designText'>
    <?php $label = $_SESSION['aveStrong']; ?>
    <p>aveStrong = <?= $label ?></p>
    <input 
    type='button' 
    value=' + ' 
    id='aveStrong'
    name='aveStrong'
    onclick="window.location.href='cart.php?inc=TRUE&name=aveStrong'"  
    />
    
    <input 
    type='button' 
    value=' - ' 
    id='aveStrong'
    name='aveStrong'
    onclick="window.location.href='cart.php?dec=FALSE&name=aveStrong'"'
    />
    </div>
  </div>    
<?php endif; ?>

<?php if($_SESSION['elmo']>0) : ?>
<div class="designLayers">
    <img
      src="images/elmo.jpg"
      alt="#elmo"
      class="customDesign"
    />
  <div class='designText'>
    <?php $label = $_SESSION['elmo']; ?>
    <p>elmo = <?= $label ?></p>
    <input 
    type='button' 
    value=' + ' 
    id='elmo'
    name='elmo'
    onclick="window.location.href='cart.php?inc=TRUE&name=elmo'"  
    />
    
    <input 
    type='button' 
    value=' - ' 
    id='elmo'
    name='elmo'
    onclick="window.location.href='cart.php?dec=FALSE&name=elmo'"'
    />
  </div>
</div>
<?php endif; ?>

<?php if($_SESSION['mickieBirthday']>0) : ?>
<div class="designLayers">
    <img
      src="images/mickieBirthday.jpg"
      alt="#mickieBirthday"
      class="customDesign"
    />
  <div class='designText'>
    <?php $label = $_SESSION['mickieBirthday']; ?>
    <p>mickieBirthday = <?= $label ?></p>
    <input 
    type='button' 
    value=' + ' 
    id='mickieBirthday'
    name='mickieBirthday'
    onclick="window.location.href='cart.php?inc=TRUE&name=mickieBirthday'"  
    />
    
    <input 
    type='button' 
    value=' - ' 
    id='mickieBirthday'
    name='mickieBirthday'
    onclick="window.location.href='cart.php?dec=FALSE&name=mickieBirthday'"'
    />
  </div>
</div>
<?php endif; ?>

<?php if($_SESSION['momFlowers']>0) : ?>
<div class="designLayers">
    <img
      src="images/momFlowers.jpg"
      alt="#mickieBirthday"
      class="customDesign"
    />
  <div class='designText'>
    <?php $label = $_SESSION['momFlowers']; ?>
    <p>momFlowers = <?= $label ?></p>
    <input 
    type='button' 
    value=' + ' 
    id='momFlowers'
    name='momFlowers'
    onclick="window.location.href='cart.php?inc=TRUE&name=momFlowers'"  
    />
    
    <input 
    type='button' 
    value=' - ' 
    id='momFlowers'
    name='momFlowers'
    onclick="window.location.href='cart.php?dec=FALSE&name=momFlowers'"'
    />
  </div>
</div>
<?php endif; ?>

<?php if($_SESSION['sesameStreet']>0) : ?>
<div class="designLayers">
    <img
      src="images/sesameStreet.jpg"
      alt="#sesameStreet"
      class="customDesign"
    />
  <div class='designText'>
    <?php $label = $_SESSION['sesameStreet']; ?>
    <p>sesameStreet = <?= $label ?></p>
    <input 
    type='button' 
    value=' + ' 
    id='sesameStreet'
    name='sesameStreet'
    onclick="window.location.href='cart.php?inc=TRUE&name=sesameStreet'"  
    />
    
    <input 
    type='button' 
    value=' - ' 
    id='sesameStreet'
    name='sesameStreet'
    onclick="window.location.href='cart.php?dec=FALSE&name=sesameStreet'"'
    />
  </div>
</div>
<?php endif; ?>

<?php if($_SESSION['sunburst']>0) : ?>
<div class="designLayers">
    <img
      src="images/sunburst.jpg"
      alt="#sunburst"
      class="customDesign"
    />
  <div class='designText'>
    <?php $label = $_SESSION['sunburst']; ?>
    <p>sunburst = <?= $label ?></p>
    <input 
    type='button' 
    value=' + ' 
    id='sunburst'
    name='sunburst'
    onclick="window.location.href='cart.php?inc=TRUE&name=sunburst'"  
    />
    
    <input 
    type='button' 
    value=' - ' 
    id='sunburst'
    name='sunburst'
    onclick="window.location.href='cart.php?dec=FALSE&name=sunburst'"'
    />
  </div>
</div>
<?php endif; ?>

<?php if($_SESSION['teacher']>0) : ?>
<div class="designLayers">
    <img
      src="images/teacher.jpg"
      alt="#teacher"
      class="customDesign"
    />
  <div class='designText'>
    <?php $label = $_SESSION['teacher']; ?>
    <p>teacher = <?= $label ?></p>
    <input 
    type='button' 
    value=' + ' 
    id='teacher'
    name='teacher'
    onclick="window.location.href='cart.php?inc=TRUE&name=teacher'"  
    />
    
    <input 
    type='button' 
    value=' - ' 
    id='teacher'
    name='teacher'
    onclick="window.location.href='cart.php?dec=FALSE&name=teacher'"'
    />
  </div>
</div>
<?php endif; ?>

<?php if($_SESSION['sushi']>0) : ?>
<div class="designLayers">
    <img
      src="images/sushi2.jpg"
      alt="#sushi"
      class="customDesign"
    />
  <div class='designText'>
    <?php $label = $_SESSION['sushi']; ?>
    <p>sushi = <?= $label ?></p>
    <input 
    type='button' 
    value=' + ' 
    id='sushi'
    name='sushi'
    onclick="window.location.href='cart.php?inc=TRUE&name=sushi'"  
    />
    
    <input 
    type='button' 
    value=' - ' 
    id='sushi'
    name='sushi'
    onclick="window.location.href='cart.php?dec=FALSE&name=sushi'"'
    />
  </div>
</div>
<?php endif; ?>

<?php if($_SESSION['dolphins']>0) : ?>
<div class="designLayers">
    <img
      src="images/dolphins.jpg"
      alt="#dolphins"
      class="customDesign"
    />
  <div class='designText'>
    <?php $label = $_SESSION['dolphins']; ?>
    <p>dolphins = <?= $label ?></p>
    <input 
    type='button' 
    value=' + ' 
    id='dolphins'
    name='dolphins'
    onclick="window.location.href='cart.php?inc=TRUE&name=dolphins'"  
    />
    
    <input 
    type='button' 
    value=' - ' 
    id='dolphins'
    name='dolphins'
    onclick="window.location.href='cart.php?dec=FALSE&name=dolphins'"'
    />
  </div>
</div>
<?php endif; ?>


<?php if($_SESSION['drSeuss']>0) : ?>
<div class="designLayers">
    <img
      src="images/drSeuss.jpg"
      alt="#drSeuss"
      class="customDesign"
    />
  <div class='designText'>
    <?php $label = $_SESSION['drSeuss']; ?>
    <p>drSeuss = <?= $label ?></p>
    <input 
    type='button' 
    value=' + ' 
    id='drSeuss'
    name='drSeuss'
    onclick="window.location.href='cart.php?inc=TRUE&name=drSeuss'"  
    />
    
    <input 
    type='button' 
    value=' - ' 
    id='drSeuss'
    name='drSeuss'
    onclick="window.location.href='cart.php?dec=FALSE&name=drSeuss'"'
    />
  </div>
</div>
<?php endif; ?>

<?php if($_SESSION['thankYou']>0) : ?>
<div class="designLayers">
    <img
      src="images/thankYou.jpg"
      alt="#thankYou"
      class="customDesign"
    />
  <div class='designText'>
    <?php $label = $_SESSION['thankYou']; ?>
    <p>thankYou = <?= $label ?></p>
    <input 
    type='button' 
    value=' + ' 
    id='thankYou'
    name='thankYou'
    onclick="window.location.href='cart.php?inc=TRUE&name=thankYou'"  
    />
    
    <input 
    type='button' 
    value=' - ' 
    id='thankYou'
    name='thankYou'
    onclick="window.location.href='cart.php?dec=FALSE&name=thankYou'"'
    />
  </div>
</div>
<?php endif; ?>

<?php if($_SESSION['missingIntern']>0) : ?>
<div class="designLayers">
    <img
      src="images/internMissing.jpg"
      alt="#missingIntern"
      class="customDesign"
    />
  <div class='designText'>
    <?php $label = $_SESSION['missingIntern']; ?>
    <p>missingIntern = <?= $label ?></p>
    <input 
    type='button' 
    value=' + ' 
    id='missingIntern'
    name='missingIntern'
    onclick="window.location.href='cart.php?inc=TRUE&name=missingIntern'"  
    />
    
    <input 
    type='button' 
    value=' - ' 
    id='missingIntern'
    name='missingIntern'
    onclick="window.location.href='cart.php?dec=FALSE&name=missingIntern'"'
    />
  </div>
</div>
<?php endif; ?>

    </main>
    <a href="checkout.php">
      <button class="pageBtn">CHECKOUT</button>
    </a>
  </body>
</html>
