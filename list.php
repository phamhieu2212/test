<?php
$Pagination = new pagination();
$Pagination->totalRows('users');
$Pagination->totalPages(2);
$page = $Pagination->page();
$perRow = $Pagination->perRow($page, 2);

$User = new user();
$sql = "SELECT * FROM users ORDER BY userid ASC LIMIT ".$perRow.", 2";
$User->query($sql);

?>
<table align="center" border="1" cellspacing="1" cellpadding="1">
  <tr>
    <td colspan="6">Danh Sách Thành Viên <span id="add-user">Thêm mới <a href="index.php?page_layout=add">(+)</a></span></td>
  </tr>
  <tr>
    <td>ID</td>
    <td>Fullname</td>
    <td>Username</td>
    <td>Email</td>
    <td>Edit</td>
    <td>Delete</td>
  </tr>
<?php
while($row = $User->fetch()){
?>
  <tr>
    <td><?php echo $row['userid'];?></td>
    <td><?php echo $row['fullname'];?></td>
    <td><?php echo $row['username'];?></td>
    <td><?php echo $row['email'];?></td>
    <td><a href="index.php?page_layout=edit&userid=<?php echo $row['userid'];?>">Edit</a></td>
    <td><a href="del.php?userid=<?php echo $row['userid'];?>">Delete</a></td>
  </tr>
<?php
}
?>
</table>

<?php
echo '<p align="center">'.$Pagination->listPages().'<p>';
?>
