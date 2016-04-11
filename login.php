<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
span.required{
	color:#F00;
	}
</style>
</head>

<body>
<?php
if(isset($_POST['submit'])){
	
	if($_POST['user'] == ''){
		
		$errorUser = '<span class="required">(*)</span>';
	}
	else{
		$user = $_POST['user'];	
	}
	//
	if($_POST['pass'] == ''){
		
		$errorPass = '<span class="required">(*)</span>';
	}
	else{
		$pass = $_POST['pass'];	
	}
	
	if(isset($user) && isset($pass)){
		
		$User = new user();
		$User->setUsername($user);
		$User->setPassword($pass);
		if($User->login() == 'account valid'){
			header('location:index.php');
		}
		else{
			$errorAcc = '<span class="required">Tài khoản không hợp lệ!</span>';
		}
	}
}
?>
<form method="post">
<table align="center" border="1" cellspacing="1" cellpadding="1">
  <tr>
    <td align="center" colspan="2"><?php if(isset($errorAcc)){echo $errorAcc;}else{echo 'Đăng Nhập Hệ Thống';}?></td>
  </tr>
  <tr>
    <td>Tài Khoản</td>
    <td><input type="text" name="user" /> <?php if(isset($errorUser)){echo $errorUser;}?></td>
  </tr>
  <tr>
    <td>Mật Khẩu</td>
    <td><input type="password" name="pass" /> <?php if(isset($errorPass)){echo $errorPass;}?></td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" name="submit" value="Đăng nhập" /> <input type="reset" name="reset" value="Làm mới" /></td>
  </tr>
</table>
</form>

</body>
</html>
