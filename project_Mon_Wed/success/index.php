<?php
    //include_once("../bootstrap-4.3.1-dist/css/bootstrap.css");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../bootstrap-4.3.1-dist/css/bootstrap.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .name{
        font-size: 10px;
    }
</style>
<body>
<div class="order-success">
    <div class="order-success-title">
        <i class="fas fa-check-circle"></i>
        <img class="name" src="../FontEnd/Layouts-fontend/img/success.svg" alt="Hình logo nhận hàng">
        <span>ĐẶT HÀNG THÀNH CÔNG</span>
    </div>
    <div class="infor-order1">
        <div class="infor-order1-1">
            <span>Chào</span>
            <!-- <p class="user_name_success"><?=$user_name?></p> -->
            <span>, đơn hàng của bạn với mã</span>
        </div>
        <div class="infor-order1-2">
            <!-- <p class="ma-don-hang"><?='SHINESKY00'.$user_id.'vsny'?></p>  -->
            <span>đã được đặt thành công.</span>
        </div>
    </div>
    <div class="infor-order2"><span>Đơn hàng của bạn đã được xác nhận tự động</span></div>
    <div class="infor-order3">
        <span>Hiện tại do đang trong Chương trình Sale lớn,đơn hàng của quý khách sẽ gửi chậm hơn so với thời gian 
            dự kiến từ 3-5 ngày. Rất mong quý khách thông cảm vì sự bất tiện này!
        </span>
    </div>
    <div class="infor-order4">
        <span>(Lưu ý: Shop điện thoại sẽ không gọi xác nhận đơn hàng của bạn, đơn hàng sẽ được xử lý và sẽ giao cho bạn trong thời gian sớm nhất)</span>
    </div>
    <div class="infor-order5">
        <span>Cảm ơn  </span>
        <!-- <p><?=$user_name?></p> -->
        <span>đã tin dùng sản phẩm của Shop</span>
    </div>
    <div class="success-btn">
        <a href="../detail" class="tag-a">
            <div class="view-detail">
                <span>XEM CHI TIẾT ĐƠN HÀNG</span>
            </div>
        </a>
        <a href="#" class="tag-a">
            <div class="continue-buy">
                <span>TIẾP TỤC MUA SẮM</span>
            </div>
        </a>
    </div>
    
</div>

<?php
    //include_once ($baseUrl.'FE/layouts_FE/footer.php');
?>
</body>
</html>