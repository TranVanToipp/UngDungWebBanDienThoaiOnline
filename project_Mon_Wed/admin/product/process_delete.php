<?php 
require_once ('../../database/dbhelper.php');
?>
<?php
if (isset($_POST['ID'])) {
	$id = $_POST['ID'];
	$sql = 'delete from tblsanpham where ID ='.$id;
	execute($sql);
	echo'Xóa Sản Phẩm Thành Công';
}
?>