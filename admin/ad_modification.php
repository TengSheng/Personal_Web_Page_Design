<?php
    session_name("admin");
	session_start();
	$adname=$_SESSION['adname'];
	
    include("../connect.php");
    
     if(isset($_POST['submit'])&&$_POST['submit']=="修改密码")
    {
   	    $pwd1=$_POST['psw1'];
   	    $pwd2=$_POST['psw2'];
   	    
   	    if($pwd1==$pwd2)
   	    {
   	        $sql="UPDATE `admin` SET `upwd`='$pwd2'";
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
		<meta charset="UTF-8">
		<title></title>
		<style type="text/css">
		*{margin: 0px;padding: 0px;}
			.class_form{
				width: 450px;height: 210px;				
				/*border: 1px solid black;*/
				
				position: absolute;
				top: 100px;
				left: 250px;
			}
			.class_pwd{
			    width: 270px;height: 170px;
				/*border: 1px solid black;*/
				background: hotpink;
				
				position: absolute;
				top: 0px;
				left: 0px;
			}
			.class_span2{
				width: 150px;height: 20px;
				/*border: 1px solid black;*/
				position: absolute;
				top: 43px;
				left: 275px;
			}
			.class_span3{
				width: 150px;height: 20px;
				/*border: 1px solid black;*/
				position: absolute;
				top: 67px;
				left: 275px;
			}
			.class_submit{
				width: 100px;
				background: lightblue;
				position: absolute;
				top: 110px;
				left: 80px;
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
	<body style="background-image: url(../bg_image/05.jpg);background-size: 1100px;position: relative;">
		<form action="ad_modification.php" method="post" class="class_form">
		  <div class="class_pwd">
		  	<br /><br />
			<div class="class_div_psw">
				<label for="" style="font-size: 17px;">&nbsp;输入密码：</label><input type="password" name="psw1" id="div_id_psw1" class="div_class_psw" placeholder="请输入密码" onBlur="ckPwd1()"/>
			</div>
			<div class="class_div_repsw">
				<label for="" style="font-size: 17px;">&nbsp;确认密码：</label><input type="password" name="psw2" id="div_id_psw2" class="div_class_psw" placeholder="请再次输入密码" onBlur="ckPwd2()"/>							   
			</div>
		  </div>
			<span class="class_span2" id="id_span2"></span>
			<span class="class_span3" id="id_span3"></span>
			
			<input type="submit" name="submit" value="修改密码" class="class_submit"/>
		</form>
			
	</body>
</html>