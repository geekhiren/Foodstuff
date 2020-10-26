<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
include('vendor/phpmailer/class.phpmailer.php');
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

include('database/dbconfig.php');
$email = $_POST["email"];

$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    $reset_token = time() . md5($email);

    $sql = "UPDATE users SET reset_token='$reset_token' WHERE email='$email'";
    mysqli_query($con, $sql);

    $message = "<h3>Please click the link below to reset your password</h3>";
    $message .= "<a href='http://localhost/foodstuff/reset-password.php?email=$email&reset_token=$reset_token'>";
    $message .= "<h1><b>Reset password</b><h1/>";
    $message .= "</a>";

    send_mail($email, "Reset password", $message);
} else {
    echo "<script> alert('Email does not exists !!!!');</script>";
    echo "<script> window.location='forgotpass.php';</script>";
}

function send_mail($to, $subject, $message)
{
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'hyranpatel@gmail.com';                     // SMTP username
        $mail->Password   = 'hyran@143';                               // SMTP password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        $mail->setFrom('hyranpatel@gmail.com', 'Foodstuff Restaurants');
        //Recipients
        $mail->addAddress($to);

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
        echo "<script> alert('Message has been sent !!!!');</script>";
        echo "<script> window.location='login.php';</script>";
    } catch (Exception $e) {
        echo "<script> alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo} !!!!');</script>";
        echo "<script> window.location='forgotpass.php';</script>";
    }
}
?>