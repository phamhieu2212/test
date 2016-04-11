<?php
ob_start();
session_start();
if($_SESSION['user'] == 'admin' && $_SESSION['pass'] == 'admin'){
	
	$userid = $_GET['userid'];
	include_once('__autoload.php');
	$User = new user();
	$User->del($userid);
}
header('location:index.php');
?>