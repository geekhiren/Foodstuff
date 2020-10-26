<?php
include('conn.php');
session_start();
if(!isset($_SESSION["loggedina"]) || $_SESSION["loggedina"] !== true){
    header("location: ../login.php");
    exit;
}
?>