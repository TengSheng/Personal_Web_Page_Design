<?php
	session_name("admin");
	session_start();

	$user_name=$_GET['user_name'];
    $name=$_SESSION[$user_name];
	
    include("../../connect.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<style type="text/css">
			.headimg{				
				width: 40px;height: 40px;
				border: 1px solid black;
				border-radius: 20px;
				
				position: absolute;
				top: 0px;
			}
		</style>
	</head>
	<body style="background-image: url(../../bg_image/16.jpg);background-size: 1366px,800px;position: relative;">
		<?php 
			$sql_insert1 = "SELECT `headimg` FROM `user_information` WHERE name='$name'";
			$res_insert1 = mysql_query($sql_insert1);
			$row_insert1 = mysql_fetch_array($res_insert1);
		?>
		
		<h1 align="center" style="position: relative;">
			欢迎访问&nbsp;<img src="../<?php echo $row_insert1['headimg'] ?>" class="headimg"/>
			&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $name;?>的个人网站！
		</h1>
	</body>
</html>