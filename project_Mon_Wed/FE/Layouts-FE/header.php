<?php
    $baseURL = '';
    ob_start();
    session_start();
    require_once ($baseUrl.'utils/ulitity.php');
    require_once ($baseUrl.'database/dbhelper.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- <link rel="stylesheet" href="../css/main.css"> -->
    <link rel="stylesheet" href="<?=$baseUrl?>FE/layouts-FE/css/main.css">
    <link rel="stylesheet" href="<?=$baseUrl?>FE/layouts-FE/css/grid.css">
    <link rel="stylesheet" href="<?=$baseUrl?>FE/layouts-FE/css/home.css">
    <link rel="icon" href="https://tonycongmmo.com/wp-content/uploads/2020/09/cropped-landingpage-clean-studio-logo-4-flatsome-theme-uxbuilder-32x32.png" sizes="32x32" />
    <link rel="icon" href="https://tonycongmmo.com/wp-content/uploads/2020/09/cropped-landingpage-clean-studio-logo-4-flatsome-theme-uxbuilder-192x192.png" sizes="192x192" />
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <title>Trang chủ</title>
	<style>
		body{
            width: 100%;
			height: auto;
		}
		.running{
            width: inherit;
            height: 28px;
            background-color: #fff;
            margin: 0px auto;
            vertical-align: middle;
            font-size: 20px;
            margin-top:5px
		}
	</style>
</head>
<body>
	
    <div class="wrapper">
        <header class="header">
            <div class="header-wrapper">
                <div class="masthead">
                    <div class="grid wide header-masthread">
                        <label for= "nav-mobile-input" class="icon-bar-mobile">
                            <i class="fas fa-bars"></i>
                        </label>
                        <!-- Logo -->
                        <div class="logo">
                            <a href="<?=$baseUrl?>">
                                <img src="<?=$baseUrl?>FE/img/logo1.png" alt="Ảnh logo giao diện chính" class="logo-img">
                            </a>
                        </div>
                        <!-- TÌm kiếm -->
                        <div class="masthead-search">
                            <div class="masthead-search-box">
                                <form action="../../../../../project_Mon_Wed/search" class="header-search-form">
                                    <input name="search" type="text" placeholder="Tìm kiếm điện thoại, phụ kiện" class="header-search-input">
                                    <button type="submit" class="header-search-icon">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="masthead-right">
                            <div class="masthead-right-box">
                            <!-- Giỏ hàng chỗ này nhé-->
                            <?php
                                include_once $baseUrl.'FE/giohang/giohang.php';
                            ?>
                            <!-- Đăng kí chỗ này-->
                            <?php
                                if(isset($_SESSION['TenDN'])) {
                                    echo '
                                    <div class="user">
                                        <div class="user_name">
                                            <span class="" >'.$_SESSION['user'].'</span>
                                            <i class="fas fa-caret-down"></i>
                                        </div>
                                        <div class="infor_user">
                                            <a href="../../../../../project_Mon_Wed/authen/change/doimatkhau"><span>Đổi Mật Khẩu</span></a>
                                            <a href="../../../../../project_Mon_Wed/detail-bil"><span>Thông tin đơn hàng</span></a>
                                            <a href="'.$baseUrl.'authen/logout.php" class="tag-a logout"><span>Đăng xuất</span></a>
                                        </div>
                                    </div>
                                    ';
                                }else {
                                    include_once $baseUrl.'authen/dangki.php';
                                    include_once $baseUrl.'authen/dangnhap.php';
                                }
                            ?>
                        </div>
                    </div>
                    <!-- Danh mục ở đây -->
                </div>
				<ul class="wide-nav-ul">
					<li class="wide-nav-items  tag-li">
						<a href="../../../../../project_Mon_Wed" class="tag-a">    
							<span class="wide-nav-items-span danhmuc-trangchu" style="text-transform: uppercase;">trang chủ</span>
						</a>
					</li>
					<li class="wide-nav-items  tag-li">
						<a href="../../../../../project_Mon_Wed/category/dienthoai" class="tag-a">    
							<span class="wide-nav-items-span danhmuc-dienthoai" style="text-transform: uppercase;">điện thoại</span>
						</a>
					</li>
					<li class="wide-nav-items  tag-li">
						<a href="../../../../../project_Mon_Wed/category/phukien" class="tag-a">    
							<span class="wide-nav-items-span danhmuc-phukien" style="text-transform: uppercase;">phụ kiện</span>
						</a>
					</li>
					<li class="wide-nav-items  tag-li">
						<a href="../../../../../project_Mon_Wed/category/lienhe" class="tag-a">    
							<span class="wide-nav-items-span danhmuc-lienhe" style="text-transform: uppercase;">Liên Hệ</span>
						</a>
					</li>
					<?php
						if(isset($_SESSION['TenDN'])){
							if($_SESSION['LTK']=="Admin"){
							echo '<li class="wide-nav-items  tag-li">
									<a href="../../../../../project_Mon_Wed/admin" class="tag-a">    
										<span class="wide-nav-items-span danhmuc-quanli" style="text-transform: uppercase;">Quản lí</span>
									</a>
								</li>';
							}
						}
					?>
				</ul>
            </div>
		</div>
	</header>
</div>
</body>
</html>
<!-- <script src="<?=$baseUrl?>FE/js/cuahang.js"></script> -->
<script src="<?=$baseUrl?>FE/js/index.js"></script>
