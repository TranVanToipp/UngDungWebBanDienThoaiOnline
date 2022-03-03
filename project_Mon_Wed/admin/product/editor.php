<?php   
    $title = "Thêm/Sửa sản phẩm";
    $baseUrl = '../';
    require_once('../layouts/header.php');
?>
<?php
function layNCCap(){
	$sql="SELECT * FROM tblnhacungcap";
	$layNCC=executeResult($sql);
	return $layNCC;
}
function layLoaiSP(){
	$sql="SELECT * FROM tblloaisp";
	$laylSP=executeResult($sql);
	return $laylSP;
}
?>
<?php
$s_title = $s_price = $s_discount = $s_number = $s_unit = $s_description = 
	$s_avatar = $s_checkspNB = $s_giamgia = $s_IDLSP = $s_IDNCCap = '';
if(!empty($_POST)){
	$s_id = $_POST['id'];
	$s_title = $_POST['title'];
	$s_IDLSP = $_POST['IDLSP'];
	$s_IDNCCap = $_POST['IDNCCap'];
	$s_price = $_POST['price'];
	$s_discount = $_POST['discount'];
	$s_giamgia = $_POST['giamgia'];
	$s_number = $_POST['number'];
	$s_unit = $_POST['unit'];
	$s_description = $_POST['description'];
	if(isset($_POST['checkspNB']))
		$s_checkspNB = $_POST['checkspNB'];
	else
		$s_checkspNB=0;
	$s_MaSP=layMaSP();
	$tien=0;
	$file_path= "image/";
	$file_path1=$file_path.basename($_FILES['avatar']['name']);
	move_uploaded_file($_FILES['avatar']['tmp_name'],$file_path1);
	if($s_id !=''){
		$sql="UPDATE tblsanpham SET TenSP='$s_title',SoLuongSP='$s_number',DonViTinh='$s_unit',MaNCC='$s_IDNCCap',GiaDauVao='$s_price',GiaDauRa='$s_discount',id_discount='$s_giamgia',ThongTinSP='$s_description',HinhSP='$file_path1',loaiSP='$s_IDLSP', spNB='$s_checkspNB' WHERE ID=".$s_id;
	}
	else{
		$sql="INSERT INTO tblsanpham(MaSP, TenSP, SoLuongSP, DonViTinh, MaNCC, GiaDauVao, GiaDauRa, ThongTinSP, HinhSP, loaiSP,spNB, id_discount) 
			VALUES ('$s_MaSP','$s_title','$s_number','$s_unit','$s_IDNCCap','$s_price','$s_discount','$s_description','$file_path1','$s_IDLSP','$s_checkspNB','$s_giamgia')";
	}
	execute($sql);
	header("location:index.php");
}
$id='';
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql1="SELECT * FROM tblsanpham where ID=".$id;
	$product= executeResult($sql1,true);
	if($product != null){
		$s_title = $product['TenSP'];
		$s_price = $product['GiaDauVao'];
		$s_discount = $product['GiaDauRa'];
		$s_number = $product['SoLuongSP'];
		$s_unit = $product['DonViTinh'];
		$s_description = $product['ThongTinSP'];
		$s_avatar = $product['HinhSP'];
		$s_checkspNB = $product['spNB'];
		$s_giamgia = $product['id_discount'];
		$s_IDLSP = $product['loaiSP'];
		$s_IDNCCap = $product['MaNCC'];
	}
	else
		$id='';
}
function rdMaSP($length = 7)
{
	$s='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$sLength= strlen($s);
	$random='';
	for($i=0;$i<$length;$i++){
		$random.=$s[rand(0,$sLength-1)];
	}
	return $random;
}
function layMaSP(){
	$sql="SELECT * FROM tblsanpham";
	$SP_Ma=executeResult($sql);
	$masp="";
	while($masp==""){
		$masp="SP_".rdMaSP();
		foreach($SP_Ma as $row){
		if($row['MaSP']==$masp)
			$masp="";
		}
	}
	return $masp;
}
?>
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
	<script src="../../ckfinder/ckfinder.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<html>
<body>
<div class="row">
	<div class="col-md-12" style="margin: 30px 0;">
		<h3>Thêm/sửa sản phẩm</h3>
        <div class="panel panel-primary">
            <div class="panel-body">
                <form method="post" action="" enctype="multipart/form-data">
					<div class="form-group" style="display:none;">
						<input type="number" name="id" value="<?=$id?>"></input>
					</div>
                    <div class="form-group">
                        <label for="" style="font-weight: bold;">Tên sản phẩm:</label>
                        <input type="text" required="true" class="form-control" name="title" placeholder="Nhập tên sản phẩm" value="<?=$s_title?>">
                    </div>
					<div class="form-group">
                        <label for="" style="font-weight: bold;">Tên Loại Sản Phẩm:</label>
                        <td><?php
						$LoaiSP = layLoaiSP();
						echo "<select name='IDLSP'>";
						echo "<option value=''> --Chọn Loại Sản Phẩm--</option>";
						foreach($LoaiSP as $row){
							$loai=$row['loaisp'];
							echo "<option value='".$row['loaisp']."'"; if($s_IDLSP == $loai) echo 'selected="selected"'; echo ">".$row['TenLoaiSP']."</option>";
						}
						echo "</select>";
						?></td>
                    </div>
					<div class="form-group">
                        <label for="" style="font-weight: bold;">Tên Nhà Cung Cấp:</label>
                        <td><?php
						$NhaCCap=layNCCap();
						echo "<select name='IDNCCap'>";
						echo "<option value=''> --Chọn Nhà Cung Cấp--</option>";
						foreach($NhaCCap as $row){
							$nha=$row['MaNCC'];
							echo "<option value='".$row['MaNCC']."'"; if($s_IDNCCap == $nha) echo 'selected="selected"'; echo ">".$row['TenNCC']."</option>";
						}
						echo "</select>";
						?></td>
                    </div>
					<div class="form-group">
                        <label for="" style="font-weight: bold;">Giá Nhập Vào:</label>
                        <input class="form-control" type="number" required="true" class="form-control" name="price" value="<?=$s_price?>">
                    </div>
                    <div class="form-group">
                        <label for="" style="font-weight: bold;">Giá Bán Ra:</label>
                        <input class="form-control" type="number" required="true" class="form-control" name="discount" value="<?=$s_discount?>">
                    </div>
					<div class="from-group">
					<label for="" style="font-weight: bold;">Giảm Giá: </label>
					<select id="disco" name="giamgia">
						<option value="0" <?php if($s_giamgia==0) echo 'selected = "selected"'; ?>>Giảm Giá 0%</option>
						<option value="1" <?php if($s_giamgia==1) echo 'selected = "selected"'; ?>>Giảm Giá 10%</option>
						<option value="2" <?php if($s_giamgia==2) echo 'selected = "selected"'; ?>>Giảm Giá 20%</option>
						<option value="3" <?php if($s_giamgia==3) echo 'selected = "selected"'; ?>>Giảm Giá 30%</option>
						<option value="4" <?php if($s_giamgia==4) echo 'selected = "selected"'; ?>>Giảm Giá 40%</option>
					</select>
					</div>
                    <div class="form-group">
                        <label for="" style="font-weight: bold;">Số lượng:</label>
                        <input class="form-control" type="number" required="true" class="form-control" name="number" value="<?=$s_number?>">
                    </div>
					<div class="form-group">
                        <label for="" style="font-weight: bold;">Đơn vị tính:</label>
                        <input class="form-control" type="text" required="true" class="form-control" name="unit" value="<?=$s_unit?>">
                    </div>
					<div class="form-group">
                        <label for="" style="font-weight: bold;">Sản Phẩm Nổi Bật </label>
                        <input type="checkbox" name="checkspNB" value="1" style="width: 5%;" <?php if($s_checkspNB == 1) echo 'checked ="true"';?>>
                    </div>
                    <div class="form-group">
                        <label for="" style="font-weight: bold;">Thông tin sản phẩm:</label>
                        <textarea class="form-group" name="description" id="" style="width: 100%;" rows="5" name="description"><?=$s_description?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="" style="font-weight: bold;">Ảnh sản phẩm:</label>
                        <input name="avatar" type="file"><img src="<?=$s_avatar?>" style="width: 80px; height:80px;"/>
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