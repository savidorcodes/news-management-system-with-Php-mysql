<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ekiensnews | Business</title>

  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="">

  <!-- Google Fonts -->
  <link href='https://fonts.googleapis.com/css?family=Rubik:400,600,700%7CRoboto:400,700' rel='stylesheet'>

  <!-- Css -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/font-icons.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/colors/cyan.css" />

  <!-- Favicons -->
  <link rel="shortcut icon" href="img/favicon.ico">
  <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

  <!-- Lazyload (must be placed in head in order to work) -->
  <script src="js/lazysizes.min.js"></script>

</head>

<body class="bg-dark style-music">

  <!-- Preloader -->
  <div class="loader-mask">
    <div class="loader">
      <div></div>
    </div>
  </div>

  <!-- Bg Overlay -->
  <div class="content-overlay"></div>
  <?php include "sidenav.php"; ?>  
  <!-- end sidenav -->

  <main class="main oh" id="main">

    <!-- Top Bar -->
    <div class="top-bar d-none d-lg-block">
      <div class="container">
        <div class="row">
          <!-- Socials -->
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
              <img class="logo__img" src="img/N1.png" srcset="img/N1.png, img/N1.png" alt="logo">
            </a>

            <!-- Nav-wrap -->
            <?php include "pages.php" ?>
             <!-- end nav-wrap -->

            <!-- Nav Right -->    
        
          </div> <!-- end flex-parent -->
        </div> <!-- end container -->

      </div>
    </header> <!-- end navigation -->

    <!-- Hero Slider -->
    <section class="hero-slider-1">
      <div id="flickity-hero" class="carousel-main">        

        <div class="carousel-cell hero-slider-1__item">
                   <?php
			              if( $admin_query = mysqli_query($con,"select * from businessnews ORDER BY id ASC limit 1"))
			                  {
			                 $num   = mysqli_num_rows($admin_query);
			                 while($row = mysqli_fetch_array($admin_query))
			                  {
			            ?>
          <article class="hero-slider-1__entry entry">
            <div class="hero-slider-1__thumb-img-holder" style="background-image: url('admin/<?php echo $row['image'];?>');">
              <div class="bottom-gradient"></div>
            </div>            
            <div class="hero-slider-1__thumb-text-holder">
              <div class="container"> 
                <h2 class="hero-slider-1__entry-title">
                <a href="bus_news.php?depcat=<?php echo $row['id'];?>" title="<?php echo htmlentities( $row['tilte']);?>"> <?php echo $row['title'];?> </a>
                </h2>
                    <ul class="entry__meta">
                      <li class="entry__meta-author">
                        <span>by</span>
                         <?php echo $row['author_name']; ?>
                      </li>
                      <li class="">
                      <a href="#">
                        <i class=""></i><?php echo $row['date']; ?>
                        <i class=""></i><?php echo $row['month']; ?>
                        <i class=""></i><?php echo $row['year']; ?>
                      </a>
                      </li>
                    </ul>
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
        </div>

        <div class="carousel-cell hero-slider-1__item">
                   <?php
			              if( $admin_query = mysqli_query($con,"select * from businessnews ORDER BY id DESC limit 1"))
			                  {
			                 $num   = mysqli_num_rows($admin_query);
			                 while($row = mysqli_fetch_array($admin_query))
			                  {
			            ?>
          <article class="hero-slider-1__entry entry">
          <div class="hero-slider-1__thumb-img-holder" style="background-image: url('admin/<?php echo $row['image'];?>');">
              <div class="bottom-gradient"></div>
            </div>            
            <div class="hero-slider-1__thumb-text-holder">
              <div class="container"> 
                <h2 class="hero-slider-1__entry-title">
                <a href="bus_news.php?depcat=<?php echo $row['id'];?>" title="<?php echo htmlentities( $row['tilte']);?>"> <?php echo $row['title'];?> </a>
                </h2>
                <ul class="entry__meta">
                      <li class="entry__meta-author">
                        <span>by</span>
                         <?php echo $row['author_name']; ?>
                      </li>
                      <li class="">
                      <a href="#">
                        <i class=""></i><?php echo $row['date']; ?>
                        <i class=""></i><?php echo $row['month']; ?>
                        <i class=""></i><?php echo $row['year']; ?>
                      </a>
                      </li>
                    </ul>
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
        </div>

        <div class="carousel-cell hero-slider-1__item">
                   <?php
			              if( $admin_query = mysqli_query($con,"select * from businessnews ORDER BY id ASC limit 1"))
			                  {
			                 $num   = mysqli_num_rows($admin_query);
			                 while($row = mysqli_fetch_array($admin_query))
			                  {
			            ?>
          <article class="hero-slider-1__entry entry">
          <div class="hero-slider-1__thumb-img-holder" style="background-image: url('admin/<?php echo $row['image'];?>');">
              <div class="bottom-gradient"></div>
            </div>            
            <div class="hero-slider-1__thumb-text-holder">
              <div class="container"> 
                <h2 class="hero-slider-1__entry-title">
                <a href="bus_news.php?depcat=<?php echo $row['id'];?>" title="<?php echo htmlentities( $row['tilte']);?>"> <?php echo $row['title'];?> </a>
                </h2>
                <ul class="entry__meta">
                      <li class="entry__meta-author">
                        <span>by</span>
                         <?php echo $row['author_name']; ?>
                      </li>
                      <li class="">
                      <a href="#">
                        <i class=""></i><?php echo $row['date']; ?>
                        <i class=""></i><?php echo $row['month']; ?>
                        <i class=""></i><?php echo $row['year']; ?>
                      </a>
                      </li>
                    </ul>
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
        </div>

        <div class="carousel-cell hero-slider-1__item">
                  <?php
			              if( $admin_query = mysqli_query($con,"select * from businessnews ORDER BY id DESC limit 1"))
			                  {
			                 $num   = mysqli_num_rows($admin_query);
			                 while($row = mysqli_fetch_array($admin_query))
			                  {
			            ?>
          <article class="hero-slider-1__entry entry">
          <div class="hero-slider-1__thumb-img-holder" style="background-image: url('admin/<?php echo $row['image'];?>');">
              <div class="bottom-gradient"></div>
            </div>            
            <div class="hero-slider-1__thumb-text-holder">
              <div class="container"> 
                <h2 class="hero-slider-1__entry-title">
                <a href="bus_news.php?depcat=<?php echo $row['id'];?>" title="<?php echo htmlentities( $row['tilte']);?>"> <?php echo $row['title'];?> </a>
                </h2>
                <ul class="entry__meta">
                      <li class="entry__meta-author">
                        <span>by</span>
                         <?php echo $row['author_name']; ?>
                      </li>
                      <li class="">
                      <a href="#">
                        <i class=""></i><?php echo $row['date']; ?>
                        <i class=""></i><?php echo $row['month']; ?>
                        <i class=""></i><?php echo $row['year']; ?>
                      </a>
                      </li>
                    </ul>
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
        </div>        
      </div> <!-- end flickity -->

      <!-- Slider thumbs -->
      <div class="carousel-thumbs-holder">
        <div class="container">
          <div id="flickity-thumbs" class="carousel-thumbs">
                   <?php
			              if( $admin_query = mysqli_query($con,"select * from businessnews ORDER BY id ASC limit 1"))
			                  {
			                 $num   = mysqli_num_rows($admin_query);
			                 while($row = mysqli_fetch_array($admin_query))
			                  {
			            ?>
            <div class="carousel-cell">
              <div class="carousel-thumbs__item">
                <div class="carousel-thumbs__img-holder">
                <img src="admin/<?php echo $row['image'];?>" alt=""/>
                </div>
              </div>
            </div>
            <?php }
			          	}
			             	else
				       {
					echo 'Query unsuccessful :: ' . $con->errorno;
					var_dump( $con);
				}
                    ?>        
                      <?php
			              if( $admin_query = mysqli_query($con,"select * from businessnews ORDER BY id DESC limit 1"))
			                  {
			                 $num   = mysqli_num_rows($admin_query);
			                 while($row = mysqli_fetch_array($admin_query))
			                  {
			            ?>
            <div class="carousel-cell">
              <div class="carousel-thumbs__item">
                <div class="carousel-thumbs__img-holder">
                <img src="admin/<?php echo $row['image'];?>" alt=""/>
                </div>
              </div>
            </div>
            <?php }
			          	}
			             	else
				       {
					echo 'Query unsuccessful :: ' . $con->errorno;
					var_dump( $con);
				}
                    ?>    
                    <?php
			              if( $admin_query = mysqli_query($con,"select * from businessnews ORDER BY id ASC limit 1"))
			                  {
			                 $num   = mysqli_num_rows($admin_query);
			                 while($row = mysqli_fetch_array($admin_query))
			                  {
			            ?>   
            <div class="carousel-cell">
              <div class="carousel-thumbs__item">
                <div class="carousel-thumbs__img-holder">
                <img src="admin/<?php echo $row['image'];?>" alt=""/>
                </div>
              </div>
            </div>
            <?php }
			          	}
			             	else
				       {
					echo 'Query unsuccessful :: ' . $con->errorno;
					var_dump( $con);
				}
                    ?> 
                    <?php
			              if( $admin_query = mysqli_query($con,"select * from businessnews ORDER BY id DESC limit 1"))
			                  {
			                 $num   = mysqli_num_rows($admin_query);
			                 while($row = mysqli_fetch_array($admin_query))
			                  {
			            ?>     
            <div class="carousel-cell">
              <div class="carousel-thumbs__item">
                <div class="carousel-thumbs__img-holder">
                <img src="admin/<?php echo $row['image'];?>" alt=""/>
                </div>
              </div>
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
        </div>
      </div>
    </section> <!-- end hero slider -->

    <div class="main-container container content-box content-box--pt-108" id="main-container">

      <!-- Upcoming Events -->
      <section class="section mb-0">
        <div class="title-wrap title-wrap--line title-wrap--pr">
          <h3 class="section-title"></h3>
        </div>

        <!-- Slider -->
        <div id="owl-posts-3-items" class="owl-carousel owl-theme owl-carousel--arrows-outside">
                   <?php
			              if( $admin_query = mysqli_query($con,"select * from businessnews"))
			                  {
			                 $num   = mysqli_num_rows($admin_query);
			                 while($row = mysqli_fetch_array($admin_query))
			                  {
			            ?>
          <article class="entry card card--1">
            <div class="entry__img-holder card__img-holder">
            <a href="bus_news.php?depcat=<?php echo $row['id'];?>" title="<?php echo htmlentities( $row['']);?>">
                <div class="thumb-container thumb-70">
                <img src="admin/<?php echo $row['image'];?>" class="entry__img lazyload" alt="" />
                  <div class="entry-date-label">
                    <div class="entry-date-label__weekday"><?php echo $row['author_name']; ?></div>
                    <div class="entry-date-label__day"><?php echo $row['year ']; ?></div>
                    <div class="entry-date-label__month"> </div>
                  </div>
                </div>
              </a>
            </div>

            <div class="entry__body card__body">
              <div class="entry__header">
                <ul class="entry__meta">
                  <li class="entry__meta-category">
                    <a href="#"></a>
                  </li>                  
                </ul>                     
                <h2 class="entry__title">
                <a href="bus_news.php?depcat=<?php echo $row['id'];?>" title="<?php echo htmlentities( $row['tilte']);?>"> <?php echo $row['title'];?> </a>
                </h2>
                <ul class="entry__meta">
                  <li class="entry__meta-author">
                    <span>by</span>
                    <a href="#"><?php echo $row['author_name']; ?></a>
                  </li>
                  <li class="entry__meta-date">
                  <?php echo $row['date']; ?>
                  <?php echo $row['month']; ?>
                  <?php echo $row['year']; ?>
                  </li>
                </ul>                     
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
        </div> <!-- end slider -->

      </section> <!-- end upcoming events -->


      <!-- Ad Banner 970 -->
      <div class="text-center pb-48">
        <?php include "advert.php" ?>
      </div>

      <!-- Newest Videos 
      <section class="pb-32">
        <div class="title-wrap title-wrap--line">
          <h2 class="section-title">newest videos</h2>
        </div>
        <div class="video-playlist">

          <div class="video-playlist__content thumb-container">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe src="https://www.youtube.com/embed/E0wW9RwpG7M?feature=oembed" class="video-playlist__content-video">
              </iframe>
            </div>
          </div>

          <div class="video-playlist__list">
            <a href="https://www.youtube.com/embed/E0wW9RwpG7M?feature=oembed&autoplay=1" class="video-playlist__list-item video-playlist__list-item--active">
              <div class="video-playlist__list-item-thumb">
                <img data-src="https://i.ytimg.com/vi/E0wW9RwpG7M/default.jpg" src="https://i.ytimg.com/vi/E0wW9RwpG7M/default.jpg" class="video-playlist__list-item-img lazyload" alt="">
              </div>
              <div class="video-playlist__list-item-description">
                <h4 class="video-playlist__list-item-title">Heaven - Bryan Adams (cover) Megan Nicole and Boyce Avenue</h4>
              </div>
            </a>
            <a href="https://www.youtube.com/embed/7TWkmy5ELJc?feature=oembed&autoplay=1" class="video-playlist__list-item">
              <div class="video-playlist__list-item-thumb">
                <img data-src="https://i.ytimg.com/vi/7TWkmy5ELJc/default.jpg" src="https://i.ytimg.com/vi/mn6Ia5e_suY/default.jpg" class="video-playlist__list-item-img lazyload" alt="">
              </div>
              <div class="video-playlist__list-item-description">
                <h4 class="video-playlist__list-item-title">Santa Cruz - Young Blood Rising (Official Music Video)</h4>
              </div>
            </a>
            <a href="https://www.youtube.com/embed/hXnMSaK6C2w?feature=oembed&autoplay=1" class="video-playlist__list-item">
              <div class="video-playlist__list-item-thumb">
                <img data-src="https://i.ytimg.com/vi/hXnMSaK6C2w/default.jpg" src="https://i.ytimg.com/vi/mn6Ia5e_suY/default.jpg" class="video-playlist__list-item-img lazyload" alt="">
              </div>
              <div class="video-playlist__list-item-description">
                <h4 class="video-playlist__list-item-title">Cardi B - Bartier Cardi (feat. 21 Savage) [Official Video]</h4>
              </div>
            </a>
            <a href="https://www.youtube.com/embed/xMTsul4UFl8?feature=oembed&autoplay=1" class="video-playlist__list-item">
              <div class="video-playlist__list-item-thumb">
                <img data-src="https://i.ytimg.com/vi/xMTsul4UFl8/default.jpg" src="https://i.ytimg.com/vi/mn6Ia5e_suY/default.jpg" class="video-playlist__list-item-img lazyload" alt="">
              </div>
              <div class="video-playlist__list-item-description">
                <h4 class="video-playlist__list-item-title">Nothing Makes Sense Anymore (Official Video) - Mike Shinoda</h4>
              </div>
            </a>
            <a href="https://www.youtube.com/embed/2Vv-BfVoq4g?feature=oembed&autoplay=1" class="video-playlist__list-item">
              <div class="video-playlist__list-item-thumb">
                <img data-src="https://i.ytimg.com/vi/2Vv-BfVoq4g/default.jpg" src="https://i.ytimg.com/vi/mn6Ia5e_suY/default.jpg" class="video-playlist__list-item-img lazyload" alt="">
              </div>
              <div class="video-playlist__list-item-description">
                <h4 class="video-playlist__list-item-title">Ed Sheeran - Perfect (Official Music Video)</h4>
              </div>
            </a>
          </div>

        </div>   
      </section>  end newest videos -->

      <!-- Most Popular -->
      <section class="section mb-24">
        <div class="title-wrap title-wrap--line">
          <h3 class="section-title">Most Popular</h3>
        </div>
        <div class="row row-20">
          <div class="col-md-3">
          <?php
			              if( $admin_query = mysqli_query($con,"select * from businessnews ORDER BY id ASC limit 1"))
			                  {
			                 $num   = mysqli_num_rows($admin_query);
			                 while($row = mysqli_fetch_array($admin_query))
			                  {
			            ?>
            <article class="entry">
              <div class="entry__img-holder">
                <a href="#">
                  <div class="thumb-container thumb-65">
                  <img src="admin/<?php echo $row['image'];?>" class="entry__img lazyload" alt="">
                  </div>
                </a>
              </div>

              <div class="entry__body">
                <div class="entry__header">                    
                  <h2 class="entry__title">
                  <a href="bus_news.php?depcat=<?php echo $row['id'];?>" title="<?php echo htmlentities( $row['tilte']);?>"> <?php echo $row['title'];?> </a>
                  </h2>
                  <ul class="entry__meta">
                    <li class="entry__meta-author">
                      <span>by</span>
                      <a href="#"><?php echo $row['author_name']; ?></a>
                    </li>
                    <li class="entry__meta-date">
                    <?php echo $row['date']; ?>
                    <?php echo $row['month']; ?>
                    <?php echo $row['year']; ?>
                    </li>
                  </ul>  
                  <a href="bus_news.php?depcat=<?php echo $row['id'];?>" title="<?php echo htmlentities( $row['']);?>" class="thumb-url"></a>                    
                </div>
                <div class="entry__excerpt">
                  <p><?php echo $row['descn']; ?>..</p>
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
          </div>
          <div class="col-md-6">
                 <?php
			              if( $admin_query = mysqli_query($con,"select * from businessnews ORDER BY id DESC limit 1"))
			                  {
			                 $num   = mysqli_num_rows($admin_query);
			                 while($row = mysqli_fetch_array($admin_query))
			                  {
			            ?>
            <article class="entry thumb thumb--size-3 thumb--mb-20">
              <div class="entry__img-holder thumb__img-holder" style="background-image: url('admin/<?php echo $row['image'];?>');">
                <div class="bottom-gradient"></div>
                <div class="thumb-text-holder thumb-text-holder--2">
                  <ul class="entry__meta">
                    <li>
                      <a href="#" class="entry__meta-category">Business</a>
                    </li>
                  </ul>
                  <h2 class="thumb-entry-title">
                  <a href="bus_news.php?depcat=<?php echo $row['id'];?>" title="<?php echo htmlentities( $row['tilte']);?>"> <?php echo $row['title'];?> </a>
                  </h2>
                  <ul class="entry__meta">
                    <li class="entry__meta-views">
                      <i>By</i>
                      <span><a href="#"><?php echo $row['author_name']; ?></a></span>
                    </li>
                    <li class="entry__meta-comments">
                      <a href="#">
                        <i></i><?php echo $row['date']; ?>
                        <i></i><?php echo $row['month']; ?>
                        <i></i><?php echo $row['year']; ?>
                      </a>
                    </li>
                  </ul>
                </div>
                <a href="bus_news.php?depcat=<?php echo $row['id'];?>" title="<?php echo htmlentities( $row['']);?>" class="thumb-url"></a>
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
          </div>
          <div class="col-md-3">
                  <?php
			              if( $admin_query = mysqli_query($con,"select * from businessnews ORDER BY title DESC limit 1"))
			                  {
			                 $num   = mysqli_num_rows($admin_query);
			                 while($row = mysqli_fetch_array($admin_query))
			                  {
			            ?>
            <article class="entry">
              <div class="entry__img-holder">
              <a href="bus_news.php?depcat=<?php echo $row['id'];?>" title="<?php echo htmlentities( $row['']);?>">
                  <div class="thumb-container thumb-65">
                  <img src="admin/<?php echo $row['image'];?>" class="entry__img lazyload" alt=""> 
                  </div>
                </a>
              </div>

              <div class="entry__body">
                <div class="entry__header">                    
                  <h2 class="entry__title">
                  <a href="bus_news.php?depcat=<?php echo $row['id'];?>" title="<?php echo htmlentities( $row['tilte']);?>"> <?php echo $row['title'];?> </a>
                  </h2>
                  <ul class="entry__meta">
                    <li class="entry__meta-author">
                      <span>by</span>
                      <a href="#"><?php echo $row['author_name']; ?></a>
                    </li>
                    <li class="entry__meta-date">
                    <?php echo $row['date']; ?>
                    <?php echo $row['month']; ?>
                    <?php echo $row['year']; ?>
                    </li>
                  </ul>                   
                </div>
                <div class="entry__excerpt">
                  <p><?php echo $row['descn']; ?> ...</p>
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
          </div>
        </div>
        <div class="row row-20">
          <div class="col-md-6">
                   <?php
			              if( $admin_query = mysqli_query($con,"select * from businessnews ORDER BY title DESC limit 1"))
			                  {
			                 $num   = mysqli_num_rows($admin_query);
			                 while($row = mysqli_fetch_array($admin_query))
			                  {
			            ?>
            <article class="entry thumb thumb--size-3 thumb--mb-20">
              <div class="entry__img-holder thumb__img-holder" style="background-image: url('admin/<?php echo $row['image'];?>');">
                <div class="bottom-gradient"></div>
                <div class="thumb-text-holder thumb-text-holder--2">
                  <ul class="entry__meta">
                    <li>
                      <a href="#" class="entry__meta-category">Business</a>
                    </li>
                  </ul>
                  <h2 class="thumb-entry-title">
                  <a href="bus_news.php?depcat=<?php echo $row['id'];?>" title="<?php echo htmlentities( $row['tilte']);?>"> <?php echo $row['title'];?> </a>
                  </h2>
                  <ul class="entry__meta">
                    <li class="entry__meta-views">
                      <i>By</i>
                      <span><a href="#"><?php echo $row['author_name']; ?></a></span>
                    </li>
                    <li class="entry__meta-comments">
                      <a href="#">
                        <i></i><?php echo $row['date']; ?>
                        <i></i><?php echo $row['month']; ?>
                        <i></i><?php echo $row['year']; ?>
                      </a>
                    </li>
                  </ul>
                </div>
                <a href="bus_news.php?depcat=<?php echo $row['id'];?>" title="<?php echo htmlentities( $row['']);?>" class="thumb-url"></a>
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
          </div>
                  <?php
			              if( $admin_query = mysqli_query($con,"select * from businessnews ORDER BY title DESC limit 2"))
			                  {
			                 $num   = mysqli_num_rows($admin_query);
			                 while($row = mysqli_fetch_array($admin_query))
			                  {
			            ?>
          <div class="col-md-3">
            <article class="entry">
              <div class="entry__img-holder">
              <a href="bus_news.php?depcat=<?php echo $row['id'];?>" title="<?php echo htmlentities( $row['']);?>">
                  <div class="thumb-container thumb-65">
                  <img src="admin/<?php echo $row['image'];?>" class="entry__img lazyload" alt="">
                  </div>
                </a>
              </div>

              <div class="entry__body">
                <div class="entry__header">                    
                  <h2 class="entry__title">
                  <a href="bus_news.php?depcat=<?php echo $row['id'];?>" title="<?php echo htmlentities( $row['tilte']);?>"> <?php echo $row['title'];?> </a>
                  </h2>
                  <ul class="entry__meta">
                    <li class="entry__meta-author">
                      <span>by</span>
                      <a href="#"><?php echo $row['author_name']; ?></a>
                    </li>
                    <li class="entry__meta-date">
                    <?php echo $row['date']; ?>
                    <?php echo $row['month']; ?>
                    <?php echo $row['year']; ?>
                    </li>
                  </ul>                     
                </div>
                <div class="entry__excerpt">
                  <p><?php echo $row['descn']; ?>...</p>
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
      </section> <!-- end most popular -->

      <!-- Featured Albums -->
      <section class="section mb-0">
        <div class="title-wrap title-wrap--line title-wrap--pr">
          <h3 class="section-title">See Also</h3>
        </div>

        <!-- Slider -->
        <div id="owl-posts" class="owl-carousel owl-theme owl-carousel--arrows-outside">
        <?php
			              if( $admin_query = mysqli_query($con,"select * from businessnews ORDER BY title DESC limit 10"))
			                  {
			                 $num   = mysqli_num_rows($admin_query);
			                 while($row = mysqli_fetch_array($admin_query))
			                  {
			            ?>
          <article class="entry thumb thumb--size-1">
            <div class="entry__img-holder thumb__img-holder" style="background-image: url('admin/<?php echo $row['image'];?>');">
              <div class="bottom-gradient"></div>
              <div class="thumb-text-holder">   
                <h2 class="thumb-entry-title">
                <a href="bus_news.php?depcat=<?php echo $row['id'];?>" title="<?php echo htmlentities( $row['tilte']);?>"> <?php echo $row['title'];?> </a>
                </h2>
              </div>
              <a href="bus_news.php?depcat=<?php echo $row['id'];?>" title="<?php echo htmlentities( $row['']);?>" class="thumb-url"></a>
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
        </div> <!-- end slider -->

      </section> <!-- end featured albums -->

    </div> <!-- end main container -->

    <!-- Footer -->
    <?php include "sportnewsfooter.php"  ?>
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