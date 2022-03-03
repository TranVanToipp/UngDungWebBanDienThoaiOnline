<?php
    $title = 'Quản lý người dùng';
    $baseUrl = '../';
    require_once($baseUrl.'layouts/header.php');
?>

    <div class="row">
        <div class="tcol-md-12 table-responsive" style="margin-top: 30px;">
            <h3>Quản lí người dùng</h3>
            <table class="table table-bordered table-hover" style="margin-top: 15px;">
                <!-- <thead> -->
                    <tr>
                        <th>Mã Khách hàng</th>
						<!-- <th>Tên đăng nhập</th> -->
                        <th>Tên khách hàng</th>
						<!-- <th>Ngày sinh</th> -->
                        <th>Giới tính</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
						<th style="width: 50px;">Tùy chỉnh</th>
						<th style="width: 50px;">Tùy chỉnh</th>
                    </tr>
                <!-- </thead> -->
                <!-- <tbody> -->
<?php

    $sql = 'select * from tblkhachhang';
    $customer = executeResult($sql);
    foreach($customer as $row){
        
    echo '<tr>
            <td>'.$row['MaKH'].'</td>
            <td>'.$row['TenKH'].'</td>
            <td>'.$row['GioiTinh'].'</td>
            <td>'.$row['DiaChiKH'].'</td>
            <td>'.$row['SDT'].'</td>
            <td>'.$row['EmailKH'].'</td>
			<th style="width: 40px; height:40px;" >
				<button class="btn btn-warning" onclick=\'window.open("editor.php?id='.$row['ID'].'","_self")\'>Edit</button></a>
			</th>
			<th style="width: 50px;" >
					<button class="btn btn-danger" onclick="deleteUser('.$row['ID'].')">Xóa</button>
				</th>
        </tr>';
    }
?>
                <!-- </tbody> -->
            </table>
        </div>
    </div>
	<script>
	function deleteUser(ID) {
			option = confirm('Bạn có muốn xoá người dùng này không');
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
<?php
	require_once($baseUrl.'layouts/footer.php');
?>