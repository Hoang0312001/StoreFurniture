<?php 
session_start();
if(isset($_SESSION['currUser']) &&  $_SESSION['id']){
include 'layout/header.php';
include 'layout/sidebar.php';
}else{
	header("Location: login.php");
 }
?>