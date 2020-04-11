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
		    	width: 500px;
		    	border: 1px solid black;
		    	
		  	    position: absolute;
		  	    top: 50px;
		  	    left: 180px;
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
				<th colspan="2" style="border-bottom: 1px solid black;background: #ADD8E6;"><h3>管理员信息</h3></th>
			</tr>
			<tr bgcolor="#20B2AA">
				<td style="width: 250px;">管理员名</td>
				<td style="width: 250px;">密码</td>

			</tr>
			<?php
			    $sql = "SELECT * FROM `admin` ";  
                $result = mysql_query($sql);  
                while($row = mysql_fetch_array($result))
                {                
			?>
			<tr bgcolor="#ADD8E6">
				<td><?php echo $row['uname'] ?></td>				
				<td><?php echo $row['upwd'] ?></td>
			</tr>
			<?php
			    }
			?>
		</table>
	</body>
</html>