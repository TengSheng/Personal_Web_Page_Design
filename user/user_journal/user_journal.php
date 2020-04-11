<?php
	session_name("admin");
	session_start();
	
	$user_name=$_GET['user_name'];
    $name=$_SESSION[$user_name];
	
    include("../../connect.php");
    
    if(isset($_POST["submit"]) && $_POST["submit"] == "发表"){
    	
    	$title=$_POST["title"];
    	$content=$_POST["content"];
    	$sql = "INSERT INTO `user_journal`(`title`,`date`,`content`,`auther` ) VALUES ('$title',now(),'$content','$name' )";
        $result1 = mysql_query($sql);  
        
        if($result1){
        	echo "<script>alert('日志成功发表！');</script>";
        }else{
        	echo "<script>alert('日志未发表！');</script>";
        }
    }
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<style>
		*{margin: 0px;padding: 0px;}
			.class_form{
				width: 1080px;height: 500px;
				border: 1px solid black;
				position: absolute;
				top: 10px;
				left: 140px;
			}
			.class_div_2{				
				position: absolute;
				top: 10px;
				left: 70px;
			}
			.class_div_3{
				position: absolute;
				top: 60px;
				left: 70px;
			}
			.class_div_4{
				position: absolute;
				top: 450px;
				left: 70px;
			}
			.class_submit{
				width: 100px;height: 40px;
				background: lightblue;
			}
		</style>
		<script type="text/javascript" src="../../ckeditor/ckeditor.js" ></script>
	</head>
	<body style="background-image: url(../../bg_image/16.jpg);background-size: 1366px,800px;position: relative;">
		<hr />
		<div class="class_div_1">	
		<form action="" method="post" name="myform1" class="class_form">
			<div class="class_div_2">
			   	<p style="font-size: 20px;margin: 0px;">标题：</p>
			   	<input type="text" name="title" class="class_text_1" placeholder="题目" style="width: 960px;height: 21px;"/>
		    </div>      
			           <!--用户：<?php echo $row['user']?>-->  
            <div class="class_div_3">
            	<p style="font-size: 20px;margin: 0px;">日志内容：</p><br />
            	<textarea name="content" class="class_text" placeholder="写文章" style="width: 350px;height: 400px;"></textarea>
                <script type="text/javascript">CKEDITOR.replace('content')</script>
            </div> 	
			<div class="class_div_4">
		    	<input type="submit" name="submit" value="发表" class="class_submit"/>
		    </div>		    
		</form>	
		</div>
	</body>
</html>