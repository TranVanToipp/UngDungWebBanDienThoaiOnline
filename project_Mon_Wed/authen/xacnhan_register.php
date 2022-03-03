<?php
ob_start();
function KT_MXN($ma,$TDN){
	$sql= "SELECT * FROM tblmaxacnhan WHERE TenDN ='$TDN'";
	$xacnhan_user=executeResult($sql,true);
	if($ma == $xacnhan_user['maxacnhan'])
		return true;
	else
		return false;
}
$msg = '';
if(!empty($_POST)){
	$tendn =$_SESSION['tDN'] ;
	$email = $_SESSION['Mail'];
	$fuName = $_SESSION['fName'];
	$pw = $_SESSION['pas'];
	$lTK = $_SESSION['loai'];
	$makh = $_SESSION['MKH'];
	$maxacnhan= getPost('xacnhan');
	$date=''; $gender=''; $address=''; $sdt='';
	if(KT_MXN($maxacnhan,$tendn)==true){
		$sql="INSERT INTO tbltaikhoan(TenDN, MatKhau, Email, LoaiTaiKhoan) VALUES ('$tendn',md5('$pw'),'$email','$lTK')";
		$sql1="INSERT INTO tblkhachhang(MaKH, TenDN, TenKH, NgaySinh, GioiTinh, DiaChiKH, SDT, EmailKH) 
			VALUES ('$makh','$tendn','$fuName','$date','$gender','$address','$sdt','$email')";
		$sql2="DELETE FROM tblmaxacnhan WHERE TenDN='$tendn'";
		$TK_User=execute($sql);
		$TT_User=execute($sql1);
		$Del_User=execute($sql2);
		header('Location: login');
	}
	else
		$msg='Mã Xác Nhận Không Chính Xác, Vui Lòng Nhập Lại';
	
}
?>