 <?php
    session_start();
    require_once ('../utils/ulitity.php');
    require_once ('../database/dbhelper.php');
    require_once ('xacnhan_register.php');
?> 
<!DOCTYPE html>
<html>
<head>
	<title>Xác nhận</title>
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
				<h2 class="text-center">Xác nhận tài khoản</h2>
                <div style="color: red;text-align:center;"><?=$msg?></div>
			</div>
            <form action="" method="post">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="usr">Nhập mã xác nhận:</label>
                        <input required="true" type="text" class="form-control" id="usr" name="xacnhan">
                    </div>
                    <button type = "submit" class="btn btn-success">Xác nhận</button>
                </div>
            </form>
		</div>
	</div>
</body>

</html>