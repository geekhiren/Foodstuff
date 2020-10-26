<?php
include('../database/conn.php');

$id = $_POST['id'];

$query = "SELECT email FROM reservation WHERE id=$id";
$query_run = mysqli_query($conn, $query);

if (mysqli_num_rows($query_run) > 0) {
	$row = mysqli_fetch_array($query_run);
	$email = $row['email'];

	header('Refresh:0');
} 

$subject = "Regarding The Table Reservation";
$body ='<p>Sorry!</p>';
$body .='<p>Table is empty</p>';

// Enter Your Email Address Here To Receive Email
$email_to = $email;

$email_from = "hyranpatel@gmail.com"; // Enter Sender Email
$sender_name = "Foodstuff Restaurants"; // Enter Sender Name

require("class.phpmailer.php");
$mail = new PHPMailer(true);
$mail->IsSMTP();
$mail->Host = 'smtp.gmail.com;'; // Enter Your Host/Mail Server
$mail->SMTPAuth = true;
$mail->Username = "hyranpatel@gmail.com"; // Enter Sender Email
$mail->Password = "hyran@143";

//If SMTP requires TLS encryption then remove comment from below
$mail->SMTPSecure = "tls";
$mail->Port = 587;
$mail->IsHTML(true);

$mail->From = $email_from;
$mail->FromName = $sender_name;
$mail->Sender = $email_from; // indicates ReturnPath header
$mail->AddReplyTo($email_from, "No Reply"); // indicates ReplyTo headers
$mail->Subject = $subject;
$mail->Body = $body;
$mail->AddAddress($email_to);

if (!$mail->Send()){
	echo "Mailer Error: " . $mail->ErrorInfo;
}else{
	echo "Sent Successfully !!";
}
