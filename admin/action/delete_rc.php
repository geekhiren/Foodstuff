<?php
	include('../database/conn.php');

	$id = $_GET['id'];

	$query="DELETE FROM `contactus` WHERE id=$id";
	$query_run=mysqli_query($conn, $query);
	

	header('location:../contact_fetch.php');
?>