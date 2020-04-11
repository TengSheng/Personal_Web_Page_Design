<?php
    session_name("admin");
	session_start();

    $user_name=$_GET['user_name'];
    $name=$_SESSION[$user_name];
	
    include("../connect.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
		<style type="text/css">
			.class_div_form{
				width: 600px;height: 550px;
				border: 1px solid black;
				background: white;
				
				position: absolute;
				top: 10px;
				left: 350px;
			}
			div{
				width: 600px;height: 40px;
			}
			a{
				text-decoration: none;
				color: blue;
			}
			.headimg{				
				width: 40px;height: 40px;
				border: 1px solid black;
				border-radius: 20px;
				
				position: absolute;
				top: 3px;
				left: 100px;
			}
		</style>
	</head>
	<body style="background-image: url(../bg_image/16.jpg);background-size: 1366px,800px;position: relative;">
		<hr />
		<div class="class_div_form">
		    <hr />
			<div class="class_div_title">
				个人信息查看||<a href="user_information.php?user_name=<?php echo $user_name;?>">个人信息修改</a>||<a href="user_pwd_change.php?user_name=<?php echo $user_name;?>">密码修改</a>
			</div><hr />			
			<?php
			$sql_insert1 = "SELECT `headimg`,`nickname`, `gender`, `blood`, `birthday`, `address`, `introduction` FROM `user_information` WHERE name='$name'";
			$res_insert1 = mysql_query($sql_insert1);
			$row = mysql_fetch_array($res_insert1);
			?>
			<div class="class_div_headimg" style="position: relative;">
				<span style="position: absolute;top: 15px;">&nbsp;&nbsp;头&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;像：</span>
				<img src="<?php echo $row['headimg']?>" name="headimg" class="headimg" />
			</div><hr />
			<div class="class_div_nickname">
				<span >&nbsp;&nbsp;昵&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;称：</span><?php echo $row['nickname']?>
			</div><hr />
			<div class="class_div_gehder">
				<span>&nbsp;&nbsp;性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：</span><?php echo $row['gender']?>
			</div><hr />
			<div class="class_div_blood">
				<span>&nbsp;&nbsp;血&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;型：</span><?php echo $row['blood']?>
			</div><hr />
			<div class="class_div_birthday">
				<span>&nbsp;&nbsp;生&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;日：</span><?php echo $row['birthday']?>
			</div><hr />
		    <div class="class_div_address">
		    	<span>&nbsp;&nbsp;家庭地址：</span><?php echo $row['address']?>		    
		    </div><hr />
		    <div class="class_div_introduction">
		    	<span>&nbsp;&nbsp;个人说明：</span><?php echo htmltocode($row['introduction'])?>
		    </div><hr /> 
					
		</div>
	</body>
</html>