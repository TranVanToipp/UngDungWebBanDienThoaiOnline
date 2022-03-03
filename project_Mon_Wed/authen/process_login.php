<?php
ob_start();
session_start();
$msg = '';
if(!empty($_POST)){
    $TenDN = getPost('TenDN');
    $MatKhau = getPost('MatKhau'); 
    // $_SESSION['fullname'] = $fullname;
    // Check email có đúng với thông tin đã đăng kí không
    $sql1 = "SELECT * FROM tbltaikhoan WHERE TenDN='$TenDN' or Email='$TenDN' and MatKhau='".md5($MatKhau)."'";
    $userExist = executeResult($sql1,true);
    if($userExist == null) {
        $msg = 'Đăng nhập không thành công,vui lòng kiểm tra lại thông tin';
    }else{
		if($userExist['LoaiTaiKhoan']== "Admin"){
        $_SESSION['TenDN'] = $TenDN;
		$_SESSION['user'] = $TenDN;
		$_SESSION['LTK']=$userExist['LoaiTaiKhoan'];
        header('Location:../../../project_Mon_Wed/admin');
		}
		else{
			$_SESSION['TenDN'] = $TenDN;
			$sql = "SELECT * FROM tblkhachhang WHERE TenDN = '$TenDN' OR EmailKH ='$TenDN'";
			$data = executeResult($sql,true);
			$_SESSION['user'] = $data['TenKH'];
			$_SESSION['LTK']=$userExist['LoaiTaiKhoan'];
			header('Location:../../');
		}
    }
}
?>