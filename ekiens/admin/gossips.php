<?php
session_start();
include "includes/connect.php";
error_reporting(E_ALL);

// if(!isset($_SESSION['a']))
 if(!isset($_SESSION['a']))
{
	   echo "<script>
    window.location = 'index.php';
</script>";
exit;
}

if(isset($_GET['did'] ) && $_GET['todo']=="delete")
		{
				mysqli_query($con,"delete from gossips
						where id  = '".$_GET['did']."' ");
			header('location:gossips.php');
		}

$querygossip=mysqli_query($con,"select * from gossips");

?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Ekiensnews Admin | Gossips</title>
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
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		<?php include "header.php"; ?>
		<!-- end #header -->
		<?php include "sidebar.php"; ?>
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item"><a href="index.php">Home</a></li>
				<li class="breadcrumb-item active">Gossips</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Gossips</h1>
			<!-- end page-header -->
			
			<!-- begin panel -->
			<div class="panel panel-inverse">
				<!-- begin panel-heading -->
				<div class="panel-heading">
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">Ekiensnews - Admin Panel</h4>
				</div>
				<!-- end panel-heading -->
                <!-- begin panel-body -->
                <div class="table-responsive">
				<div class="panel-body">
					<table id="data-table-default" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th width="1%">Tag</th>
								<th width="1%" data-orderable="false">Image</th>
								<th class="text-nowrap">Description</th>
								<th class="text-nowrap">Title</th>
								<th class="text-nowrap">Year</th>
								<th class="text-nowrap">Author's Name</th>
								<th class="text-nowrap">Author's Email</th>
								<th class="text-nowrap">Action</th>
							</tr>
                        </thead>
                        <?php
              	   while($row=mysqli_fetch_array($querygossip))
              	  {
              		?>
						<tbody>
							<tr class="odd gradeX">
								<td width="1%" class="f-s-600 text-inverse"><?php echo $row['tag']; ?></td>
								<td width="1%" class="with-img"><img src="<?php echo $row['image']; ?>" class="img-rounded height-30" /></td>
								<td><?php echo $row['descn']; ?></td>
								<td><?php echo $row['title']; ?></td>
								<td><?php echo $row['year']; ?></td>
								<td><?php echo $row['author_name']; ?></td>
                                <td><?php echo $row['author_email']; ?></td>
                                <td class="center">

                             <a class="btn btn-danger" href = "gossips.php?todo=delete&did=<?php echo $row['id'] ?>" role="button" onclick = "return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash icon-white"></i>
                               Delete
                              </a>
							  <hr>
							  <a class="btn btn-success" href = "edit_gossip.php?id=<?php echo $row['id'] ?>" class="btn btn-xs btn-yellow"><i class="glyphicon glyphicon-trash icon-white"></i>Edit</a>
                             </td>
                             </tr>
                             <?php
                            	}
                            	?>
						</tbody>
					</table>
				</div>
				</div>
				<!-- end panel-body -->
			</div>
			<!-- end panel -->
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
	<script src="assets/js/demo/table-manage-default.demo.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
			TableManageDefault.init();
		});
	</script>
</body>
</html>
