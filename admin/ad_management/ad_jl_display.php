<?php
    include("../../connect.php");
   
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
				width: 600px;height: 500px;
				/*border: 1px solid black;*/
				position: absolute;
				top: 20px;
				left: 100px;
			}
			.class_div_2{				
				position: absolute;
				top: 10px;
				left: 50px;
			}
			.class_div_3{
				width: 500px;height: 439px;
				/*border: 1px solid black;*/
				
				position: absolute;
				top: 60px;
				left: 50px;
			}
		</style>
	</head>
	<body style="background: lavender;position: relative;">
		<hr />
		<div class="class_div_1">	
		<form action="" method="post" name="myform1" class="class_form">
			<div class="class_div_2">
			   	标题：<?php echo '《'.$row['title'].'》'?><br />作者：&nbsp;&nbsp;&nbsp;<?php echo $row['auther']?>
		    </div>      
			           <!--用户：<?php echo $row['user']?>-->  
            <div class="class_div_3">
            	内容：<br />
            	<?php echo htmltocode($row['content'])?>
            </div> 		    
		</form>	
		</div>
	</body>
</html>