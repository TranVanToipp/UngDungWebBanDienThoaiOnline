<?php   
    $title = "Thêm/Sửa nhà cung cấp";
    $baseUrl = '../';
    require_once('../layouts/header.php');
?>
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
	<script src="../../ckfinder/ckfinder.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<?php
	$s_supplier= $s_address = $s_sdt = $s_email = $s_description = $s_ngayhopdong = '';
	if(!empty($_POST)){
		$s_id = $_POST['id'];
		$s_supplier = $_POST['supplier'];
		$s_address = $_POST['address'];
		$s_sdt = $_POST['sdt'];
		$s_email = $_POST['email'];
		$s_description = $_POST['description'];
		$s_ngayhopdong = $_POST['ngayhopdong'];
		$s_mancc=layMaNCC();
		if($s_id !=''){
			$sql="UPDATE tblnhacungcap SET TenNCC='$s_supplier',DiaChiNCC='$s_address',SDTNCC='$s_sdt',EmailNCC='$s_email',ThongTinThemNCC='$s_description',NgayHopDongNCC='$s_ngayhopdong' WHERE ID=".$s_id;
		}
		else 
		$sql="INSERT INTO tblnhacungcap(MaNCC, TenNCC, DiaChiNCC, SDTNCC, EmailNCC, ThongTinThemNCC, NgayHopDongNCC) 
		VALUES('$s_mancc', '$s_supplier', '$s_address', '$s_sdt', '$s_email', '$s_description', '$s_ngayhopdong')";
		execute($sql);
		header("location:index.php");
	}
	$id='';
	if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql1="SELECT * FROM tblnhacungcap where ID=".$id;
	$supplier=executeResult($sql1,true);
	if($supplier != null && count($supplier)>0){
		$s_supplier = $supplier['TenNCC'];
		$s_address = $supplier['DiaChiNCC'];
		$s_sdt = $supplier['SDTNCC'];
		$s_email= $supplier['EmailNCC'];
		$s_description = $supplier['ThongTinThemNCC'];
		$s_ngayhopdong = $supplier['NgayHopDongNCC'];
	}
	else
		$id='';
	}
	
	function rdMaNCC($length = 6)
	{
		$s='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$sLength= strlen($s);
		$random='';
		for($i=0;$i<$length;$i++){
			$random.=$s[rand(0,$sLength-1)];
		}
		return $random;
	}
	function layMaNCC(){
		$sql="SELECT * FROM tblnhacungcap";
		$NCC_Ma=executeResult($sql);
		$mancc="";
			while($mancc==""){
				$mancc="NCC_".rdMaNCC();
				foreach($NCC_Ma as $row){
					if($row['MaNCC']==$mancc)
						$mancc="";
					}
				}
				return $mancc;
	}
?>
<html>
<body>
<div class="row">
	<div class="col-md-12" style="margin: 30px 0;">
		<h3>Thêm/sửa nhà cung cấp</h3>
        <div class="panel panel-primary">
            <div class="panel-body">
                <form method="post" action="" enctype="multipart/form-data">
					<div class="form-group" style="display:none;">
						<input type="number" name="id" value="<?=$id?>"></input>
					</div>
                    <div class="form-group">
                        <label for="" style="font-weight: bold;">Tên nhà cung cấp:</label>
                        <input type="text" required="true" class="form-control" name="supplier" placeholder="Nhập tên nhà cung cấp" value="<?=$s_supplier?>">
                    </div>
					<div class="form-group">
                        <label for="" style="font-weight: bold;">Địa chỉ nhà cung cấp:</label>
                        <input class="form-control" type="text" required="true" class="form-control" name="address" value="<?=$s_address?>" >
                    </div>
                    <div class="form-group">
                        <label for="" style="font-weight: bold;">Số điện thoại:</label>
                        <input class="form-control" type="text" required="true" class="form-control" name="sdt" value="<?=$s_sdt?>">
                    </div>
                    <div class="form-group">
                        <label for="" style="font-weight: bold;">Email:</label>
                        <input class="form-control" type="email" required="true" class="form-control" name="email" value="<?=$s_email?>">
                    </div>
					<div class="form-group">
                        <label for="" style="font-weight: bold;">Thông tin thêm:</label>
                        <textarea class="form-group" name="description" id="" style="width: 100%;" rows="5" name="description" ><?=$s_description?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="" style="font-weight: bold;">ngày hợp đồng:</label>
                        <input class="form-control" type="date" required="true" class="form-control" name="ngayhopdong" value="<?=$s_ngayhopdong?>">
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