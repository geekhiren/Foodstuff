<?php
	include('../database/conn.php');

	$id = $_GET['id'];

	$query="DELETE FROM `orders` WHERE id=$id";
	$query_run=mysqli_query($conn, $query);
	

	header('location:../order.php');
?>