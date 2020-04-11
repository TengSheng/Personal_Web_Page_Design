<?php
    include("../../connect.php");
   
    $id=$_GET['journal_id'];
   
    $sql=" SELECT `title`, `content`, `auther` FROM `user_journal` WHERE id=".$id;
    $result = mysql_query($sql);  
    $row = mysql_fetch_array($result);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<style>
			.class_form{
				width: 700px;
				border: 1px solid black;
				background: lightskyblue;
				
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
				width: 700px;height: 420px;
				/*border: 1px solid black;*/
				position: absolute;
				top: 60px;
				/*left: 50px;*/
			}
		</style>
	</head>
	<body style="background:lavender;position: relative;">
		<hr />
		<div class="class_div_1">	
		<form action="" method="post" name="myform1" class="class_form">
			<div class="class_div_2">
			   	标题：<?php echo '《'.$row['title'].'》'?><br />
			   	作者：&nbsp;&nbsp;&nbsp;<?php echo $row['auther']?>
		    </div>      

            <div class="class_div_3">
            	<!--内容：<br />-->
            	<?php echo htmltocode($row['content'])?>
            </div> 		    
		</form>	
		</div>
	</body>
</html>