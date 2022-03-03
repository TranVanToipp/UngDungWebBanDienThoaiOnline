<?php
ob_start();
session_start();
$msg = '';
function layPWS($tDN,$pas){
	$sql="SELECT * FROM tbltaikhoan WHERE TenDN='$tDN'";
	$ex=executeResult($sql,true);
	if($ex['MatKhau']==md5($pas))
		return true;
	else
		return false;
}
if(isset($_SESSION['TenDN'])){
	if(!empty($_POST)){
		$pw = getPost('pws');
		$npws = getPost('newpws');
		$rnpws = getPost('rnewpws');
		$tendn = $_SESSION['TenDN'];
		if(layPWS($tendn,$pw)==true){
			if($npws==$rnpws){
				$sql="UPDATE tbltaikhoan SET MatKhau=md5('$npws') WHERE TenDN ='$tendn'";
				$ex=execute($sql);
				header("Location:../login");
			}
			else
				$msg='Mật Khẩu Mới Không Khớp, Vui Lòng Kiểm Tra Lại.';
		}
		else
			$msg='Mật Khẩu Cũ Không Đúng';
	}
}
else
	$msg='vui lòng đăng nhập';
?>