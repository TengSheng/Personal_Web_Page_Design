<?php
	session_name("admin");
	session_start();
	$adname=$_SESSION['adname'];
	
    include("../connect.php");
    
    if(isset($_POST["submit"]) && $_POST["submit"] == "发布公告"){
        
    	$content=$_POST["content"];
    	
    	$sql = "INSERT INTO `ad_announcement`(`content`, `date`) VALUES ('$content',now() )";
        $result = mysql_query($sql);        
   }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<style>
			.class_text{
				width: 500px;height: 100px;				
			}
			.class_div_1{
				position: absolute;
				top: 50px;
				left:180px;
			}
			.class_div_2{
				position: absolute;
				top: 155px;
				left: 180px;
			}
			.class_div_5{
				position: absolute;
				top: 170px;
				left: 180px;
			}
			.class_div_3{
				width: 500px;	
				background: lightcyan;
			}
			.class_div_4{
				width: 500px;
				background: lawngreen;
			}
		</style>
		<script>			
			function CheckPost(){
				if(myform3.content.value=="")
				{
					alert("必须填写内容！");
					myform3.content.focus();
					return false;
				}
			}
		</script>
	</head>
	<body style="background-image: url(../bg_image/05.jpg);background-size: 1100px;position: relative;">
		<hr />
		<form action="ad_announcement.php" method="post" name="myform3" onsubmit="return CheckPost();"> 
			<br />
			<div class="class_div_1">
				<textarea type="text" name="content" class="class_text" placeholder="说点什么吧"></textarea><br />
			</div>
			<div class="class_div_2">
				<input type="submit" name="submit" value="发布公告" />
			</div>	        
        </form> 
		<form action="" method="post" name="myform1" style="position: relative;">		    
		    <div class="class_div_5">
		    </div>         
        </form>
	</body>
</html>