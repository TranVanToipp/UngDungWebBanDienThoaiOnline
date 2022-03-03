<?php
    require_once ('utils/ulitity.php');
    require_once ('database/dbhelper.php');
?>
<?php
	$title = 'Trang chủ';
	$baseUrl = '';
    include_once ('FE/layouts-FE/header.php');
?>
<style> 
	.nav-item:nth-child(1) {
		background-color: #c1c1c1;
	}
    .wide-nav-items-span {
        color: #777;
    }
    .danhmuc-trangchu {
        color: #000 !important;
    }
</style>
<div class="main">
    <div class="main-content">
		<!-- Sản phẩm Nổi Bật -->
		<?php
			include_once'./FE/sanpham/sanphambanchay.php';
		?>
        <!-- Sản phẩm chinh -->
        <?php
			include_once'./FE/sanpham/sanphamchinh.php';
		?>
        <div class="grid wide policy">
            <div class="row">
                <div class="col l-4">
                    <div class="icon-cart-ship icon-policy">
                        <i class="fas fa-truck"></i>
                    </div>
                    <div class="policy-title">
                        <span>Giao Hàng Toàn Quốc</span>
                    </div>
                    <div class="policy-content">
                        <span>Ship COD toàn quốc. Nhận hàng trong vòng 2-3 ngày</span>
                    </div>
                </div>
                <div class="col l-4 return-free">
                    <div class="icon-cart-ship icon-policy">
                        <i class="fas fa-undo"></i>
                    </div>
                    <div class="policy-title">
                        <span>Hoàn Trả Miễn Phí</span>
                    </div>
                    <div class="policy-content">
                        <span>Xem hàng trước khi nhận. Hoàn trả miễn phí nếu không hài lòng</span>
                    </div>
                </div>
                <div class="col l-4">
                    <div class="icon-cart-ship icon-policy">
                        <i class="fas fa-home"></i>
                    </div>
                    <div class="policy-title">
                        <span>Bảo hành 1 năm</span>
                    </div>
                    <div class="policy-content">
                        <span>Bảo hành 1 năm. Lỗi 1 đổi 1 tất cả các sản phẩm của Apple</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include_once ('FE/layouts-FE/footer.php');
?>
<script src="<?=$baseUrl?>FE/js/cuahang.js"></script>
<script src="<?=$baseUrl?>FE/js/index.js"></script>

