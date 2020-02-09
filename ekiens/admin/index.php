<?php
session_start();

include "includes/connect.php";
error_reporting(E_ALL);

// if(!isset($_SESSION['a']))
 if(!isset($_SESSION['a']))
{
	   echo "<script>
    window.location = 'login.php';
</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Ekiens News Admin | Dashboard</title>
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
	
	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		<?php include "header.php"; ?>
		<!-- begin #sidebar -->
		<?php include "sidebar.php"; ?>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item"><a href="index.php">Home</a></li>
				<li class="breadcrumb-item active">Dashboard</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Dashboard <small></small></h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
				<!-- begin col-3 -->
				<?php
    		      $query=mysqli_query($con,"select * from news");
    	    	  $news=mysqli_num_rows($query);
    				?>
				<div class="col-lg-3 col-md-6">
					<div class="widget widget-stats bg-red">
						<div class="stats-icon"><i class="fa fa-desktop"></i></div>
						<div class="stats-info">
							<h4>TOTAL NEWS</h4>
							<p><?php echo $news ?></p>	
						</div>
						<div class="stats-link">
                        <a href="javascript:;">Ekiens News Admin </a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<?php
    		      $query=mysqli_query($con,"select * from gossips");
    	    	  $gossips=mysqli_num_rows($query);
    				?>
				<div class="col-lg-3 col-md-6">
					<div class="widget widget-stats bg-orange">
						<div class="stats-icon"><i class="fa fa-link"></i></div>
						<div class="stats-info">
							<h4>TOTAL GOSSIP'S</h4>
							<p><?php echo $gossips ?></p>	
						</div>
						<div class="stats-link">
						<a href="javascript:;">Ekiens News Admin </a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<div class="col-lg-3 col-md-6">
					<div class="widget widget-stats bg-grey-darker">
						<div class="stats-icon"><i class="fa fa-users"></i></div>
						<div class="stats-info">
							<h4>TOTAL VOTES</h4>
							<p>0</p>	
						</div>
						<div class="stats-link">
							<a href="javascript:;">Ekiens News Admin </a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<div class="col-lg-3 col-md-6">
					<div class="widget widget-stats bg-black-lighter">
						<div class="stats-icon"><i class="fa fa-clock"></i></div>
						<div class="stats-info">
							<h4>TOTAL ADVERTS</h4>
							<p>0</p>	
						</div>
						<div class="stats-link">
                        <a href="javascript:;">Ekiens News Admin </a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
			</div>
			<!-- end row -->
			<!-- begin row -->
			<div class="row">
				<!-- begin col-8 -->
				<div class="col-lg-8">
					<!-- begin panel -->
					<!-- end panel -->
					
					<!-- begin tabs -->
					<ul class="nav nav-tabs nav-tabs-inverse nav-justified nav-justified-mobile" data-sortable-id="index-2">
						<li class="nav-item"><a href="#latest-post" data-toggle="tab" class="nav-link active"><i class="fa fa-camera fa-lg m-r-5"></i> <span class="d-none d-md-inline">Latest News</span></a></li>
						<li class="nav-item"><a href="#email" data-toggle="tab" class="nav-link"><i class="fa fa-envelope fa-lg m-r-5"></i> <span class="d-none d-md-inline">Latest Gossip's</span></a></li>
					</ul>
					<div class="tab-content" data-sortable-id="index-3">
						<div class="tab-pane fade active show" id="latest-post">
							<div class="height-sm" data-scrollbar="true">
								<ul class="media-list media-list-with-divider">
								<?php
			if( $admin_query = mysqli_query($con,"select * from news"))
			                   {
			                    $num   = mysqli_num_rows($admin_query);
			                   while($row = mysqli_fetch_array($admin_query))
			                   {
                              ?>
									<li class="media media-lg">
										<a href="javascript:;" class="pull-left">
											<img class="media-object" src="<?php echo $row['image']; ?>" alt="" />
										</a>
										<div class="media-body">
											<h4 class="media-heading"> <a href="sportnews.php?depcat=<?php echo $row['title'];?>" title="<?php echo $row['tilte'];?>"> <?php echo $row['title'];?> </a></h4>
											<?php echo $row['news']; ?>
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
							</div>
						</div>
						<div class="tab-pane fade" id="email">
							<div class="height-sm" data-scrollbar="true">
								<ul class="media-list media-list-with-divider">
								<?php
			if( $admin_query = mysqli_query($con,"select * from gossips"))
			                   {
			                    $num   = mysqli_num_rows($admin_query);
			                   while($row = mysqli_fetch_array($admin_query))
			                   {
                              ?>
									<li class="media media-sm">
										<a href="javascript:;" class="pull-left">
											<img src="<?php echo $row['image']; ?>" alt="" class="media-object rounded-corner" />
										</a>
										<div class="media-body">
											<a href="javascript:;"><h4 class="media-heading"><a href="sportnews.php?depcat=<?php echo $row['title'];?>" title="<?php echo $row['tilte'];?>"> <?php echo $row['title'];?> </a></h4></a>
											<p class="m-b-5">
											<?php echo $row['news']; ?>
											</p>
											<i class="text-muted"><?php echo $row['date']; ?></i>
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
							</div>
						</div>
					</div>
					<!-- end tabs -->
				</div>
				<!-- end col-8 -->
				<!-- begin col-4 -->
				<div class="col-lg-4">
					<!-- begin panel -->
					<!-- end panel -->
					
					<!-- begin panel -->
					<!-- end panel -->
					
					<!-- begin panel -->
					<!-- end panel -->
					
					<!-- begin panel -->
					<div class="panel panel-inverse" data-sortable-id="index-9">
						<div class="panel-heading">
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
							<h4 class="panel-title">Calendar</h4>
						</div>
						<div class="panel-body p-0">
							<div id="datepicker-inline" class="datepicker-full-width overflow-y-scroll position-relative"><div></div></div>
						</div>
					</div>
		
				</div>
				<!-- end col-4 -->
			</div>
			<!-- end row -->
		</div>
		
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
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/plugins/js-cookie/js.cookie.js"></script>
	<script src="assets/js/theme/apple.min.js"></script>
	<script src="assets/js/apps.min.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="assets/plugins/flot/jquery.flot.min.js"></script>
	<script src="assets/plugins/flot/jquery.flot.time.min.js"></script>
	<script src="assets/plugins/flot/jquery.flot.resize.min.js"></script>
	<script src="assets/plugins/flot/jquery.flot.pie.min.js"></script>
	<script src="assets/plugins/sparkline/jquery.sparkline.js"></script>
	<script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="assets/js/demo/dashboard.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
			Dashboard.init();
		});
	</script>
</body>
</html>
