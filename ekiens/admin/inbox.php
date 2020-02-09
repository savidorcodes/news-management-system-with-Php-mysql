<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include "includes/connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Ekiensnews | Inbox</title>
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
		
		<!-- begin #sidebar -->
		<?php include "sidebar.php"; ?>
		
		<!-- begin #content -->
		<div id="content" class="content content-full-width inbox">
		    <!-- begin vertical-box -->
		    <div class="vertical-box with-grid">
		        <!-- begin vertical-box-column -->
		        <div class="vertical-box-column width-200 bg-silver hidden-xs">
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
						<div class="wrapper bg-silver-lighter">
							<!-- begin btn-toolbar -->
							<div class="btn-toolbar">
								<!-- begin btn-group -->
								<div class="btn-group dropdown m-r-5">
								</div>
							</div>
							<!-- end btn-toolbar -->
						</div>
						<!-- end wrapper -->
						<!-- begin vertical-box-row -->
						<div class="vertical-box-row">
							<!-- begin vertical-box-cell -->
							<div class="vertical-box-cell">
								<!-- begin vertical-box-inner-cell -->
								<div class="vertical-box-inner-cell">
									<!-- begin scrollbar -->
									<div data-scrollbar="true" data-height="100%">
										<!-- begin list-email -->
										<ul class="list-group list-group-lg no-radius list-email">
										<?php
			                            if( $admin_query = mysqli_query($con,"select * from messages"))
			                            {
			                          $num   = mysqli_num_rows($admin_query);
			                         while($row = mysqli_fetch_array($admin_query))
			                         {
									 ?>

									 
											<li class="list-group-item unread">
											<a href="#" class="email-user bg-grey">
													<span class="text-white">EN</span>
												</a>
												<div class="email-info">
													<span class="email-time"> <?php echo $row['date']; ?></span>
														<span class="email-sender"> <?php echo $row['name']; ?></span>
														<span class="email-title"><a href="message_detail.php?depcat=<?php echo $row['title'];?>" title="<?php echo $row['tilte'];?>"> <?php echo $row['title'];?> </a></span>
														<span class="email-desc"><?php echo $row['message']; ?></span>

												</div>
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
										<!-- end list-email -->
									</div>
									<!-- end scrollbar -->
								</div>
								<!-- end vertical-box-inner-cell -->
							</div>
							<!-- end vertical-box-cell -->
						</div>
						<!-- end vertical-box-row -->
						<!-- begin wrapper -->
						<div class="wrapper bg-silver-lighter clearfix">
							<div class="btn-group pull-right">
							</div>
						</div>
						<!-- end wrapper -->
					</div>
					<!-- end vertical-box -->
		        </div>
		        <!-- end vertical-box-column -->
		    </div>
		    <!-- end vertical-box -->
		</div>
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
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="assets/js/demo/email-inbox.demo.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	<script>
		$(document).ready(function() {
			App.init();
			InboxV2.init();
		});
	</script>
</body>
</html>
