<?php
ob_start();
session_start();
$msg = '';
function randomMa($length = 7)
{
	$s='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$sLength= strlen($s);
	$randomMXN='';
	for($i=0;$i<$length;$i++){
		$randomMXN.=$s[rand(0,$sLength-1)];
	}
	return $randomMXN;
}
function layMaKH(){
	$sql="SELECT * FROM tblkhachhang";
	$Ma_user=executeResult($sql);
	$makH="";
	while($makH==""){
		$makH="KH_".randomMa();
		foreach($Ma_user as $row){
		if($row['MaKH']==$makH)
			$makH="";
		}
	}
	return $makH;
}
function layTenDN($DN){
	$sql="SELECT * FROM tbltaikhoan where TenDN='$DN'";
	$DN_user=executeResult($sql,true);
	return $DN_user;
}
function layEmail($e){
	$sql="SELECT * FROM tbltaikhoan where Email ='$e'";
	$DN_user=executeResult($sql,true);
	return $DN_user;
}
function maxacnhan($length = 7)//hàm random.
{
	$s='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$sLength= strlen($s);
	$randomMXN='';
	for($i=0;$i<$length;$i++){
		$randomMXN.=$s[rand(0,$sLength-1)];
	}
	return $randomMXN;
}
if(!empty($_POST)){
$maxacnhan1=maxacnhan();
$fullName=getPost('fullname');
$Email=getPost('email');
$tenDN=getPost('TenDN');
$pws=getPost('MatKhau');
$rpws=getPost('confirmation_pwd');
$ltk="Khách Hàng";
$maKH=layMaKH();
if(layTenDN($tenDN)== null){
	if(layEmail($Email)==null){
		if($pws==$rpws){
			$_SESSION['tDN']=$tenDN;
			$_SESSION['Mail']=$Email;
			$_SESSION['fName']=$fullName;
			$_SESSION['pas']=$pws;
			$_SESSION['loai']=$ltk;
			$_SESSION['MKH']=$maKH;
			$subject='Mã Xác Nhận';//tiêu đề
			$message='Xin chào, bạn vừa đăng kí vào web ShopMobile của chúng tôi, vui lòng nhập Mã Xác Nhận của Bạn để hoàn tất quá trình đăng kí.'."\n".'Mã của bạn là:'.$maxacnhan1;
			$header='From: shopmobile.0403@gmail.com.vn';
			if(mail($Email,$subject,$message,$header)==true){
				$sql1="INSERT INTO tblmaxacnhan(TenDN, email, maxacnhan) VALUES ('$tenDN','$Email','$maxacnhan1')";
				execute($sql1);
				header('Location:../maxacnhan.php');
			}
		}
		else
			$msg = 'Mật Khẩu Không Khớp, vui lòng kiểm tra lại thông tin';
	}
	else
		$msg = 'Email này đã được đăng ký, vui lòng kiểm tra lại thông tin';
}
else
	$msg = 'Tên Đăng Nhập Đã Tồn Tại, vui lòng kiểm tra lại thông tin';
}
?>