<?php
	$title = 'Chi tiết';
	$baseUrl = '../';
    include_once ($baseUrl.'FE/layouts-FE/header.php');
    if(isset($_SESSION['TenDN'])) {
        $email =  $_SESSION['TenDN'];
        $sql = "SELECT * FROM tblkhachhang WHERE TenDN ='$email' OR EmailKH = '$email'";
        $data = executeResult($sql,true);
        $user_name = $data['TenKH'];
        $user_Ma = $data['MaKH'];
    }
?>
<link rel="stylesheet" href="../FE/layouts-FE/css/detail.css">
<?php
    if(isset($user_Ma) ) {
        $total_money = 0;
        $sql = "SELECT * FROM tblhoadon WHERE MaKH = '$user_Ma' ";
        $data1 = executeResult($sql);
        if(!empty($data1)) {	
?>
	<div class="grid wide detail">
    <div class="detail-title"><span>CHI TIẾT ĐƠN HÀNG</span></div>
    <div class="row">
        <div class="col l-6">
            <table class="cart_table" style="width:100%;">
                <tbody>
                    <tr>  
                        <div class="">
                        <th class="cart_product">SẢN PHẨM</th>
                        <th>SỐ LƯỢNG</th>
                        <th>TẠM TÍNH</th>
						<th>Trạng Thái Đơn Hàng</th>
                        </div>
                    </tr>
					<?php
                    foreach($data1 as $item) {
                        $total_money = $total_money+ $item['ThanhTien'];
                        echo '
                        <tr class="cartList">
                            <td class="cart_product">
                                <div class="cart-items-name cart_body" style="padding-top:15px">
                                    <span>'.$item['MaSP'].'</span>
                                </div>
                            </td>
                            <td class="num" style="font-weight: 600; text-align: center; padding-top:15px">'.$item['SoLuongXuat'].'</td>
                            <td class="total_money_details" style="font-weight: 600; text-align: center; padding-top:15px">'.number_format($item['ThanhTien']).'<sup>đ</sup></td>
							<td class="cart_product">
								<div class="cart-items-name cart_body" style="padding-top:15px" align="center">
									<span>'.$item['TrangThaiXuat'].'</span>
								</div>
							</td>
                        </tr>';
                    }
                ?>
                </tbody>
            </table>
			<div class="total_money">
                <span>Tổng tiền:</span>
                <span><?=number_format($total_money)?></span>
            </div>
        </div>
        <div class="col l-6" style="padding-left:70px;">
            <div class="infor-order">
                <div class="infor-title">
                    <span>THÔNG TIN ĐƠN HÀNG</span>
                </div>
                <div class="phone_number">
                    <span>Số điện thoại:</span>
                    <p><?=$data['SDT']?></p>
                </div>
                <div class="address">
                    <span>Địa chỉ giao hàng:</span>
                    <p><?=$data['DiaChiKH']?></p>
                </div>
            </div>
			</div></div>
			<div class="success-btn">
				<a href="../" class="tag-a" style="margin-left: 10px;">
					<div class="continue-buy">
						<span>TIẾP TỤC MUA SẮM</span>
					</div>
				</a>
			</div>
		</div>
	</div>
	</div>
<?php
    }else {
        echo '<span class="not-order">BẠN CHƯA CÓ ĐƠN HÀNG NÀO</span>
            <a href="../" class="tag-a">
                <div class="continue_view continue_view1" >
                    <i class="fas fa-long-arrow-alt-left"></i>
                    <span>QUAY LẠI CỬA HÀNG</span>
                </div>
            </a>';
		}
	}else {
        echo '<span class="not-order">BẠN CHƯA CÓ ĐƠN HÀNG NÀO</span>
            <a href="../" class="tag-a">
                <div class="continue_view continue_view1" >
                    <i class="fas fa-long-arrow-alt-left"></i>
                    <span>QUAY LẠI CỬA HÀNG</span>
                </div>
            </a>';
}
?>
<?php
    include_once ($baseUrl.'FE/layouts-FE/footer.php');
?>
<script src="../FE/js/index.js"></script>