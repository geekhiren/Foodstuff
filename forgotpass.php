<?php
include('database/dbconfig.php');
//include('database/security.php');
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
	<form class="form-signin" action="send-recovery-mail.php" method="POST">
		<img class="mb-4" src="img/logo.jpg" alt="" width="95" height="95">
		<h1 class="h3 mb-3 font-weight-normal">Forgot Password</h1>


		<input type="email" name="email" class="form-control mb-3" placeholder="Email" required autofocus>


		<input class="btn btn-lg btn-primary btn-block" type="submit" value="Forgot Password" />
		<div class="text-center p-t-100 mt-2">
			<span class="txt1">
				Don’t have an account?
			</span>

			<a class="txt2" href="register.php">
				Sign Up
			</a>
			<a class="txt2" href="login.php">
				Sign In
			</a>
		</div>




		<p class="mt-5 mb-3 text-muted">&copy; <a href="index.php"> FoodStuff </a> 2019-2020.</p>
	</form>
</body>

</html>