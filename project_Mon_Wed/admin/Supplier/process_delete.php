<?php 
require_once ('../../database/dbhelper.php');
?>
<?php
if (isset($_POST['ID'])) {
	$id = $_POST['ID'];
	$sql = 'delete from tblnhacungcap where ID ='.$id;
	execute($sql);
	echo'Xóa nhà cung cấp thành công';
}
?>