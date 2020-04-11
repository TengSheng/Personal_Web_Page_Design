<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>注册</title>	
		<!--<link rel="shortcut icon" herf="8.ico" type="image/x-icon"/>-->
		<link rel="stylesheet" href="css/register.css"/>
		<script type="text/javascript" src="js/register.js">			 
		</script>
	</head>
	<body style="position: relative;background: lightblue;">
		<h1 align="center">欢迎注册本系统用户</h1>
		<hr>
		<form action="register.php" class="class_form" method="post" name="regForm">
			<div class="class_div_name">
				<label for="" style="font-size: 17px;">用户：</label><input type="text" name="name" id="div_id_name" class="div_class_name" placeholder="请输入用户名" onBlur="ckUsername()"/>
			</div>
			<span class="class_span1" id="id_span1"></span>
			<div class="class_div_psw">
				<label for="" style="font-size: 17px;">密码：</label><input type="password" name="psw1" id="div_id_psw1" class="div_class_psw" placeholder="请输入密码" onBlur="ckPwd1()"/>
			</div>
			<span class="class_span2" id="id_span2"></span>
			<div class="class_div_repsw">
				<label for="" style="font-size: 17px;">确认：</label><input type="password" name="psw2" id="div_id_psw2" class="div_class_psw" placeholder="请再次输入密码" onBlur="ckPwd2()"/>							   
			</div>
			<span class="class_span3" id="id_span3"></span>
			<div class="class_div_gehder">
				<span>性别：</span><input type="radio" name="gender" id="man" value="男" checked="checked"/><label for="man">男</label>&nbsp;&nbsp;&nbsp;&nbsp;
				                  <input type="radio" name="gender" id="woman" value="女"/><label for="woman">女</label>
			</div>			
			<div class="class_div_birthday">
				<span>生日：</span><input type="date" name="date" style="width: 195px;"/>
			</div>
			<div class="class_div_submit">
				<input type="submit" name="submit" value="提交" id="submit" class="div_class_submit" onClick="mySubmit()"/>
				<a href="login_1.php"><input type="button" name="login" value="登录" class="login"/></a>	
			</div>
			
		</form>
		<div class="div_buttom">
			<address>个人网页设计与实现&copy;版权所有 翻版必究</address>
		</div>
		
	</body>
</html>
