<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../../assets/css/reset.css">
	<link rel="stylesheet" href="../css/style.css">
</head>
<?php 
require_once(dirname(__FILE__)."/../../class/role/CAdmin.php");

session_start( );
$_SESSION['Admin-ID']="123456";

$admin = $_SESSION['Admin-ID'];

$ca = new CAdmin( $admin );
 ?>
<body>
	<form action="ModifyPwd.php" class="modify" enctype="multipart/form-data" method="post">
		<fieldset>
			<label>
				用户名：<span><?php echo $ca->GetUser(); ?></span>
			</label>
		</fieldset>
		<fieldset>
			<label>
				旧密码：<input type="password" name="Opassword" placeholder="请输入旧的密码">
			</label>
		</fieldset>
		<fieldset>
			<label>
				新密码：<input type="password" name="Npassword" placeholder="请输入新的密码">
			</label>
		</fieldset>
		<button type="submit">确认</button>
	</form>
</body>
</html>