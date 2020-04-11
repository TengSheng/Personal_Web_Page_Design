<?php
	session_name("admin");
	session_id("admin");
	session_start();
	
//	if(isset($_SESSION['adname']))
//	{
//		echo session_name();
//		$tiaozhuan='ad_frame.php';//页面地址
//		header('Location:'.$tiaozhuan);//跳转页面
//	}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		
		<link rel="stylesheet" href="css/login.css"/>
		<style type="text/css">
		a{
                text-decoration:none;
                font-size:20px;
                color:blue;
            }
		</style>
		<script type="text/javascript">
		    function changeCode(){
                var img=document.getElementById('img');
                img.setAttribute('src','yanzhen.php?r='+Math.random());
           }
		</script>
		
	</head>
	<body bgcolor="lightcyan" style="text-align: center;position: relative;" >
		
		<h2>欢迎进入登陆界面</h2>
		<hr style="border: 1px solid black;"/><br /><br />
		<form action="login.php?sid=<?php echo session_id();?>" name="formName" class="class_form" enctype="multipart/form-data" method="post" >
			<div class="class_user">
				<label for="name_user" >
					<i class="iconfont" >&#xe6a3;</i>
				</label>
				<input type="text" name="name" id="id_name" class="name_user" placeholder="请输入用户名"/>
			</div><br /><br />
			<div class="class_password">
				<label for="psw">
					<i class="iconfont">&#xe8d5;</i>
				</label>
				<input type="password" name="pwd" id="id_psw" class="name_psw" placeholder="请输入密码"/>
			</div>
			<div class="class_amdin">
				<label for="admin">管理员</label><input type="radio" name="identity" id="admin" value="1" checked="checked"> 
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label for="user">用户</lable><input type="radio" name="identity" id="user" value="2">
				<!--<label for="visitor">游客</lable><input type="radio" name="identity" id="visitor" value="3">--> 	
			</div><br />
			<div class="class_remeber">
				验证码: <input name="code" style="width: 80px;"/>&nbsp;				
                <a href="javascript:void(0)" onclick="changeCode()">
                	<img id="img" src="yanzhen.php" onclick="changeCode()" style="position: absolute;top: 6px;"/>
                </a>&nbsp;<br />
			</div>
			<div class="class_submit">
				<input type="submit" name="submit" value="登录" class="submit"/>
				<a href="register1.php"><input type="button" name="register" value="立即注册" class="register"/></a>	
			</div>
			
		</form>
		
	</body>
</html>
