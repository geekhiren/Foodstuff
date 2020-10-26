<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
	header("location: index.php");
	exit;
}
include('database/dbconfig.php');

if (isset($_POST['login_btn'])) {

	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$query = "SELECT * FROM users WHERE username='$username' AND password='$password' ";
	$query_run = mysqli_query($con, $query);
	$data = mysqli_fetch_array($query_run);

	$id = $data['id'];
	if ($data['user_role'] == 'users') {
		// Store data in session variables
		$_SESSION['loggedin'] = true;
		$_SESSION['id'] = $id;
		$_SESSION['username'] = $username;

		echo "<script> alert('Successfully Login !!!!');</script>";
		echo "<script> window.location='index.php';</script>";
		//header('Location: index.php');
	} elseif ($data['user_role'] == 'admin') {
		// Store data in session variables
		$_SESSION['loggedina'] = true;
		$_SESSION['id'] = $id;
		$_SESSION['username'] = $username;

		echo "<script> alert('Successfully Login Admin Panel !!!!');</script>";
		echo "<script> window.location='admin/index.php';</script>";
		//header('Location: admin/index.php');
	} else {
		echo "<script> alert('Email-Id and Password Wrong !!!!');</script>";
		echo "<script> window.location='login.php';</script>";
		//header('Location: login.php');
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
	<form class="form-signin" action="login.php" method="POST">
		<img class="mb-4" src="img/logo.jpg" alt="" width="95" height="95">
		<h1 class="h3 mb-3 font-weight-normal">Login</h1>

		<input type="text" name="username" class="form-control mb-3" placeholder="Username" required autofocus>

		<input type="password" name="password" class="form-control" placeholder="Password" required>
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

		<input class="btn btn-lg btn-primary btn-block" name="login_btn" type="submit" value="Sign in" />
		<div class="text-center p-t-100 mt-2">
			<span class="txt1">
				Don’t have an account?
			</span>

			<a class="txt2" href="register.php">
				Sign Up
			</a>
		</div>




		<p class="mt-5 mb-3 text-muted">&copy; <a href="index.php"> FoodStuff </a> 2019-2020.</p>
	</form>
</body>

</html>