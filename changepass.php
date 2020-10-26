<?php

include('database/dbconfig.php');
include('database/security.php');
include('includes/header.php');
include('includes/navbar.php');


if (isset($_POST['submit'])) {
	$oldpass = md5($_POST['opwd']);
	$newpassword = md5($_POST['npwd']);
	$confirepass = md5($_POST['cpwd']);
	$id = $_SESSION['id'];

	if ($newpassword === $confirepass) {
		$sql = mysqli_query($con, "SELECT * FROM users where password='$oldpass' AND id='$id'");
		$num = mysqli_fetch_array($sql);
		if ($num > $id) {
			$con = mysqli_query($con, "update users set password='$newpassword' where id='$id'");
			echo "<script> alert('Password Changed Successfully !!');</script>";
			echo "<script> window.location='index.php';</script>";
		} else {
			echo "<script> alert('Old Password not match !!');</script>";
			echo "<script> window.location='changepass.php';</script>";
		}
	} else {
		echo "<script> alert('Password and Confirm Password Does Not Match !!');</script>";
		echo "<script>window.location='changepass.php';</script>";
	}
}
?>


<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
	<div class="container">

		<ol>
			<li><a href="index.php">Home</a></li>
			<li>Change Password</li>
		</ol>
		<h2>Change Password</h2>

	</div>
</section><!-- End Breadcrumbs -->

<section class="px-4 mt-0">
	<div class="container-fluid h-100 ">
		<div class="row justify-content-center align-items-center h-100">
			<div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
				<form action="" method="POST">
					<div class="logo mr-auto">
						<h1 class="h2 mb-3 font-weight-normal text-dark text-center">Change Password</h1>      
					</div>
					
					<div class="form-group">
						<input type="password" name="opwd" class="form-control " placeholder="Old Password" required>
					</div>
					<div class="form-group">
						<input type="password" name="npwd" class="form-control " placeholder="New Password" required>
					</div>
					<div class="form-group">
						<input type="password" name="cpwd" class="form-control " placeholder="Confirm Password" required>
					</div>
					<div class="form-group">
						<input class="btn btn-lg btn-primary btn-block" name="submit" type="submit" value="Change Password" />
					</div>
					<div class="form-group text-center">
						<a href="index.php">&#8920; Back</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>


<?php
include('includes/footer.php');
include('includes/scripts.php');
?>