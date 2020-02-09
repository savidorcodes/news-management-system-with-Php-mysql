<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include "connect.php";
?><!DOCTYPE html>
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

<div class="loader-mask">
    <div class="loader">
      <div></div>
    </div>
  </div>

  <!-- Bg Overlay -->
  <div class="content-overlay"></div>
  <?php include "sidenav.php"; ?>
  <!-- Sidenav -->    
  

  <main class="main oh" id="main">  

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
            <div class="nav__right">      

            </div> <!-- end nav right -->            
        
          </div> <!-- end flex-parent -->
        </div> <!-- end container -->

      </div>
    </header> <!-- end navigation -->

    <!-- Breadcrumbs -->

    <div class="main-container container" id="main-container">            
      <!-- post content -->
      <div class="blog__content mb-72">
        <h1 class="page-title"></h1>
<br>
<br>
<br>
        <div class="row justify-content-center">
          <div class="col-lg-8">
		  <?php
			              if( $admin_query = mysqli_query($con,"select * from contact"))
			                  {
			                 $num   = mysqli_num_rows($admin_query);
			                 while($row = mysqli_fetch_array($admin_query))
			                  {
			            ?>
            <ul class="contact-items">
              <li class="contact-item"><address> <?php echo $row['address']; ?></address></li>
              <li class="contact-item"><a href="tel:+1-800-1554-456-123"> <?php echo $row['phone']; ?></a></li>
			  <li class="contact-item"><a href="mailto:<?php echo $row['email']; ?>"> <?php echo $row['email']; ?></a></li>
			  <br>
			  <!--<h4>Drop Us a Message</h4>
            <p>Don't hesitate to get in touch. We will reply you as soon as possible.</p>
			</ul>  -->
			<?php }
			          	}
			             	else
				       {
					echo 'Query unsuccessful :: ' . $con->errorno;
					var_dump( $con);
				}
                    ?>            

            <!-- Contact Form 
            <form id="contact-form" class="contact-form mt-30 mb-30" method="post" action="#">
              <div class="contact-name">
                <label for="name">Name <abbr title="required" class="required">*</abbr></label>
                <input name="name" id="name" type="text">
              </div>
              <div class="contact-email">
                <label for="email">Email <abbr title="required" class="required">*</abbr></label>
                <input name="email" id="email" type="email">
              </div>
              <div class="contact-subject">
                <label for="email">Subject</label>
                <input name="subject" id="subject" type="text">
              </div>
              <div class="contact-message">
                <label for="message">Message <abbr title="required" class="required">*</abbr></label>
                <textarea id="message" name="message" rows="7" required="required"></textarea>
              </div>

              <input type="submit" class="btn btn-lg btn-color btn-button" value="Send Message" id="submit-message">
              <div id="msg" class="message"></div>
            </form> -->

          </div>
        </div>
      </div> <!--end post content -->
    </div> <!-- end main container -->

    <!-- Footer -->
    <?php include "sportnewsfooter.php" ?>

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
  <script type="text/javascript" src="http://maps.google.com/maps/api/js"></script>
  <script type="text/javascript" src="js/gmap3.min.js"></script>
  <script src="js/scripts.js"></script>

  <!-- Google Map -->
  <script type="text/javascript">
    $(document).ready( function(){

      var gmapDiv = $("#google-map");
      var gmapMarker = gmapDiv.attr("data-address");

      gmapDiv.gmap3({
        zoom: 16,
        address: gmapMarker,
        oomControl: true,
        navigationControl: true,
        scrollwheel: false,
        styles: [
          {
          "featureType":"all",
          "elementType":"all",
            "stylers":[
              { "saturation":"0" }
            ]
        }]
      })
      .marker({
        address: gmapMarker,
        icon: "img/map_pin.png"
      })
      .infowindow({
        content: "V Tytana St, Manila, Philippines"
      })
      .then(function (infowindow) {
        var map = this.get(0);
        var marker = this.get(1);
        marker.addListener('click', function() {
          infowindow.open(map, marker);
        });
      });
    });
  </script>

</body>
</html>