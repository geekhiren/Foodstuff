<?php
include('database/dbconfig.php');
$email = $_GET["email"];
$reset_token = $_GET["reset_token"];

$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_object($result);
    if ($user->reset_token == $reset_token) {
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
            <form class="form-signin" action="new-password.php" method="POST">
                <img class="mb-4" src="img/logo.jpg" alt="" width="95" height="95">
                <h1 class="h3 mb-3 font-weight-normal">New Password</h1>

                <input type="hidden" name="email" value="<?php echo $email; ?>">
                <input type="hidden" name="reset_token" value="<?php echo $reset_token; ?>">

                <input type="password" name="new_password" class="form-control mb-3" placeholder="Enter New password" required autofocus>
                <input type="submit" class="btn btn-lg btn-primary btn-block" value="Change password">

                <p class="mt-5 mb-3 text-muted">&copy; <a href="index.php"> FoodStuff </a> 2019-2020.</p>
            </form>
        </body>

        </html>
<?php
    } else {
        echo "<script> alert('Recovery email has been expired !!!!');</script>";
        echo "<script> window.location='login.php';</script>";
    }
} else {
    
    echo "Email does not exists";
}
