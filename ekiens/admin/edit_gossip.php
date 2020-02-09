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
	$title=$_POST['title'];
	$descn=$_POST['descn'];
	$news=$_POST['news'];
    $tag=$_POST['tag'];
    $year=$_POST['year'];
    $month=$_POST['month'];
    $date=$_POST['date'];
    $author_name=$_POST['author_name'];
	$author_email=$_POST['author_email'];

	$title=mysqli_real_escape_string($con, $_POST['title']);
$descn=mysqli_real_escape_string($con, $_POST['descn']);
$news=mysqli_real_escape_string($con, $_POST['news']);
$tag=mysqli_real_escape_string($con, $_POST['tag']);
$year=mysqli_real_escape_string($con, $_POST['year']);
$month=mysqli_real_escape_string($con, $_POST['month']);
$date=mysqli_real_escape_string($con, $_POST['date']);
$author_name=mysqli_real_escape_string($con, $_POST['author_name']);
$author_email=mysqli_real_escape_string($con, $_POST['author_email']);

	$bl=$_FILES['image']['name'];
	$image="image/".$bl;

	if(move_uploaded_file($_FILES['image']['tmp_name'],$image))
	
	{
    $q=mysqli_query($con,"update gossips set title='$title',descn='$descn',news='$news',tag='$tag',year='$year',month='$month',date='$date',author_name='$author_name',author_email='$author_email',image='$image' where id='$id'");
	}
	else
	{
		$q=mysqli_query($con,"update gossips set title='$title',descn='$descn',news='$news',tag='$tag',year='$year',month='$month',date='$date',author_name='$author_name',author_email='$author_email',image='$image' where id='$id'");
	}

	if($q)
	{
	   echo "<script>
    window.location = 'gossips.php';
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
	<title>Ekiensnews Admin | Edit Gossips</title>
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
				<li class="breadcrumb-item active">Edit Gossips</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Edit Gossips <small></small></h1>
			<!-- end page-header -->
			
            <!-- begin wizard-form -->
            <?php
            $query=mysqli_query($con,"select * from gossips where id='$id'");
            $row=mysqli_fetch_array($query);
            ?>
			<form action="" method="post" name="form-wizard" class="form-control-with-bg" enctype="multipart/form-data">
				<!-- begin wizard -->
				<div id="wizard">
					<!-- begin wizard-step -->
					<ul>
						<li class="col-md-3 col-sm-4 col-6">
							<a href="#step-1">
								<span class="number">1</span> 
								<span class="info text-ellipsis">
									News Details
									<small class="text-ellipsis">Title, Short Description</small>
								</span>
							</a>
						</li>
						<li class="col-md-3 col-sm-4 col-6">
							<a href="#step-2">
								<span class="number">2</span> 
								<span class="info text-ellipsis">
									News Attribute
									<small class="text-ellipsis">Tag, Date</small>
								</span>
							</a>
						</li>
						<li class="col-md-3 col-sm-4 col-6">
							<a href="#step-3">
								<span class="number">3</span>
								<span class="info text-ellipsis">
									Author's Info
									<small class="text-ellipsis"> Name, Email Address & Image </small>
								</span>
							</a>
						</li>
						<li class="col-md-3 col-sm-4 col-6">
							<a href="#step-4">
								<span class="number">4</span> 
								<span class="info text-ellipsis">
									Completed
									<small class="text-ellipsis">News Edited Successfully</small>
								</span>
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
										<legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse"> Details About The News</legend>
										<!-- begin form-group -->
										<div class="form-group row m-b-10">
											<label class="col-md-3 col-form-label text-md-right">News Title <span class="text-danger">*</span></label>
											<div class="col-md-6">
											<textarea name="title" value="" data-parsley-group="step-1" data-parsley-required="true" class="form-control">
												<?php echo $row['title'] ?>
												</textarea>
											</div>
										</div>
										<!-- end form-group -->
										<!-- begin form-group -->
										<div class="form-group row m-b-10">
											<label class="col-md-3 col-form-label text-md-right">Description <span class="text-danger">*</span></label>
											<div class="col-md-6">
											<textarea name="descn" value="" data-parsley-group="step-1" data-parsley-required="true" class="form-control">
												<?php echo $row['descn'] ?>
												</textarea>
											</div>
										</div>
									</div>
									<!-- end col-8 -->
								</div>
								<div class="panel panel-inverse">
									<div class="panel-heading">
										<div class="panel-heading-btn">
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
										</div>
										<h4 class="panel-title">Main News</h4>
									</div>
									<div class="panel-body panel-form">
								<textarea class="ckeditor" id="editor1"  name="news" rows="20"> <?php echo $row['news'] ?> </textarea>
									</div>
								</div>
								<!-- end row -->
							</fieldset>
							
							<!-- end fieldset -->
						</div>
						<!-- end step-1 -->
						<!-- begin step-2 -->
						<div id="step-2">
							<!-- begin fieldset -->
							<fieldset>
								<!-- begin row -->
								<div class="row">
									<!-- begin col-8 -->
									<div class="col-md-8 md-offset-2">
										<legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">The News Attribute</legend>
										<!-- begin form-group -->
										<!-- end form-group -->
										<!-- begin form-group -->
										<div class="form-group row m-b-10">
											<label class="col-md-3 col-form-label text-md-right">Tag <span class="text-danger">*</span></label>
											<div class="col-md-6">
												<input type="text" name="tag" value="<?php echo $row['tag'] ?>" class="form-control" data-parsley-group="step-2" data-parsley-required="true" />
											</div>
                                        </div>
                                        <div class="form-group row m-b-10">
											<label class="col-md-3 text-md-right col-form-label">Date</label>
											<div class="col-md-6">
												<div class="row row-space-6">
													<div class="col-4">
														<input type="text" name="year" value="<?php echo $row['year'] ?>" class="form-control">
													</div>
													<div class="col-4">
														<select class="form-control" name="month">
															<option value="<?php echo $row['month'] ?>"><?php echo $row['month'] ?></option>
															<option value="January">January</option>
															<option value="Febuary">Febuary</option>
															<option value="March">March</option>
															<option value="April">April</option>
															<option value="May">May</option>
															<option value="June">June</option>
															<option value="July">July</option>
															<option value="August">August</option>
															<option value="September">September</option>
															<option value="October">October</option>
															<option value="November">November</option>
															<option value="December">December</option>
														</select>
													</div>
													<div class="col-4">
														<select class="form-control" name="date">
															<option value="<?php echo $row['date'] ?>">
															<?php echo $row['date'] ?>
															</option>
															<option value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
															<option value="4">4</option>
															<option value="5">5</option>
															<option value="6">6</option>
															<option value="7">7</option>
															<option value="8">8</option>
															<option value="9">9</option>
															<option value="10">10</option>
															<option value="11">11</option>
															<option value="12">12</option>
															<option value="13">13</option>
															<option value="14">14</option>
															<option value="15">15</option>
															<option value="16">16</option>
															<option value="17">17</option>
															<option value="18">18</option>
															<option value="19">19</option>
															<option value="20">20</option>
															<option value="21">21</option>
															<option value="22">22</option>
															<option value="23">23</option>
															<option value="24">24</option>
															<option value="25">25</option>
															<option value="26">26</option>
															<option value="27">27</option>
															<option value="28">28</option>
															<option value="29">29</option>
															<option value="30">30</option>
															<option value="31">31</option>
														</select>
													</div>
												</div>
											</div>
										</div>
										<!-- end form-group -->
									</div>
									<!-- end col-8 -->
								</div>
								<!-- end row -->
							</fieldset>
							<!-- end fieldset -->
						</div>
						<!-- end step-2 -->
						<!-- begin step-3 -->
						<div id="step-3">
							<!-- begin fieldset -->
							<fieldset>
								<!-- begin row -->
								<div class="row">
									<!-- begin col-8 -->
									<div class="col-md-8 offset-md-2">
										<legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">Author's Name and Email</legend>
										<!-- begin form-group -->
										<div class="form-group row m-b-10">
											<label class="col-md-3 col-form-label text-md-right">Name <span class="text-danger">*</span></label>
											<div class="col-md-6">
												<input type="text" name="author_name" value="<?php echo $row['author_name'] ?>" class="form-control" data-parsley-group="step-3" data-parsley-required="true"/>
											</div>
										</div>
										<!-- end form-group -->
										<!-- begin form-group -->
										<div class="form-group row m-b-10">
											<label class="col-md-3 col-form-label text-md-right">Email Address <span class="text-danger">*</span></label>
											<div class="col-md-6">
												<input type="email" name="author_email" value="<?php echo $row['author_email'] ?>" class="form-control" data-parsley-group="step-3" data-parsley-required="true" />
											</div>
                                        </div>
                                        <div class="form-group row m-b-10">
											<label class="col-md-3 col-form-label text-md-right">Image <span class="text-danger">*</span></label>
											<div class="col-md-6">
												<input type="file" name="image" data-parsley-group="step-3" data-parsley-required="true" class="form-control" />
											</div>
										</div>
										<img src="<?php echo $row['image'] ?>" class="img-thumbnail" width="100"/>
									</div>
									<!-- end col-8 -->
								</div>
								<!-- end row -->
							</fieldset>
							<!-- end fieldset -->
						</div>
						<!-- end step-3 -->
						<!-- begin step-4 -->
						<div id="step-4">
							<div class="jumbotron m-b-0 text-center">
								<h2 class="text-inverse">Created Successfully</h2>
								<p class="m-b-30 f-s-16">Your News as been Updated successfuly.<br/> Click on the PUBLISH to make it available</p>
								<button type="submit" name="update" class="btn btn-primary btn-lg">UPDATE</button>
							</div>
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

