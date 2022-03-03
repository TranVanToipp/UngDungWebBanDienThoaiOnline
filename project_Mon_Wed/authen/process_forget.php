<?php
ob_start();
session_start();
$msg = '';
function KT_TK($N){
	$sql="SELECT * FROM tbltaikhoan WHERE TenDN='$N' OR Email='$N' ";
	$ex=executeResult($sql,true);
	if($ex!='')
		return true;
	else
		return false;
}
function Pws($length = 7){
	$s='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$sLength= strlen($s);
	$randomPws='';
	for($i=0;$i<$length;$i++){
		$randomPws.=$s[rand(0,$sLength-1)];
	}
	return $randomPws;
}
function layEmail($e){
	$sql="SELECT * FROM tbltaikhoan where TenDN='$e' OR Email='$e'";
	$DN_user=executeResult($sql,true);
	$Email=$DN_user['Email'];
	return $Email;
}
function SendMail($e,$pw){
	$subject='Mật Khẩu Mới';
	$message='Xin chào, đây là mật khẩu mới cho tài khoản của bạn.'."\n".'Mật Khẩu của bạn là: '.$pw;
	$header='From: shopmobile.0403@gmail.com.vn';
	if(mail($e,$subject,$message,$header)==true)
		return true;
	else
		return false;
}
if(!empty($_POST)){
	$nhap=getPost('TenDN');
	if(KT_TK($nhap)==true){
		$pws=Pws();
		$Email=layEmail($nhap);
		if(SendMail($Email,$pws)==true){
		$sql="UPDATE tbltaikhoan SET MatKhau=md5('$pws') WHERE TenDN='$nhap' OR Email='$nhap'";
		$ex=execute($sql);
		$msg='Chúng Tôi Đã Gửi Một Thư đến Email Của Bạn.'."\n".'Vui Lòng Kiểm Tra Mail Để Có Mật Khẩu Mới';
		}
	}
	else
		$msg='Tên Đăng Nhập Hoặc Email Không Chính Xác';
}
?>