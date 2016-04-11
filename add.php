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
	//
	if($_POST['full'] == ''){
		$errorFull = '<span class="required">(*)</span>';
	}
	else{
		$full = $_POST['full'];
	}
	//
	if($_POST['mail'] == ''){
		$errorMail = '<span class="required">(*)</span>';
	}
	else{
		$mail = $_POST['mail'];
	}
	
	if(isset($user) && isset($pass) && isset($full) && isset($mail)){
		
		$User = new user();
		$User->setUsername($user);
		$User->setPassword($pass);
		$User->setFullname($full);
		$User->setEmail($mail);
		if($User->add($user) == 'user exist'){
			$errorAcc = '<span class="required">(Tài khoản đã tồn tại)</span>';
		}
		else{
			header('location:index.php');	
		}
	}
}

?>
<form method="post">
<table align="center" border="1" cellspacing="1" cellpadding="1">
  <tr>
    <td align="center" colspan="2"><?php if(isset($errorAcc)){echo $errorAcc;}else{echo 'Thêm Mới Thành Viên ';}?></td>
  </tr>
  <tr>
    <td>Fullname</td>
    <td><input type="text" name="full" /> <?php if(isset($errorFull)){echo $errorFull;}?></td>
  </tr>
  <tr>
    <td>Username</td>
    <td><input type="text" name="user" /> <?php if(isset($errorUser)){echo $errorUser;}?></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input type="text" name="pass" /> <?php if(isset($errorPass)){echo $errorPass;}?></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input type="text" name="mail" /> <?php if(isset($errorMail)){echo $errorMail;}?></td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" name="submit" value="Thêm mới" /> <input type="reset" name="reset" value="Làm mới" /></td>
  </tr>
</table>
</form>
