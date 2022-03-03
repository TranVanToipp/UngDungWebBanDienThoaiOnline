<?php   
    $title = "Sửa người dùng";
    $baseUrl = '../';
    require_once('../layouts/header.php');
?>
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
	<script src="../../ckfinder/ckfinder.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<?php
	$s_nameofuser= $s_sex= $s_address= $s_sdt ='';
	if(!empty($_POST)){
		$s_id = $_GET['id'];
		$s_nameofuser = $_POST['NameOfUser'];
		$s_sex = $_POST['Sex'];
		$s_address = $_POST['Address'];
		$s_sdt = $_POST['Sdt'];
		$sql="UPDATE tblkhachhang SET TenKH='$s_nameofuser', GioiTinh='$s_sex', DiaChiKH='$s_address', SDT='$s_sdt' WHERE ID=".$s_id;
		$exe = execute($sql);
		header("location:index.php");
	}
	$id='';
	if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql1="SELECT * FROM tblkhachhang where ID=".$id;
	$user=executeResult($sql1,true);
	if($user != null && count($user)>0){
		$d_nameofuser = $user['TenKH'];
		$d_address = $user['DiaChiKH'];
		$d_sdt = $user['SDT'];
	}
	else
		$id='';
	}
?>
<html>
<body>
<div class="row">
	<div class="col-md-12" style="margin: 30px 0;">
		<h3>sửa người dùng</h3>
        <div class="panel panel-primary">
            <div class="panel-body">
                <form method="post" action="" enctype="multipart/form-data">
					<div class="form-group" style="display:none;">
						<input type="number" name="id" value="<?=$id?>"></input>
					</div>
                    <div class="form-group">
                        <label for="" style="font-weight: bold;">tên khách khàng:</label>
                        <input type="text" required="true" class="form-control" name="NameOfUser" placeholder="Nhập tên khách hàng" value="<?=$d_nameofuser?>">
                    </div>
					<div class="form-group">
                        <label for="" style="font-weight: bold;">giới tính</label>
                        <input type="radio" name="Sex" checked = "true" value = "nam">Nam</input>
						<input type="radio" name="Sex" value = "nu">Nu</input>
						<input type="radio" name="Sex" value = "thu3">không có</input>
                    </div>
					<div class="form-group">
                        <label for="" style="font-weight: bold;">Địa chỉ:</label>
                        <input class="form-control" type="text" required="true" class="form-control" name="Address"  value="<?=$d_address?>">
                    </div>
                    <div class="form-group">
                        <label for="" style="font-weight: bold;">Số điện thoại:</label>
                        <input class="form-control" type="text" required="true" class="form-control" name="Sdt" value="<?=$d_sdt?>">
                    </div>
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
	</div>
</div>
<script>
    // CKEDITOR.replace( 'description' );
    CKEDITOR.replace( 'description', {
        // filebrowserBrowseUrl: '';
        filebrowserBrowseUrl: '../ckfinder/ckfinder.html'
    } );
</script>
</body>
</html>