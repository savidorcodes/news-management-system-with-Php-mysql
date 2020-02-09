<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ekiensnews | Entertainment News</title>

  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="">

  <!-- Google Fonts -->
  <link href='https://fonts.googleapis.com/css?family=Barlow:400,500,600,700' rel='stylesheet'>

  <!-- Css -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/font-icons.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/colors/orange.css" />

  <!-- Favicons -->
  <link rel="shortcut icon" href="img/favicon.ico">
  <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

  <!-- Lazyload (must be placed in head in order to work) -->
  <script src="js/lazysizes.min.js"></script>

</head>

<body class="style-games single-post bg-light">

  <!-- Preloader -->
  <div class="loader-mask">
    <div class="loader">
      <div></div>
    </div>
  </div>

  <!-- Bg Overlay -->
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

    <!-- Trending Now --> 
    <!-- Navigation -->
    <header class="nav nav--1">
      <div class="nav__holder nav--sticky">
        <div class="container relative">
          <div class="flex-parent">

            <div class="flex-child">
              <!-- Side Menu Button -->
              <button class="nav-icon-toggle" id="nav-icon-toggle" aria-label="Open side menu">
                <span class="nav-icon-toggle__box">
                  <span class="nav-icon-toggle__inner"></span>
                </span>
              </button>
            </div>            

            <!-- Nav-wrap -->
            <?php include "pages.php" ?>
           <!-- end nav-wrap -->

            <!-- Logo Mobile -->
            <a href="index.php" class="logo logo-mobile d-lg-none">
              <img class="logo__img" src="img/N1.png" srcset="img/N1.png, img/N1.png" alt="logo">
            </a>

            <!-- Nav Right -->
            <div class="flex-child">
              <div class="nav__right">

              </div> <!-- end nav right -->
            </div>            
          
          </div> <!-- end flex-parent -->

        </div>          
      </div>
    </header> <!-- end navigation -->

         <?php
                             
       $depcat = $_GET['depcat'];
       $query = mysqli_query($con,"select * from entertainmentnews where id='$depcat'");
                             
        while($drow = mysqli_fetch_assoc($query))
        {
        $id=$drow['id'];
                           
        ?>

    <div class="thumb thumb--size-6">
      <div class="entry__img-holder thumb__img-holder" style="background-image: url('admin/<?php echo $drow['image'];?>');">
      </div>
    </div>
    <div class="main-container container" id="main-container">

      <!-- Content -->
      <div class="row">

        <!-- Post Content -->
        <div class="col-lg-8 blog__content mb-72">
          <div class="content-box content-box--top-offset">

            <!-- standard post -->
            <article class="entry mb-0">
              
              <div class="single-post__entry-header entry__header">
                <h1 class="single-post__entry-title">
                <?php echo $drow['title'];?>
                </h1>
                <div class="entry__meta-holder">
                  <ul class="entry__meta">
                  </ul>
                </div>
              </div> <!-- end entry header -->              

              <div class="entry__article-wrap">

                <!-- Share -->
                <?php include "share.php" ?>
                <!-- share -->

                <div class="entry__article">
                <?php echo $drow['news'];?>

                  <!-- Final Review -->
                  

                  <!-- tags -->
                  <div class="entry__tags">
                  </div> <!-- end tags -->

                </div> <!-- end entry article -->
              </div> <!-- end entry article wrap -->

              <!-- Related Posts -->
              <section class="section related-posts mt-40 mb-0">
                <div class="title-wrap title-wrap--line title-wrap--pr">
                  <h3 class="section-title">See Also</h3>
                </div>

                <!-- Slider -->
                <div id="owl-posts-3-items" class="owl-carousel owl-theme owl-carousel--arrows-outside">
                  <article class="entry thumb thumb--size-1">
                <?php
		if( $admin_query = mysqli_query($con,"select * from entertainmentnews"))
			                  {
			                 $num   = mysqli_num_rows($admin_query);
			                 while($row = mysqli_fetch_array($admin_query))
			                  {
			                  ?>
                    <div class="entry__img-holder thumb__img-holder" style="background-image: url('admin/<?php echo $row['image'];?>');">

                      <div class="bottom-gradient"></div>
                      <div class="thumb-text-holder">   
                        <h2 class="thumb-entry-title">
                        <a href="enternews.php?depcat=<?php echo $row['id'];?>" title="<?php echo $row['tilte'];?>"> <?php echo $row['title'];?> </a>
                        </h2>
                      </div>
                    </div>
                  </article>
                  <article class="entry thumb thumb--size-1">
                   
                  <?php }
				}
				else
				{
					echo 'Query unsuccessful :: ' . $con->errorno;
					var_dump( $con);
				}
                    ?>
                  </article>
                </div> <!-- end slider -->

              </section> <!-- end related posts -->            

            </article> <!-- end standard post -->
          
          </div> <!-- end content box -->
        </div> <!-- end post content -->

        <!-- Sidebar -->
        <aside class="col-lg-4 sidebar sidebar--right">

          <!-- Widget Socials -->
          <?php include "socialmediawidget.php" ?>
         <!-- end widget socials -->

          <!-- Widget Popular Posts -->
          <aside class="widget widget-popular-posts">
            <h4 class="widget-title">Recent Post</h4>
            <ul class="post-list-small">
              <?php
		if( $admin_query = mysqli_query($con,"select * from entertainmentnews limit 6"))
			                  {
			                 $num   = mysqli_num_rows($admin_query);
			                 while($row = mysqli_fetch_array($admin_query))
			                  {
			                  ?>
              <li class="post-list-small__item">
                <article class="post-list-small__entry clearfix">
                  <div class="post-list-small__img-holder">
                    <div class="thumb-container thumb-100">
                      <img src="admin/<?php echo $row['image'];?>" alt="" title=""class="post-list-small__img--rounded lazyload"/>
                    </div>
                  </div>
                  <div class="post-list-small__body">
                    <h3 class="post-list-small__entry-title">
                    <a href="enternews.php?depcat=<?php echo $row['id'];?>" title="<?php echo $row['tilte'];?>"> <?php echo $row['title'];?> </a>
                    </h3>
                    <ul class="entry__meta">
                      <li class="entry__meta-author">
                        <span>by</span>
                        <?php echo $row['author_name']; ?>
                      </li>
                      
                      <li class="entry__meta-date">
                      <?php echo $row['date']; ?>
                      <?php echo $row['month']; ?>
                      <?php echo $row['year']; ?>
                      </li>
                    </ul>
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
              </li>
            </ul>           
       </aside> <!-- end widget popular posts -->

          <!-- Widget Reviews -->
          <?php include "ads.php" ?>
          <!-- end widget reviews -->     

        </aside> <!-- end sidebar -->
  
      </div> <!-- end content -->
    </div> <!-- end main container -->
    <?php }?>
    <!-- Footer -->
    <?php include "sportnewsfooter.php"; ?>
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
  <script src="js/jquery.sticky-kit.min.js"></script>
  <script src="js/jquery.newsTicker.min.js"></script>  
  <script src="js/modernizr.min.js"></script>
  <script src="js/scripts.js"></script>

</body>
</html>