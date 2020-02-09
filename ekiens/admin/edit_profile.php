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
	$designation=$_POST['designation'];
	$phone=$_POST['phone'];
	$fullname=$_POST['fullname'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$dob=$_POST['dob'];
	$gender=$_POST['gender'];
	$country=$_POST['country'];
	$state=$_POST['state'];
	$city=$_POST['city'];
	$language=$_POST['language'];
	$bl=$_FILES['image']['name'];
	$image="image/".$bl;

	if(move_uploaded_file($_FILES['image']['tmp_name'],$image))
	{
	$q=mysqli_query($con,"update admin set designation='$designation',phone='$phone',fullname='$fullname',email='$email',password='$password',dob='$dob',gender='$gender',country='$country',state='$state',city='$city',language='$language',image='$image' where id='$id'");
	}
	else
	{
		$q=mysqli_query($con,"update admin set designation='$designation',phone='$phone',fullname='$fullname',email='$email',password='$password',dob='$dob',gender='$gender',country='$country',state='$state',city='$city',language='$language',image='$image' where id='$id'");
	}

	if($q)
	{
	   echo "<script>
    window.location = 'profile.php';
</script>";
  exit;
   }
	else
	{
		echo "<div class='help-block'>Unsuccessfull</div>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Ekiensnews Admin | Edit Profile Page</title>
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
	
	<!-- ================== BEGIN PAGE CSS STYLE ================== -->
	<link href="assets/plugins/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />
	<link href="assets/plugins/bootstrap3-editable/inputs-ext/address/address.css" rel="stylesheet" />
	<link href="assets/plugins/bootstrap3-editable/inputs-ext/typeaheadjs/lib/typeahead.css" rel="stylesheet" />
	<link href="assets/plugins/bootstrap3-editable/inputs-ext/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
	<link href="assets/plugins/bootstrap3-editable/inputs-ext/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" />
	<link href="assets/plugins/bootstrap3-editable/inputs-ext/bootstrap-datetimepicker/css/datetimepicker.css" rel="stylesheet" />
	<link href="assets/plugins/bootstrap3-editable/inputs-ext/select2/select2.css" rel="stylesheet" />
	<link href="assets/plugins/bootstrap3-editable/inputs-ext/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css" rel="stylesheet" />
	<!-- ================== END PAGE CSS STYLE ================== -->
	
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
		<?php include "sidebar.php"; ?>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item"><a href="index.php">Home</a></li>
				<li class="breadcrumb-item active">Edit Profile</li>
			</ol>
			<h1 class="page-header">Edit Profile Details<small></small></h1>
			<!-- end page-header -->
			
            <!-- begin row -->
           <?php
          	$adminquery=mysqli_query($con,"select * from admin where id='$id'");
          	$row=mysqli_fetch_array($adminquery);

          	?>
            <form role="form" action="" method="post" enctype="multipart/form-data">
			<div class="row">
				<!-- begin col-8 -->
				<div class="col-lg-12">
					<!-- begin panel -->
					<div class="panel panel-inverse">
						<div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
							<h4 class="panel-title">Edit Profile</h4>
						</div>
						<!-- begin table-responsive -->
						<div class="table-responsive">
							<table id="user" class="table table-condensed table-bordered">
								<thead>
									<tr>
										<th width="20%">Current Details</th>
										<th>Edit Details</th>
										<th>Description</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="bg-silver-lighter"><?php echo $row['designation']; ?></td>
										<td><input type="text" value="<?php echo $row['designation']; ?>" name="designation" class="form-control" id="exampleInputEmail1" ></td>
										<td><span class="text-black-lighter">Designation </span></td>
									</tr>
									<tr>
										<td class="bg-silver-lighter"><?php echo $row['phone']; ?></td>
										<td><input type="text" value="<?php echo $row['phone']; ?>" name="phone" class="form-control" id="exampleInputEmail1" ></td>
										<td><span class="text-black-lighter">Phone Number </span></td>
									</tr>
									<tr>
                                    <td class="bg-silver-lighter"><?php echo $row['fullname']; ?></td>
										<td><input type="text" value="<?php echo $row['fullname']; ?>" name="fullname" class="form-control" id="exampleInputEmail1" ></td>
										<td><span class="text-black-lighter">Fullname</span></td>
									</tr>
									<tr>
                                    <td class="bg-silver-lighter"><?php echo $row['email']; ?></td>
										<td><input type="text" value="<?php echo $row['email']; ?>" name="email" class="form-control" id="exampleInputEmail1" ></td>
										<td><span class="text-black-lighter">Email Address </span></td>
									</tr>
									<tr>
									<td class="bg-silver-lighter"><?php echo $row['password']; ?></td>
										<td><input type="text" value="<?php echo $row['password']; ?>" name="password" class="form-control" id="exampleInputEmail1" ></td>
										<td><span class="text-black-lighter">Password </span></td>
                                    </tr>
                                    
									<tr>
									<td class="bg-silver-lighter"><?php echo $row['dob']; ?></td>
										<td><input type="date" value="<?php echo $row['dob']; ?>" name="dob" class="form-control" id="exampleInputEmail1" ></td>
										<td><span class="text-black-lighter">Date Of Birth </span></td>
									</tr>
									<tr>
									<td class="bg-silver-lighter"><?php echo $row['gender']; ?></td>
									<td><select name="gender" class="form-control" id="exampleInputEmail1" >
									 <option value="<?php echo $row['gender']; ?>">SELECT</option>
									 <option value="Male">Male</option>
									 <option value="Female">Female</option>
									 </select>
									</td>
										<td><span class="text-black-lighter">Gender </span></td>
									</tr>
									<tr>
									<td class="bg-silver-lighter"><?php echo $row['country']; ?></td>
										<td><input type="text" value="<?php echo $row['country']; ?>" name="country" class="form-control" id="exampleInputEmail1" ></td>
										<td><span class="text-black-lighter">Country </span></td>
									</tr>
									<tr>
									<td class="bg-silver-lighter"><?php echo $row['state']; ?></td>
										<td><input type="text" value="<?php echo $row['state']; ?>" name="state" class="form-control" id="exampleInputEmail1" ></td>
										<td><span class="text-black-lighter">State </span></td>
									</tr>
									<tr>
									<td class="bg-silver-lighter"><?php echo $row['city']; ?></td>
										<td><input type="text" value="<?php echo $row['city']; ?>" name="city" class="form-control" id="exampleInputEmail1" ></td>
										<td><span class="text-black-lighter">City </span></td>
									</tr>
									<tr>
									<td class="bg-silver-lighter"><?php echo $row['language']; ?></td>
										<td><input type="text" value="<?php echo $row['language']; ?>" name="language" class="form-control" id="exampleInputEmail1" ></td>
										<td><span class="text-black-lighter">Language </span></td>
									</tr>
									<tr>
									<td class="bg-silver-lighter"><span class="userimage"><img  width="90px" height="83px" src="<?php echo $row['image']; ?>" alt="" /></span></td>
										<td><input type="file" name="image" class="form-control" id="exampleInputEmail1" ></td>
										<td><span class="text-black-lighter">Profile Picture </span></td>
									</tr>
									<tr>
										<td>  <button name="update" type="submit" class="btn btn-sm btn-primary m-r-5">Update</button></td>
										
									</tr>
									<tr>
								</tbody>
							</table>
						</div>
						<!-- end table-responsive -->
					</div>
					<!-- end panel -->
				</div>
            </div>
</form>
			<!-- end row -->
		</div>
		<?php include "panel_settings.php"; ?>
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/plugins/jquery/jquery-3.2.1.min.js"></script>
	<script src="assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
	<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
	<script src="assets/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/plugins/js-cookie/js.cookie.js"></script>
	<script src="assets/js/theme/apple.min.js"></script>
	<script src="assets/js/apps.min.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="assets/plugins/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
	<script src="assets/plugins/bootstrap3-editable/inputs-ext/address/address.js"></script>
	<script src="assets/plugins/bootstrap3-editable/inputs-ext/typeaheadjs/lib/typeahead.js"></script>
	<script src="assets/plugins/bootstrap3-editable/inputs-ext/typeaheadjs/typeaheadjs.js"></script>
	<script src="assets/plugins/bootstrap3-editable/inputs-ext/bootstrap-wysihtml5/wysihtml5.js"></script>
	<script src="assets/plugins/bootstrap3-editable/inputs-ext/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
	<script src="assets/plugins/bootstrap3-editable/inputs-ext/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>
	<script src="assets/plugins/bootstrap3-editable/inputs-ext/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="assets/plugins/bootstrap3-editable/inputs-ext/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
	<script src="assets/plugins/bootstrap3-editable/inputs-ext/select2/select2.min.js"></script>
	<script src="assets/plugins/mockjax/jquery.mockjax.js"></script>
	<script src="assets/plugins/moment/moment.min.js"></script>
	<script src="assets/js/demo/form-editable.demo.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
			FormEditable.init();
		});
	</script>
</body>
</html>
