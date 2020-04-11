<?php
    $id_1=$_GET['id'];
    $friend_name=$_GET['friend_name'];
    
	include("../connect.php");
	
	$sql_1="SELECT `name` FROM `user` WHERE id=".$id_1;
	$result_1=mysql_query($sql_1);
	$row_1 = mysql_fetch_array($result_1);

	$name=$row_1['name'];
   
    $id=$_GET['journal_id'];
   
    $sql=$sq=" SELECT `title`, `content`, `auther` FROM `user_journal` WHERE id=".$id;
    $result = mysql_query($sq);  
    $row = mysql_fetch_array($result);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<style>
			.class_form{
				width: 700px;height: 500px;
				position: absolute;
				top: 10px;
				left: 300px;
			}
			.class_div_2{				
				position: absolute;
				top: 10px;
				left: 50px;
			}
			.class_div_3{
				width: 700px;
				background: white;		
				position: absolute;
				top: 60px;
				left: 50px;
			}
		</style>
	</head>
	<body style="background-image: url(../bg_image/16.jpg);background-size: 1366px,800px;position: relative;">
		<hr />
		<div class="class_div_1">	
		<form action="" method="post" name="myform1" class="class_form">
			<div class="class_div_2">
			   	标题：<?php echo '《'.$row['title'].'》'?><br />
			   		作者：<?php echo $row['auther']?>
		    </div>      
			           <!--用户：<?php echo $row['user']?>-->  
            <div class="class_div_3">
            	<!--内容：<br />-->
            	<?php echo htmltocode($row['content'])?>
            </div> 		    
		</form>	
		</div>
	</body>
</html>