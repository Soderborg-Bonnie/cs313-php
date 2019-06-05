<?php
    require_once 'common/common.php';
    

    html_header();

?>

<!-- Based upon Template https://blackrockdigital.github.io/startbootstrap-freelancer/ -->

<header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">

        <?php
         //$_SESSION['username'] = $username;
         if ($_SESSION['loggedin']) {
                echo '<h5 class="masthead-heading text-uppercase mb-0">Welcome ' . $_SESSION['username'] . '</h5>';
         }
         else{
             echo 'not checked in';
         //header('Location: login.php');
                die();
         }

         session_unset();
         session_destroy();
        ?>



        <!-- Masthead Avatar Image -->
        <img class="masthead-avatar mb-5" src="media/avataaars.svg" alt="">


        <!-- Masthead Heading -->
        <h1 class="masthead-heading text-uppercase mb-0">Welcome Page</h1>

        <!-- Icon Divider -->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon">
                <i class="fas fa-star"></i>
            </div>
            <div class="divider-custom-line"></div>
        </div>

        <!-- Masthead Subheading -->
        <p class="masthead-subheading font-weight-light mb-0">Graphic Artist - Web Designer - Illustrator</p>

    </div>
  </header>

  
<?php
    html_footer();
?>