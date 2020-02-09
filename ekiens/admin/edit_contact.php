<?php
session_start();
include "includes/connect.php";
error_reporting(E_ALL);
 if(!isset($_SESSION['a']))
{
	   echo "<script>
    window.location = 'login.php';
</script>";
}
$id=$_GET['id'];
if(isset($_POST['update']))
{
	$address=$_POST['address'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
  

$address=mysqli_real_escape_string($con, $_POST['address']);
$phone=mysqli_real_escape_string($con, $_POST['phone']);
$email=mysqli_real_escape_string($con, $_POST['email']);

	$bl=$_FILES['image']['name'];
	$image="image/".$bl;

	if(move_uploaded_file($_FILES['image']['tmp_name'],$image))
	
	{
    $q=mysqli_query($con,"update contact set address='$address',phone='$phone',email='$email',image='$image' where id='$id'");
	}
	else
	{
		$q=mysqli_query($con,"update contact set address='$address',phone='$phone',email='$email',image='$image' where id='$id'");
	}

	if($q)
	{
	   echo "<script>
    window.location = 'view_contact.php';
</script>";
  exit;
   }
	else
	{
		echo "<div class='help-block'><pre>

		[$q]

		" . mysqli_error( $con ) . "</pre></div>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Ekiensnews Admin | Edit Contact Us</title>
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
	<link href="assets/plugins/jquery-smart-wizard/src/css/smart_wizard.css" rel="stylesheet" />
	<link href="assets/plugins/parsley/src/parsley.css" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="assets/plugins/bootstrap-wysihtml5/dist/bootstrap3-wysihtml5.min.css" rel="stylesheet" />
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
		<!-- end #header -->
		<?php include "sidebar.php"; ?>
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item"><a href="index.php">Home</a></li>
				<li class="breadcrumb-item active">Edit Contact Us</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Edit Contact Us<small></small></h1>
			<!-- end page-header -->
			
			<!-- begin wizard-form -->
			<?php
            $query=mysqli_query($con,"select * from contact where id='$id'");
            $row=mysqli_fetch_array($query);
            ?>
			<form action="" method="post" name="form-wizard" class="form-control-with-bg" enctype="multipart/form-data">
				<!-- begin wizard -->
				<div id="wizard">
					<!-- begin wizard-step -->
					<ul>
						<li class="col-md-3 col-sm-4 col-6">
							<a href="#step-1">
							</a>
						</li>
					</ul>
					<!-- end wizard-step -->
					<!-- begin wizard-content -->
					<div>
						<!-- begin step-1 -->
						<div id="step-1">
							<!-- begin fieldset -->
							<fieldset>
								<!-- begin row -->
								<div class="row">
									<!-- begin col-8 -->
									<div class="col-md-8 offset-md-2">
										<legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse"> Ekiensnews Contact</legend>
										<!-- end form-group -->
										<!-- begin form-group -->
									</div>
									<!-- end col-8 -->
								</div>
								<div class="panel panel-inverse">
									<div class="panel-heading">
										<h4 class="panel-title"></h4>
									</div>
									<div class="panel-body panel-form">
								<textarea class="ckeditor" id="editor1" name="address" rows="20">
								<?php echo $row['address'] ?>
								</textarea>
									</div>
								</div>
								       <div class="form-group row m-b-10">
											<label class="col-md-3 col-form-label text-md-right">Phone Number <span class="text-danger">*</span></label>
											<div class="col-md-6">
												<input type="text" value="<?php echo $row['phone'] ?>" name="phone" data-parsley-required="true" class="form-control" />
											</div>
                                        </div>
                                        <div class="form-group row m-b-10">
											<label class="col-md-3 col-form-label text-md-right">Email <span class="text-danger">*</span></label>
											<div class="col-md-6">
												<input type="text" value="<?php echo $row['email'] ?>" name="email" data-parsley-required="true" class="form-control" />
											</div>
                                        </div>
                                        <div class="form-group row m-b-10">
											<label class="col-md-3 col-form-label text-md-right">Image <span class="text-danger">*</span></label>
											<div class="col-md-6">
												<input type="file" name="image" data-parsley-required="true" class="form-control" />
											</div>
                                        </div>
								<!-- end row -->
                                <div class="jumbotron m-b-0 text-center">
								<button type="submit" name="update" class="btn btn-primary btn-lg">Submit</button>
							</div>
							</fieldset>
							
							<!-- end fieldset -->
						</div>
						<!-- end step-4 -->
					</div>
					<!-- end wizard-content -->
				</div>
				<!-- end wizard -->
			</form>
			<!-- end wizard-form -->
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
	<script src="assets/plugins/parsley/dist/parsley.js"></script>
	<script src="assets/plugins/jquery-smart-wizard/src/js/jquery.smartWizard.js"></script>
	<script src="assets/js/demo/form-wizards-validation.demo.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="assets/plugins/ckeditor/ckeditor.js"></script>
	<script src="assets/plugins/bootstrap-wysihtml5/dist/bootstrap3-wysihtml5.all.min.js"></script>
	<script src="assets/js/demo/form-wysiwyg.demo.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	<script>
		$(document).ready(function() {
			App.init();
			FormWizardValidation.init();
		});
	</script>
</body>
</html>
