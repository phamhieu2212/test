<?php
ob_start();
session_start();
if($_SESSION['user'] == 'admin' && $_SESSION['pass'] == 'admin'){
	
	session_destroy();
}
header('location:index.php');
?>