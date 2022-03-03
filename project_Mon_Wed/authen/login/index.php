<?php
    // session_start();
    require_once ('../../utils/ulitity.php');
    require_once ('../../database/dbhelper.php');
    require_once ('../process_login.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Đăng nhập</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <meta content='maximum-scale=1.0, initial-scale=1.0, width=device-width' name='viewport'>
</head>
<style>     
    .container {
        width: 500px;
        margin-top: 50px;
    }
    @media  (max-width:740px) {
        .container {
            width: auto !important;
        }
        .title {
            font-size: 35px !important;
        }
    }
	.btn-forget{
		 margin-left: 188px;

	}
</style>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="title" class="text-center">Đăng nhập tài khoản</h2>
                <div style="color: red;text-align:center;"><?=$msg?></div>
			</div>
            <form action="" method="post">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="TenDN">Tên Đăng Nhập hoặc Email:</label>
                        <input required="true" type="text" class="form-control" id="TenDN" name="TenDN">
                    </div>
                    <div class="form-group">
                        <label for="MatKhau">Mật khẩu:</label>
                        <input required="true" type="password" class="form-control" id="MatKhau" name="MatKhau" minlength="6">
                    </div>
                    <div class="form-group">
                        <span><a href="../register">Đăng kí tài khoản mới</a></span>
						<span><a href="../forget/forget" class="btn-forget">Quên Mật Khẩu</a></span>
                    </div>
                    <button class="btn btn-success">Đăng nhập</button>
                </div>
            </form>
		</div>
	</div>
</body>
</html>