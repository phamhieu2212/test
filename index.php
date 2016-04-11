<?php
ob_start();
session_start();
include_once('__autoload.php');
if($_SESSION['user'] == 'admin' && $_SESSION['pass'] == 'admin'){
	include_once('admin.php');
}
else{
	include_once('login.php');	
}
?>