<?php
	require_once ('../../database/dbhelper.php');
?>
<?php
if (isset($_POST['ID'])){
	$id = $_POST['ID'];
	$tt="Đơn Đã Hủy";
	$tc="Thành Công";
	if(layTT($id)!=$tt && layTT($id)!=$tc){
		$sql1="SELECT * FROM tblhoadon WHERE ID =".$id;
		$data=executeResult($sql1,true);
		$sl= $data['SoLuongXuat'];
		$ma = $data['MaSP'];
		soluong($sl,$ma);
		$sql = "UPDATE tblhoadon SET TrangThaiXuat='$tt' where ID =".$id;
		execute($sql);
		echo'Hóa Đơn Đã Được Hủy';
	}
	else
		echo 'Vui Lòng Xem Lại Trạng Thái Hóa Đơn';
}
function layTT($id){
	$sql="SELECT * FROM tblhoadon WHERE ID='$id'";
	$TT=executeResult($sql,true);
	return $TT['TrangThaiXuat'];
}
function soluong($s,$ma){
		$sql3="SELECT * FROM tblsanpham WHERE MaSP = '$ma'";
		$ex1=executeResult($sql3,true);
		$soluongSP= $ex1['SoLuongSP'] + $s;
		$sql4="UPDATE tblsanpham SET SoLuongSP='$soluongSP' WHERE MaSP = '$ma'";
		execute($sql4);
	}
?>