<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ekiensnews | Fashion</title>

  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="">

  <!-- Google Fonts -->
  <link href='https://fonts.googleapis.com/css?family=Lora:400i,700%7CBarlow:400,500,700' rel='stylesheet'>

  <!-- Css -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/font-icons.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/colors/pink.css" />

  <!-- Favicons -->
  <link rel="shortcut icon" href="img/favicon.ico">
  <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

  <!-- Lazyload (must be placed in head in order to work) -->
  <script src="js/lazysizes.min.js"></script>

</head>

<body class="bg-light style-fashion">

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

    <!-- Navigation -->
    <header class="nav nav--2">
      <div class="nav__holder nav--sticky">
        <div class="container relative">
          <div class="flex-parent">
  
            <div class="flex-child">
              <div class="logo-holder">
                <!-- Side Menu Button -->
                <button class="nav-icon-toggle" id="nav-icon-toggle" aria-label="Open side menu">
                  <span class="nav-icon-toggle__box">
                    <span class="nav-icon-toggle__inner"></span>
                  </span>
                </button> 

                <!-- Logo -->
                <a href="index.php" class="logo">
                  <img class="logo__img" src="img/logo_fashion11.png" srcset="img/logo_fashion111.png 1x, img/logo_fashion@222x.png 2x" alt="logo">
                </a>
              </div>
            </div>

            <!-- Nav-wrap -->
            <nav class="flex-child nav__wrap d-none d-lg-block">              
              <ul class="nav__menu">

                `<li class="active">
                  <a href="index.php">Home</a>
                </li>

               ` <li class="">
                  <a href="politics.php">Politics</a>
                </li>`

                <li class="">
                  <a href="sport.php">Sport</a>
                </li>`

                <li class="">
                  <a href="tech.php">Tecnology</a>
                    </li>`
                <li class="">
                  <a href="business.php">Business</a>
                    </li>`
                <li class="">
                  <a href="enter.php">Entertainment</a>
                    </li>`
                <li class="">
                  <a href="life.php">Life</a>
                    </li>`
                  </ul>
                </li>
              </ul> <!-- end menu -->
            </nav> <!-- end nav-wrap -->
          
            <!-- Nav Right -->
            <div class="flex-child">
              <div class="nav__right">

                <!-- Search -->
                <div class="nav__right-item nav__search">
                  <a href="#" class="nav__search-trigger" id="nav__search-trigger">
                    <i class="ui-search nav__search-trigger-icon"></i>
                  </a>
                  <div class="nav__search-box" id="nav__search-box">
                    <form class="nav__search-form">
                      <input type="text" placeholder="Search an article" class="nav__search-input">
                      <button type="submit" class="search-button btn btn-lg btn-color btn-button">
                        <i class="ui-search nav__search-icon"></i>
                      </button>
                    </form>
                  </div>                
                </div>             

              </div> <!-- end nav right -->
            </div>          
        
          </div> <!-- end flex-parent -->
        </div> <!-- end container -->

      </div>
    </header> <!-- end navigation -->
  
    <!-- Hero -->      
    <section class="hero">
      <div class="container">
        <div class="row row-24">

          <div class="col-xl-7">
            <!-- Large post -->
            <div class="hero__item">
            <?php
			              if( $admin_query = mysqli_query($con,"select * from fashionnews ORDER BY id ASC limit 1"))
			                  {
			                 $num   = mysqli_num_rows($admin_query);
			                 while($row = mysqli_fetch_array($admin_query))
			                  {
			                  ?>
              <article class="entry">
                <div class="entry__img-holder">
                  <a href="">
                  <img src="admin/<?php echo $row['image'];?>" alt="" title=""class="entry__img"/>
                  </a>
                </div>

                <div class="entry__body">
                  <ul class="entry__meta">
                    <li class="entry__meta-category">
                      <a href="#">Trends</a>
                    </li>
                    <li class="entry__meta-date">
                      5 Days Ago
                    </li>              
                  </ul>
                  <h2 class="entry__title">
                  <a href="fasnews.php?depcat=<?php echo $row['title'];?>" title="<?php echo $row['tilte'];?>"> <?php echo $row['title'];?> </a>
                  </h2>                  
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
            </div> <!-- end large post -->
          </div> <!-- end col -->

          <div class="col-xl-5">
            <h4 class="widget-title">Top News</h4>
            <?php
			              if( $admin_query = mysqli_query($con,"select * from fashionnews ORDER BY id DESC limit 2"))
			                  {
			                 $num   = mysqli_num_rows($admin_query);
			                 while($row = mysqli_fetch_array($admin_query))
			                  {
			                  ?>
            <ul class="post-list-small post-list-small--2 mb-32">
              <li class="post-list-small__item">
                <article class="post-list-small__entry clearfix">
                  <div class="post-list-small__img-holder">
                    <div class="thumb-container thumb-70">
                      <a href="">
                      <img src="admin/<?php echo $row['image'];?>" alt="" title=""class="lazyload"/>
                      </a>
                    </div>
                  </div>
                  <div class="post-list-small__body">
                    <ul class="entry__meta">
                      <li class="entry__meta-category">
                        <a href="#">Trends</a>
                      </li>
                      <li class="entry__meta-date">
                        5 Days Ago
                      </li>              
                    </ul>
                    <h3 class="post-list-small__entry-title">
                    <a href="fasnews.php?depcat=<?php echo $row['title'];?>" title="<?php echo $row['tilte'];?>"> <?php echo $row['title'];?> </a>
                    </h3>
                  </div>                  
                </article>
              </li>
            </ul>
            <?php }
				}
				else
				{
					echo 'Query unsuccessful :: ' . $con->errorno;
					var_dump( $con);
				}
                    ?>
          </div> <!-- end col -->         

        </div>
      </div>
    </section> <!-- end hero -->

    <div class="main-container container pt-40" id="main-container">

      <!-- Letest News -->
      <section class="section mb-16">
        <div class="title-wrap">
          <h3 class="section-title">Latest News</h3>
        </div>
       
        <div class="row card-row">
        <?php
			              if( $admin_query = mysqli_query($con,"select * from fashionnews ORDER BY id DESC limit 3"))
			                  {
			                 $num   = mysqli_num_rows($admin_query);
			                 while($row = mysqli_fetch_array($admin_query))
			                  {
			                  ?>
          <div class="col-md-4">
            <article class="entry card card--1">
              <div class="entry__img-holder card__img-holder">
                <a href="single-post-fashion.html">
                  <div class="thumb-container thumb-70">
                  <img src="admin/<?php echo $row['image'];?>" alt="" title=""class="entry__img lazyload"/>
                  </div>
                </a>
              </div>

              <div class="entry__body card__body">
                <div class="entry__header">
                  <ul class="entry__meta">
                    <li class="entry__meta-category">
                      <a href="#">Trends</a>
                    </li>
                    <li class="entry__meta-date">
                      5 Days Ago
                    </li>
                  </ul>                     
                  <h2 class="entry__title">
                  <a href="fasnews.php?depcat=<?php echo $row['title'];?>" title="<?php echo $row['tilte'];?>"> <?php echo $row['title'];?> </a>
                  </h2>
                  <ul class="entry__meta">
                    <li class="entry__meta-author">
                      <span>by</span>
                      <a href="#"><?php echo $row['author_name']; ?></a>
                    </li>
                  </ul>                     
                </div>

              </div>
            </article>
          </div>
          <?php }
				}
				else
				{
					echo 'Query unsuccessful :: ' . $con->errorno;
					var_dump( $con);
				}
                    ?>
        </div>   
       
      </section> <!-- end latest news -->

      <!-- Content -->
      <div class="row">

        <!-- Posts -->
        <div class="col-lg-8 blog__content mb-48">
          
          <!-- Shopping Picks -->
          <div class="title-wrap">
            <h3 class="section-title">Fashion Trends</h3>
          </div>
          <div class="content-box">
          <?php
			              if( $admin_query = mysqli_query($con,"select * from fashionnews ORDER BY id ASC limit 6"))
			                  {
			                 $num   = mysqli_num_rows($admin_query);
			                 while($row = mysqli_fetch_array($admin_query))
			                  {
			                  ?>
            <section class="section mb-0">
              <article class="entry card post-list">
              <div class="entry__img-holder post-list__img-holder card__img-holder" style="background-image: url('admin/<?php echo $row['image'];?>');">
                  <a href="" class="thumb-url"></a>
                  <img src="admin/<?php echo $row['image'];?>" alt="" title=""class="entry__img d-none"/>
                </div>

                <div class="entry__body post-list__body card__body">
                  <div class="entry__header">
                    <ul class="entry__meta">
                      <li class="entry__meta-date">
                        5 Days Ago
                      </li>
                    </ul>
                    <h2 class="entry__title">
                    <a href="fasnews.php?depcat=<?php echo $row['title'];?>" title="<?php echo $row['tilte'];?>"> <?php echo $row['title'];?> </a>
                    </h2>
                    <ul class="entry__meta">
                      <li class="entry__meta-author">
                        <span>by</span>
                        <a href="#"> <?php echo $row['author_name']; ?></a>
                      </li>
                    </ul>
                  </div>        
                  <div class="entry__excerpt">
                    <p><?php echo $row['descn']; ?></p>
                  </div>
                </div>
              </article>
            </section>
            <?php }
				}
				else
				{
					echo 'Query unsuccessful :: ' . $con->errorno;
					var_dump( $con);
				}
                    ?>
          </div> <!-- end content box -->          

        </div> <!-- end posts -->

        <!-- Sidebar -->
        <aside class="col-lg-4 sidebar sidebar--right">

          <!-- Widget Newsletter -->
         <!-- end widget newsletter -->

          <!-- Widget Socials -->
          <aside class="widget widget-socials text-center">
            <div class="socials socials--rounded socials--large">
              <a class="social social-facebook" href="#" title="facebook" target="_blank" aria-label="facebook">
                <i class="ui-facebook"></i>
              </a><!--
              --><a class="social social-twitter" href="#" title="twitter" target="_blank" aria-label="twitter">
                <i class="ui-twitter"></i>
              </a><!--
              --><a class="social social-youtube" href="#" title="youtube" target="_blank" aria-label="youtube">
                <i class="ui-youtube"></i>
              </a>
              <a class="social social-google-plus" href="#" title="google" target="_blank" aria-label="google">
                <i class="ui-google"></i>
              </a><!--
              --><a class="social social-instagram" href="#" title="instagram" target="_blank" aria-label="instagram">
                <i class="ui-instagram"></i>
              </a><!--
              -->
            </div>
          </aside> <!-- end widget socials -->

          <!-- Widget Instagram -->
          <aside class="widget widget-instagram">
            <h4 class="widget-title">Trending Looks</h4>
            <ul class="widget-instagram__list clearfix">
              <li><a href="#"><img src="img/content/instagram/1_small.jpg" alt=""></a></li>
              <li><a href="#"><img src="img/content/instagram/2_small.jpg" alt=""></a></li>
              <li><a href="#"><img src="img/content/instagram/3_small.jpg" alt=""></a></li>
              <li><a href="#"><img src="img/content/instagram/4_small.jpg" alt=""></a></li>
              <li><a href="#"><img src="img/content/instagram/5_small.jpg" alt=""></a></li>
              <li><a href="#"><img src="img/content/instagram/6_small.jpg" alt=""></a></li>
            </ul>
          </aside> <!-- end widget instagram -->          
          
          <!-- Widget Ad 300 -->
          <aside class="widget widget_media_image">
            <a href="#">
              <img src="img/content/placeholder_336.jpg" alt="">
            </a>
          </aside> <!-- end widget ad 300 -->

        </aside> <!-- end sidebar -->
  
      </div> <!-- end content -->
    </div> <!-- end main container -->

    <!-- Instagram -->
    <div class="widget-instagram-wide text-center">
      <h5 class="widget-instagram-wide__title">More Trending Looks</h5>
      <ul class="widget-instagram-wide__list">
        <li><a href="#"><img src="img/content/instagram/1.jpg" alt=""></a></li>
        <li><a href="#"><img src="img/content/instagram/2.jpg" alt=""></a></li>
        <li><a href="#"><img src="img/content/instagram/3.jpg" alt=""></a></li>
        <li><a href="#"><img src="img/content/instagram/4.jpg" alt=""></a></li>
        <li><a href="#"><img src="img/content/instagram/5.jpg" alt=""></a></li>
      </ul>
    </div>

      <!-- Footer -->
    <footer class="footer footer--white">
      <div class="container">
        <div class="footer__widgets footer__widgets--short">
          <div class="row">

            <div class="col-lg-3">
              <a href="index.html" class="logo">
              </a>
            </div>

            <div class="col-lg-6">
              <div class="widget">
                <p></p>
              </div>
            </div>

            <div class="col-lg-3">
              <div class="socials socials--large socials--rounded socials--grey justify-content-lg-end">
                <a href="#" class="social social-facebook social--large social--rounded" aria-label="facebook"><i class="ui-facebook"></i></a>
                <a href="#" class="social social-twitter social--large social--rounded" aria-label="twitter"><i class="ui-twitter"></i></a>
                <a href="#" class="social social-google-plus social--large social--rounded" aria-label="google+"><i class="ui-google"></i></a>
                <a href="#" class="social social-youtube social--large social--rounded" aria-label="youtube"><i class="ui-youtube"></i></a>
                <a href="#" class="social social-instagram social--large social--rounded" aria-label="instagram"><i class="ui-instagram"></i></a>
              </div>
            </div>            

          </div>
        </div>
        <div class="footer__bottom top-divider">
          <div class="row">
            <div class="col-lg-3">
              <p class="copyright">
              © 2019 Ekiensnews | by <a href="http://savidorcodes.org">savidordcodes</a>
              </p>
            </div>
            <div class="col-lg-9">
              <ul class="footer__nav-menu footer__nav-menu--1">
              <li><a href="about.php">About</a></li>
                  <li><a href="advertise.php">Advertise</a></li>
                  <li><a href="support.php">Support</a></li>
                  <li><a href="contact.php">Contact</a></li>
              </ul>
            </div>
          </div>          
          
        </div>
      </div> <!-- end container -->
    </footer> <!-- end footer -->

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