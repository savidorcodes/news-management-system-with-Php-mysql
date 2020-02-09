<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include "includes/connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Ekiensnews Admin | Message Detail</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
	<link href="assets/plugins/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/plugins/font-awesome/5.0/css/fontawesome-all.min.css" rel="stylesheet" />
	<link href="assets/plugins/ionicons/css/ionicons.min.css" rel="stylesheet" />
	<link href="assets/plugins/animate/animate.min.css" rel="stylesheet" />
	<link href="assets/css/apple/style.min.css" rel="stylesheet" />
	<link href="assets/css/apple/style-responsive.min.css" rel="stylesheet" />
	<link href="assets/css/apple/theme/default.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed page-content-full-height">
		<!-- begin #header -->
		<?php include "header.php"; ?>
		<!-- end #header -->
		<?php include "sidebar.php"; ?>		
        <!-- begin #content -->
		<div id="content" class="content content-full-width inbox">
		    <!-- begin vertical-box -->
		    <div class="vertical-box with-grid">
		        <!-- begin vertical-box-column -->
                <div class="vertical-box-column width-200 bg-silver hidden-xs">
        <?php
                             
       $depcat = $_GET['depcat'];
       $query = mysqli_query($con,"select * from messages where title='$depcat'");
                             
        while($drow = mysqli_fetch_assoc($query))
        {
        $id=$drow['id'];
                           
        ?>
		        	<!-- begin vertical-box -->
		        	<div class="vertical-box">
						<!-- begin wrapper -->
						<!-- end wrapper -->
						<!-- begin vertical-box-row -->
						<div class="vertical-box-row">
							<!-- begin vertical-box-cell -->
							<div class="vertical-box-cell">
								<!-- begin vertical-box-inner-cell -->
								<div class="vertical-box-inner-cell">
									<!-- begin scrollbar -->
									<div data-scrollbar="true" data-height="100%">
										<!-- begin wrapper -->
										<div class="wrapper p-0">
											<div class="nav-title"><b>FOLDER</b></div>
											<ul class="nav nav-inbox">
												<li class="active"><a href="inbox.php"><i class="fa fa-inbox fa-fw m-r-5"></i> Inbox <span class="badge pull-right">52</span></a></li>
											</ul>
										</div>
										<!-- end wrapper -->
									</div>
									<!-- end scrollbar -->
								</div>
								<!-- end vertical-box-inner-cell -->
							</div>
							<!-- end vertical-box-cell -->
						</div>
						<!-- end vertical-box-row -->
					</div>
					<!-- end vertical-box -->
		        </div>
		        <!-- end vertical-box-column -->
		        <!-- begin vertical-box-column -->
		        <div class="vertical-box-column bg-white">
		        	<!-- begin vertical-box -->
		        	<div class="vertical-box">
						<!-- begin wrapper -->
						<!-- end wrapper -->
						<!-- begin vertical-box-row -->
						<div class="vertical-box-row">
							<!-- begin vertical-box-cell -->
							<div class="vertical-box-cell">
								<!-- begin vertical-box-inner-cell -->
								<div class="vertical-box-inner-cell">
									<!-- begin scrollbar -->
									<div data-scrollbar="true" data-height="100%">
                                        <!-- begin wrapper -->
                                        
										<div class="wrapper">
											<h3 class="m-t-0 m-b-15 f-w-500"><?php echo $row['title']; ?></h3>
											<ul class="media-list underline m-b-15 p-b-15">
												<li class="media media-sm clearfix">
													<a href="javascript:;" class="pull-left">
														<img class="media-object rounded-corner" alt="" src="assets/img/user/user-12.jpg" />
													</a>
													<div class="media-body">
														<div class="email-from text-inverse f-s-14 f-w-600 m-b-3">
															from support@wrapbootstrap.com
														</div>
														<div class="m-b-3"><i class="fa fa-clock fa-fw"></i> Today, 8:30 AM</div>
														<div class="email-to">
															To: nguoksiong@live.co.uk
														</div>
													</div>
												</li>
											</ul>
											<ul class="attached-document clearfix">
												<li class="fa-file">
													<div class="document-file">
														<a href="javascript:;">
															<i class="fa fa-file-pdf"></i>
														</a>
													</div>
													<div class="document-name"><a href="javascript:;">flight_ticket.pdf</a></div>
												</li>
												<li class="fa-camera">
													<div class="document-file">
														<a href="javascript:;">
															<img src="assets/img/gallery/gallery-11.jpg" alt="" />
														</a>
													</div>
													<div class="document-name"><a href="javascript:;">front_end_mockup.jpg</a></div>
												</li>
											</ul>
						
											<p class="f-s-12 text-inverse p-t-10"> 
												Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vel auctor nisi, vel auctor orci. <br />
												Aenean in pretium odio, ut lacinia tellus. Nam sed sem ac enim porttitor vestibulum vitae at erat.
											</p>
											<p class="f-s-12 text-inverse">
												Curabitur auctor non orci a molestie. Nunc non justo quis orci viverra pretium id ut est. <br />
												Nullam vitae dolor id enim consequat fermentum. Ut vel nibh tellus. <br />
												Duis finibus ante et augue fringilla, vitae scelerisque tortor pretium. <br />
												Phasellus quis eros erat. Nam sed justo libero.
											</p>
											<p class="f-s-12 text-inverse">
												Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.<br /> 
												Sed tempus dapibus libero ac commodo.
											</p>
											<br />
											<br />
											<p class="f-s-12 text-inverse">
												Best Regards,<br />
												Sean.<br /><br />
												Information Technology Department,<br />
												Senior Front End Designer<br />
											</p>
										</div>
										<!-- end wrapper -->
									</div>
									<!-- end scrollbar -->
								</div>
								<!-- end vertical-box-inner-cell -->
							</div>
							<!-- end vertical-box-cell -->
						</div>
					</div>
					<!-- end vertical-box -->
		        </div>
		        <!-- end vertical-box-column -->
		    </div>
		    <!-- end vertical-box -->
        </div>
        <?php }?>
		<!-- end #content -->
		
        <!-- begin theme-panel -->
        <?php include "panel_settings.php"; ?>
        <!-- end theme-panel -->
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/plugins/jquery/jquery-3.2.1.min.js"></script>
	<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
	<script src="assets/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
	<!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
		<script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/plugins/js-cookie/js.cookie.js"></script>
	<script src="assets/js/theme/apple.min.js"></script>
	<script src="assets/js/apps.min.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
		});
	</script>
</body>
</html>
