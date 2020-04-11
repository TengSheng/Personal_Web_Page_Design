<?php
    session_name("admin");
	session_start();

    $user_name=$_GET['user_name'];
    $name=$_SESSION[$user_name];
	
    include("../connect.php");
    
    if(isset($_POST['submit'])&&$_POST['submit']=="修改密码")
    {
   	    $pwd1=$_POST['psw1'];
   	    $pwd2=$_POST['psw2'];
   	    
   	    if($pwd1==$pwd2)
   	    {
   	        $sql="UPDATE `user` SET `pwd`='$pwd2' WHERE name='$name' ";
   	        $res_insert = mysql_query($sql);
   	        if($res_insert){
   	            echo "<script>alert('密码修改成功！'); history.go(-1);</script>";
   	        }
   	    }else{
   	    	echo "<script>alert('两次密码不一致！'); history.go(-1);</script>";
   	    }
   	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
		<style type="text/css">
			.class_div_form{
				width: 600px;height: 550px;
				border: 1px solid black;
				background: white;
				
				position: absolute;
				top: 10px;
				left: 350px;
			}
			.class_password{
			width: 300px;height: 150px;
				border: 1px solid black;
				
				position: absolute;
				top: 100px;
				left: 130px;
			}
			.class_div_psw{
				
				position: absolute;
				top: 10px;
				left: 10px;
			}
			.class_div_repsw{
								
				position: absolute;
				top: 50px;
				left: 10px;
			}
			a{
				text-decoration: none;
				color: blue;
			}
			.class_submit{
												
				position: absolute;
				top: 100px;
				left: 100px;
			}
			.class_span2{
				position: absolute;
				top: 110px;
				left: 440px;
			}
			.class_span3{
				position: absolute;
				top: 150px;
				left: 440px;
			}
		</style>
		<script type="text/javascript">
			function ckPwd2() {  
    		    var pwd1 = document.getElementById('div_id_psw1').value;  
        		var pwd2 = document.getElementById('div_id_psw2').value;  
        		var span1 = document.getElementById("id_span3");  
        		if(pwd2.length<6 || pwd2.length>12) {  
            		span1.innerHTML = "<font size='3' color='red'>密码为6—12个字符</font>";  
            		return false;  
        		}else if(pwd1 != pwd2) {  
         		   span1.innerHTML = "<font size='3' color='red'>密码不一致</font>";  
           		 return false;  
        		}else{  
         		   span1.innerHTML = "<font size='3' color='green'>密码一致</font>";  
           		 return true;  
       		    }  
    		}
            
    		function ckPwd1() {
    			var pwd1 = document.getElementById('div_id_psw1').value;
    			var span2 = document.getElementById("id_span2");
    			if(pwd1.length<6 || pwd1.length>12) {
    				span2.innerHTML = "<font size='3' color='red'>密码为6—12个字符</font>";
    				return false;
    			}else{
    				span2.innerHTML = "<font size='3' color='green'>密码可用</font>";
    				return true;
    			}
    		}
		</script>
	</head>
	<body style="background-image: url(../bg_image/16.jpg);background-size: 1366px,800px;position: relative;">
		<hr />
		<form action="user_pwd_change.php" method="post" class="class_div_form">
		    <hr />
			<div class="class_div_title">
				<a href="user_im_check.php?user_name=<?php echo $user_name;?>">个人信息查看</a>||<a href="user_information.php?user_name=<?php echo $user_name;?>">个人信息修改</a>||修改密码
			</div><br /><hr />
			<div class="class_password">
				<div class="class_div_psw">
					<label for="" style="font-size: 17px;">&nbsp;&nbsp;输入密码：</label><input type="password" name="psw1" id="div_id_psw1" class="div_class_psw" placeholder="请输入密码" onBlur="ckPwd1()"/>
				</div>
				<div class="class_div_repsw">
					<label for="" style="font-size: 17px;">&nbsp;&nbsp;确认密码：</label><input type="password" name="psw2" id="div_id_psw2" class="div_class_psw" placeholder="请再次输入密码" onBlur="ckPwd2()"/>							   
				</div>
				<input type="submit" name="submit" value="修改密码" class="class_submit"/>	
			</div>	
	       	<span class="class_span2" id="id_span2"></span>
			<span class="class_span3" id="id_span3"></span>
		</form>
	</body>
</html>