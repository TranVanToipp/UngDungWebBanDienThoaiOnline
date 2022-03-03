<?php
    include_once '../database/dbhelper.php';
    include_once '../utils/ulitity.php';
	function soluong($s,$ma){
		$sql3="SELECT * FROM tblsanpham WHERE MaSP = '$ma'";
		$ex1=executeResult($sql3,true);
		$soluongSP= $ex1['SoLuongSP'] + $s;
		$sql4="UPDATE tblsanpham SET SoLuongSP='$soluongSP' WHERE MaSP = '$ma'";
		execute($sql4);
	}
    if(isset($_GET['delete_cart'])) {
        session_start();
        $email = $_SESSION['TenDN'];
        $sql = "SELECT * FROM tblkhachhang WHERE TenDN ='$email' OR EmailKH='$email'";
        $data = executeResult($sql,true);
        $user_Ma = $data['MaKH'];
        $product_Ma = $_GET['delete_cart'];
		$sql1="SELECT * FROM tblgiohang WHERE MaSP= '$product_Ma' AND MaKH ='$user_Ma'";
		$data2 = executeResult($sql1,true);
		$sl= $data2['SoLuonghang'];
		soluong($sl,$product_Ma);
        $sql = "DELETE FROM tblgiohang WHERE MaSP='$product_Ma' AND MaKH= '$user_Ma'";
        execute($sql);
        header('Location: ./');
    }
?>