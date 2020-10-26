<?php
include('database/dbconfig.php');
$email = $_POST["email"];
$reset_token = $_POST["reset_token"];
$new_password = md5($_POST["new_password"]);



$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_object($result);
    if ($user->reset_token == $reset_token) {
        $sql = "UPDATE users SET reset_token='', password='$new_password' WHERE email='$email'";
        mysqli_query($con, $sql);
        echo "<script> alert('Password has been changed !!!!');</script>";
        echo "<script> window.location='login.php';</script>";
    } else {
        echo "<script> alert('Recovery email has been expired !!!!');</script>";
        echo "<script> window.location='forgotpass.php';</script>";
    }
} else {
    echo "Email does not exists";
}
