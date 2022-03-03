<?php
    //session_start();
    require_once ('../../utils/ulitity.php');
    require_once ('../../database/dbhelper.php');
    require_once ('../process_change.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Đổi mật khẩu</title>
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
				<h2 class="text-center">Đổi mật khẩu</h2>
                <div style="color: red;text-align:center;"><?=$msg?></div>
			</div>
            <form action="" method="post">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="usr1">Mật khẩu hiện tại:</label>
                        <input required="true" type="password" class="form-control" id="usr1" name="pws" minlength="6">
                    </div>
                    <div class="form-group">
                        <label for="usr2">Mật khẩu mới:</label>
                        <input required="true" type="password" class="form-control" id="usr2" name="newpws" minlength="6">
                    </div>
                    <div class="form-group">
                        <label for="usr3">Nhập lại mật khẩu mới:</label>
                        <input required="true" type="password" class="form-control" id="usr3" name="rnewpws">
                    </div>
                    <button type = "submit" class="btn btn-success">Đổi mật khẩu</button>
                </div>
            </form>
		</div>
	</div>
</body>
</html>