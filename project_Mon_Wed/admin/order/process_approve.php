<?php 
require_once ('../../database/dbhelper.php');
?>
<?php
if (isset($_POST['ID'])) {
	$id = $_POST['ID'];
	$tt="Thành Công";
	$h="Đơn Đã Hủy";
	if(layTT($id)!=$tt && layTT($id)!=$h){
	$sql = "UPDATE tblhoadon SET TrangThaiXuat='$tt' where ID =".$id;
	execute($sql);
	echo'Hóa Đơn Đã Được Phê Duyệt';
	}
	else
		echo 'Vui Lòng Xem Lại Trạng Thái Hóa Đơn';
}
function layTT($id){
	$sql="SELECT * FROM tblhoadon WHERE ID='$id'";
	$TT=executeResult($sql,true);
	return $TT['TrangThaiXuat'];
}
?>