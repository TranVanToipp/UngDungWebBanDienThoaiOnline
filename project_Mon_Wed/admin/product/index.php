<?php
	$title = 'Quản lý sản phẩm';
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
    <title>Sản phẩm</title>
</head>
<body>
    <div class="row">
        <div class= "col-md-12 table-responsive">
            <h3>Quản lí sản phẩm</h3>
            <a href="editor.php"><button type="submit" class="btn btn-success" style="margin-top: 10px;">Thêm sản phẩm</button></a>
            <table class = "table table-bordered table-hover">
                <tr>
                    <th>STT</th>
                    <th>Mã SP</th>
                    <th>Tên SP</th>
                    <th>Giá nhập vào</th>
                    <th>Giá bán ra</th>
					<th>Giảm Giá</th>
					<th>Số lương</th>
					<th>Đơn Vị Tính</th>
                    <th>Thông tin SP</th>
					<th>Hãng SP</th>
                    <th>Hình sản phẩm</th>
                    <th style="width: 50px;">Tùy chỉnh</th>
					<th style="width: 50px;">Tùy chỉnh</th>
                </tr>
<?php
    $index = 1;
    $sql = "select * from tblsanpham";
    $product = executeResult($sql);
    foreach($product as $row){
		$sql1="SELECT * FROM tblloaisp WHERE loaiSP='".$row['loaiSP']."'";
		$product_type= executeResult($sql1,true);
		$sql2="SELECT * FROM tbldiscount WHERE ID =".$row['id_discount'];
		$ex=executeResult($sql2,true);
		if($row['id_discount']==0)
			$pt="0%";
		else
			$pt=$ex['phantram']."%";
        echo '<tr>
                <td>'.($index++).'</td>
                <td>'.$row['MaSP'].'</td>
                <td>'.$row['TenSP'].'</td>
                <td>'.$row['GiaDauVao'].'</td>
                <td>'.$row['GiaDauRa'].'</td>
				<td>'.$pt.'</td>
				<td>'.$row['SoLuongSP'].'</td>
				<td>'.$row['DonViTinh'].'</td>
                <td>'.$row['ThongTinSP'].'</td>
				<td>'.$product_type['TenLoaiSP'].'</td>
                <td><img src='.$row['HinhSP'].' style="height: 120px; width: 100px;"></td>
                <th style="width: 40px; height:40px;" >
					<button class="btn btn-warning" onclick=\'window.open("editor.php?id='.$row['ID'].'","_self")\'>Edit</button></a>
				</th>
				<th style="width: 50px;" >
					<button class="btn btn-danger" onclick="deleteProduct('.$row['ID'].')">Xóa</button>
				</th>
            </tr>';
    }
?>
            </table>
        </div>
    </div>
	<script>
	function deleteProduct(ID) {
			option = confirm('Bạn có muốn xoá Sản Phẩm này không');
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