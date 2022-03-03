<?php
	$title = 'Chi tiết sản phẩm';
	$baseUrl = '../../';
    include_once ($baseUrl.'FE/layouts-FE/header.php');
	include_once ($baseUrl.'utils/ulitity.php');
	$id = getGet('sp');
    $sql = "SELECT * FROM tblsanpham WHERE MaSP = '$id'";
    $data = executeResult($sql,true);
?>
<link rel="stylesheet" href="<?=$baseUrl?>FE/layouts-FE/css/chitietsanpham.css">
<div class="grid wide">
    <div class="chitietsanpham">
        <div class="chitiet-header">
            <div class="row">
                <div class="col l-6 c-12">
                    <?php
                        echo '<div class="chitiet-big-img">
                                <img src="'.$baseUrl.'admin/product/'.$data['HinhSP'].'" alt="" style="object-fit: cover">
                            </div>';
                    ?>
                </div>
                <div class="col l-6 c-12">
                    <div class="chitiet-description">
                        <div class="chitiet-des-name">
                            <span><?=$data['TenSP']?></span>
                        </div>
						<?php
							if($data['id_discount']==0){
								$dis_money=$data['GiaDauRa'];
							}
							else
								if($data['id_discount']==1){
								$dis_money=$data['GiaDauRa']-($data['GiaDauRa']*10/100);
							}
							else
								if($data['id_discount']==2){
								$dis_money=$data['GiaDauRa']-($data['GiaDauRa']*20/100);
							}
							else
								if($data['id_discount']==3){
								$dis_money=$data['GiaDauRa']-($data['GiaDauRa']*30/100);
							}
							else
								if($data['id_discount']==4){
								$dis_money=$data['GiaDauRa']-($data['GiaDauRa']*40/100);
							}
						?>
                        <div class="chitiet-des-price">
                            <span style="text-decoration: line-through;color: rgb(117,117,117); font-weight:100; font-size: 16px"><?=number_format($data['GiaDauRa'])?></span>
                            <span><?=number_format($dis_money)?><sup>đ</sup></span>
                        </div>
                        <ul class="infor-product">
                            <?=$data['ThongTinSP']?>
                        </ul>
                        <div class="rest-product">
                            <span>Còn <?=$data['SoLuongSP']?> hàng</span>
                        </div>
                        <div class="btn-add-cart-box">
						<?php
							echo
							'<a ';if(isset($_SESSION['TenDN'])== null) echo 'href="../../authen/login"';else echo'href="../../cart/add_cart.php?add_to_cart='.$data['MaSP'].'"';echo' class="tag-a link-add-cart"><span class="btn-add-cart">THÊM VÀO GIỎ HÀNG</span></a>';
						?>
						</div>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
<?php
	require_once($baseUrl.'FE/layouts-FE/footer.php');
?>
<script src="../../FE/js/chitietsp.js"></script>
<script src="../../FE/js/index.js"></script>