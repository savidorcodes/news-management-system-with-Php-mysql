<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ekiensnews | About Us</title>

  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="">

  <!-- Google Fonts -->
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,600,700%7CSource+Sans+Pro:400,600,700' rel='stylesheet'>

  <!-- Css -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/font-icons.css" />
  <link rel="stylesheet" href="css/style.css" />

  <!-- Favicons -->
  <link rel="shortcut icon" href="img/favicon.ico">
  <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

  <!-- Lazyload (must be placed in head in order to work) -->
  <script src="js/lazysizes.min.js"></script>

</head>

<body class="style-default style-rounded">

  <!-- Preloader -->
  <div class="loader-mask">
    <div class="loader">
      <div></div>
    </div>
  </div>
  
  <!-- Bg Overlay -->
  <div class="content-overlay"></div>
  <?php include "sidenav.php"; ?>
  <main class="main oh" id="main">

    <!-- Top Bar -->

    <!-- Navigation -->
    <header class="nav">

      <div class="nav__holder nav--sticky">
        <div class="container relative">
          <div class="flex-parent">

            <!-- Side Menu Button -->
            <button class="nav-icon-toggle" id="nav-icon-toggle" aria-label="Open side menu">
              <span class="nav-icon-toggle__box">
                <span class="nav-icon-toggle__inner"></span>
              </span>
            </button> 

            <!-- Logo -->
            <a href="index.php" class="logo">
              <img class="logo__img" src="img/N1.png" srcset="img/N1.png, img/N1.png" alt="logo">
            </a>

            <!-- Nav-wrap -->
            <nav class="flex-child nav__wrap d-none d-lg-block">              
              <ul class="nav__menu">
              <li><a href="index.php">Home</a></li>
                <li><a href="politics.php">Politics</a></li>
                <li><a href="sport.php">Sport</a></li>                
                <li><a href="health.php">Health</a></li>                
                <li><a href="tech.php">Tecnology</a></li>
                <li><a href="enter.php">Entertainment / Life</a></li>
                <li><a href="edu.php">Education</a></li>
              </ul> <!-- end menu -->
            </nav> <!-- end nav-wrap -->

            <!-- Nav Right -->
          </div> <!-- end flex-parent -->
        </div> <!-- end container -->

      </div>
    </header> <!-- end navigation -->

    <!-- Breadcrumbs -->
    <div class="container">
      <ul class="breadcrumbs">
        <li class="breadcrumbs__item">
          <a href="index.php" class="breadcrumbs__url">Home</a>
        </li>
        <li class="breadcrumbs__item breadcrumbs__item--current">
          About Us
        </li>
      </ul>
    </div>
    <?php
			              if( $admin_query = mysqli_query($con,"select * from aboutus ORDER BY id ASC limit 1"))
			                  {
			                 $num   = mysqli_num_rows($admin_query);
			                 while($row = mysqli_fetch_array($admin_query))
			                  {
			            ?>
    <div class="main-container container" id="main-container">            
      <!-- post content -->
      <div class="blog__content mb-72">
        <h1 class="page-title"> </h1>
        <img src="admin/<?php echo $row['image'];?>" class="entry__img lazyload" alt="" />
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="entry__article">
            <?php echo $row['about']; ?>
            </div>
          </div>
        </div>
      </div> <!-- end post content -->
    </div> <!-- end main container -->
    <?php }
			          	}
			             	else
				       {
					echo 'Query unsuccessful :: ' . $con->errorno;
					var_dump( $con);
				}
                    ?>  
    <!-- Footer -->
    <?php include "i_footer.php"; ?>

    <div id="back-to-top">
      <a href="#top" aria-label="Go to top"><i class="ui-arrow-up"></i></a>
    </div>

  </main> <!-- end main-wrapper -->

  
  <!-- jQuery Scripts -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/easing.min.js"></script>
  <script src="js/owl-carousel.min.js"></script>
  <script src="js/flickity.pkgd.min.js"></script>
  <script src="js/twitterFetcher_min.js"></script>
  <script src="js/jquery.newsTicker.min.js"></script>  
  <script src="js/modernizr.min.js"></script>
  <script src="js/scripts.js"></script>

</body>
</html>