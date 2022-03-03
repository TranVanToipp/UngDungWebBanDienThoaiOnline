<!-- Đây là giỏ hàng nhỏ -->
<?php
    if(isset($_SESSION['TenDN'])) {
        $email = $_SESSION['TenDN'];
        $sql = "SELECT MaKH FROM tblkhachhang WHERE TenDN ='$email' OR EmailKH='$email'";
        $data = executeResult($sql,true);
        $user_DN = $data['MaKH'];
        $sql = "SELECT * FROM tblgiohang WHERE MaKH= '$user_DN'";
        $cart_List = executeResult($sql);
    }
?>
<div class="cart">
    <a <?php if(isset($_SESSION['TenDN'])) echo 'href="../../../../../project_Mon_Wed/cart/Index.php"'; else echo'href="../../../../../project_Mon_Wed/authen/login"';?> class="tag-a"><span class="cart-text">GIỎ HÀNG</span></a>
    <div class="logo-cart-box"><div class="logo-cart">0</div></div>
     <ul class="nav-dropdown">
        <p class="block cart-empty">Chưa có sản phẩm trong giỏ hàng</p>
        <div class="nav-drop-box">
            <?php
            $total_money = 0;
            foreach($cart_List as $item) {
                $product_Ma = $item['MaSP'];
                $sql = "SELECT * FROM tblsanpham WHERE MaSP = '$product_Ma'";
                $data = executeResult($sql,true);
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
                $money_detail = $item['SoLuonghang'] * $dis_money;
                $total_money = $total_money + $money_detail;
                echo '
                    <li class="widget_shopping tag-li">
                        <div class="widget_shopping_content">
                            <div class="cart-items">
                                <div class="cart-items-img">
                                    <img src="../../../../project_Mon_Wed/admin/product/'.$data['HinhSP'].'" alt="">
                                </div>
                                <div class="cart-items-info">
                                    <div class="cart-items-name">
                                        <p>'.$data['TenSP'].'</p>
                                    </div>
                                    <div class="cart-items-price">
                                        <span class="cart-items-quanity">'.$item['SoLuonghang'].'</span>
                                        <span>x</span>
                                        <div class="cart-items-price-one">'.number_format($dis_money).'</div>
                                    </div>
                                </div>
                                <div class="cart-items-remove-box">
                                    <a href="'.$baseUrl.'cart/delete_cart.php?delete_cart='.$item['MaKH'].'" class="cart-items-remove tag-a">x</a>
                                </div>
                            </div>
                            <hr class="cart-hr">
                        </div>
                    </li>
                ';
            }
            echo '
            <div class="cart-total-box">
                <div class="cart-total-box1">
                    <span>Tổng tiền:</span>
                    <div class="cart-total">'.number_format($total_money).' <sup>đ</sup></div>
                </div>
                <hr class="cart-hr">
            </div>
            <a href="./cart/Index.php" class="tag-a" style="color: #fff;">
                <div class="btn-cart-view btn">
                    <span>XEM GIỎ HÀNG</span>
                </div>
            </a>
            <a href="#" class="tag-a" style="color:#fff;">
                <div class="btn-cart-pay btn">
                    <span>THANH TOÁN</span>
                </div>
            </a>
            '
            ?>
        </div>
        <div class="nav-dropdown-hover"></div>
    </ul> 
</div>
