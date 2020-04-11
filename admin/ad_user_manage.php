<?php
    session_name("admin");
	session_start();
	$adname=$_SESSION['adname'];
	
    include("../connect.php");

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<style type="text/css">
		    .class_table{
		    	width: 570px;
		    	border: 1px solid black;
		    	
		  	    position: absolute;
		  	    top: 50px;
		  	    left: 150px;
		    }
			th{
    	       border: 0px;
            }
            td{
    	       border: 0px;
            }
		</style>
	</head>
	<body style="background-image: url(../bg_image/05.jpg);background-size: 1100px;position: relative;">
		<table border="" cellspacing="" cellpadding="" class="class_table">
			<tr>
				<th colspan="8" style="border-bottom: 1px solid black;background: #ADD8E6;"><h3>用户权限/密码设置</h3></th>
			</tr>
			<tr bgcolor="#20B2AA">
				<td style="width: 100px;">用户名</td>
				<td style="width: 50px;">性别</td>
				<td style="width: 100px;">注册日期</td>
				<td style="width: 50px;">登录</td>
				<td style="width: 50px;">级别</td>
				<td style="width: 70px;">权限设置</td>				
				<td style="width: 80px;">密码设置</td>
				<td style="width: 70px;">级别设置</td>
			</tr>
			<?php
			    $sql = "SELECT * FROM `user` ";  
                $result = mysql_query($sql);  
                while($row = mysql_fetch_array($result))
                {                
			?>
			<tr bgcolor="#ADD8E6">
				<td><?php echo $row['name'] ?></td>				
				<td><?php echo $row['sex'] ?></td>
				<td><?php echo $row['date'] ?></td>
				<td><?php echo $row['login_limit'] ?></td>
				<td><?php echo $row['grade'] ?></td>
				<td>
					<a href="ad_login_limit.php?admin_id=<?php echo $row['id'] ?>"><input type="button" name="btn_1" value="yes/no" id="btn" class="btn"/></a>
				</td>				
				<td>
					<a href="ad_pwd_change.php?admin_id=<?php echo $row['id'] ?>"><input type="button" name="btn_2" value="密码重置" id="btn" class="btn"/></a>
				</td>
				<td>
					<a href="ad_grade.php?admin_id=<?php echo $row['id'] ?>"><input type="button" name="btn_3" value="高级/普通" id="btn" class="btn"/></a>
				</td>
			</tr>
			<?php
			    }
			?>
		</table>
	</body>
</html>