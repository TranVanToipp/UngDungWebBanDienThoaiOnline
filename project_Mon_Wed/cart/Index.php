<?php
	$title = 'Giỏ hàng';
	$baseUrl = '../';
    include_once ($baseUrl.'FE/layouts-FE/header.php');
	function soluong($s,$ma,$slc){
		$sql3="SELECT * FROM tblsanpham WHERE MaSP = '$ma'";
		$ex1=executeResult($sql3,true);
		$soluongSP= $ex1['SoLuongSP'] + $slc - $s;
		$sql4="UPDATE tblsanpham SET SoLuongSP='$soluongSP' WHERE MaSP = '$ma'";
		execute($sql4);
	}
    if(isset($_SESSION['TenDN'])) {
        $email =  $_SESSION['TenDN'];
        $sql = "SELECT MaKH FROM tblkhachhang WHERE TenDN ='$email' OR EmailKH='$email'";
        $data = executeResult($sql,true);
        $user_Ma = $data['MaKH'];
        $sql = "SELECT * FROM tblgiohang WHERE MaKH= '$user_Ma'";
        $cart_List = executeResult($sql);
    }
?>
<link rel="stylesheet" href="../FE/layouts-FE/css/cart.css">
<link rel="stylesheet" href="../FE/layouts-FE/css/chitietsanpham.css">
<div class="grid wide">
    <div class="product-selling-title cart_youself-box">
        <hr>
        <span class="cart_youself">GIỎ HÀNG CỦA BẠN</span>
        <hr>
    </div>
	<?php
	if($cart_List!=null){
	?>
    <div class="cart_main">
        <div class="row">
            <div class="col l-8 c-12 cart_pc" style="position: relative;">
                <form action="" method="post">
                    <table class="cart_table">
                        <tbody>
                            <tr>  
                                <div class="">
                                <th class="cart_product">SẢN PHẨM</th>
                                <th class="cart_price">GIÁ</th>
                                <th>SỐ LƯỢNG</th>
                                <th>TẠM TÍNH</th>
                                </div>  
                            </tr>
							<?php
                            $total_money_main = 0;
                            foreach($cart_List as $item) {
                                if(!empty($_POST)) {
									$a = $item['MaSP'];
                                    $num_update = $_POST[$a];
									$slq1="SELECT * FROM tblgiohang WHERE MaSP='$a' AND MaKH='$user_Ma'";
									$data1 = executeResult($sql,true);
									$slc=$data1['SoLuonghang'];
									soluong($num_update,$a,$slc);
									$sql = "UPDATE tblgiohang SET SoLuonghang = '$num_update' WHERE MaSP='$a' AND MaKH='$user_Ma'";
                                    execute($sql);
                                    header('Location: ../cart');
								}
                                $money_detail = 0;
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
                                $total_money_main = $total_money_main + $money_detail;
								echo '
                                <tr class="cartList">
                                    <td class="cart_product">
                                        <div class="cart-items-remove-box cart_body">
                                            <a href="../cart/delete_cart.php?delete_cart='.$item['MaSP'].'" class="cart-items-remove tag-a">x</a>
                                        </div>
                                        <div class="cart-items-img cart_body">
                                            <img src="'.$baseUrl."admin/product/".$data['HinhSP'].'" alt="">
                                        </div>
                                        <div class="cart-items-name cart_body">
                                            <span>'.$data['TenSP'].'</span>
                                        </div>
                                    </td>
                                    <td class="cart_body" style="font-weight: 600; text-align: center;">
                                        <span style="padding-top:17px;">'.number_format($dis_money).'<sup>đ</sup></span>
                                    </td>
                                    <td class="num" style="font-weight: 600; text-align: center;">
                                    <div class="quantity-product">
                                        <input type="number" name="'.$item['MaSP'].'" id="" class="value-quantity" value="'.$item['SoLuonghang'].'" >
                                    </div>
                                    </td>
                                    <td class="total_money_details" style="font-weight: 600; text-align: center;padding-top:17px;">'.number_format($money_detail).'<sup>đ</sup></td>
                                </tr>';
                            }
                        ?>
                        </tbody>
                    </table>
					<div class="cart_product_foot">
                        <a href="../" class="tag-a">
                            <div class="continue_view">
                                <i class="fas fa-long-arrow-alt-left"></i>
                                <span>TIẾP TỤC XEM SẢN PHẨM</span>
                            </div>
                        </a>
                        <button type="submit" class="update_cart opacity">
                            <span style="padding-top: 3px;font-size:13px;">CẬP NHẬT GIỎ HÀNG</span>
                        </button>
                    </div> 
                </form>
            </div>
			<div class="col l-4 c-12 cart_right">
                <div class="cart_right-header">
                    <span>CỘNG GIỎ HÀNG</span>
                </div>
                <div class="tam-tinh">
                    <span>Tạm tính</span>
                    <?php
                        echo '<div class="tam-tinh-money">'.number_format( $total_money_main).'<sup>đ</sup></div>';
                    ?>
                    
                </div>
                <div class="total_money">
                    <div class="total_money-title">
                        <span>Tổng tiền:</span>
                    </div>
                    <?php 
                        $phi_ship = 0;
                        $total_money_main = $total_money_main + $phi_ship;
                        echo '<div class="total-main">'.number_format( $total_money_main).'<sup>đ</sup></div>';
                    ?>
                </div>
                <a href="<?=$baseUrl?>detail" class="tag-a ">
                    <div class="thanh-toan">
                        <span>Đặt Hàng</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
	<?php }
	?>
    <div class="cart-empty-main">
        <div class="box-img-cart-empty">
            <img src="../assets/photos/cart-empty.png" alt="">
        </div>
        <div class="cart-empty-main-title">
            <span>GIỎ HÀNG TRỐNG</span>
        </div>
        <a href="../" class="tag-a">
            <div class="continue_view" style="width:200px;margin-top:40px; margin-left:15px;">
                <i class="fas fa-long-arrow-alt-left"></i>
                <span>QUAY LẠI CỬA HÀNG</span>
            </div>
        </a>
    </div>
</div>
<?php
    include_once ($baseUrl.'FE/layouts-FE/footer.php');
?>