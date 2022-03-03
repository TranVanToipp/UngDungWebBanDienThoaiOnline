<?php
	include_once '../database/dbhelper.php';
    include_once '../utils/ulitity.php';
	function soluong($s,$ma){
		$sql3="SELECT * FROM tblsanpham WHERE MaSP = '$ma'";
		$ex1=executeResult($sql3,true);
		$soluongSP= $ex1['SoLuongSP'] - $s;
		$sql4="UPDATE tblsanpham SET SoLuongSP='$soluongSP' WHERE MaSP = '$ma'";
		execute($sql4);
	}
	if(isset($_GET['add_to_cart'])){
		session_start();
		$product_Ma=$_GET['add_to_cart'];
		$user= $_SESSION['TenDN'];
		$sql="SELECT * FROM tblkhachhang WHERE TenDN='$user' OR EmailKH='$user'";
		$ex=executeResult($sql,true);
		$user_Ma=$ex['MaKH'];
		$sl=1;
		$sql1="SELECT * FROM tblgiohang WHERE MaKH='$user_Ma' AND MaSP='$product_Ma'";
		$data=executeResult($sql1,true);
		if($data!=""){
			$upSL = $data['SoLuonghang']+$sl;
			$sql2="UPDATE tblgiohang SET SoLuonghang='$upSL' WHERE MaKH='$user_Ma' AND MaSP='$product_Ma'";
			execute($sql2);
			soluong($sl,$product_Ma);
		}
		else{
			$sql2="INSERT INTO tblgiohang(MaKH, MaSP, SoLuonghang) VALUES ('$user_Ma','$product_Ma','$sl')";
			execute($sql2);
			soluong($sl,$product_Ma);
		}
		header('Location:../../project_Mon_Wed/');		
	}
?>