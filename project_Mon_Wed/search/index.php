<?php
	$title = 'Search';
	$baseUrl = '../';
    include_once ($baseUrl.'FE/layouts-FE/header.php');
    require_once ($baseUrl.'utils/ulitity.php');
    require_once ($baseUrl.'database/dbhelper.php');
	$search = $_GET['search'];
?>
<link rel="stylesheet" href="<?=$baseUrl?>FE/layouts-FE/css/shop.css">
<link rel="stylesheet" href="<?=$baseUrl?>FE/layouts-FE/css/chitietsanpham.css">
<style>
        .wide-nav-items-span {
            color: #777;
        }
        .danhmuc-dienthoai {
            color: #000;
        }
        .product-type {
            margin-top: 17px;
            
        }
        .product-type a span {
            color: #000;
            padding: 5px 20px;
            width: max-content;
            border: 1px solid #e0dede;
            border-radius: 10px;
            margin: 10px 0
        }
</style>
<div class="shop-body">
    <div class="grid wide">
        <div class="row">
            <div class="col l-9 shop-sanpham">
                <div class="row">
                    <?php
						$sql = "SELECT * FROM tblsanpham WHERE TenSp LIKE '%".$search."%'";
						$ex = executeResult($sql);
						if($ex!=''){
							foreach($ex as $sp)
							{
							echo
								'<div class="col l-4 c-6 product-selling-items shop-cuahang-items">
									<div class="product-selling-box-img">
										<a href="#"><img class="product-selling-img" src="../admin/product/'.$sp['HinhSP'].'" alt=""></a>
									</div>
									<div class="product-selling-info">
										<div class="product-selling-name">
											<span>'.$sp['TenSP'].'</span>
										</div>
										<div class="product-selling-price">
											<div class="product-selling-price-now">'.$sp['GiaDauRa'].'<sup>đ</sup></div>
										</div>
										<div class="btn-add-cart-box">
											<a ';if(isset($_SESSION['TenDN'])== null) echo 'href="authen/login"';else echo'href="../cart/add_cart.php?add_to_cart='.$sp['MaSP'].'"';echo' class="tag-a link-add-cart"><span class="btn-add-cart">THÊM VÀO GIỎ HÀNG</span></a>
										</div>
									</div>
								</div>';
							}
						}
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include_once ($baseUrl.'FE/layouts-FE/footer.php');
?>
<script src="<?=$baseUrl?>FE/js/cuahang.js"></script>
<script src="<?=$baseUrl?>FE/js/index.js"></script>