 <?php
    //session_start();
    require_once ('../../utils/ulitity.php');
    require_once ('../../database/dbhelper.php');
    require_once ('../process_register.php');

?> 

<!DOCTYPE html>
<html>
<head>
	<title>Đăng ký</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!-- Icon -->
</head>
<style>     
    .container {
        width: 500px;
        margin-top: 50px;
    }
</style>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Đăng ký tài khoản</h2>
                 <div style="color: red;text-align:center;"><?=$msg?></div>
			</div>
            <form action="" method="post">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="usr">Họ và tên:</label>
                        <input required="true" type="text" class="form-control" id="usr" name="fullname">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input required="true" type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="usr">Tên đăng nhập:</label>
                        <input required="true" type="text" class="form-control" id="TenDN" name="TenDN" minlength="10">
                    </div>
                    <div class="form-group">
                        <label for="MatKhau">Mật khẩu:</label>
                        <input required="true" type="password" class="form-control" id="MatKhau" name="MatKhau" minlength="6">
                    </div>
                    <div class="form-group">
                        <label for="confirmation_pwd">Nhập lại mật khẩu:</label>
                        <input required="true" type="password" class="form-control" id="confirmation_pwd" name="confirmation_pwd" >
                    </div>
                    <div class="form-group">
                        <span><a href="../login">Bạn đã có tài khoản?</a></span>
                    </div>
                    <button class="btn btn-success">Đăng ký</button>
                </div>
            </form>
		</div>
	</div>
</body>

</html>