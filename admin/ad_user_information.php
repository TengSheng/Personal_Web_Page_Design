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
		    	width: 900px;
		    	border: 1px solid black;
		    	
		  	    position: absolute;
		  	    top: 50px;
		  	    left: 10px;
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
				<th colspan="7" style="border-bottom: 1px solid black;background: #ADD8E6;"><h3>用户信息</h3></th>
			</tr>
			<tr bgcolor="#20B2AA">
				<td style="width: 80px;">用户名</td>
				<td style="width: 80px;">密码</td>
				<td style="width: 35px;">性别</td>
				<td style="width: 100px;">注册日期</td>
				<td style="width: 35px;">血型</td>
				<td style="width: 350px;">家庭住址</td>
				<td style="width: 250px;">个人说明</td>
			</tr>
			<?php
                $sql_1 = "SELECT * FROM `user_information`";  
                $result_1= mysql_query($sql_1); 

                while($row_1 = mysql_fetch_array($result_1))
                {   
                	$user_name=$row_1['name'];
                	$sql = "SELECT * FROM `user` WHERE name='$user_name' ";  
                    $result = mysql_query($sql); 
                    $row = mysql_fetch_array($result);  
  
			?>
			<tr bgcolor="#ADD8E6">
				<td><?php echo $row_1['name'] ?></td>
				<td><?php echo $row['pwd'] ?></td>
				<td><?php echo $row_1['gender'] ?></td>
				<td><?php echo $row_1['birthday'] ?></td>
				<td><?php echo $row_1['blood'] ?></td>
				<td><?php echo $row_1['address'] ?></td>
				<td><?php echo $row_1['introduction'] ?></td>
			</tr>
			<?php
			    }
			?>
		</table>
	</body>
</html>