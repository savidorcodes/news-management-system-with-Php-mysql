<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Ekiensnews | Entertainment</title>

<meta charset="utf-8">
  <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="">
  <meta name="encoding" />

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

<body class="bg-light style-default style-rounded">

  <!-- Preloader -->
  <div class="loader-mask">
    <div class="loader">
      <div></div>
    </div>
  </div>

  <!-- Bg Overlay -->
  <div class="content-overlay"></div>

  <!-- Sidenav -->    
  <?php include "sidenav.php"; ?>  
   <!-- end sidenav -->

  <main class="main oh" id="main">

    <!-- Top Bar -->
    <div class="top-bar d-none d-lg-block">
      <div class="container">
        <div class="row">

        </div>
      </div>
    </div> <!-- end top bar -->        

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
            <?php include "logo.php" ?>
            </a>

            <!-- Nav-wrap -->
            <?php include "pages.php" ?>
         <!-- end nav-wrap -->

            <!-- Nav Right -->
            <div class="nav__right">           

            </div> <!-- end nav right -->            
        
          </div> <!-- end flex-parent -->
        </div> <!-- end container -->

      </div>
    </header> <!-- end navigation -->
     

    <div class="main-container container pt-40" id="main-container">         

      <!-- Content -->
      <div class="row">

        <!-- Posts -->
        <div class="col-lg-8 blog__content mb-72">
        <?php
			  if( $admin_query = mysqli_query($con,"select * from entertainmentnews ORDER BY id ASC limit 10"))
			                  {
			                 $num   = mysqli_num_rows($admin_query);
			                 while($row = mysqli_fetch_array($admin_query))
			                  {
		 ?>
          <article class="entry card post-list">
            <div class="entry__img-holder post-list__img-holder card__img-holder" style="background-image: url(img/content/list/list_post_1.jpg)">
            <a href="enternews.php?depcat=<?php echo $row['id'];?>" title="<?php echo htmlentities( $row['']);?>" class="thumb-url"></a>
              <img src="admin/<?php echo $row['image'];?>" alt="" title=""/>
              <a href="#" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--blue"><?php echo $row['tag']; ?></a>
            </div>

            <div class="entry__body post-list__body card__body">
              <div class="entry__header">
                <h2 class="entry__title">
                <a href="enternews.php?depcat=<?php echo $row['id'];?>" title="<?php echo htmlentities( $row['tilte']);?>"> <?php echo $row['title'];?> </a>
                </h2>
                <ul class="entry__meta">
                  <li class="entry__meta-author">
                    <span>by</span>
                    <a href="#"> <?php echo $row['author_name']; ?></a>
                  </li>
                  <li class="entry__meta-date">
                  <?php echo $row['date']; ?>
                    <?php echo $row['month']; ?>,
                    <?php echo $row['year']; ?>
                  </li>
                </ul>
              </div>        
              <div class="entry__excerpt">
                <p><?php echo $row['descn']; ?>...</p>
              </div>
            </div>
          </article>
          <?php }
			          	}
			             	else
				       {
					echo 'Query unsuccessful :: ' . $con->errorno;
					var_dump( $con);
				}
                    ?>
          
        </div> <!-- end posts -->

        <!-- Sidebar -->
        <aside class="col-lg-4 sidebar sidebar--right">

          <!-- Widget Popular Posts -->
          <aside class="widget widget-popular-posts">
            <h4 class="widget-title">Popular Posts</h4>
            <ul class="post-list-small">
            <?php
			  if( $admin_query = mysqli_query($con,"select * from entertainmentnews ORDER BY id DESC limit 10"))
			                  {
			                 $num   = mysqli_num_rows($admin_query);
			                 while($row = mysqli_fetch_array($admin_query))
			                  {
		 ?>
              <li class="post-list-small__item">
             
                <article class="post-list-small__entry clearfix">
                  <div class="post-list-small__img-holder">
                    <div class="thumb-container thumb-100">
                    <a href="enternews.php?depcat=<?php echo $row['id'];?>" title="<?php echo htmlentities( $row['']);?>">
                      <img src="admin/<?php echo $row['image'];?>" alt="" class=" lazyload">
                      </a>
                    </div>
                  </div>
                  <div class="post-list-small__body">
                    <h3 class="post-list-small__entry-title">
                    <a href="enternews.php?depcat=<?php echo $row['id'];?>" title="<?php echo htmlentities( $row['tilte']);?>"> <?php echo $row['title'];?> </a>
                    </h3>
                    <ul class="entry__meta">
                      <li class="entry__meta-author">
                        <span>by</span>
                        <a href="#"> <?php echo $row['author_name']; ?></a>
                      </li>
                      <li class="entry__meta-date">
                      <?php echo $row['date']; ?>
                    <?php echo $row['month']; ?>,
                    <?php echo $row['year']; ?>
                      </li>
                    </ul>
                  </div>                  
                </article>
                
              </li>
              <?php }
			          	}
			             	else
				       {
					echo 'Query unsuccessful :: ' . $con->errorno;
					var_dump( $con);
				}
                    ?>
            </ul>           
          </aside> <!-- end widget popular posts -->

          <!-- Widget Socials -->
          <?php include "socialmediawidget.php" ?>
          <!-- end widget socials -->

        </aside> <!-- end sidebar -->
  
      </div> <!-- end content -->
    </div> <!-- end main container -->

    <!-- Footer -->
    <?php include "sportnewsfooter.php" ?>
    <!-- end footer -->

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