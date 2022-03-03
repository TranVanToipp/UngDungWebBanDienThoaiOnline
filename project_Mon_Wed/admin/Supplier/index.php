<?php
	$title = 'Quản lý nhà cung cấp';
	$baseUrl = '../';
	require_once($baseUrl.'layouts/header.php');
	if(isset($_SESSION['TenDN'])){
	  $tendn=$_SESSION['TenDN'];
	  $sql="SELECT * FROM tbltaikhoan WHERE TenDN='$tendn' OR Email='$tendn'";
	  $ex=executeResult($sql,true);
	  if($ex['LoaiTaiKhoan']=="Admin"){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhà Cung Cấp</title>
</head>
<body>
<style> 
	.nav-item:nth-child(8) {
		background-color: #c1c1c1;
	}
</style>
<div class="row">
	<div class="col-md-12" style="margin-top: 30px;">
		<h3>Quản lý nhà cung cấp</h3>
		<a href="editor.php"><button type="submit" class="btn btn-success" style="margin-top: 10px;">Thêm Nhà Cung Cấp</button></a>
	</div>
	
	<div style="margin-top: 15px;">
		<table class="table table-bordered table-hover" >
				<tr>
					<th>STT</th>
					<th>Mã nhà cung cấp</th>
                    <th>Tên nhà cung cấp</th>
                    <th>Địa chỉ nhà cung cấp</th>
                    <th>Số DT</th>
                    <th>Thông tin thêm</th>
                    <th>Ngày hợp đồng</th>
					<th style="width: 50px;">Tùy chỉnh</th>
					<th style="width: 50px;">Tùy chỉnh</th>
				</tr>
<?php
    $index = 1;
    $sql = "select * from tblnhacungcap";
    $supplier = executeResult($sql);
    foreach($supplier as $row){
        echo '<tr>
                <td>'.($index++).'</td>
                <td>'.$row['MaNCC'].'</td>
                <td>'.$row['TenNCC'].'</td>
                <td>'.$row['DiaChiNCC'].'</td>
                <td>'.$row['SDTNCC'].'</td>
                <td>'.$row['ThongTinThemNCC'].'</td>
                <td>'.$row['NgayHopDongNCC'].'</td>
                <th style="width: 40px; height:40px;" >
					<button class="btn btn-warning" onclick=\'window.open("editor.php?id='.$row['ID'].'","_self")\'>Edit</button></a>
				</th>
				<th style="width: 50px;" >
					<button class="btn btn-danger" onclick="deleteSupplier('.$row['ID'].')">Xóa</button>
				</th>
            </tr>';
    }
?>
		</table>
</div>
</div>
<script>
	function deleteSupplier(ID) {
			option = confirm('Bạn có muốn xoá Hóa Đơn này không');
			if(!option) {
				return;
			}
			$.post('process_delete.php', {
				'ID': ID
			}, function(data) {
				alert(data)
				location.reload()
			})
		}
	</script>
</body>
</html>
<?php
	}else 
		echo '<h3 align="center" style="color: #ff0000;">Cảnh Báo!!!!! Đại Vương Ơiiii <br>Đại Vương Không Có Quyền Truy Cập Vào Trang Web Này</br></h3>';
}else
	header('Location:../../../../../project_Mon_Wed/authen/login');
	require_once($baseUrl.'layouts/footer.php');
?>