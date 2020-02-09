<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ekiens News</title>

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

      <!-- Top menu -->
      
      <!-- Socials -->
      </div>

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
          <img class="logo__img" src="img/N1.png" alt="logo" style="width:120px;height:45px;">
          
        </a>

        <!-- Nav-wrap -->
        <?php include "pages.php"; ?>  
         <!-- end nav-wrap -->

        <!-- Nav Right -->
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
    
      </div> <!-- end flex-parent -->
    </div> <!-- end container -->

  </div>
</header> <!-- end navigation -->
    <!-- Featured Posts Grid -->      

    <div class="main-container container pt-24" id="main-container">         

      <!-- Content -->
      <div class="row">

        <!-- Posts -->
        <div class="col-lg-8 blog__content">
          
          <!-- Latest News -->
          <section class="section tab-post mb-16">
            <div class="title-wrap title-wrap--line">
              <h3 class="section-title"></h3>
            </div>

            <!-- tab content -->
            <div class="tabs__content tabs__content-trigger tab-post__tabs-content">
              
              <div class="tabs__content-pane tabs__content-pane--active" id="tab-all">
                <div class="row card-row">
                        <?php
			                    if( $admin_query = mysqli_query($con,"select * from news order by id DESC limit 12"))
			                   {
			                    $num   = mysqli_num_rows($admin_query);
			                   while($row = mysqli_fetch_array($admin_query))
			                   {
			                  ?>
                  <div class="col-md-6">
                    <article class="entry card">
                      <div class="entry__img-holder card__img-holder">
                      <a href="news.php?depcat=<?php echo $row['id'];?>" title="<?php echo htmlentities( $row['']);?>"> 
                          <div class="thumb-container thumb-70">
                          <img src="admin/<?php echo $row['image'];?>" alt="" title="" class="entry__img lazyload" alt="" />
                          </div>
                        </a>
                        <a href="#" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--violet"> <?php echo $row['tag']; ?></a>
                      </div>

                      <div class="entry__body card__body">
                        <div class="entry__header">
                          
                          <h2 class="entry__title">
                          <a href="news.php?depcat=<?php echo $row['id'];?>" title="<?php echo htmlentities( $row['tilte']);?>"> <?php echo $row['title'];?> </a>
                          </h2>
                          <hr>
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
                        <div class="entry__excerpt">
                          <p> <?php echo $row['descn']; ?> ...</p>
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
                  <div class="col-md-6">
                    
                  </div>
                  <div class="col-md-6">
                  </div>
                </div>
              </div> <!-- end pane 1 -->
             
             
              
            </div> <!-- end tab content -->            
          </section> <!-- end latest news -->

        </div> <!-- end posts -->

        <!-- Sidebar -->
        <aside class="col-lg-4 sidebar sidebar--right">

          <!-- Widget Popular News -->
          <aside class="widget widget-popular-posts">
            <h4 class="widget-title">Popular News</h4>
            <ul class="post-list-small">
              <?php
		if( $admin_query = mysqli_query($con,"select * from news order by date_date DESC limit 18 "))
			                  {
			                 $num   = mysqli_num_rows($admin_query);
			                 while($row = mysqli_fetch_array($admin_query))
			                  {
			                  ?>
              <li class="post-list-small__item">
                <article class="post-list-small__entry clearfix">
                  <div class="post-list-small__img-holder">
                    <div class="thumb-container thumb-100">
                      <a href="#">
                      <img src="admin/<?php echo $row['image'];?>" alt="" title=""class="post-list-small__img--rounded lazyload"/>
                      </a>
                    </div>
                  </div>
                  <div class="post-list-small__body">
                    <h3 class="post-list-small__entry-title">
                    <a href="news.php?depcat=<?php echo $row['id'];?>" title="<?php echo htmlentities( $row['tilte']);?>"> <?php echo $row['title'];?> </a>
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
                  <hr>
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

          <!-- Widget Socials -->
          <aside class="widget widget-socials">
            <h4 class="widget-title">Let's hang out on social</h4>
            <div class="socials socials--wide socials--large">
              <div class="row row-16">
                <div class="col">
                  <a class="social social-facebook" href="https://l.facebook.com/l.php?u=http%3A%2F%2Ffb.me%2FEkiensNews&h=AT2Bv6Vr4hauonaAH7eieLYh1s-DsXx4WBIoIqLNGBO6wdbAoDyAepSfoEarlB6cdKEKaSZcNYl_d4IdG3BdvctXj4WyrWbyPwU68h_dmYCwP-VVwpy-_1RSKSsbIe0srcj7yg" title="facebook" target="_blank" aria-label="facebook">
                    <i class="ui-facebook"></i>
                    <span class="social__text">Facebook</span>
                  </a><!--
                  --><!--
                  --><a class="social social-youtube" href="https://www.youtube.com/channel/UCQ-RjPKN9Mr3aC1Th9NxPqg" title="youtube" target="_blank" aria-label="youtube">
                    <i class="ui-youtube"></i>
                    <span class="social__text">Youtube</span>
                  </a>
                </div>
                <div class="col">
                 <!--
                  --><a class="social social-instagram" href="https://l.facebook.com/l.php?u=https%3A%2F%2Fwww.instagram.com%2Fekiensnews%2F%3Ffbclid%3DIwAR04RJY-uOm_prRCs6da8NIp5u8Ya15R5ob2FifHImHBSBcl2701s9pYaW4&h=AT2Bv6Vr4hauonaAH7eieLYh1s-DsXx4WBIoIqLNGBO6wdbAoDyAepSfoEarlB6cdKEKaSZcNYl_d4IdG3BdvctXj4WyrWbyPwU68h_dmYCwP-VVwpy-_1RSKSsbIe0srcj7yg" title="instagram" target="_blank" aria-label="instagram">
                    <i class="ui-instagram"></i>
                    <span class="social__text">Instagram</span>
                  </a><!--
                  -->
                </div>                
              </div>            
            </div>
          </aside> <!-- end widget socials -->

        </aside> <!-- end sidebar -->
  
      </div> <!-- end content -->

     <?php include "advert.php" ?>
      <!-- Carousel posts -->
      <section class="section mb-0">
        <div class="title-wrap title-wrap--line title-wrap--pr">
          <h3 class="section-title">editor's desk</h3>
        </div>

        <!-- Slider -->
        <div id="owl-posts" class="owl-carousel owl-theme owl-carousel--arrows-outside">
        <?php
		if( $admin_query = mysqli_query($con,"select * from news"))
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
                <a href="news.php?depcat=<?php echo $row['id'];?>" title="<?php echo htmlentities( $row['tilte']);?>"> <?php echo $row['title'];?> </a>
                </h2>
              </div>
              <a href="" class="thumb-url"></a>
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

      </section> <!-- end carousel posts -->


      <!-- Posts from categories -->
      <section class="section mb-0">
        <div class="row">

          <!-- Technology -->
          <div class="col-md-6">
            <div class="title-wrap title-wrap--line">
              <h3 class="section-title">Technology</h3>
                       <?php
	                     	if( $admin_query = mysqli_query($con,"select * from technews limit 1"))
			                  {
			                 $num   = mysqli_num_rows($admin_query);
			                 while($row = mysqli_fetch_array($admin_query))
			                  {
			                  ?>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <article class="entry thumb thumb--size-2">
                <div class="entry__img-holder thumb__img-holder" style="background-image: url('admin/<?php echo $row['image'];?>');">
                    <div class="bottom-gradient"></div>
                    <div class="thumb-text-holder thumb-text-holder--1">   
                      <h2 class="thumb-entry-title">
                      <a href="tech_news.php?depcat=<?php echo $row['id'];?>" title="<?php echo htmlentities( $row['tilte']);?>"> <?php echo $row['title'];?> </a>
                      </h2>
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
                    <a href="#" class="thumb-url"></a>
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


              <div class="col-lg-6">
                       <?php
	                     	if( $admin_query = mysqli_query($con,"select * from technews limit 4"))
			                  {
			                 $num   = mysqli_num_rows($admin_query);
			                 while($row = mysqli_fetch_array($admin_query))
			                  {
			                  ?>
                <ul class="post-list-small post-list-small--dividers post-list-small--arrows mb-24">
                  <li class="post-list-small__item">
                    <article class="post-list-small__entry">
                      <div class="post-list-small__body">
                        <h3 class="post-list-small__entry-title">
                        <a href="tech_news.php?depcat=<?php echo $row['id'];?>" title="<?php echo htmlentities( $row['tilte']);?>"> <?php echo $row['title'];?> </a>
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
              </div>
            </div>            
          </div> <!-- end technology -->

          <!-- Travel -->
          <div class="col-md-6">
            <div class="title-wrap title-wrap--line">
              <h3 class="section-title">Business</h3>
              <?php
	                     	if( $admin_query = mysqli_query($con,"select * from businessnews limit 1"))
			                  {
			                 $num   = mysqli_num_rows($admin_query);
			                 while($row = mysqli_fetch_array($admin_query))
			                  {
			                  ?>
            </div>
              <div class="row">
              <div class="col-lg-6">
                <article class="entry thumb thumb--size-2">
                <div class="entry__img-holder thumb__img-holder" style="background-image: url('admin/<?php echo $row['image'];?>');">
                    <div class="bottom-gradient"></div>
                    <div class="thumb-text-holder thumb-text-holder--1">   
                      <h2 class="thumb-entry-title">
                      <a href="bus_news.php?depcat=<?php echo $row['id'];?>" title="<?php echo htmlentities( $row['tilte']);?>"> <?php echo $row['title'];?> </a>
                      </h2>
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
                    <a href="#" class="thumb-url"></a>
                  </div>
                </article>
              </div>
              <div class="col-lg-6">
              <?php
	                     	if( $admin_query = mysqli_query($con,"select * from businessnews limit 4"))
			                  {
			                 $num   = mysqli_num_rows($admin_query);
			                 while($row = mysqli_fetch_array($admin_query))
			                  {
			                  ?>
                <ul class="post-list-small post-list-small--dividers post-list-small--arrows mb-24">
                  <li class="post-list-small__item">
                    <article class="post-list-small__entry">
                      <div class="post-list-small__body">
                        <h3 class="post-list-small__entry-title">
                        <a href="bus_news.php?depcat=<?php echo $row['id'];?>" title="<?php echo htmlentities( $row['tilte']);?>"> <?php echo $row['title'];?> </a>
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
          </div> <!-- end travel -->

          <!-- Cryptocurrency -->
          <div class="col-md-6">
            <div class="title-wrap title-wrap--line">
              <h3 class="section-title">Sport</h3>
              <?php
	                     	if( $admin_query = mysqli_query($con,"select * from sportnews limit 1"))
			                  {
			                 $num   = mysqli_num_rows($admin_query);
			                 while($row = mysqli_fetch_array($admin_query))
			                  {
			                  ?>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <article class="entry thumb thumb--size-2">
                <div class="entry__img-holder thumb__img-holder" style="background-image: url('admin/<?php echo $row['image'];?>');">
                    <div class="bottom-gradient"></div>
                    <div class="thumb-text-holder thumb-text-holder--1">   
                      <h2 class="thumb-entry-title">
                      <a href="sportnews.php?depcat=<?php echo $row['id'];?>" title="<?php echo htmlentities( $row['tilte']);?>"> <?php echo $row['title'];?> </a>
                      </h2>
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
                    <a href="" class="thumb-url"></a>
                  </div>
                </article>
              </div>
              <div class="col-lg-6">
              <?php
	                     	if( $admin_query = mysqli_query($con,"select * from sportnews limit 4"))
			                  {
			                 $num   = mysqli_num_rows($admin_query);
			                 while($row = mysqli_fetch_array($admin_query))
			                  {
			                  ?>
                <ul class="post-list-small post-list-small--dividers post-list-small--arrows mb-24">
                  <li class="post-list-small__item">
                    <article class="post-list-small__entry">
                      <div class="post-list-small__body">
                        <h3 class="post-list-small__entry-title">
                        <a href="sportnews.php?depcat=<?php echo $row['id'];?>" title="<?php echo htmlentities( $row['tilte']);?>"> <?php echo $row['title'];?> </a>
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
          </div> <!-- end cryptocurrency -->

          <!-- Investment -->
          <div class="col-md-6">
            <div class="title-wrap title-wrap--line">
              <h3 class="section-title">Politics</h3>
              <?php
	                     	if( $admin_query = mysqli_query($con,"select * from politicsnews limit 1"))
			                  {
			                 $num   = mysqli_num_rows($admin_query);
			                 while($row = mysqli_fetch_array($admin_query))
			                  {
			                  ?>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <article class="entry thumb thumb--size-2">
                <div class="entry__img-holder thumb__img-holder" style="background-image: url('admin/<?php echo $row['image'];?>');">
                    <div class="bottom-gradient"></div>
                    <div class="thumb-text-holder thumb-text-holder--1">   
                      <h2 class="thumb-entry-title">
                      <a href="politics_news.php?depcat=<?php echo $row['id'];?>" title="<?php echo htmlentities( $row['tilte']);?>"> <?php echo $row['title'];?> </a>
                      </h2>
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
                    <a href="" class="thumb-url"></a>
                  </div>
                </article>
              </div>
              <div class="col-lg-6">
              <?php
	                     	if( $admin_query = mysqli_query($con,"select * from politicsnews limit 4"))
			                  {
			                 $num   = mysqli_num_rows($admin_query);
			                 while($row = mysqli_fetch_array($admin_query))
			                  {
			                  ?>
                <ul class="post-list-small post-list-small--dividers post-list-small--arrows mb-24">
                  <li class="post-list-small__item">
                    <article class="post-list-small__entry">
                      <div class="post-list-small__body">
                        <h3 class="post-list-small__entry-title">
                        <a href="politics_news.php?depcat=<?php echo $row['id'];?>" title="<?php echo htmlentities( $row['tilte']);?>"> <?php echo $row['title'];?> </a>
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
          </div> <!-- end investment -->

        </div>                
      </section> <!-- end posts from categories -->

      <!-- Content Secondary -->
      <div class="row">

        <!-- Posts -->
        <div class="col-lg-8 blog__content mb-72">

          <!-- Worldwide News -->
          <section class="section">
            <div class="title-wrap title-wrap--line">
              <h3 class="section-title">Education</h3>
              <a href="#" class="all-posts-url"></a>
            </div>
            
            <?php
	                     	if( $admin_query = mysqli_query($con,"select * from edunews ORDER BY id DESC limit 7"))
			                  {
			                 $num   = mysqli_num_rows($admin_query);
			                 while($row = mysqli_fetch_array($admin_query))
			                  {
			                  ?>
            <article class="entry card post-list">
              <div class="entry__img-holder post-list__img-holder card__img-holder" style="background-image: url(admin/<?php echo $row['image'];?>');">
              <a href="edu_news.php?depcat=<?php echo $row['id'];?>" title="<?php echo htmlentities( $row['']);?>"> 
                <img src="admin/<?php echo $row['image'];?>" alt="" title=""class=""/>
              </div>

              <div class="entry__body post-list__body card__body">
                <div class="entry__header">
                  <h2 class="entry__title">
                  <a href="edu_news.php?depcat=<?php echo $row['id'];?>" title="<?php echo htmlentities( $row['tilte']);?>"> <?php echo $row['title'];?> </a>
                  </h2>
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
          </section> <!-- end international news -->

        </div> <!-- end posts -->

        <!-- Sidebar 1 -->
        <aside class="col-lg-4 sidebar sidebar--1 sidebar--right">

          <!-- Widget Ad 300 -->
          <?php include "ads.php" ?> <!-- end widget ad 300 -->
                       <?php
	                     	if( $admin_query = mysqli_query($con,"select * from gossips ORDER BY title DESC limit 5"))
			                  {
			                 $num   = mysqli_num_rows($admin_query);
			                 while($row = mysqli_fetch_array($admin_query))
			                  {
			                  ?>
          <aside class="widget widget-rating-posts">
            <h4 class="widget-title">Gossip</h4>
            <article class="entry">
              <div class="entry__img-holder">
              <a href="gossip.php?depcat=<?php echo $row['id'];?>" title="<?php echo htmlentities( $row['']);?>"> 
                  <div class="thumb-container thumb-60">
                  <img src="admin/<?php echo $row['image'];?>" alt="" title=""class=""/>
                  </div>
                </a>
              </div>

              <div class="entry__body">
                <div class="entry__header">
                  
                  <h2 class="entry__title">
                  <a href="gossip.php?depcat=<?php echo $row['id'];?>" title="<?php echo htmlentities( $row['tilte']);?>"> <?php echo $row['title'];?> </a>
                  </h2>
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
              </div>
            </article>
          </aside> <!-- end widget recommended (rating) -->
          <?php }
				}
				else
				{
					echo 'Query unsuccessful :: ' . $con->errorno;
					var_dump( $con);
				}
                    ?>
        </aside> <!-- end sidebar 1 -->
      </div> <!-- content secondary -->      
      

    </div> <!-- end main container -->

    <!-- Footer -->
    <footer class="footer footer--dark">
      <div class="container">
        <div class="footer__widgets">
          <div class="row">

            <div class="col-lg-3 col-md-6">
              <aside class="widget widget-logo">
                <a href="index.php">
                  <img src="img/N1.png" srcset="img/N1.png, img/N1.png" class="logo__img" alt="">
                </a>
                <p class="copyright">
                  © 2019 Ekiensnews | Developed by <a href="http://savidorcodes.org">savidorcodes</a>
                </p>
              </aside>
            </div>

            <div class="col-lg-2 col-md-6">
              <aside class="widget widget_nav_menu">
                <h4 class="widget-title">Useful Links</h4>
                <ul>
                  <li><a href="about_us.php">About</a></li>
                  <li><a href="contact.php">Contact</a></li>
                </ul>
              </aside>
            </div>  
            
            <div class="col-lg-4 col-md-6">
            
              <aside class="widget widget-popular-posts">
                <h4 class="widget-title">Previous News</h4>
                <ul class="post-list-small">
                  <li class="post-list-small__item">
                  <?php
	                     	if( $admin_query = mysqli_query($con,"select * from news ORDER BY title DESC limit 2"))
			                  {
			                 $num   = mysqli_num_rows($admin_query);
			                 while($row = mysqli_fetch_array($admin_query))
			                  {
			                  ?>
                    <article class="post-list-small__entry clearfix">
                      <div class="post-list-small__img-holder">
                        <div class="thumb-container thumb-100">
                          <a href="">
                          <img src="admin/<?php echo $row['image'];?>" alt="" title=""class="post-list-small__img--rounded lazyload"/>
                          </a>
                        </div>
                      </div>
                      <div class="post-list-small__body">
                        <h3 class="post-list-small__entry-title">
                        <a href="news.php?depcat=<?php echo $row['id'];?>" title="<?php echo htmlentities( $row['tilte']);?>"> <?php echo $row['title'];?> </a>
                        </h3>
                        <ul class="entry__meta">
                          <li class="entry__meta-author">
                            <span>by</span>
                            <?php echo $row['author_name']; ?>
                          </li>
                          <li class="entry__meta-date">
                          <?php echo $row['date_date']; ?>
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
              </aside>      
                     
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