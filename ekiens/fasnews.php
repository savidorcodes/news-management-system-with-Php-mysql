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
  <div class="content-overlay"></div>

  <!-- Sidenav -->    
  <header class="sidenav" id="sidenav">

    <!-- close -->
    <div class="sidenav__close">
      <button class="sidenav__close-button" id="sidenav__close-button" aria-label="close sidenav">
        <i class="ui-close sidenav__close-icon"></i>
      </button>
    </div>
    
    <!-- Nav -->
       <?php
          include "menu.php";
       ?>        
        
          </div> <!-- end flex-parent -->
        </div> <!-- end container -->

      </div>
    </header> <!-- end navigation -->

    <!-- Breadcrumbs -->

    <!-- Entry Image -->


       <?php
                             
       $depcat = $_GET['depcat'];
       $query = mysqli_query($con,"select * from news where title='$depcat'");
                             
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
                <div class="entry__share">
                  <div class="sticky-col">
                    <div class="socials socials--rounded socials--large">
                      <a class="social social-facebook" href="#" title="facebook" target="_blank" aria-label="facebook">
                        <i class="ui-facebook"></i>
                      </a>
                      <a class="social social-youtube" href="#" title="youtube" target="_blank" aria-label="youtube">
                        <i class="ui-youtube"></i>
                      </a>
                      <a class="social social-instagram" href="#" title="instagram" target="_blank" aria-label="instagram">
                        <i class="ui-instagram"></i>
                      </a>
                    </div>
                  </div>                  
                </div> <!-- share -->

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
		if( $admin_query = mysqli_query($con,"select * from fashionnews"))
			                  {
			                 $num   = mysqli_num_rows($admin_query);
			                 while($row = mysqli_fetch_array($admin_query))
			                  {
			                  ?>
                    <div class="entry__img-holder thumb__img-holder" style="background-image: url('admin/<?php echo $row['image'];?>');">

                      <div class="bottom-gradient"></div>
                      <div class="thumb-text-holder">   
                        <h2 class="thumb-entry-title">
                        <a href="fasnews.php?depcat=<?php echo $row['title'];?>" title="<?php echo $row['tilte'];?>"> <?php echo $row['title'];?> </a>
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
          <aside class="widget widget-socials">
            <h4 class="widget-title">Connect with us on social media</h4>
            <div class="socials socials--wide socials--large">
              <div class="row row-16">
                <div class="col">
                  <a class="social social-facebook" href="#" title="facebook" target="_blank" aria-label="facebook">
                    <i class="ui-facebook"></i>
                    <span class="social__text">Facebook</span>
                  </a><!--
                  --><!--
                  --><a class="social social-youtube" href="#" title="youtube" target="_blank" aria-label="youtube">
                    <i class="ui-youtube"></i>
                    <span class="social__text">Youtube</span>
                  </a>
                </div>
                <div class="col">
                  <!--
                  --><a class="social social-instagram" href="#" title="instagram" target="_blank" aria-label="instagram">
                    <i class="ui-instagram"></i>
                    <span class="social__text">Instagram</span>
                  </a><!--
                  -->
                </div>                
              </div>            
            </div>
          </aside> <!-- end widget socials -->

          <!-- Widget Popular Posts -->
          <aside class="widget widget-popular-posts">
            <h4 class="widget-title">Recent Post</h4>
            <ul class="post-list-small">
              <?php
		if( $admin_query = mysqli_query($con,"select * from fashionnews"))
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
                    <a href="fasnews.php?depcat=<?php echo $row['title'];?>" title="<?php echo $row['tilte'];?>"> <?php echo $row['title'];?> </a>
                    </h3>
                    <ul class="entry__meta">
                      <li class="entry__meta-author">
                        <span>by</span>
                        <?php echo $row['author_name']; ?>
                      </li>
                      
                      <li class="entry__meta-date">
                      <?php echo $row['date']; ?>
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
          <aside class="widget widget-review-posts">
            <h4 class="widget-title">Adverts </h4>
            <article class="entry">
              <div class="entry__img-holder">
                <a href="single-post-games.html">
                  <div class="thumb-container thumb-60">
                    <img data-src="img/content/review/review_post_3.jpg" src="img/empty.png" class="entry__img lazyload" alt="">
                  </div>
                </a>
              </div>

              <div class="entry__body">
                <div class="entry__header">                  
                  <h2 class="entry__title">
                    <a href="single-post-games.html">Ad1</a>
                  </h2>
                </div>
              </div>
            </article>
            <article class="entry">
              <div class="entry__img-holder">
                <a href="single-post-games.html">
                  <div class="thumb-container thumb-60">
                    <img data-src="img/content/review/review_post_4.jpg" src="img/empty.png" class="entry__img lazyload" alt="">
                  </div>
                </a>
              </div>

              <div class="entry__body">
                <div class="entry__header">                  
                  <h2 class="entry__title">
                    <a href="single-post-games.html">Ad2</a>
                  </h2>
                </div>
              </div>
            </article>
            <article class="entry">
              <div class="entry__img-holder">
                <a href="single-post-games.html">
                  <div class="thumb-container thumb-60">
                    <img data-src="img/content/review/review_post_5.jpg" src="img/empty.png" class="entry__img lazyload" alt="">
                  </div>
                </a>
              </div>

              <div class="entry__body">
                <div class="entry__header">                  
                  <h2 class="entry__title">
                    <a href="single-post-games.html">Ad3</a>
                  </h2>
                </div>
              </div>
            </article>
          </aside> <!-- end widget reviews -->     

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