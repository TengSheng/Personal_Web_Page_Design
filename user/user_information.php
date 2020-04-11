<?php
	session_name("admin");
	session_start();

    $user_name=$_GET['user_name'];
    $name=$_SESSION[$user_name];
	
    include("../connect.php");
    
    if(isset($_POST['submit']) && $_POST['submit'] == "保存")  
    {  
    	$headimg=$_POST['headimg']; 
    	$file= "../head_image/".$headimg;
        $nickname=$_POST['nickname']; 
        $gender=$_POST['gender']; 
        $blood=$_POST['blood']; 
        $birthday=$_POST['birthday']; 
        $address=$_POST['address']; 
        $introduction=$_POST['introduction']; 
        
        $sql_insert1 = "UPDATE `user_information` SET `nickname`='$nickname',`gender`='$gender',`blood`='$blood',`birthday`='$birthday',`address`='$address',`introduction`='$introduction',`headimg`='$file' 
        WHERE name='$name' ";
        $res_insert1 = mysql_query($sql_insert1);// 
        
        $sql_insert2 = "UPDATE `user` SET `nickname`='$nickname',`sex`='$gender',`date`='$birthday' WHERE name='$name' "; 
        $res_insert2 = mysql_query($sql_insert2);// 
        
        if($res_insert1&&$res_insert2)  
        {  
            echo "<script>alert('信息更新成功！'); history.go(-1);</script>";  
                
        }  
        else  
        {  
            echo "<script>alert('信息更新失败！'); history.go(-1);</script>";  
        } 
    }
        
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
		<style type="text/css">
			.class_form_1{
				width: 600px;height: 550px;
				border: 1px solid black;
				background: white;
				
				position: absolute;
				top: 10px;
				left: 350px;
			}
			div{
				width: 600px;height: 40px;
				/*border: 1px solid black;*/
			}

			.class_div_introduction{
				width: 600px;height: 120px;
				/*border: 1px solid black;*/
			}
			a{
				text-decoration: none;
				color: blue;
			}
			.headimg{				
				position: absolute;
				top: 15px;
				left: 100px;
			}
		</style>
		<script type="text/javascript">
        
        </script>
	</head>
	<body style="background-image: url(../bg_image/16.jpg);background-size: 1366px,800px;position: relative;">
		<hr />
		<form action="user_information.php" method="post" class="class_form_1">
			<hr />
			<div class="class_div_title">
				<a href="user_im_check.php?user_name=<?php echo $user_name;?>">个人信息查看</a> ||个人信息修改||<a href="user_pwd_change.php?user_name=<?php echo $user_name;?>">密码修改</a> 
			</div><hr />	
			
			<?php
			$sql_insert1 = "SELECT `headimg`,`nickname`, `gender`, `blood`, `birthday`, `address`, `introduction` FROM `user_information` WHERE name='$name'";
			$res_insert1 = mysql_query($sql_insert1);
			$row = mysql_fetch_array($res_insert1);
			?>
			
			<div class="class_div_headimg" style="position: relative;">
				<span style="position: absolute;top: 15px;">&nbsp;&nbsp;头&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;像：</span>
				<input type="file" name="headimg" class="headimg" />
			</div><hr />		
			<div class="class_div_nickname">
				<span >&nbsp;&nbsp;昵&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;称：</span><input type="text" name="nickname" value="<?php echo $row['nickname'];?>"/>
			</div><hr />
			<div class="class_div_gehder">
				<span>&nbsp;&nbsp;性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：</span>
			    <label for="man">男</label><input type="radio" name="gender" id="man" value="男" checked="checked"/>&nbsp;&nbsp;&nbsp;&nbsp;
		        <label for="woman">女</label><input type="radio" name="gender" id="woman" value="女"/>
			</div><hr />
			<div class="class_div_blood">
				<span>&nbsp;&nbsp;血&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;型：</span>
		        <select name="blood">
		    	<option value="A" selected="selected">A</option>
		    	<option value="B" >B</option>
		    	<option value="AB" >AB</option>
		    	<option value="O" >O</option>
		    	<option value="其它" >其它</option>
		        </select>
			</div><hr />
			<div class="class_div_birthday">
				<span>&nbsp;&nbsp;生&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;日：</span><input type="date" name="birthday" value="<?php echo $row['birthday'];?>"/>
			</div><hr />
		    <div class="class_div_address">
		    	<span>&nbsp;&nbsp;家庭地址：</span>		    
                <input type="text" name="address" id="" value="<?php echo $row['address']?>" style="width: 417px;"/>
		    </div><hr />
		    <div class="class_div_introduction">
		    	<span>&nbsp;&nbsp;个人说明：</span>	<br />	    
                &nbsp;&nbsp;<textarea name="introduction" placeholder="填写个人相关信息" style="width: 500px;height: 80px;"><?php echo htmltocode($row['introduction']);?></textarea>
		    </div><hr />            
			<input type="submit" name="submit" value="保存"/>
		</form>
	</body>
</html>