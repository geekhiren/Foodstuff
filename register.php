<?php
include('database/dbconfig.php');
//include('database/security.php');

if (isset($_POST['register_btn'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password_1 = $_POST['password_1'];
	$password_2 = $_POST['password_2'];

	if ($password_1 === $password_2) {
		$query = "INSERT INTO users (name,email,username,password) VALUES ('$name','$email','$username',MD5('" . $password_1 . "'))";
		$query_run = mysqli_query($con, $query);
		if ($query_run) {

			echo "<script> alert('Successfully Registration !!!!');</script>";
			echo "<script> window.location='index.php';</script>";
			//header('Location:login.php');

		} else {
			echo "<script> alert('Not Successfully Registration !!!!');</script>";
			echo "<script> window.location='register.php';</script>";
			//header('Location:register.php'); 
		}
	} else {
		echo "<script> alert('Password and Confirm Password Does Not Match !!!!');</script>";
		echo "<script>window.location='register.php';</script>";
		//header('Location:register.php');
	}
}

?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="img/fav.ico">
	<title>FoodStuff</title>


	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<!-- Custom styles for this template -->
	<link href="css/login_main.css" rel="stylesheet">
	<style>

	</style>
</head>

<body class="text-center">
	<form class="form-signin" action="register.php" method="POST">
		<img class="mb-4" src="img/logo.jpg" alt="" width="95" height="95">
		<h1 class="h3 mb-3 font-weight-normal">Registration</h1>


		<input type="text" name="name" class="form-control" placeholder="Name" required>
		<input type="email" name="email" class="form-control mt-3" placeholder="Email" required autofocus>
		<input type="text" name="username" class="form-control mb-3" placeholder="Username" required autofocus>
		<input type="password" name="password_1" class="form-control" placeholder="Password" required>
		<input type="password" name="password_2" class="form-control" placeholder="Confirm Password" required>
		<div class="checkbox align-baseline mb-0">
			<label>
				<input type="checkbox" value="remember-me"> Remember me
			</label>
		</div>

		<div class="txt3 mb-3">
			<a href="forgotpass.php">
				Forgot Password?
			</a>
		</div>

		<input class="btn btn-lg btn-primary btn-block" name="register_btn" type="submit" value="Sign up" />
		<div class="text-center p-t-100 mt-2">
			<span class="txt1">
				Do u have an account?
			</span>

			<a class="txt2" href="login.php">
				Sign in
			</a>
		</div>
		<p class="mt-5 mb-3 text-muted">&copy; <a href="index.php"> FoodStuff </a> 2019-2020.</p>
	</form>
</body>

</html>