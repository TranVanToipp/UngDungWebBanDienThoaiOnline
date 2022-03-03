
<link rel="stylesheet" href="FE//layouts-FE/css/chitietsanpham.css">
<div class="grid wide" id="main-product-a">
			<div class="product-selling-title">
				<hr><span>SẢN PHẨM NỔI BẬT</span><hr>
			</div>
			<div class="product-selling-main">
				<div class="row"><?php
				$spNB = 1;
				$sql = "SELECT * FROM tblsanpham WHERE spNB=".$spNB;
				$ex = executeResult($sql);
				foreach($ex as $sp){
					if($sp['id_discount']==0){
						$tien=$sp['GiaDauRa'];
					}
					else
						if($sp['id_discount']==1){
						$tien=$sp['GiaDauRa']-($sp['GiaDauRa']*10/100);
					}
					else
						if($sp['id_discount']==2){
						$tien=$sp['GiaDauRa']-($sp['GiaDauRa']*20/100);
					}
					else
						if($sp['id_discount']==3){
						$tien=$sp['GiaDauRa']-($sp['GiaDauRa']*30/100);
					}
					else
						if($sp['id_discount']==4){
						$tien=$sp['GiaDauRa']-($sp['GiaDauRa']*40/100);
					}
					echo'<div class="col  l-3 c-6 product-selling-items">
						<div class="product-selling-box-img">
							<a href="../project_Mon_Wed/category/ctSP/sp.php?sp='.$sp['MaSP'].'"><img class="product-selling-img" src="./admin/product/'.$sp['HinhSP'].'" alt=""></a>
						</div>
						<div class="product-selling-info">
							<div class="product-selling-name">
								<span>'.$sp['TenSP'].'</span>
							</div>
							<div class="product-selling-price">
								<div class="product-selling-price-old">'.number_format($sp['GiaDauRa']).'<sup>đ</sup></div>
                                <div class="product-selling-price-now">'.number_format($tien).'<sup>đ</sup></div>
							</div>
							<div class="btn-add-cart-box">
								<a ';if(isset($_SESSION['TenDN'])== null) echo 'href="authen/login"';else echo'href="cart/add_cart.php?add_to_cart='.$sp['MaSP'].'"';echo' class="tag-a link-add-cart"><span class="btn-add-cart">THÊM VÀO GIỎ HÀNG</span></a>
                            </div>
						</div>
					</div>';
				}
				?>
				</div>
			</div>
		</div>
</link>
<script src="<?=$baseUrl?>FE/js/cuahang.js"></script>
<script src="<?=$baseUrl?>FE/js/index.js"></script>