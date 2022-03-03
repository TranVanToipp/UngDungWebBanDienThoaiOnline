<?php 
require_once ('../../database/dbhelper.php');
?>
<?php
if (isset($_POST['ID'])) {
	$id = $_POST['ID'];
	$sql = 'delete from tblhoadon where ID ='.$id;
	execute($sql);
	echo'Xóa Hóa Đơn Thành Công';
}
?>