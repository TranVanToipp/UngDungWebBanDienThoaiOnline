<?php
	$title = 'Loại danh mục';
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
    <title>Loại sản phẩm</title>
</head>
<body>
    <div class="row">
        <div class="col-md-12">
            <h1>Quản lí loại sản phẩm</h1>
        </div>
        <div class="col-md-7">
            <table class = "table table-bordered table-hover">
                <tr>
                    <th>STT</th>
                    <th>Loại sản phẩm</th>
                    <th>Tên loại sản phẩm</th>
                </tr>
<?php
    $index = 1;
    $sql = "select * from tblloaisp";
    $product = executeResult($sql);
    foreach($product as $row){
        echo '<tr>
                <td>'.($index++).'</td>
                <td>'.$row['loaisp'].'</td>
                <td>'.$row['TenLoaiSP'].'</td>
            </tr>';
    }
?>
            </table>
        </div>
    </div>
</body>
</html>
<?php
	}else 
		echo '<h3 align="center" style="color: #ff0000;">Cảnh Báo!!!!! Đại Vương Ơiiii <br>Đại Vương Không Có Quyền Truy Cập Vào Trang Web Này</br></h3>';
}else
	header('Location:../../../../../project_Mon_Wed/authen/login');
	require_once($baseUrl.'layouts/footer.php');
?>