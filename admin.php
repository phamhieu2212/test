<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
span.required{
	color:#F00;
	}
span#add-user{
	float:right;
	}
span#user-acc{
	color:#F00;
	font-weight:bold;
	}	
</style>
</head>

<body>

<p align="center">Xin chào <span id="user-acc"><?php if(isset($_SESSION['user'])){echo $_SESSION['user'];}?></span> đã đăng nhập hệ thống - <a href="logout.php">Logout</a></p>
<?php
if(isset($_GET['page_layout'])){
	
	switch($_GET['page_layout']){
		case 'add': include_once('add.php');
		break;
		
		case 'edit': include_once('edit.php');
		break;
	}
}
else{
	include_once('list.php');	
}
?>


</body>
</html>
