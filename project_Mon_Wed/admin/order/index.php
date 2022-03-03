<?php
	$title = 'Quản lý Hóa Đơn';
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
    <title>Hóa Đơn</title>
</head>
<body>
    <div class="row" >
        <div class= "col-md-12 table-responsive">
            <h3>Quản lí Hóa Đơn</h3>
			<form method="post">
			<a>
			<select id="hd" name="hoadon" class="btn btn-success">
				<option value="1">Tất Cả Hóa Đơn</option>
				<option value="2">Hóa Đơn Đang Duyệt</option>
                <option value="3">Hóa Đơn Thành Công</option>
				<option value="4">Hóa Đơn Đã Hủy</option>
			</select>
			</a>
			<a><button name="xem" type="submit" class="btn btn-success" style="margin-top: -2px;margin-left: 10px;">Xem Hóa Đơn</button></a>
			</form>
            <table class = "table table-bordered table-hover">
                <tr>
                    <th>STT</th>
                    <th>Mã HĐ</th>
                    <th>Mã SP</th>
					<th>Tên SP</th>
                    <th>Mã KH</th>
                    <th>Số Lượng</th>
                    <th>Trạng Thái</th>
					<th>Ngày HĐ</th>
                    <th>Thành Tiền</th>
                    <th style="width: 50px;">Tùy chỉnh</th>
					<th style="width: 50px;">Tùy chỉnh</th>
					<th style="width: 50px;">Tùy chỉnh</th>
                </tr>
<?php
if (isset($_POST['xem'])){
	$hd=$_POST['hoadon'];
	if($hd=="1"){
		view();
	}
	else
		if($hd=="2"){
			$tt="Đang Kiểm Duyệt";
			view1($tt);
		}
	else
		if($hd=="3"){
			$tt="Thành Công";
			view1($tt);
		}
	else{
		$tt="Đơn Đã Hủy";
		view1($tt);
	}
}
?>
            </table>
        </div>
    </div>
	
</body>
</html>
<?php
	}
}
    require_once($baseUrl.'layouts/footer.php');
?>
	<?php
	function layHD(){
		$sql = "select * from tblhoadon";
		$order = executeResult($sql);
		return $order;
	}
	function layHD1($tt){
		$sql="select *from tblhoadon where TrangThaiXuat='$tt'";
		$order=executeResult($sql);
		return $order;
	}
	function view(){
		$index = 1;
		$order = layHD();
		foreach($order as $row){
			$sql1 = "SELECT * FROM tblsanpham where MaSP='".$row['MaSP']."'";
			$product = executeResult($sql1, true);
			echo '<tr>
					<td>'.($index++).'</td>
					<td>'.$row['MaHD'].'</td>
					<td>'.$row['MaSP'].'</td>
					<td>'.$product['TenSP'].'</td>
					<td>'.$row['MaKH'].'</td>
					<td>'.$row['SoLuongXuat'].'</td>
					<td>'.$row['TrangThaiXuat'].'</td>
					<td>'.$row['NgayHD'].'</td>
					<td>'.$row['ThanhTien'].'</td>
					<th style="width: 40px; height:40px;" >
						<button class="btn btn-warning" onclick="approveOrder('.$row['ID'].')">Duyệt Đơn</button></a>
					</th>
					<th style="width: 50px;" >
						<button class="btn btn-danger" onclick="cancelOrder('.$row['ID'].')">Hủy Đơn</button>
					</th>
					<th style="width: 50px;" >
						<button name="delete" class="btn btn-danger" onclick="deleteOrder('.$row['ID'].')">Xóa Đơn</button>
					</th>
				</tr>';
		}
	}
	function view1($tt){
		$index = 1;
		$order = layHD1($tt);
		foreach($order as $row){
		$sql1 = "SELECT * FROM tblsanpham where MaSP='".$row['MaSP']."'";
		$product = executeResult($sql1, true);
		echo '<tr>
				<td>'.($index++).'</td>
				<td>'.$row['MaHD'].'</td>
				<td>'.$row['MaSP'].'</td>
				<td>'.$product['TenSP'].'</td>
				<td>'.$row['MaKH'].'</td>
				<td>'.$row['SoLuongXuat'].'</td>
				<td>'.$row['TrangThaiXuat'].'</td>
				<td>'.$row['NgayHD'].'</td>
				<td>'.$row['ThanhTien'].'</td>
				<th style="width: 40px; height:40px;" >
					<button class="btn btn-warning" onclick="approveOrder('.$row['ID'].')">Duyệt Đơn</button></a>
				</th>
				<th style="width: 50px;" >
					<button class="btn btn-danger" onclick="cancelOrder('.$row['ID'].')">Hủy Đơn</button>
				</th>
				<th style="width: 50px;" >
					<button name="delete" class="btn btn-danger" onclick="deleteOrder('.$row['ID'].')">Xóa Đơn</button>
				</th>
			</tr>';
		}
	}
	?>
	<script>
		function deleteOrder(ID) {
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
		function approveOrder(ID) {
			option = confirm('Bạn có muốn Duyệt Hóa Đơn này không');
			if(!option) {
				return;
			}
			$.post('process_approve.php', {
				'ID': ID
			}, function(data) {
				alert(data)
				location.reload()
			})
		}
		function cancelOrder(ID) {
			option = confirm('Bạn có muốn xoá Hóa Đơn này không');
			if(!option) {
				return;
			}
			$.post('process_cancel.php', {
				'ID': ID
			}, function(data) {
				alert(data)
				location.reload()
			})
		}
	</script>