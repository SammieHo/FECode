<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../../assets/css/reset.css">
	<link rel="stylesheet" href="../../assets/css/iconfont.css">
	<link rel="stylesheet" href="../css/style.css">
</head>
<?php 

require_once(dirname(__FILE__)."/../../class/fun/CAdminAdmin.php");

if (isset( $_GET['page']) && (int)$_GET['page']>0) 
{
    $page = $_GET['page'];
}
else
{
    $page=1;
}

$aa = new CAdminAdmin( );

 ?>
<body>
	<table>
		<thead>
			<tr>
				<th>用户名</th>
				<th>密码</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
<?php 
	$res = $aa->GetAllAdminInfo( $page );
	$num = $aa->GetResultNum( );

	for( $i=0 ; $i<$num ; $i++ )
	{
		$id = $res[$i]['id'];
		$pwd = $res[$i]['pwd'];
		print<<<EOT
			<tr>
				<td>{$id}</td>
				<td>{$pwd}</td>
				<td>
					<form action="DelAdmin.php?id={$id}" method="post" enctype="multipart/form-data">
					<a href="#">
						<i class="iconfont icon-mes"></i>
						<input type="submit" name="del" value="Delete">
					</a>
					</form>
				</td>
			</tr>
	
EOT;
	}
?>
		</tbody>
	</table>
	<div class="pages">
<?php 
	
	$pre = $page-1;
	$nex = $page+1; 
	if( $page==1 )
	{
		print<<<EOT
			<a href="" class="cancel">上一页</a>
EOT;
	}
	else
	{
		print<<<EOT
		<a href="?page=$pre" >上一页</a>
EOT;
	}
	
	$p = $aa->GetPCount( );

	for( $i=1 ; $i<=$p ; $i++ )
	{
		if( $i==$page )
		{
			print<<<EOT
				<a href="?page={$i}" class="active">{$i}</a>
EOT;
		}
		else
		{
			print<<<EOT
			<a href="?page={$i}">{$i}</a>
EOT;
		}
	}

	if( $page==$p )
	{
		print<<<EOT
			<a href="" class="cancel">下一页</a>
EOT;
	}
	else
	{
		print<<<EOT
		<a href="?page=$nex" >下一页</a>
EOT;
	}
?>
	</div>
</body>
</html>