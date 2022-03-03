<?php
	$title = 'Thông Tin Khách Hàng';
	$baseUrl = '../';
    include_once ($baseUrl.'FE/layouts-FE/header.php');
    require_once ($baseUrl.'utils/ulitity.php');
    require_once ($baseUrl.'database/dbhelper.php');
?>
<?php
	if(isset($_SESSION['TenDN'])) {
        $email =  $_SESSION['TenDN'];
        $sql = "SELECT * FROM tblkhachhang WHERE TenDN ='$email' OR EmailKH='$email'";
        $data = executeResult($sql,true);
        $user_name = $data['TenKH'];
    }
?>
<?php
function rdMaHD($length = 7){
	$s='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$sLength= strlen($s);
	$randomMXN='';
	for($i=0;$i<$length;$i++){
		$randomMXN.=$s[rand(0,$sLength-1)];
	}
	return $randomMXN;
}
function layMaHD(){
	$sql="SELECT * FROM tblhoadon";
	$HD_Ma=executeResult($sql);
	$mahd="";
	while($mahd==""){
		$mahd="HD_".rdMaHD();
		foreach($HD_Ma as $row){
		if($row['MaHD']==$mahd)
			$mahd="";
		}
	}
	return $mahd;
}
if(!empty($_POST)){
	$date=getPost('ngaysinh');
	$sex=getPost('rdbsex');
	$address=getPost('address');
	$sdt = getPost('SDT');
	$user_Ma=$data['MaKH'];
	$sql1="UPDATE tblkhachhang SET NgaySinh='$date', GioiTinh='$sex',DiaChiKH='$address',SDT='$sdt' WHERE MaKH='$user_Ma'";
	execute($sql1);
	$sql2="SELECT * FROM tblgiohang WHERE MaKH='$user_Ma'";
	$ex=executeResult($sql2);
	foreach($ex as $gh){
		$mahd=layMaHD();
		$id_gh=$gh['ID'];
		$masp=$gh['MaSP'];
		$makh=$gh['MaKH'];
		$sl=$gh['SoLuonghang'];
		$today=date('Y-m-d');
		$tt="Đang Kiểm Duyệt";
		$sql3="SELECT * FROM tblsanpham WHERE MaSP='$masp'";
		$t=executeResult($sql3,true);
		if($t['id_discount']=0){
			$dis_money=$t['GiaDauRa'];
		}
		else
			if($t['id_discount']=1){
				$dis_money=$t['GiaDauRa']-($t['GiaDauRa']*10/100);
			}
		else
			if($t['id_discount']=2){
				$dis_money=$t['GiaDauRa']-($t['GiaDauRa']*20/100);
			}
		else
			if($t['id_discount']=3){
				$dis_money=$t['GiaDauRa']-($t['GiaDauRa']*30/100);
			}
		else
			if($t['id_discount']=4){
				$dis_money=$t['GiaDauRa']-($t['GiaDauRa']*40/100);
			}
		$ttien=$dis_money * $sl;
		$sql4="INSERT INTO tblhoadon(MaHD, id_GioHang, MaSP, MaKH, SoLuongXuat, TrangThaiXuat, NgayHD, ThanhTien)
				VALUES ('$mahd','$id_gh','$masp','$makh','$sl','$tt','$today','$ttien')";
		execute($sql4);
	}
	
	header('Location:../');
}
?>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?=$baseUrl?>../assets/css/dashboard.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="">
	<div class="col-md-12" style="margin: 30px 0;">
		<h3 align="center">Thông Tin Khách Hàng</h3>
        <div class="panel panel-primary">
            <div class="panel-body">
                <form method="post" action="">
					<div class="form-group">
						<label for="" style="font-weight: bold;">Tên Khách Hàng:
							<span><?=$user_name?></span>
						</label>
					</div>
                    <div class="form-group">
                        <label for="" style="font-weight: bold;">Ngày Sinh:</label>
                        <input type="date" required="true" class="form-control" name="ngaysinh">
                    </div>
					<div class="form-group">
                        <label for="" style="font-weight: bold;">Giới Tính:</label>
                        <input type="radio" name="rdbsex" value="Nam" checked="true" /> NAM
						<input type="radio" name="rdbsex" value="Nữ" /> NỮ
						<input type="radio" name="rdbsex" value="Không Có" /> KHÔNG CÓ
                    </div>
                    <div class="form-group">
                        <label for="" style="font-weight: bold;">Địa Chỉ:</label>
                        <input class="form-control" type="text" required="true" class="form-control" name="address" >
                    </div>
                    <div class="form-group">
                        <label for="" style="font-weight: bold;">Số Điện Thoại:</label>
                        <input class="form-control" type="number" required="true" class="form-control" name="SDT">
                    </div>
                    <button type="submit" class="btn btn-success">Đặt Hàng</button>
                </form>
            </div>
        </div>
	</div>
</div>
<?php
    include_once ($baseUrl.'FE/layouts-FE/footer.php');
?>

</body>
</html>
<script src="<?=$baseUrl?>FE/js/cuahang.js"></script>
<script src="<?=$baseUrl?>FE/js/index.js"></script>